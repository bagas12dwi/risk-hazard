@extends('layouts.main')

@section('konten')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="p-4 form-section">
                <div class="p-4 shadow-sm bg-white rounded-4">
                    @include('components.alert')
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title text-primary mb-4">
                            UPDATE HASIL PEMERIKSAAN IKL TERBARU
                        </h5>
                    </div>
                    <form action="{{ route('admin.update-area') }}" id="form-dashboard" method="post">
                        @csrf
                        @foreach ($areas as $index => $area)
                            <div class="area-section" data-index="{{ $index }}"
                                style="{{ $index == 0 ? '' : 'display: none;' }}">
                                @include('components.readonly-form-dashboard')
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-end mt-4 gap-1">
                            <a id="previous-button" type="button" class="btn btn-primary" disabled>
                                <i class="fas fa-arrow-left"></i> Sebelumnya
                            </a>
                            <a id="next-button" type="button" class="btn btn-primary">
                                Selanjutnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

