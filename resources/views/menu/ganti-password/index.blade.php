@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            @include('components.alert')

            <div class="row mb-3">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h5 class="card-title mb-2 fw-bold text-uppercase">
                        Ganti Password
                    </h5>
                </div>
            </div>
            <form action="{{ route('update-ganti-password') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ auth()->user()->email }}" readonly />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password baru</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="****" />
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
@endsection
