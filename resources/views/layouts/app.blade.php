<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Esporotricose') }}</title>
    <link rel="icon" href="/assets/img/esporo.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @laravelPWA
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"
            integrity="sha512-VTd65gL0pCLNPv5Bsf5LNfKbL8/odPq0bLQ4u226UNmT7SzE4xk+5ckLNMuksNTux/pDLMtxYuf0Copz8zMsSA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.css"
          integrity="sha512-n/6qsbBjjZik70avxNu5SS3tXMbWby7M7xiN/43zHKB2iPTcPaB98Y7+QN0pHWIDa2EDRCW5/d7fSB5XgBdTnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body class="font-sans antialiased">
<input type="hidden" value="{{csrf_token()}}" id="csrf_token">
<div class="min-h-screen bg-gray-100">
    @livewire('navigation-dropdown')

    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
<script>
    let buttonInstall = document.getElementById('install-pwa');
    // Initialize deferredPrompt for use later to show browser install prompt.
    let deferredPrompt;

    window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent the mini-infobar from appearing on mobile
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        // Update UI notify the user they can install the PWA
        document.getElementById('modal-pwa').classList.remove('hidden');
        // Optionally, send analytics event that PWA install promo was shown.
        console.log(`'beforeinstallprompt' event was fired.`);
    });
    buttonInstall.addEventListener('click', async () => {
        // Hide the app provided install promotion
        // Show the install prompt
        deferredPrompt.prompt();
        // Wait for the user to respond to the prompt
        const {outcome} = await deferredPrompt.userChoice;
        // Optionally, send analytics event with outcome of user choice
        console.log(`User response to the install prompt: ${outcome}`);
        // We've used the prompt, and can't use it again, throw it away
        deferredPrompt = null;
        document.getElementById('modal-pwa').classList.add('hidden');

    });
    window.addEventListener('appinstalled', () => {
        // Hide the app-provided install promotion
        document.getElementById('modal-pwa').classList.add('hidden');
        // Clear the deferredPrompt so it can be garbage collected
        deferredPrompt = null;
        // Optionally, send analytics event to indicate successful install
        console.log('PWA was installed');
    });

</script>
@if(auth()->user()->tutorial === 0)
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            introJs().setOptions({
                showProgress: true,
                nextLabel: "Próximo",
                prevLabel: "Voltar",
                skipLabel: "Pular",
                doneLabel: "Concluir",
                disableInteraction: true
            }).oncomplete(function () {
                $.ajax({
                    url: '/tutorialCompleted',
                    headers: {
                        'X-CSRF-TOKEN': $('#csrf_token').val()
                    },
                    success: function (data) {

                    }
                });
            }).start();
        });
    </script>
@endif
</body>
</html>
