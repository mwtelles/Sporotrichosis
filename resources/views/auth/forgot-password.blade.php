<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Recuperar Senha</title>
</head>

<body>

    <section class="form-login">
        <form method="POST" action="{{ route('password.email') }}" id="form-inscricao">

        @csrf
        
            <span class="img-form">
                <img class="img-form-active" src="assets/img/esporo.png">
                <p class="title-principal">
                    Recuperar senha
                </p>
            </span>
            <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="text-error">
                {{ session('status') }}
            </div>
        @endif
            <span>
                <p class="description-login">
                Esqueceu sua senha? Sem problemas. Digite seu email abaixo que enviaremos um link para você resetar sua senha e criar uma nova.
                </p>
            </span>
            <span class="form-inscricao-campos">
                <label id="userEmail-form" for="email" value="{{ __('Email') }}">Email</label>
                <input type="email" name="email" id="userEmail" :value="old('email')" required autofocus>
            </span>
            <span class="form-inscricao-campos" style="align-items: center; margin-top:20px;">
                <button id="button-form" type="submit">{{ __('Email Password Reset Link') }}</button>
            </span>
        </form>
    </section>

</body>