<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800">Edit Data Unit</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">Form Ubah Unit</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('Unit/edit/' . $unit['ID_UNIT']); ?>" method="POST">
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="UNIT_PELAKSANA">Unit Pelaksana</label>
                                                    <input type="text" name="UNIT_PELAKSANA" id="UNIT_PELAKSANA" class="form-control" value="<?= $unit['UNIT_PELAKSANA']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="UNIT_LAYANAN">Unit Layanan</label>
                                                    <input type="text" name="UNIT_LAYANAN" id="UNIT_LAYANAN" class="form-control" value="<?= $unit['UNIT_LAYANAN']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="LONGITUDEX">Longitude (X)</label>
                                                    <input type="text" name="LONGITUDEX" id="LONGITUDEX" class="form-control" value="<?= $unit['LONGITUDEX']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="LATITUDEY">Latitude (Y)</label>
                                                    <input type="text" name="LATITUDEY" id="LATITUDEY" class="form-control" value="<?= $unit['LATITUDEY']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="ADDRESS">Alamat</label>
                                                <input type="text" name="ADDRESS" id="ADDRESS" class="form-control" value="<?= $unit['ADDRESS']; ?>">
                                            </div>

                                            <a href="<?= base_url('Unit') ?>" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-primary float-right">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
