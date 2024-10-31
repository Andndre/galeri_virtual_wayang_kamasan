@extends('layouts.guest')

@section('overlay')
    <x-absolute.overlay-guest-home />
@endsection

@section('main')
<div class="flex flex-col gap-3 justify-center items-center h-[100vh] w-full">
    <img class="w-6/8 max-w-80 mt-24" src="{{ asset('assets/img/guest/text-logo.png') }}" alt="">

    <div class="relative w-72 overflow-hidden" id="carousel-wrapper">
        <div class="flex transition-transform duration-300 ease-in-out" id="carousel">
            @foreach ($pelukis as $p)
                <div class="flex-shrink-0 w-72 flex flex-col items-center gap-3">
                    <img class="w-full h-auto object-cover aspect-square rounded-lg" src="{{ asset('storage/'.$p->profile_picture) }}" alt="{{ $p->name }}">
                    <a href="{{ route('guest.pelukis.detail', $p->id) }}" class="bg-marun text-white px-12 py-2 rounded-full text-center font-joti border-4 border-black">
                        {{ $p->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Arrow Controls -->
    <div class="flex justify-center items-center gap-3 mt-6">
        <button id="prev" class="focus:outline-none">
            <img class="h-8" src="{{ asset('assets/img/guest/arrow.svg') }}" alt="Previous">
        </button>
        <span class="font-joti text-xl text-marun">Pilih Pelukis</span>
        <button id="next" class="focus:outline-none rotate-180">
            <img class="h-8" src="{{ asset('assets/img/guest/arrow.svg') }}" alt="Next">
        </button>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        const $carousel = $('#carousel');
        const totalItems = $('.flex-shrink-0').length;
        const itemWidth = $('.flex-shrink-0').outerWidth(true); // Get the width of a single item
        let currentIndex = 0;

        // Function to update carousel position
        function updateCarousel() {
            const offset = -(itemWidth * currentIndex);
            $carousel.css('transform', 'translateX(' + offset + 'px)');
        }

        // Scroll to the next item
        $('#next').click(function() {
            if (currentIndex < totalItems - 1) {
                currentIndex++;
                updateCarousel();
            } else {
                currentIndex = 0;
                updateCarousel();
            }
        });

        // Scroll to the previous item
        $('#prev').click(function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            } else {
                currentIndex = totalItems - 1;
                updateCarousel();
            }
        });
    });
</script>
@endsection
