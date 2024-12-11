<h6 class="mb-4">{{ $area->name }}</h6>
<input type="hidden" name="areas[{{ $index }}][id]" value="{{ $area->id }}">

@foreach (['microbiology', 'humidity', 'lighting', 'noise'] as $parameter)
    @php
        $title = '';
        if ($parameter == 'microbiology') {
            $title = 'Mikrobiologi Udara';
        } elseif ($parameter == 'humidity') {
            $title = 'Kelembaban Udara';
        } elseif ($parameter == 'lighting') {
            $title = 'Pencahayaan';
        } elseif ($parameter == 'noise') {
            $title = 'Kebisingan';
        }
    @endphp
    <div class="mb-4 position-relative">
        <label class="form-label">{{ $title }}</label>
        <div class="row align-items-center gap-2">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        {{ $area->$parameter }}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                @if (auth()->user()->role == 'pelapor')
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-danger nav-link" data-bs-toggle="modal"
                            data-bs-target="#pdfModal">
                            <i class="fas fa-file-pdf text-danger fs-4"></i>
                        </button>
                        {{-- <a href="{{ URL::asset('storage/' . $area->{'pdf_' . $parameter}) }}" target="_blank"
                            class="nav-link">
                            <i class="fas fa-file-pdf text-danger fs-4"></i>
                        </a> --}}
                        @if ($area->{'is_approve_' . $parameter})
                            <i class="fas fa-check-circle text-success fs-4"></i>
                        @else
                            <i class="far fa-check-circle text-muted fs-4"></i>
                        @endif
                    </div>
                @else
                    <input type="file" id="pdf_{{ $parameter }}_{{ $index }}"
                        name="areas[{{ $index }}][pdf_{{ $parameter }}]" class="d-none">
                    @if ($area->{'pdf_' . $parameter})
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn nav-link" data-bs-toggle="modal"
                                data-bs-target="#pdfModal">
                                <i class="fas fa-file-pdf text-danger fs-4"></i>
                            </button>
                            {{-- <a href="{{ URL::asset('storage/' . $area->{'pdf_' . $parameter}) }}" target="_blank"
                                class="nav-link">
                                <i class="fas fa-file-pdf text-danger fs-4"></i>
                            </a> --}}
                            @if ($area->{'is_approve_' . $parameter})
                                <i class="fas fa-check-circle text-success fs-4"></i>
                            @else
                                <input type="checkbox" class="btn-check rounded-circle"
                                    name="areas[{{ $index }}][is_approve_{{ $parameter }}]"
                                    id="success-{{ $index }}-{{ $parameter }}" value="1"
                                    autocomplete="off">
                                <label class="btn btn-outline-success"
                                    for="success-{{ $index }}-{{ $parameter }}">
                                    <i class="fas fa-check-circle "></i></label>
                            @endif
                        </div>
                    @endif
            </div>
@endif
</div>
@foreach ($errors->get("areas.$index.*") as $error)
    <small class="text-danger d-block">{{ $error[0] }}</small>
@endforeach

</div>
@endforeach

<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> <!-- Use modal-xl for larger size -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="pdfViewer" style="width: 100%; height: 100%; border: 1px solid #ccc;"></div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const url = "{{ route('viewPdf', ['area' => $area, 'parameter' => $parameter]) }}";
            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc =
                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

            // Initialize PDF rendering
            const loadingTask = pdfjsLib.getDocument(url);
            loadingTask.promise.then(pdf => {
                // Render the first page
                pdf.getPage(1).then(page => {
                    const viewport = page.getViewport({
                        scale: 1.5
                    });
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport,
                    };
                    page.render(renderContext).promise.then(() => {
                        document.getElementById('pdfViewer').appendChild(canvas);
                    });
                });
            }).catch(error => {
                console.error('Error loading PDF:', error);
            });
        });
    </script>
@endpush
