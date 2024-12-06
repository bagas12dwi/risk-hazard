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
        <div class="d-flex align-items-center gap-2">
            <input type="number" class="form-control" name="areas[{{ $index }}][{{ $parameter }}]"
                value="{{ $area->$parameter }}" />
            @if (!$area->{'is_approve_' . $parameter})
                <input type="file" id="pdf_{{ $parameter }}_{{ $index }}"
                    name="areas[{{ $index }}][pdf_{{ $parameter }}]" class="d-none">
                <a class="btn btn-outline-danger" id="btn-{{ $parameter }}-{{ $index }}">
                    <i class="fas fa-file-pdf"></i>
                </a>
            @else
                <a href="{{ URL::asset('storage/' . $area->{'pdf_' . $parameter}) }}" target="_blank" class="nav-link">
                    <i class="fas fa-file-pdf text-danger fs-4"></i>
                </a>
            @endif
            @if ($area->{'pdf_' . $parameter} && !$area->{'is_approve_' . $parameter})
                <a href="{{ URL::asset('storage/' . $area->{'pdf_' . $parameter}) }}" target="_blank" class="nav-link">
                    <i class="fas fa-cloud text-primary"></i>
                </a>
            @endif
            <span id="file-{{ $parameter }}-name-{{ $index }}" class="text-muted">
            </span>
            @if ($area->{'is_approve_' . $parameter})
                <i class="fas fa-check-circle text-success fs-4"></i>
            @endif
        </div>
        @error("areas.{{ $index }}.{{ $parameter }}")
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
@endforeach
