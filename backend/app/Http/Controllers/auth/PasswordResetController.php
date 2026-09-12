<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetCode;
use App\Models\User;
use App\Notifications\PasswordChangedNotification;
use App\Notifications\ResetCodeNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Validation\ValidationException;

class PasswordResetController extends Controller
{
    private const CODE_TTL_MINUTES = 15;
    private const CODE_LENGTH = 6;

    // Chaves de sessão usadas para controlar em qual etapa o usuário está.
    private const SESSION_EMAIL = 'password_reset.email';
    private const SESSION_VERIFIED_UNTIL = 'password_reset.verified_until';

    /* ==========================================================
     * ETAPA 1 — informar o e-mail
     * ========================================================== */

    public function showEmailForm()
    {
        return view('auth.forgot-password');
    }

    public function sendCode(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $email = $request->string('email')->lower()->toString();
        $user = User::where('email', $email)->first();

        if (! $user) {
            // O requisito funcional pede mensagem específica quando o
            // e-mail não é encontrado. Vale registrar: isso permite a um
            // atacante descobrir quais e-mails estão cadastrados
            // (enumeração de contas). Se em algum momento a segurança
            // pesar mais que a UX aqui, troque por uma mensagem genérica
            // igual à que usamos no fluxo anterior.
            throw ValidationException::withMessages([
                'email' => 'E-mail não encontrado.',
            ]);
        }

        // Evita reenvio de código em sequência (throttle por e-mail,
        // além do rate limit já aplicado na rota).
        $ultimoCodigo = PasswordResetCode::where('email', $email)
            ->latest('created_at')
            ->first();

        if ($ultimoCodigo && $ultimoCodigo->created_at->diffInSeconds(now()) < 60) {
            throw ValidationException::withMessages([
                'email' => 'Aguarde um minuto antes de solicitar um novo código.',
            ]);
        }

        // Remove códigos antigos desse e-mail antes de gerar um novo.
        PasswordResetCode::where('email', $email)->delete();

        $code = (string) random_int(
            (int) str_pad('1', self::CODE_LENGTH, '0'),
            (int) str_pad('9', self::CODE_LENGTH, '9')
        );

        PasswordResetCode::create([
            'email' => $email,
            'code_hash' => Hash::make($code),
            'attempts' => 0,
            'expires_at' => now()->addMinutes(self::CODE_TTL_MINUTES),
        ]);

        $user->notify(new ResetCodeNotification($code));

        // Guarda o e-mail na sessão para as próximas etapas.
        $request->session()->put(self::SESSION_EMAIL, $email);

        return redirect()
            ->route('password.code.form')
            ->with('status', 'Enviamos um código para o seu e-mail.');
    }

    /* ==========================================================
     * ETAPA 2 — informar o código recebido
     * ========================================================== */

    public function showCodeForm(Request $request)
    {
        if (! $request->session()->has(self::SESSION_EMAIL)) {
            return redirect()->route('password.request');
        }

        return view('auth.verify-code', [
            'email' => $request->session()->get(self::SESSION_EMAIL),
        ]);
    }

    public function verifyCode(Request $request): RedirectResponse
    {
        $email = $request->session()->get(self::SESSION_EMAIL);

        if (! $email) {
            return redirect()->route('password.request');
        }

        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $registro = PasswordResetCode::where('email', $email)->first();

        if (! $registro) {
            throw ValidationException::withMessages([
                'code' => 'Código inexistente.',
            ]);
        }

        if ($registro->isExpired()) {
            $registro->delete();
            throw ValidationException::withMessages([
                'code' => 'Código expirado. Solicite um novo.',
            ]);
        }

        if ($registro->attemptsExceeded()) {
            $registro->delete();
            throw ValidationException::withMessages([
                'code' => 'Número máximo de tentativas excedido. Solicite um novo código.',
            ]);
        }

        if (! Hash::check($request->input('code'), $registro->code_hash)) {
            $registro->increment('attempts');

            throw ValidationException::withMessages([
                'code' => 'Código inexistente.',
            ]);
        }

        // Código correto: libera a etapa 3 por um tempo curto,
        // sem precisar reenviar o código na URL/form.
        $request->session()->put(
            self::SESSION_VERIFIED_UNTIL,
            now()->addMinutes(10)
        );

        // O código já cumpriu seu papel — invalida para não ser reutilizável.
        $registro->delete();

        return redirect()->route('password.reset.form');
    }

    /* ==========================================================
     * ETAPA 3 — nova senha
     * ========================================================== */

    public function showNewPasswordForm(Request $request)
    {
        if (! $this->isVerified($request)) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $email = $request->session()->get(self::SESSION_EMAIL);

        if (! $email || ! $this->isVerified($request)) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Sessão expirada. Reinicie o processo de recuperação.']);
        }

        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                PasswordRule::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),
            ],
            'password_confirmation' => ['required'],
        ]);

        $validator->after(function ($validator) use ($request) {
            if ($request->input('password') !== $request->input('password_confirmation')) {
                $validator->errors()->add('password_confirmation', 'Senhas não coincidem.');
            }
        });

        $validator->validate();

        $user = User::where('email', $email)->first();

        if (! $user) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Usuário não encontrado.']);
        }

        $user->forceFill([
            'password' => Hash::make($request->input('password')),
            'remember_token' => Str::random(60),
        ])->save();

        // Limpa a sessão do fluxo de recuperação.
        $request->session()->forget([self::SESSION_EMAIL, self::SESSION_VERIFIED_UNTIL]);

        // Loga o usuário e invalida outras sessões ativas (ex.: se a senha
        // vazou e alguém estava com sessão aberta em outro dispositivo).
        Auth::login($user);
        $request->session()->regenerate();
        Auth::logoutOtherDevices($request->input('password'));

        $user->notify(new PasswordChangedNotification());

        return redirect()
            ->route('home') // ajuste para o name da sua rota principal
            ->with('status', 'Senha redefinida com sucesso!');
    }

    /* ========================================================== */

    private function isVerified(Request $request): bool
    {
        $verifiedUntil = $request->session()->get(self::SESSION_VERIFIED_UNTIL);

        return $verifiedUntil && now()->lessThan($verifiedUntil);
    }
}