@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            <h5 class="card-title text-primary mb-4">
                UPDATE HASIL PEMERIKSAAN IKL TERBARU
            </h5>
            <form>
                <h6 class="mb-4">Sitting Area</h6>

                <div class="mb-4 position-relative">
                    <label class="form-label">Mikrobiologi Udara</label>
                    <input type="text" class="form-control" value="Mikrobiologi Udara" />
                    <i class="fas fa-file-pdf text-danger position-absolute end-0 translate-middle-y me-5"
                        style="top: 50px"></i>
                    <i class="fas fa-check-circle text-success position-absolute end-0 translate-middle-y me-3"
                        style="top: 50px"></i>
                </div>

                <div class="mb-4 position-relative">
                    <label class="form-label">Kelembaban Udara</label>
                    <input type="text" class="form-control" value="Kelembaban Udara" />
                    <i class="fas fa-file-pdf text-danger position-absolute end-0 translate-middle-y me-5"
                        style="top: 50px"></i>
                    <i class="fas fa-check-circle text-success position-absolute end-0 translate-middle-y me-3"
                        style="top: 50px"></i>
                </div>

                <div class="mb-4 position-relative">
                    <label class="form-label">Pencahayaan</label>
                    <input type="text" class="form-control" value="Pencahayaan" />
                    <i class="fas fa-file-pdf text-danger position-absolute end-0 translate-middle-y me-5"
                        style="top: 50px"></i>
                    <i class="fas fa-check-circle text-success position-absolute end-0 translate-middle-y me-3"
                        style="top: 50px"></i>
                </div>

                <div class="mb-4 position-relative">
                    <label class="form-label">Kebisingan</label>
                    <input type="text" class="form-control" value="Kebisingan" />
                    <i class="fas fa-file-pdf text-danger position-absolute end-0 translate-middle-y me-5"
                        style="top: 50px"></i>
                    <i class="fas fa-check-circle text-success position-absolute end-0 translate-middle-y me-3"
                        style="top: 50px"></i>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-primary me-2 rounded-5">
                        SEND
                    </button>
                    <button type="button" class="btn btn-primary text-black">
                        SELANJUTNYA
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
