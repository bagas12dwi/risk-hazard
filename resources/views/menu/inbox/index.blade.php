@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            <div class="row mb-3">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h5 class="card-title mb-2 fw-bold text-uppercase">
                        Progress Pelaporan
                    </h5>
                    <h6>(Read Only)</h6>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-around">
                            <div class="teratasi d-flex gap-2 align-items-center">
                                <i class="fas fa-check-circle text-success fs-5"></i>
                                <p class="mb-0">Teratasi</p>
                            </div>
                            <div class="bteratasi d-flex gap-2 align-items-center">
                                <i class="fas fa-circle-xmark text-danger fs-5"></i>
                                <p class="mb-0">Belum Teratasi</p>
                            </div>
                            <div class="tindak d-flex gap-2 align-items-center">
                                <i class="fas fa-clipboard-list text-warning fs-5"></i>
                                <p class="mb-0">Tindak Lanjut</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                @forelse ($notifications as $index => $notification)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-lg-11 col-md-11 col-sm-11">
                                    <button
                                        class="accordion-button @if (!$loop->first) collapsed @endif fw-bold"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $index }}" aria-expanded="true"
                                        aria-controls="collapse{{ $index }}">
                                        {{ $notification->work_accident_name }},
                                        {{ \Carbon\Carbon::parse($notification->workAccident->time_of_incident)->translatedFormat('d/m/Y H:i') }}
                                        WIB
                                    </button>

                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                    {!! $notification->icon !!}
                                </div>
                            </div>
                        </h2>
                        <div id="collapse{{ $index }}"
                            class="accordion-collapse collapse @if ($loop->first) show @endif"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <h6>Waktu Tertangani</h6>
                                                <div class="card">
                                                    <div class="card-body">
                                                        @if ($notification->status == 0)
                                                            Belum teratasi
                                                        @else
                                                            {{ \Carbon\Carbon::parse($notification->updated_at)->translatedFormat('H:i l, d/m/Y ') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                @if ($notification->status != 0 && $notification->is_approve_admin == true)
                                                    <img src="{{ URL::asset('assets/img/approve.png') }}"
                                                        style="width: 25em" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Belum ada kotak masuk</div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
