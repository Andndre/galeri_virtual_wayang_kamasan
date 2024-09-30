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
    <!-- JS -->
    <script src="{{ asset("assets/js/jquery-3.7.1.min.js") }}"></script>
</head>

<body class="relative bg-no-repeat bg-center h-[100dvh] bg-cover"
    style="background-image: url('{{ asset('assets/images/wayang-blur.png') }}'); background-position: center;">
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
                                <button id="info-button">
                                    <img class="w-8" src="{{ asset('assets/images/info.svg') }}" alt="">
                                </button>
                            </div>
                            {{-- TODO: confirm --}}
                            <button onclick="window.location.replace('https://google.com')"
                                class="bg-marun font-joti text-white px-4 py-2 rounded-full border-black border-2">
                                Kembali
                            </button>
                        </div>
                    </div>
                    <div id="info-overlay" class="absolute top-0 left-0 w-full h-full bg-black/85 hidden">
                        <div class="flex flex-col justify-center items-center h-full w-full animate-pop">
                            <img class="w-6/8 max-w-80" src="{{ asset('assets/images/dimas-pramudita.png') }}" alt="">
                            <div
                                class="bg-marun text-white px-6 py-2 rounded-full border-black border-[4px] text-center w-[80%] max-w-96">
                                <p>Dikembangkan Oleh:</p>
                                <p class="font-bold text-lg">Putu Dimas Pramudita</p>
                            </div>
                            <button id="panduan-button"
                                class="mt-3 bg-marun font-joti text-white px-6 py-3 rounded-full border-black border-[4px]"
                                id="info-close">
                                Panduan
                            </button>
                        </div>
                    </div>
                    <div id="panduan-overlay" class="absolute top-0 left-0 w-full h-full bg-black/85 hidden">
                        <div class="flex flex-col justify-center items-start h-full w-full">
                            @php
                                $panduan = [
                                    [
                                        'icon' => asset('assets/images/login.png'),
                                        'text' => 'Masuk ke menu Galeri Virtual Lukisan Wayang Kamasan',
                                    ],
                                    [
                                        'icon' => asset('assets/images/user-group.png'),
                                        'text' =>
                                            'Pilih Pelukis untuk melihat informasi, karya dan Galeri Virtual AR Portal',
                                    ],
                                    [
                                        'icon' => asset('assets/images/menu.png'),
                                        'text' => 'Masuk ke menu AR Portal',
                                    ],
                                    [
                                        'icon' => asset('assets/images/search.png'),
                                        'text' => 'Cari tempat lapang untuk menentukan titik munculnya Portal',
                                    ],
                                    [
                                        'icon' => asset('assets/images/camera.png'),
                                        'text' =>
                                            'Arahkan kamera ke tempat lapang hingga muncul bidang AR kuning, lalu klik bidang tersebut untuk memunculkan Portal Galeri Virtual Lukisan Wayang Kamasan',
                                    ],
                                    [
                                        'icon' => asset('assets/images/portal.png'),
                                        'text' =>
                                            'Masuk ke Portal dan arahkan kamera untuk melihat beberapa produk Lukisan Wayang kamasan',
                                    ],
                                ];
                            @endphp
                            @foreach ($panduan as $p)
                                <div
                                    class="panduan-item mt-3 bg-marun text-white px-6 py-3 rounded-r-full border-black border-r-[4px] border-t-[4px] border-b-[4px] flex gap-3 opacity-0">
                                    <div class="rounded-full bg-white p-2 flex items-center justify-center"
                                        style="width: 50px; height: 50px; flex-shrink: 0;">
                                        <img class="w-8 h-8" src="{{ $p['icon'] }}" alt="">
                                    </div>
                                    <p>{{ $p['text'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <script>
                        $('#info-button').click(function() {
                            $('#info-overlay').fadeIn();
                        });

                        $('#info-overlay').click(function() {
                            $('#info-overlay').fadeOut();
                        });

                        $('#panduan-overlay').click(function() {
                            $('#panduan-overlay').fadeOut();
                        });

                        $('#panduan-button').click(function() {
                            $('#panduan-overlay').fadeIn();
                            $('#info-overlay').fadeOut();

                            $('.panduan-item').each(function(index) {
                                $(this).delay(index * 200).animate({
                                    opacity: 1
                                }, 100);
                            });
                        });
                    </script>
                @endsection
            @endcomponent
        @endsection
    @endcomponent
</body>

</html>
