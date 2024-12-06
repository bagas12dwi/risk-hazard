@extends('layouts.auth')

@section('konten')
    <div class="position-absolute text-black fw-medium" style="top: 20px; left: 20px; font-size: 1.1rem; z-index: 2">
        Risk & Hazards<br />Management Room
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
                <h3 class="text-center fw-bold">Reset Password</h3>

                <div class="position-relative mb-3">
                    <i class="fas fa-envelope position-absolute"
                        style="left: 1.2rem; top: 50%; transform: translateY(-50%); color: #6c757d;"></i>
                    <input type="email" id="checkEmail" class="form-control ps-5 rounded-pill shadow-sm"
                        placeholder="Email" />
                </div>

                <button id="btnSend" class="btn btn-primary w-100 rounded-pill mt-3">
                    Send
                </button>

                <div class="password-field">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#btnSend').on('click', function() {
            let email = $('#checkEmail').val();

            if (email) {
                $.ajax({
                    url: `/cekEmail/${email}`,
                    type: 'GET',
                    success: function(response) {
                        let passwordContainer = $('.password-field');
                        passwordContainer.empty();

                        if (response.email) {
                            $('#btnSend').hide();
                            passwordContainer.append(`
                                <form action="{{ route('update-password') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="email" name="email" value="${email}">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="***" required />
                            </div>
                            <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">Simpan</button>
                        </form>
                            `);
                        } else {
                            Swal.fire({
                                title: "Failed",
                                text: "Email yang anda inputkan tidak terdaftar!",
                                icon: "error"
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: "Failed",
                            text: "Terjadi kesalahan, silakan coba lagi!",
                            icon: "error"
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: "Failed",
                    text: "Masukkan email terlebih dahulu!",
                    icon: "error"
                });
            }
        })
    </script>
@endpush
