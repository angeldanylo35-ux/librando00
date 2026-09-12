@extends('layouts.app') {{-- ajuste para o layout que seu projeto usa --}}

@section('content')
<div class="auth-card">
    <h1>Digite o código</h1>
    <p>Enviamos um código de 6 dígitos para o seu e-mail. Ele expira em 15 minutos.</p>

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

    <form method="POST" action="{{ route('password.code.verify') }}">
        @csrf

        <label for="code">Código de recuperação</label>
        <input
            id="code"
            type="text"
            name="code"
            inputmode="numeric"
            maxlength="6"
            autocomplete="one-time-code"
            required
            autofocus
        >

        <button type="submit">Validar código</button>
    </form>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <button type="submit" class="link-button">Reenviar código</button>
    </form>
</div>
@endsection