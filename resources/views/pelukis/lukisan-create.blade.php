@extends('layouts.pelukis')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Lukisan Dijual /</span> Tambahkan Lukisan</h4>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambahkan Lukisan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelukis.lukisan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="title">Judul <span class="text-danger">*</span></label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Nama Lukisan" required />
                    <div class="form-text">Inputkan judul lukisan</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="price">Harga <span class="text-danger">*</span></label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="Harga Lukisan" required />
                    <div class="form-text">Inputkan harga tanpa desimal: (,) atau (.)</div>
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
