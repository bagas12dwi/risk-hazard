@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            @include('components.alert')
            <a href="{{ url()->previous() }}" class="btn btn-danger mb-3"><i class="fas fa-circle-arrow-left"></i> Kembali</a>
            <h5 class="card-title text-primary mb-4 fw-bold text-uppercase">
                {{ $notification->work_accident_name }}
            </h5>
            <form action="{{ route('admin.update', $notification->id) }}" method="POST">
                @csrf
                @method('PUT')
                @if ($workAccident->report_type_id == 1)
                    @include('components.form-kecelakaan')
                @elseif ($workAccident->report_type_id == 2)
                    @include('components.form-kejadian')
                @elseif ($workAccident->report_type_id == 3)
                    @include('components.form-hampir')
                @endif
            </form>
        </div>
    </div>
@endsection
