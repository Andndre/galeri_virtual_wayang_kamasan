@extends('layouts.admin')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan Pelukis /</span> Edit Pelukis</h4>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Pelukis</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelukis.update', $pelukis->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Nama Lengkap <span class="text-danger">*</span></label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $pelukis->name) }}" required />
                    <div class="form-text">Inputkan nama lengkap dari pelukis</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                    <input name="email" type="email" class="form-control" id="email" value="{{ old('email', $pelukis->email) }}" required />
                    <div class="form-text">Inputkan email yang akan digunakan untuk login</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="**********" />
                    <div class="form-text">Kosongkan jika tidak ingin mengubah password</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="whatsapp">Nomor Whatsapp</label>
                    <input name="whatsapp" type="text" id="whatsapp" class="form-control phone-mask" value="{{ old('whatsapp', $pelukis->whatsapp) }}" placeholder="0812345567910" />
                    <div class="form-text">Inputkan nomor whatsapp yang aktif, dengan format 08xxxxxxx</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Alamat</label>
                    <textarea name="address" id="address" class="form-control" placeholder="Alamat Pelukis">{{ old('address', $pelukis->address) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="profile_picture">Foto Profil</label>
                    <input name="profile_picture" type="file" id="profile_picture" class="form-control" onchange="previewImage(event)">
                    <div class="mt-3">
                        <img id="profile_picture_preview" src="{{ Storage::url($pelukis->profile_picture) }}" alt="Preview" style="max-width: 150px; {{ $pelukis->profile_picture ? 'display: block;' : 'display: none;' }}" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('profile_picture_preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview
                };
                reader.readAsDataURL(file); // Convert the file to base64 string
            } else {
                preview.src = '';
                preview.style.display = 'none'; // Hide the preview if no file is selected
            }
        }
    </script>
@endsection
