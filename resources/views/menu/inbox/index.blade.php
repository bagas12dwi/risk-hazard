@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            @include('components.alert')
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
                                <div class="col-lg-10 col-md-10 col-sm-10">
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
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="d-flex align-items-center gap-2">
                                        {!! $notification->icon !!}
                                        <form id="deleteForm" action="{{ route('inbox.delete', $notification->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" data-confirm-delete="true" id="delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3 text-white" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
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
