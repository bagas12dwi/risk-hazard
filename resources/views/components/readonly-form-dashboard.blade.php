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
                <input type="file" id="pdf_{{ $parameter }}_{{ $index }}"
                    name="areas[{{ $index }}][pdf_{{ $parameter }}]" class="d-none">
                @if ($area->{'pdf_' . $parameter})
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ URL::asset('storage/' . $area->{'pdf_' . $parameter}) }}" target="_blank"
                            class="nav-link">
                            <i class="fas fa-file-pdf text-danger fs-4"></i>
                        </a>
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
        </div>
        @foreach ($errors->get("areas.$index.*") as $error)
            <small class="text-danger d-block">{{ $error[0] }}</small>
        @endforeach

    </div>
@endforeach
