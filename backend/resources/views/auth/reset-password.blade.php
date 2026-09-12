@extends('layouts.app') {{-- ajuste para o layout que seu projeto usa --}}

@section('content')
<div class="auth-card">
    <h1>Redefinir senha</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.reset.update') }}">
        @csrf

        <label for="password">Nova senha</label>
        <input
            id="password"
            type="password"
            name="password"
            required
        >

        <label for="password_confirmation">Confirmar nova senha</label>
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
        >

        <button type="submit">Redefinir senha</button>
    </form>
</div>
@endsection