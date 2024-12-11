@if ($followUp->document_path)
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#pdfTindakLanjutModal">
        <i class="fas fa-file-pdf"></i>
    </button>

    <div class="modal fade" id="pdfTindakLanjutModal" tabindex="-1" aria-labelledby="pdfTindakLanjutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl"> <!-- Use modal-xl for larger size -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfTindakLanjutModalLabel">PDF Viewer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="pdfViewer" style="width: 100%; height: 100%; border: 1px solid #ccc;"></div>
                </div>
            </div>
        </div>
    </div>
@endif



@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const url = "{{ route('viewPdfTindakLanjut', $followUp) }}";
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
