<div class="relative">
    <main class="z-20 absolute w-full">
        @yield('foreground')
    </main>
    <div class="absolute h-[100dvh] w-full top-0 z-0">
        <div class="absolute top-0 w-full">
            <div class="w-full h-6 bg-repeat-x bg-marun z-0" style="background-image: url('{{ asset('assets/images/kiran.png') }}'); background-size: auto 100%;">
            </div>
        </div>
        <div class="absolute top-0 w-full">
            <div class="flex w-full justify-between z-10">
                <div class="w-full h-48 bg-no-repeat" style="background-image: url('{{ asset('assets/images/ornamen-corner.png') }}'); background-size: auto 100%;">
                </div>
                <div class="w-full h-48 bg-no-repeat" style="background-image: url('{{ asset('assets/images/ornamen-corner.png') }}'); background-size: auto 100%; transform: scaleX(-1);">
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 w-full">
            <div class="w-full h-6 bg-repeat-x bg-marun z-0" style="background-image: url('{{ asset('assets/images/kiran.png') }}'); background-size: auto 100%;">
            </div>
        </div>
        <div class="absolute top-24 right-8">
            <img class="w-2/3 max-w-48 scale-y-[-1]" src="{{ asset('assets/images/ornamen.png') }}" alt="Welcome">
        </div>
        <div class="absolute bottom-24 left-8">
            <img class="w-2/3 max-w-48" src="{{ asset('assets/images/ornamen.png') }}" alt="Welcome">
        </div>
        <div class="absolute bottom-0 w-full">
            <div class="flex w-full justify-between z-10">
                <div class="w-full h-48 bg-no-repeat" style="background-image: url('{{ asset('assets/images/ornamen-corner.png') }}'); background-size: auto 100%; transform: scaleY(-1)">
                </div>
                <div class="w-full h-48 bg-no-repeat" style="background-image: url('{{ asset('assets/images/ornamen-corner.png') }}'); background-size: auto 100%; transform: scaleY(-1) scaleX(-1);">
                </div>
            </div>
        </div>
    </div>
</div>
