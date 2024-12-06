<div class="mb-3">
    <label for="time_of_accident" class="form-label">Waktu Kejadian</label>
    <input type="datetime-local" class="form-control" name="time_of_incident" id="time_of_incident" placeholder="" />
</div>
<div class="mb-3">
    <label for="location" class="form-label">Lokasi Kejadian</label>
    <input type="text" class="form-control" name="location" id="location"placeholder="" />
</div>
<input type="hidden" name="url_form" value="{{ url()->current() }}">
