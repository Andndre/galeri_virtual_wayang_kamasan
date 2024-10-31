@extends('layouts.guest')

@section('overlay')
    <x-absolute.overlay-guest-detail-pelukis />
@endsection

@section('main')
    <div class="flex flex-col min-h-screen">
        <div class="flex flex-col gap-3 p-4 w-full max-w-[600px] mx-auto">
            <div class="mt-12"></div>
            <h1 class="font-joti text-3xl text-marun text-center font-bold">{{ $pelukis->name }}</h1>
            <div class="flex gap-3 items-center">
                <i class="bx bxl-whatsapp text-3xl"></i>
                <span class="">{{ $pelukis->whatsapp }}</span>
            </div>
            <div class="flex gap-3 items-center">
                <i class="bx bxs-map text-3xl"></i>
                <span class="">{{ $pelukis->address }}</span>
            </div>
            <div class="mx-auto mt-4">
                {{-- button to AR Portal --}}
                <a href="{{ route('guest.pelukis-ar.index', $pelukis->id) }}" class="bg-marun text-white px-12 py-2 rounded-full text-center font-joti border-4 border-black">
                    AR Portal
                </a>
            </div>
        </div>
        <div class="mt-12 flex-1 bg-marun">
            <div class="flex flex-col h-full">
                <div class="w-full h-6 bg-repeat-x bg-marun z-0" style="background-image: url('{{ asset('assets/img/guest/kiran.png') }}'); background-size: auto 100%;">
                </div>
                <div class="w-full max-w-[600px] mx-auto flex-1">
                    {{-- grid of lukisan --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 p-4">
                        @foreach ($pelukis->lukisans as $lukisan)
                            <div class="bg-white">
                                <div class="relative">
                                    <img class="aspect-[6/4] object-cover object-center w-full" src="{{ asset('storage/'.$lukisan->image) }}" alt="">
                                    {{-- text harga di pojok kiri bawah gambar --}}
                                    <div class="absolute bottom-0 left-0 px-2 py-1 bg-white/90">
                                        <p class="text-lg font-bold">{{ 'Rp. ' . number_format($lukisan->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <p class="font-joti font-semibold text-center text-lg">{{ $lukisan->title }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pt-8"></div>
                <div class="fixed bottom-0 left-0 w-full h-6 bg-repeat-x bg-marun z-0" style="background-image: url('{{ asset('assets/img/guest/kiran.png') }}'); background-size: auto 100%;">
                </div>
            </div>
        </div>
    </div>
@endsection
