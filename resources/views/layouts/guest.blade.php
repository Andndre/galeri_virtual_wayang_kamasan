<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Galeri Wayang Kamasan') | {{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('css')

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
</head>

<body class="relative bg-no-repeat bg-center h-[100dvh] bg-cover"
    style="background-image: url('{{ asset('assets/img/guest/wayang-blur.png') }}'); background-position: center;">

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to create and play audio from a Blob
            function playAudioFromBlob(blobUrl) {
                var audio = new Audio(blobUrl);
                audio.volume = 0.5;

                // Retrieve saved time from localStorage and set it before playing
                var savedTime = localStorage.getItem('bg-music-time');
                if (savedTime) {
                    audio.currentTime = parseFloat(savedTime);
                }

                audio.play();

                // Update the saved time every second
                setInterval(function() {
                    localStorage.setItem('bg-music-time', audio.currentTime);
                }, 1000);

                // Save the current time before the page unloads
                window.addEventListener('beforeunload', function() {
                    localStorage.setItem('bg-music-time', audio.currentTime);
                });

                // Optional: Reset the saved time when the audio ends
                audio.onended = function() {
                    localStorage.removeItem('bg-music-time');
                };
            }

            // Load the audio file and play it
            var request = new XMLHttpRequest();
            request.open("GET", "{{ asset('assets/music/bg.wav') }}", true);
            request.responseType = "blob";
            request.onload = function() {
                if (this.status == 200) {
                    var blobUrl = URL.createObjectURL(this.response);
                    console.log("Audio URL: " + blobUrl);
                    playAudioFromBlob(blobUrl);
                }
            };
            request.send();
        });
    </script> --}}

    <div id="main-content" class="{{ request()->is('/') ? 'opacity-0' : null }}">
        <div class="relative">
            <main class="z-20 absolute w-full">
                @yield('main')
            </main>
            @yield('overlay')
        </div>
    </div>


    @if (request()->is('/'))
        <div id="splash-screen" class="absolute inset-0 flex flex-col justify-center items-center animate-fadeIn">
            <div class="absolute z-10 top-0 w-full">
                <div class="w-full h-6 bg-repeat-x bg-marun" style="background-image: url('{{ asset('assets/img/guest/kiran.png') }}'); background-size: auto 100%;">
                </div>
                <div class="w-full h-8 bg-repeat-x" style="background-image: url('{{ asset('assets/img/guest/bung.png') }}'); background-size: auto 100%;">
                </div>
            </div>
            <div class="absolute z-10 bottom-0 w-full">
                <div class="w-full h-8 bg-repeat-x" style="background-image: url('{{ asset('assets/img/guest/bung.png') }}'); background-size: auto 100%; transform: rotate(180deg);">
                </div>
                <div class="w-full h-6 bg-repeat-x bg-marun" style="background-image: url('{{ asset('assets/img/guest/kiran.png') }}'); background-size: auto 100%;">
                </div>
            </div>
            <div class="absolute bottom-52 left-5">
                <img class="w-2/3 max-w-64" src="{{ asset('assets/img/guest/line.png') }}" alt="Welcome">
            </div>
            <div class="absolute top-52 right-0">
                <img class="w-2/3 max-w-64 scale-y-[-1]" src="{{ asset('assets/img/guest/line.png') }}" alt="Welcome">
            </div>
            <div class="absolute top-24 left-8">
                <img class="w-2/3 max-w-48 scale-y-[-1]" src="{{ asset('assets/img/guest/ornamen.png') }}" alt="Welcome">
            </div>
            <div class="absolute bottom-24 right-8">
                <img class="w-2/3 max-w-48" src="{{ asset('assets/img/guest/ornamen.png') }}" alt="Welcome">
            </div>
            <div class="w-full h-full flex justify-center items-center z-10">
                <img class="w-2/3 max-w-64 animate-pop" src="{{ asset('assets/img/guest/splash-logo.png') }}" alt="Welcome">
            </div>
        </div>
        <style>
            .fade-out {
                opacity: 0;
                transition: opacity 1s ease-out;
            }
            .fade-in {
                opacity: 1;
                transition: opacity 1s ease-in;
            }
        </style>
        <script>
            const splashScreen = document.getElementById('splash-screen');
            const mainContent = document.getElementById('main-content');
            setTimeout(function() {

                splashScreen.classList.add('fade-out');
                setTimeout(() => {
                    splashScreen.style.display = 'none';
                    mainContent.classList.add('fade-in');
                    mainContent.classList.remove('opacity-0');
                }, 1000);
            }, 3000);
        </script>
    @endif




    @yield('js')
</body>

</html>
