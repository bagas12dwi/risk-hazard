<div class="card mb-3">
    <div class="card-body">
        <h4>Identitas Korban</h4>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Korban</label>
                        <div class="card">
                            <div class="card-body">
                                {{ $workAccident->victim->name }}
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <div class="card">
                            <div class="card-body">
                                {{ $workAccident->victim->address }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="age" class="form-label">Usia</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $workAccident->victim->age }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="gender" class="form-label">Gender</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $workAccident->victim->gender }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="unit" class="form-label">Unit</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $workAccident->victim->unit }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type1" value="employee"
                        disabled {{ $workAccident->victim->type == 'employee' ? 'checked' : '' }}>
                    <label class="form-check-label" for="type1">
                        Employee
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type2" value="contractor"
                        disabled {{ $workAccident->victim->type == 'contractor' ? 'checked' : '' }}>
                    <label class="form-check-label" for="type2">
                        Contractor
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type3" value="vokasi" disabled
                        {{ $workAccident->victim->type == 'vokasi' ? 'checked' : '' }}>
                    <label class="form-check-label" for="type3">
                        Vokasi / Internship
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
