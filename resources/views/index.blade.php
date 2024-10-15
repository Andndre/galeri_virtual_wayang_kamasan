<x-guest-layout>
    <div class="flex flex-col justify-between items-center h-[100dvh] w-full">
        <img class="w-6/8 max-w-80 mt-24" src="{{ asset('assets/images/text-logo.png') }}" alt="">
        <button class="flex justify-center items-center relative">
            <img class="w-6/8 max-w-80" src="{{ asset('assets/images/btn-home.png') }}" alt="Welcome">
            <p class="absolute font-joti text-xl text-light w-44 mt-[-.4rem]">{{__('app.gallery_button')}}</p>
        </button>
        <div class="flex justify-between mb-12 px-12 w-full">
            <div class="flex gap-2">
                <button id="settings-button">
                    <img class="w-8" src="{{ asset('assets/images/gear.svg') }}" alt="">
                </button>
                <button id="info-button">
                    <img class="w-8" src="{{ asset('assets/images/info.svg') }}" alt="">
                </button>
            </div>
        </div>
    </div>
    <div id="settings-overlay" class="absolute top-0 left-0 w-full h-full bg-black/85 hidden">
        <div class="flex flex-col justify-center items-center h-full w-full animate-pop">
            {{-- language settings --}}
            <div class="flex flex-col justify-center items-center h-full w-full">
                <div class="flex flex-col gap-3">
                    <div class="bg-marun text-white px-12 py-2 rounded-full border-black border-[4px] text-center font-joti">
                        <h3 class="text-2xl">{{__('app.settings')}}</h3>
                    </div>
                    <div class="flex flex-col bg-marun text-white rounded-3xl border-black border-[4px] text-center font-joti overflow-hidden">
                        <p class="text-left px-6 py-3">{{__('app.language')}}</p>
                        <a href="{{ route('change-language', 'id') }}" class="bg-cokelat px-6 py-3 flex gap-4 items-center"
                            id="english-button">
                            <img class="w-10 aspect-square" src="{{ asset('assets/images/indonesia.png') }}" alt="">
                            <span class="font-sans">Indonesia</span>
                        </a>
                        <div class="pt-2"></div>
                        <a href="{{ route('change-language', 'en') }}" class="bg-cokelat px-6 py-3 flex gap-4 items-center"
                            id="indonesia-button">
                            <img class="w-10 aspect-square" src="{{ asset('assets/images/english.png') }}" alt="">
                            <span class="font-sans">English</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="info-overlay" class="absolute top-0 left-0 w-full h-full bg-black/85 hidden">
        <div class="flex flex-col justify-center items-center h-full w-full animate-pop">
            <img class="w-6/8 max-w-80" src="{{ asset('assets/images/dimas-pramudita.png') }}" alt="">
            <div
                class="bg-marun text-white px-6 py-2 rounded-full border-black border-[4px] text-center w-[80%] max-w-96">
                <p>{{__('app.developed_by')}}</p>
                <p class="font-bold text-lg">Putu Dimas Pramudita</p>
            </div>
            <button id="panduan-button"
                class="mt-3 bg-marun font-joti text-white px-6 py-3 rounded-full border-black border-[4px]"
                id="info-close">
                {{__('app.guide')}}
            </button>
        </div>
    </div>
    <div id="panduan-overlay" class="absolute top-0 left-0 w-full h-full bg-black/85 hidden">
        <div class="flex flex-col justify-center items-start h-full w-full">
            @php
                $panduan = [
                    [
                        'icon' => asset('assets/images/login.png'),
                        'text' => __('app.guide_content.1'),
                    ],
                    [
                        'icon' => asset('assets/images/user-group.png'),
                        'text' => __('app.guide_content.2'),
                    ],
                    [
                        'icon' => asset('assets/images/menu.png'),
                        'text' => __('app.guide_content.3'),
                    ],
                    [
                        'icon' => asset('assets/images/search.png'),
                        'text' => __('app.guide_content.4'),
                    ],
                    [
                        'icon' => asset('assets/images/camera.png'),
                        'text' => __('app.guide_content.5'),
                    ],
                    [
                        'icon' => asset('assets/images/portal.png'),
                        'text' => __('app.guide_content.6'),
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

        $('#settings-button').click(function() {
            $('#settings-overlay').fadeIn();
        });

        $('#settings-overlay').click(function() {
            $('#settings-overlay').fadeOut();
        });

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
</x-guest-layout>
