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
    <script>
        var popupVisible = false;
    </script>
    <div id="overlay" class="max-h-[100dvh] overflow-hidden">
        <div id="tracking-prompt"><img src="{{ asset('assets/img/ar/hand.png') }}" /></div>
        <div id="instructions">Tekan untuk memunculkan ruangan</div>
        <div id="toaster-container" class="fixed bottom-0 right-0 m-4 z-[99999]"></div>
        <div id="bottom-sheet" class="fixed bottom-0 left-0 right-0 bg-bg shadow-lg rounded-t-lg transform translate-y-full transition-transform duration-300 h-16 z-[100000]">
            <div class="p-4">
                <h3 class="text-lg font-bold text-black">Deskripsi Lukisan</h3>
            </div>
            <div id="bottom-sheet-content" class="hidden p-4 overflow-y-auto h-[80vh] text-black text-center">
                <ul id="lukisan-list" class="mt-2 flex flex-col gap-6">
                    @foreach ($lukisans as $i => $lukisan)
                        <li class="mb-2">
                            <img class="w-60 max-w-full mx-auto" src="{{ $lukisan->image }}" alt="">
                            <p>{{ $lukisan->description }}</p>
                        </li>
                    @endforeach
                </ul>
                <button id="close-bottom-sheet" class="absolute top-2 right-2 text-black text-2xl">&times;</button>
            </div>
        </div>
        <button id="expand-bottom-sheet" class="fixed bottom-10 left-1/2 transform -translate-x-1/2 bg-marun font-joti text-white px-6 py-3 rounded-full border-black border-[4px] z-[99999]" style="display: none;">
            Show Details
        </button>
        <script>
            document.getElementById('expand-bottom-sheet').addEventListener('click', function() {
                document.getElementById('bottom-sheet').style.transform = 'translateY(0)';
                document.getElementById('bottom-sheet').style.height = '80vh';
                document.getElementById('bottom-sheet-content').style.display = 'block';
            });
            document.getElementById('close-bottom-sheet').addEventListener('click', function() {
                document.getElementById('bottom-sheet').style.transform = 'translateY(100%)';
                document.getElementById('bottom-sheet').style.height = '16px';
                document.getElementById('bottom-sheet-content').style.display = 'none';
            });
        </script>
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
    <div id="ar-button-container"></div>
    {{-- modal deskripsi lukisan --}}

    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    @yield('lukisans')
    <script type="module" src="{{ asset('assets/js/ar-main.js') }}"></script>
</body>

</html>
