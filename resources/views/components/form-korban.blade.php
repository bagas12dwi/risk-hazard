<div class="card mb-3">
    <div class="card-body">
        <h4>Identitas Korban</h4>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Korban</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nama Korban" />
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="age" class="form-label">Usia</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <input type="number" class="form-control" name="age" id="age"
                                placeholder="Usia" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="gender" class="form-label">Gender</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <select class="form-select form-select" name="gender" id="gender">
                                <option selected>Pilih Gender</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label for="unit" class="form-label">Unit</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <input type="text" class="form-control" name="unit" id="unit"
                                placeholder="Unit" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type1" value="employee">
                    <label class="form-check-label" for="type1">
                        Employee
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type2" value="contractor">
                    <label class="form-check-label" for="type2">
                        Contractor
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="type3" value="vokasi">
                    <label class="form-check-label" for="type3">
                        Vokasi / Internship
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
