@if ($followUp->document_path)
    <a href="{{ URL::asset('storage/' . $followUp->document_path) }}" target="_blank" class="btn btn-danger">
        <i class="far fa-file-pdf"></i>
    </a>
@endif
