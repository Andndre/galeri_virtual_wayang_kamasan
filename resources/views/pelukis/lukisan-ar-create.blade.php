@extends('layouts.pelukis')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">AR Lukisan /</span> Tambahkan Lukisan AR</h4>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambahkan Lukisan AR</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelukis.lukisanAr.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="description" required>Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Deskripsi Lukisan"></textarea>
                    <div class="form-text">Inputkan deskripsi lukian</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="profile_picture">Gambar Lukisan</label>
                    <input name="image" type="file" id="image" class="form-control" onchange="previewImage(event)">
                    <div class="mt-3">
                        <img id="image_preview" src="" alt="Preview" style="max-width: 150px; display: none;" />
                    </div>
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
