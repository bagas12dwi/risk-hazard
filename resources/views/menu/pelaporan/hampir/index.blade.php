@extends('layouts.main')

@section('konten')
    <div class="p-4 form-section">
        <div class="p-4 shadow-sm bg-white rounded-4">
            @include('components.alert')
            <h5 class="card-title text-primary mb-4 fw-bold text-uppercase">
                {{ $title }}
            </h5>
            <form action="{{ route('store-laporan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        @include('components.form-foto')
                        @include('components.form-waktu')
                        @include('components.form-kronologi')
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        @include('components.form-korban')
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
