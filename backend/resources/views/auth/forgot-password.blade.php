@extends('layouts.app') {{-- ajuste para o layout que seu projeto usa --}}

@section('content')
<div class="auth-card">
    <h1>Esqueceu a senha?</h1>
    <p>Informe seu e-mail cadastrado e enviaremos um código de recuperação.</p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label for="email">E-mail</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            autofocus
        >

        <button type="submit">Enviar link de redefinição</button>
    </form>

    <a href="{{ route('login') }}">Voltar para o login</a>
</div>
@endsection