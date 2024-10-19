@extends('layouts.admin')

@section('main')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaturan Pelukis /</span> Daftar Pelukis</h4>
    <div class="card">
        <h5 class="card-header">Daftar Pelukis</h5>
        @if ($pelukis->count() == 0)
            {{-- Alert --}}
            <div class="card-body">
                <div class="alert alert-info">
                    <div class="alert-body"></div>
                        <strong><i class="bx bx-info-circle"></i> Info!</strong> Belum ada pelukis. silakan klik tombol "Tambahkan Pelukis"
                    </div>
                </div>
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="text-nowrap">
                        <th>Aksi</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Akun</th>
                    </thead>
                    <tbody>
                        @foreach ($pelukis as $p)
                            <tr>
                                <td>
                                    <a href="{{ route('pelukis.edit', $p->id) }}" class="btn btn-primary btn-sm">Ubah</a>
                                    <form action="{{ route('pelukis.destroy', $p->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Akun Ini? Data Akun Akan Terhapus Permanen')">Hapus</button>
                                    </form>
                                </td>
                                <td><img class="avatar avatar-sm rounded-circle"
                                        src="{{ Storage::url($p->profile_picture) }}" alt="profile picture"></td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
