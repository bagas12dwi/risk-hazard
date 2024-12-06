<div class="mb-3">
    <label for="time_of_accident" class="form-label">Waktu Kejadian</label>
    <div class="card">
        <div class="card-body">
            {{ \Carbon\Carbon::parse($workAccident->time_of_incident)->translatedFormat('l, d/m/Y H:i') }}
        </div>
    </div>
</div>
<div class="mb-3">
    <label for="location" class="form-label">Lokasi Kejadian</label>
    <div class="card">
        <div class="card-body">
            {{ $workAccident->location }}
        </div>
    </div>
</div>
<input type="hidden" name="url_form" value="{{ url()->current() }}">
