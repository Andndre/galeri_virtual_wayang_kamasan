@extends('layouts.guest')

@section('overlay')
    <x-absolute.overlay-guest-home />
@endsection

@section('main')
<div class="flex flex-col gap-3 justify-center items-center h-[100vh] w-full">
    <img class="w-5/8 max-w-full md:max-w-80 mt-12 lg:mt-16" src="{{ asset('assets/img/guest/text-logo.png') }}" alt="">

    <div class="relative w-full overflow-hidden" id="carousel-wrapper">
        <div class="flex snap-x snap-mandatory overflow-x-auto no-scrollbar" id="carousel">
            <!-- Duplicate items at the beginning for infinite scroll effect -->
            @foreach ($pelukis as $p)
                <div class="flex-shrink-0 w-64 mx-2 flex flex-col items-center gap-3 snap-center bg-marun py-4 px-2 rounded-xl border-4 border-orange">
                    <img class="w-full h-36 lg:h-auto object-contain aspect-square rounded-lg" src="{{ $p->profile_picture }}" alt="{{ $p->name }}">
                    <a href="{{ route('guest.pelukis.detail', $p->id) }}" class="bg-white text-marun px-12 py-2 rounded-full text-center font-joti border-4 border-orange">
                        {{ $p->name }}
                    </a>
                </div>
            @endforeach

            <!-- Original items -->
            @foreach ($pelukis as $p)
                <div class="flex-shrink-0 w-64 mx-2 flex flex-col items-center gap-3 snap-center bg-marun py-4 px-2 rounded-xl border-4 border-orange">
                    <img class="w-full h-36 lg:h-auto object-contain aspect-square rounded-lg" src="{{ $p->profile_picture }}" alt="{{ $p->name }}">
                    <a href="{{ route('guest.pelukis.detail', $p->id) }}" class="bg-white text-marun px-12 py-2 rounded-full text-center font-joti border-4 border-orange">
                        {{ $p->name }}
                    </a>
                </div>
            @endforeach

            <!-- Duplicate items at the end for infinite scroll effect -->
            @foreach ($pelukis as $p)
                <div class="flex-shrink-0 w-64 mx-2 flex flex-col items-center gap-3 snap-center bg-marun py-4 px-2 rounded-xl border-4 border-orange">
                    <img class="w-full h-36 lg:h-auto object-contain aspect-square rounded-lg" src="{{ $p->profile_picture }}" alt="{{ $p->name }}">
                    <a href="{{ route('guest.pelukis.detail', $p->id) }}" class="bg-white text-marun px-12 py-2 rounded-full text-center font-joti border-4 border-orange">
                        {{ $p->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <span class="font-joti text-xl text-marun mt-6">Pilih Pelukis</span>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        const $carousel = $('#carousel');
        const itemWidth = $('.flex-shrink-0').outerWidth(true); // Get the width of a single item
        const totalItems = $('.flex-shrink-0').length / 3; // Total unique items

        // Function to snap the carousel to the nearest item
        function snapCarousel() {
            const scrollLeft = $carousel.scrollLeft();
            const currentIndex = Math.round(scrollLeft / itemWidth);
            const offset = itemWidth * currentIndex;
            $carousel.animate({ scrollLeft: offset }, 300);
        }

        // Add event listener for snapping effect
        $carousel.on('scrollstop', function() {
            snapCarousel();
        });

        // Trigger scrollstop event after user stops scrolling
        let isScrolling;
        $carousel.on('scroll', function() {
            clearTimeout(isScrolling);
            isScrolling = setTimeout(function() {
                $carousel.trigger('scrollstop');
            }, 100);
        });

        // Handle infinite loop effect
        $carousel.on('scroll', function() {
            const scrollLeft = $carousel.scrollLeft();
            if (scrollLeft <= 0) {
                $carousel.scrollLeft(itemWidth * totalItems);
            } else if (scrollLeft >= itemWidth * (totalItems * 2)) {
                $carousel.scrollLeft(itemWidth * totalItems);
            }
        });

        // Initialize position
        $carousel.scrollLeft(itemWidth * totalItems);

        // Add event listener for mouse wheel to scroll horizontally
        $carousel.on('wheel', function(event) {
            event.preventDefault();
            $carousel.scrollLeft($carousel.scrollLeft() + event.originalEvent.deltaY);
        });
    });
</script>
@endsection

@section('css')
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>
@endsection
