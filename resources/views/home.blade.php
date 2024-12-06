@extends('layouts.home')

@section('konten')
    <div class="d-flex pt-5 container-sm align-items-center">
        <img src="{{ URL::asset('assets/img/logo1.png') }}" alt="Logo 1" class="me-2" height="50" />
        <img src="{{ URL::asset('assets/img/logo2.png') }}" alt="Logo 2" class="me-2" height="50" />
        <img src="{{ URL::asset('assets/img/logo3.png') }}" alt="Logo 3" height="50" />
    </div>

    <div class="position-absolute rounded-circle bg-primary"
        style="top: -100px; right: -100px; width: 400px; height: 400px; background: linear-gradient(135deg, #2d82ff 0%, #0055cc 100%); z-index: 0;">
    </div>
    <div class="position-absolute rounded-circle bg-primary opacity-75"
        style="bottom: -100px; left: -100px; width: 300px; height: 300px; background: linear-gradient(135deg, #2d82ff 0%, #0055cc 100%);">
    </div>

    <div class="position-absolute" style="top: 50px; right: 30px;">
        <a href="{{ route('login') }}" class="fas fa-user me-2 text-black z-3 me-5 nav-link">Masuk</a>
    </div>

    <div class="container-xl main-content pt-5 mt-5 position-relative z-1">
        <div class="row">
            <div class="col-12 text-start mb-5">
                <h1 class="display-5 fw-bold text-primary">RISK & HAZARDS<br />MANAGEMENT ROOM</h1>
                <p class="text-primary" style="max-width: 300px;">
                    Sarana pelaporan insiden, inspeksi kesehatan lingkungan, dan
                    pemantauan evaluasi.
                </p>
            </div>
        </div>
    </div>
@endsection
