@extends('layouts.main')

@section('konten')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6">
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
                            <button type="submit" class="btn btn-success rounded-5">
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="p-4 form-section">
                @include('components.form-dashboard-report')
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            const updateFileInput = (btnId, inputId, fileSpanId) => {
                const $btn = $(`#${btnId}`);
                const $input = $(`#${inputId}`);
                const $fileSpan = $(`#${fileSpanId}`);
                $btn.on('click', function() {
                    $input.click();
                });
                $input.on('change', function() {
                    const fileName = this.files.length ? this.files[0].name : 'No file selected';
                    $fileSpan.text(fileName);
                });
            };

            // Initialize file input handlers
            @foreach ($areas as $index => $area)
                @foreach (['microbiology', 'humidity', 'lighting', 'noise'] as $parameter)
                    updateFileInput(
                        'btn-{{ $parameter }}-{{ $index }}',
                        'pdf_{{ $parameter }}_{{ $index }}',
                        'file-{{ $parameter }}-name-{{ $index }}'
                    );
                @endforeach
            @endforeach

            // Handle pagination for area sections
            const $areas = $('.area-section');
            const $nextButton = $('#next-button');
            const $prevButton = $('#previous-button');
            let currentIndex = 0;

            const updateButtonState = () => {
                $prevButton.prop('disabled', currentIndex === 0);
                $nextButton.prop('disabled', currentIndex === $areas.length - 1);
            };

            $nextButton.on('click', function() {
                if (currentIndex < $areas.length - 1) {
                    $areas.eq(currentIndex).hide();
                    currentIndex++;
                    $areas.eq(currentIndex).show();
                    updateButtonState();
                }
            });

            $prevButton.on('click', function() {
                if (currentIndex > 0) {
                    $areas.eq(currentIndex).hide();
                    currentIndex--;
                    $areas.eq(currentIndex).show();
                    updateButtonState();
                }
            });

            // Initialize button states
            updateButtonState();
        });
    </script>
@endpush
