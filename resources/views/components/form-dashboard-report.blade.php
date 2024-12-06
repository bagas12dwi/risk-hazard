<div class="p-4 shadow-sm bg-white rounded-4">
    <h5 class="card-title text-primary mb-4">Progress Persetujuan Pelaporan</h5>
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-9 col-md-9 col-sm-6">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-circle-check"></i> Disetujui
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <p class="fw-bold">{{ $disetujui }}</p>
        </div>
    </div>
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-9 col-md-9 col-sm-6">
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-circle-xmark"></i> Ditolak
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <p class="fw-bold">{{ $ditolak }}</p>
        </div>
    </div>
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-9 col-md-9 col-sm-6">
            <div class="alert alert-warning" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <i class="fas fa-clipboard"></i>
                    <p class="m-0">Perlu Revisi dan Konsultasi</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <p class="fw-bold">{{ $revisi }}</p>
        </div>
    </div>
</div>
