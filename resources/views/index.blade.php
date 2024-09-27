<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Galeri Virtual Wayang Kamasan | Augmented Reality</title>
        <meta name="description" content="Galeri Virtual Wayang Kamasan | Augmented Reality">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">
        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="relative bg-no-repeat bg-center h-[100dvh] bg-cover" style="background-image: url('{{ asset('assets/images/wayang-blur.png') }}'); background-position: center;">
        @component('components.splash-screen')
        @section('content')
            @component('components.app-background')
                @section('foreground')
                <div class="flex flex-col justify-between items-center h-[100dvh] w-full">
                    <img class="w-6/8 max-w-80 mt-24" src="{{ asset('assets/images/text-logo.png') }}" alt="">
                    <button class="flex justify-center">
                        <img class="w-6/8 max-w-80" src="{{ asset('assets/images/btn-home.png') }}" alt="Welcome">
                    </button>
                    <div class="flex justify-between mb-12 px-12 w-full">
                        <div class="flex gap-2">
                            <button>
                                <img class="w-8" src="{{ asset('assets/images/gear.svg') }}" alt="">
                            </button>
                            <button>
                                <img class="w-8" src="{{ asset('assets/images/info.svg') }}" alt="">
                            </button>
                        </div>
                        <button class="bg-marun font-joti text-white px-4 py-2 rounded-full border-black border-2">
                            Keluar
                        </button>
                    </div>
                </div>
                @endsection
            @endcomponent
        @endsection
        @endcomponent
    </body>
</html>
