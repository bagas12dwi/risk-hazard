@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            <div class="d-flex justify-content-between mb-4">
                <h5 class="card-title text-primary">
                    Tambah {{ $title }}
                </h5>
            </div>
            <form action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="helpName"
                        placeholder="Masukkan Username" />
                    <small id="helpName" class="form-text text-muted">Masukkan Username</small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpEmail"
                        placeholder="Masukkan Email" />
                    <small id="helpEmail" class="form-text text-muted">Masukkan Email</small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        aria-describedby="helpPassword" placeholder="*****" />
                    <small id="helpPassword" class="form-text text-muted">Masukkan Password (minimal 6 karakter)</small>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select form-select" name="role" id="role">
                        <option selected>Pilih Role</option>
                        <option value="hse">Hse</option>
                        <option value="admin">Admin</option>
                        <option value="pelapor">Pelapor</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
