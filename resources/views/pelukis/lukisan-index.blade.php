@extends('layouts.pelukis')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan Pelukis /</span> Daftar Pelukis</h4>
    <div class="card">
        <h5 class="card-header">Daftar Lukisan</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="text-nowrap">
                    <th>Actions</th>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Harga</th>
                </thead>
                <tbody>
                    @foreach ($lukisan as $l)
                        <tr>
                            <td></td>
                            <td><img class="avatar avatar-lg" src="{{ Storage::url($l->image) }}"
                                    alt="profile picture"></td>
                            <td>{{ $l->title }}</td>
                            <td>{{ $l->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
