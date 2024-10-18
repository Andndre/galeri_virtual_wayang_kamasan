@extends('layouts.admin')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan Pelukis /</span> Daftar Pelukis</h4>
    <div class="card">
        <h5 class="card-header">Daftar Pelukis</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="text-nowrap">
                    <th>Actions</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Username</th>
                </thead>
                <tbody>
                    @foreach ($pelukis as $p)
                    <tr>
                        <td></td>
                        <td><img class="avatar avatar-sm rounded-circle" src="{{ Storage::url($p->profile_picture) }}" alt="profile picture"></td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
