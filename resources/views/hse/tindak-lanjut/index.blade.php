@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            <div class="row mb-3">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h5 class="card-title mb-2 fw-bold text-uppercase">
                        Progress Perencanaan
                    </h5>
                    <h6>(Read Only)</h6>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-around">
                            <div class="teratasi d-flex gap-2 align-items-center">
                                <i class="fas fa-check-circle text-success fs-5"></i>
                                <p class="mb-0">Disetujui</p>
                            </div>
                            <div class="bteratasi d-flex gap-2 align-items-center">
                                <i class="fas fa-circle-xmark text-danger fs-5"></i>
                                <p class="mb-0">Belum Disetujui</p>
                            </div>
                            <div class="tindak d-flex gap-2 align-items-center">
                                <i class="fas fa-clipboard-list text-warning fs-5"></i>
                                <p class="mb-0">Revisi & Konsultasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                @forelse ($followUp as $index => $followUp)
                    <a href="{{ route('hse.followup.show', $followUp->id) }}" class="card mb-3 nav-link">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="fw-bold">
                                {{ $followUp->work_accident_name }},
                                {{ \Carbon\Carbon::parse($followUp->workAccident->time_of_incident)->translatedFormat('d/m/Y H:i') }}
                                WIB
                            </div>
                            <div class="icon">
                                {!! $followUp->icon !!}
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center">Belum ada kotak masuk</div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
