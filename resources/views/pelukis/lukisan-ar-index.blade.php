@extends('layouts.pelukis')

@section('main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">AR Lukisan /</span> Daftar Lukisan AR</h4>
<div class="card">
    <h5 class="card-header">Daftar Lukisan</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="text-nowrap">
                <th>Aksi</th>
                <th>Foto</th>
                <th>Deskripsi</th>
            </thead>
            <tbody>
                @foreach ($lukisan as $l)
                    <tr>
                        <td>
                            {{-- edit --}}
                            <a href="{{ route('pelukis.lukisanAr.edit', $l->id) }}" class="btn btn-primary btn-sm">Ubah</a>
                            {{-- delete --}}
                            <form action="{{ route('pelukis.lukisanAr.destroy', $l->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Akun Ini? Data Akun Akan Terhapus Permanen')">Hapus</button>
                            </form>
                        </td>
                        <td><img class="avatar avatar-lg" src="{{ $l->image }}"
                                alt="profile picture"></td>
                        <td>{{ $l->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
