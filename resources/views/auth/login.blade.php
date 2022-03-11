<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Tela de Login</title>
    <link rel="icon" href="/assets/img/esporo.png" type="image/png">
    @laravelPWA
</head>

<body>

    <section class="form-login">
        <form method="POST" action="{{ route('login') }}" id="form-inscricao">

        @csrf

            <span class="img-form">
                <img class="img-form-active" src="assets/img/esporo.png">
            </span>
            <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="text-error">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="text-error">
                {{ session('error') }}
            </div>
        @endif

            <span>
                <p class="title-login">
                    Entrar
                </p>
                <p class="description-login">
                    Entre com o acesso da sua clínica
                </p>
            </span>
            <span class="form-inscricao-campos">
                <label id="userEmail-form" for="email" value="{{ __('Email') }}">Email</label>
                <input type="email" name="email" id="userEmail" :value="old('email')" required autofocus>
            </span>
            <span class="form-inscricao-campos">
                <label id="userPassword-form" for="password" value="{{ __('Password') }}">Senha</label>
                <input type="password" name="password" id="userPassword" required autocomplete="current-password">
            </span>
            <!--<span class="radio">
                <input type="radio" name="userGender" id="male" value="male">
                <label for="male">Masculino</label>
            </span>-->
            <span class="form-inscricao-campos" style="align-items: center; margin-top:20px;">
                <button id="button-form" type="submit">{{ __('Login') }}</button>
            </span>

            <div class="registrar-e-recuperar">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"><span class="recuperar"> {{ __('Forgot your password?') }} </span></a>
                @endif
                <a href="{{ route('register') }}"><span class="registrar"> <b>Cadastrar</b> </span></a>
            </div>
        </form>
    </section>

</body>
