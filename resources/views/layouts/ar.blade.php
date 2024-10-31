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
        <div id="instructions">Tap to grow</div>
    </div>
    <div id="app">
        <a href="https://launch.variant3d.com"><img id="variant-logo" alt="WebXR on iOS" src="favicon.ico" /></a>
        <h2>Start AR</h2>
        <div id="ar-not-supported">
            <p>
                WebXR Not Supported. Open this page on iOS or Android to view the
                example.
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
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
    <script>
        var ruanganFile = "{{ asset('assets/ruangan.glb ') }}";
    </script>
    @yield('lukisans')
    <script type="module" src="{{ asset('assets/js/ar-main.js') }}"></script>
</body>

</html>
