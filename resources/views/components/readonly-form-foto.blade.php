<div class="mb-3">
    <label for="" class="form-label">Foto</label>
    <br>
    @forelse ($workAccident->images as $img)
        <img src="{{ URL::asset('storage/' . $img->img_path) }}"
            style="width: 5em; height: 5em; object-fit: cover; cursor: pointer;" alt="Image" data-bs-toggle="modal"
            data-bs-target="#imagePreviewModal"
            onclick="setPreviewImage('{{ URL::asset('storage/' . $img->img_path) }}')">
    @empty
        <p>Tidak Ada Foto</p>
    @endforelse
</div>

<!-- Modal for Image Preview -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imagePreviewLabel">Preview Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="previewImage" src="" style="max-width: 100%; max-height: 70vh;" alt="Preview Image">
            </div>
        </div>
    </div>
</div>

<script>
    function setPreviewImage(src) {
        document.getElementById('previewImage').src = src;
    }
</script>
