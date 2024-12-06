@extends('layouts.auth')

@section('konten')
    <div class="position-absolute text-black fw-medium" style="top: 20px; left: 20px; font-size: 1.1rem; z-index: 2">
        Risk & Hazards<br />
        Management Room
    </div>

    <div class="position-absolute rounded-circle"
        style="
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: linear-gradient(135deg, #2d82ff 0%, #0055cc 100%);
        z-index: 0;
      ">
    </div>
    <div class="position-absolute rounded-circle opacity-75"
        style="
        bottom: -100px;
        left: -100px;
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, #2d82ff 0%, #0055cc 100%);
      ">
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <img src="{{ URL::asset('assets/img/logo1.png') }}" alt="Logo 1" class="img-fluid"
                            style="height: 60px" />
                        <img src="{{ URL::asset('assets/img/logo2.png') }}" alt="Logo 2" class="img-fluid"
                            style="height: 60px" />
                        <img src="{{ URL::asset('assets/img/logo3.png') }}" alt="Logo 3" class="img-fluid"
                            style="height: 60px" />
                    </div>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="position-relative mb-3">
                        <i class="fas fa-user position-absolute"
                            style="left: 1.2rem; top: 50%; transform: translateY(-50%); color: #6c757d;"></i>
                        <input type="text" class="form-control ps-5 rounded-pill shadow-sm" name="username"
                            placeholder="Username" />
                        @error('username')
                            <div class="form-text text-danger">{{ '$message' }}</div>
                        @enderror
                    </div>

                    <div class="position-relative mb-3">
                        <i class="fas fa-envelope position-absolute"
                            style="left: 1.2rem; top: 50%; transform: translateY(-50%); color: #6c757d;"></i>
                        <input type="email" class="form-control ps-5 rounded-pill shadow-sm" name="email"
                            placeholder="Email" />
                        @error('email')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="position-relative mb-3">
                        <i class="fas fa-lock position-absolute"
                            style="left: 1.2rem; top: 50%; transform: translateY(-50%); color: #6c757d;"></i>
                        <input type="password" class="form-control ps-5 rounded-pill shadow-sm" name="password"
                            placeholder="Password" />
                        @error('password')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">
                        Sign Up
                    </button>

                    <div class="d-flex justify-content-end mt-3 text-black">
                        <a href="{{ route('reset-password') }}" class="text-decoration-none text-black">Need Help?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
