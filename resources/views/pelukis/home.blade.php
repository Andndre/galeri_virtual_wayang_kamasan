@extends('layouts.pelukis')

@section('main')
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Halo Pelukis!</h5>
                    <p class="mb-4">
                      Ini merupakan halaman dashboard untuk mengelola lukisan Anda. Harap jaga akun ini serta karya Anda agar tetap aman.
                    </p>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="Artist with Painting" data-app-dark-img="illustrations/artist-with-painting-dark.png" data-app-light-img="illustrations/artist-with-painting-light.png">
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="icon-padding flex-shrink-0" style="background-color: rgba(244, 212, 182, 0.233)">
                            <i class="bx bx-palette text-danger"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Lukisan</span>
                    <h3 class="card-title mb-2">{{ $lukisan->count() }} <span><small class="fw-semibold mt-2 text-muted">Buah</small></span></h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="icon-padding flex-shrink-0" style="background-color: rgba(182, 244, 182, 0.233)">
                        <i class="bx bx-cuboid text-success"></i>
                      </div>
                    </div>
                    <span>Lukisan AR</span>
                    <h3 class="card-title mb-2">{{ $lukisanAr->count() }} <span><small class="fw-semibold mt-2 text-muted">Buah</small></span></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
