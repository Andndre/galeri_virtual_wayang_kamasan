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

    <script src="https://launchar.app/sdk/v1?key=5aBe43oIyUoBC3PyhermEi3oqqswm07z&redirect=true"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('css')

    <style>
        .toaster {
            background-color: black;
            color: white;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            border-radius: 0.25rem;
            position: relative;
            animation: slide-in 0.2s forwards, slide-out 0.2s 2.5s forwards;
        }

        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slide-out {
            from {
                opacity: 1;
                transform: translateX(0);
            }

            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }
    </style>
</head>

<body>
    <script>
        var popupVisible = false;
    </script>
    <div id="overlay" class="max-h-[100dvh] overflow-hidden relative">
        <div id="instructions" class="bg-[#470C02] z-[100000] w-full text-center hidden absolute top-0 p-4">Tekan
            lingkaran untuk memunculkan ruangan</div>
        <audio id="audio-portal">
            {{-- if language preference is set to id, then use assets/music/indonesia-wayang-kamasan-gallery.mp3 --}}
            @if (session()->has('locale') && session('locale') == 'id')
                <source src="{{ asset('assets/music/indonesia-wayang-kamasan-gallery.mp3') }}" type="audio/mpeg">
            @else
                {{-- else, use assets/music/english-wayang-kamasan-gallery.mp3 --}}
                <source src="{{ asset('assets/music/english-wayang-kamasan-gallery.mp3') }}" type="audio/mpeg">
            @endif
        </audio>
        <video id="video-portal" loop crossOrigin="anonymous" playsinline style="display:none" class="rotate-[90deg]">
            <source src="{{ asset('assets/portal.mp4') }}" type="video/mp4">
        </video>
        <div id="tracking-prompt"><img src="{{ asset('assets/img/ar/hand.png') }}" /></div>
        <div id="toaster-container" class="fixed bottom-0 right-0 m-4 z-[99999]"></div>
        <div id="bottom-sheet"
            class="fixed bottom-0 left-0 right-0 bg-bg shadow-lg rounded-t-lg transform translate-y-full transition-transform duration-300 h-16 z-[100000]">
            <div class="p-4">
                <h3 class="text-lg font-bold text-black">Deskripsi Lukisan</h3>
            </div>
            <div id="bottom-sheet-content" class="hidden p-4 overflow-y-scroll h-[80vh] text-black text-center">
                <ul id="lukisan-list" class="py-2 flex flex-col gap-6">
                    @foreach ($lukisans as $i => $lukisan)
                        <li>
                            <img class="w-60 max-w-full mx-auto" src="{{ $lukisan->image }}" alt="">
                            <p>{{ $lukisan->description }}</p>
                        </li>
                    @endforeach
                    <li>
                        <div class="pt-8"></div>
                    </li>
                </ul>
                <button id="close-bottom-sheet" class="absolute top-2 right-2 text-black text-2xl">&times;</button>
            </div>
        </div>
        <button id="expand-bottom-sheet"
            class="fixed bottom-10 left-1/2 transform -translate-x-1/2 bg-marun font-joti text-white px-6 py-3 rounded-full border-black border-[4px] z-[99999]"
            style="display: none;">
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
        <a href="#"><img id="variant-logo" alt="Logo"
                src="{{ asset('assets/img/logo/text-logo.png') }}" /></a>
        <h2>Galeri Virtual @yield('nama.pelukis')</h2>
        <div id="ar-not-supported">
            <p>
                Teknologi WebXR tidak didukung di perangkat Anda.
            </p>
            <p>
                For documentation & support, visit
                <a href="https://launch.variant3d.com/docs">https://launch.variant3d.com</a>.
            </p>
            <div class="flex flex-col justify-center">
                <div id="qr-code" class="p-4 bg-white mx-auto text-black flex flex-col items-center gap-3">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-orange"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                    <p>Memuat QR</p>
                </div>
            </div>
        </div>
        <div id="loading-container">
            <div id="loading-bar"></div>
        </div>
    </div>
    <div id="ar-button-container"></div>
    {{-- modal deskripsi lukisan --}}

    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    @yield('lukisans')
    <script type="module" src="{{ asset('assets/js/ar-main-3.js') }}"></script>
</body>

</html>
