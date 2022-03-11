<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tela de Registro</title>
</head>

<body>

    <section class="form-login">
        <form method="POST" action="{{ route('register') }}" id="form-inscricao">

        @csrf

            <span class="img-form">
                <img class="img-form-active" src="assets/img/esporo.png">
            </span>
            <span>
                <p class="title-login">
                    Cadastre-se
                </p>

            </span>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <span class="form-inscricao-campos">
                <label id="userEmail-form" for="name" value="{{ __('Name') }}">Nome</label>
                <input type="text" name="name" id="userName" :value="old('name')" required autofocus autocomplete="name">
            </span>
            <span class="form-inscricao-campos">
                <label id="userEmail-form" for="email" value="{{ __('Email') }}">Email</label>
                <input type="email" name="email" id="userEmail" :value="old('email')" required>
            </span>
            <span class="form-inscricao-campos">
                <label id="userEmail-form" for="email" value="{{ __('Crmv') }}">Crmv</label>
                <input type="crmv" name="crmv" id="userEmail" :value="old('crmv')" required>
            </span>
            <span class="form-inscricao-campos">
                <label id="userPassword-form" for="password" value="{{ __('Password') }}">Senha</label>
                <input type="password" name="password" id="userPassword" required autocomplete="new-password">
            </span>
            <span class="form-inscricao-campos">
                <label id="userPassword-form" for="password_confirmation" value="{{ __('Confirm Password') }}">Repita a Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
            </span>
            <span class="radio">
                <input type="radio" name="checkbox" id="Concordo" value="Concordo">
                <label for="male">Li e Aceito os <span id="userEmail-form">Termos de Uso</span></label>
            </span>
            <span class="form-inscricao-campos" style="align-items: center; margin-top:20px;">
                <button id="button-form" type="submit">{{ __('Register') }}</button>
            </span>

            <div class="registrar-e-recuperar">
                <a href="{{ route('login') }}"><span class="recuperar"> {{ __('Already registered?') }} </span></a>
            </div>
        </form>
    </section>

</body>
