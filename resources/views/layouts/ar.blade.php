<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>AR</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/ar.css') }}">

    <script type="importmap">
        {
          "imports": {
            "three": "https://cdn.jsdelivr.net/npm/three@v0.153.0/build/three.module.js",
            "three/jsm/": "https://cdn.jsdelivr.net/npm/three@v0.153.0/examples/jsm/"
          }
        }
    </script>

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="https://launchar.app/sdk/v1?key=2UImotyZtwATacB3CvxzVqyNWfqGn4ZF&redirect=true"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('css')
</head>

<body>
    <div id="overlay">
        <div id="tracking-prompt"><img src="{{ asset('assets/img/ar/hand.png') }}" /></div>
        <div id="instructions">Tekan untuk memunculkan ruangan</div>
    </div>
    <div id="app">
        <a href="#"><img id="variant-logo" alt="Logo" src="{{ asset('assets/img/logo/text-logo.png') }}" /></a>
        <h2>Galeri Virtual @yield('nama.pelukis')</h2>
        <div id="ar-not-supported">
            <p>
                Teknologi WebXR tidak didukung di perangkat Anda.
            </p>
            <p>
                For documentation & support, visit
                <a href="https://launch.variant3d.com/docs">https://launch.variant3d.com</a>.
            </p>
            <div id="qr-code"></div>
        </div>
        <div id="loading-container">
            <div id="loading-bar"></div>
    </div>
    </div>
    {{-- modal deskripsi lukisan --}}
    @foreach ($lukisans as $i => $lukisan)
        <div id="modal-{{ $i }}" class="fixed inset-0 z-50 overflow-y-auto bg-black/85 " tabindex="-1" aria-labelledby="modal-{{ $i }}" aria-hidden="true">
            <div class="flex flex-col justify-center items-center h-full w-full animate-pop">
                {{-- <img class="w-6/8 max-w-80" src="{{ asset('storage/' . $lukisan->image) }}" alt="{{ $lukisan->title }}" />
                <div class="bg-marun text-white px-6 py-2 rounded-full border-black border-[4px] text-center w-[80%] max-w-96">
                    <h2 class="text-lg font-joti">{{ $lukisan->title }}</h2>
                </div> --}}
                <div class="bg-marun text-white px-6 py-2 rounded-full border-black border-[4px] text-center w-[80%] max-w-96">
                    <p>{{ $lukisan->description }}</p>
                </div>
                <button id="close-{{$i}}" class="mt-3 bg-marun font-joti text-white px-6 py-3 rounded-full border-black border-[4px]" data-bs-dismiss="modal" aria-label="Close">
                    <span class="sr-only">Close</span>
                    &times;
                </button>
                <script>
                    document.getElementById('close-{{$i}}').addEventListener('click', function() {
                        document.getElementById('modal-{{ $i }}').style.display = 'none';
                    });
                </script>
            </div>
        </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    @yield('lukisans')
    <script type="module" src="{{ asset('assets/js/ar-main.js') }}"></script>
</body>

</html>
