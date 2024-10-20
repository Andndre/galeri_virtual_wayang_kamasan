@extends('layouts.pelukis')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile /</span> Edit Profile</h4>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 text-center">
                <div class="card-body">
                    <div class="profile-avatar-wrapper position-relative">
                        <img id="profile_picture_preview"
                            src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : 'default-avatar.png' }}"
                            class="rounded-circle img-thumbnail mx-auto avatar-xxxl" style="max-width: 150px;"
                            alt="Profile Avatar">
                        <button id="change-avatar-btn"
                            class="btn btn-sm btn-primary position-absolute top-0 start-50 translate-middle"
                            style="display:none;">Ubah Foto Profil</button>
                    </div>
                    <h5 class="mt-3">{{ $user->name }}</h5>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('pelukis.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama Lengkap <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $user->name) }}" placeholder="John Doe" />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="whatsapp">Nomor Whatsapp <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}"
                                placeholder="0812345567910" />
                            @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address">Alamat <span class="text-danger">*</span></label>
                            <textarea required id="address" class="form-control @error('address') is-invalid @enderror" name="address"
                                placeholder="Alamat Pelukis">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="profile_picture">Ubah Foto Profil</label>
                            <input type="file" class="form-control @error('profile_picture') is-invalid @enderror"
                                id="profile_picture" name="profile_picture" onchange="previewImage(event)" />
                            @error('profile_picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#profile_picture').change(function() {
            const input = this;
            const preview = $('#profile_picture_preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Show the 'Change Avatar' button on hover
        $('.profile-avatar-wrapper').hover(
            function() {
                $('#change-avatar-btn').show();
            },
            function() {
                $('#change-avatar-btn').hide();
            }
        );

        $('#change-avatar-btn').click(function() {
            $('#profile_picture').click();
        });
    </script>
@endsection
