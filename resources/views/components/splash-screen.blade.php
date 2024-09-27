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

<div id="splash-screen" class="absolute inset-0 flex flex-col justify-center items-center animate-fadeIn">
    <div class="absolute z-10 top-0 w-full">
        <div class="w-full h-6 bg-repeat-x bg-marun" style="background-image: url('{{ asset('assets/images/kiran.png') }}'); background-size: auto 100%;">
        </div>
        <div class="w-full h-8 bg-repeat-x" style="background-image: url('{{ asset('assets/images/bung.png') }}'); background-size: auto 100%;">
        </div>
    </div>
    <div class="absolute z-10 bottom-0 w-full">
        <div class="w-full h-8 bg-repeat-x" style="background-image: url('{{ asset('assets/images/bung.png') }}'); background-size: auto 100%; transform: rotate(180deg);">
        </div>
        <div class="w-full h-6 bg-repeat-x bg-marun" style="background-image: url('{{ asset('assets/images/kiran.png') }}'); background-size: auto 100%;">
        </div>
    </div>
    <div class="absolute bottom-52 left-5">
        <img class="w-2/3 max-w-64" src="{{ asset('assets/images/line.png') }}" alt="Welcome">
    </div>
    <div class="absolute top-52 right-0">
        <img class="w-2/3 max-w-64 scale-y-[-1]" src="{{ asset('assets/images/line.png') }}" alt="Welcome">
    </div>
    <div class="absolute top-24 left-8">
        <img class="w-2/3 max-w-48 scale-y-[-1]" src="{{ asset('assets/images/ornamen.png') }}" alt="Welcome">
    </div>
    <div class="absolute bottom-24 right-8">
        <img class="w-2/3 max-w-48" src="{{ asset('assets/images/ornamen.png') }}" alt="Welcome">
    </div>
    <div class="w-full h-full flex justify-center items-center z-10">
        <img class="w-2/3 max-w-64 animate-pop" src="{{ asset('assets/images/splash-logo.png') }}" alt="Welcome">
    </div>
</div>

<div id="main-content" class="opacity-0">
    @yield('content')
</div>

<script>
    setTimeout(function() {
        const splashScreen = document.getElementById('splash-screen');
        const mainContent = document.getElementById('main-content');

        splashScreen.classList.add('fade-out');
        setTimeout(() => {
            splashScreen.style.display = 'none';
            mainContent.classList.add('fade-in');
            mainContent.classList.remove('opacity-0');
        }, 1000);
    }, 3000);
</script>
