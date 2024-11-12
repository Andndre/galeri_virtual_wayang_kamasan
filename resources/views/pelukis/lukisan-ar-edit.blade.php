@extends('layouts.pelukis')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lukisan Dijual /</span> Edit Lukisan</h4>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Lukisan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelukis.lukisanAr.update', $lukisan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="title">Judul <span class="text-danger">*</span></label>
                    <input value="{{ old('title', $lukisan->title) }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Nama Lukisan" required />
                    <div class="form-text">Inputkan judul lukisan</div>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Deskripsi Lukisan" required>{{ old('description', $lukisan->description) }}</textarea>
                    <div class="form-text">Inputkan deskripsi lukisan</div>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="profile_picture">Gambar Lukisan</label>
                    <input name="image" type="file" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage(event)">
                    <div class="mt-3">
                        <img id="image_preview" src="{{ $lukisan->image }}" alt="Preview" style="max-width: 150px;" />
                    </div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image_preview');
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

