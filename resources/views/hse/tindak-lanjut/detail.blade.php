@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            @include('components.alert')
            <a href="{{ url()->previous() }}" class="btn btn-danger mb-3"><i class="fas fa-circle-arrow-left"></i> Kembali</a>
            <h5 class="card-title text-primary mb-4 fw-bold text-uppercase">
                {{ $notification->work_accident_name }}
            </h5>
            <form action="{{ route('hse.followup.update', $notification->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    @if ($workAccident->report_type_id != 2)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            @include('components.readonly-form-korban')
                        </div>
                    @endif
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        @include('components.form-document')
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary ">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
