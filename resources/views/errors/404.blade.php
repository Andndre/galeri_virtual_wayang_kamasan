@extends('layouts.app')

@section('css')
 <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-misc.css') }}">
@endsection

@section('content')
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Halaman Ini Tidak Ada :(</h2>
            <p class="mb-4 mx-2">Wah! 😖 Alamat yang anda minta tidak ada di server kami.</p>
            <a href="/" class="btn btn-primary">Kembali</a>
            <div class="mt-3">
                <img src="{{ asset('assets/img/illustrations/page-misc-error-light.png') }}" alt="page-misc-error-light" width="500"
                    class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png"
                    data-app-light-img="illustrations/page-misc-error-light.png" />
            </div>
        </div>
    </div>
@endsection
