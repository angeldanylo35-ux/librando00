<?php

use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {

    // ETAPA 1 — informar o e-mail
    Route::get('esqueci-senha', [PasswordResetController::class, 'showEmailForm'])
        ->name('password.request');

    Route::post('esqueci-senha', [PasswordResetController::class, 'sendCode'])
        ->middleware('throttle:3,1') // no máx. 3 pedidos de código por minuto/IP
        ->name('password.email');

    // ETAPA 2 — informar o código recebido
    Route::get('esqueci-senha/codigo', [PasswordResetController::class, 'showCodeForm'])
        ->name('password.code.form');

    Route::post('esqueci-senha/codigo', [PasswordResetController::class, 'verifyCode'])
        ->middleware('throttle:10,1') // limita tentativas de adivinhar o código
        ->name('password.code.verify');

    // ETAPA 3 — nova senha
    Route::get('esqueci-senha/nova-senha', [PasswordResetController::class, 'showNewPasswordForm'])
        ->name('password.reset.form');

    Route::post('esqueci-senha/nova-senha', [PasswordResetController::class, 'resetPassword'])
        ->middleware('throttle:5,1')
        ->name('password.reset.update');

});