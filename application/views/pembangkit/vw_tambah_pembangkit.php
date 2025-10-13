<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800">Tambah Data Pembangkit</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">Form Tambah Pembangkit</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('Pembangkit/tambah'); ?>" method="POST">
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="UNIT_LAYANAN">Unit Layanan</label>
                                                    <input type="text" name="UNIT_LAYANAN" id="UNIT_LAYANAN" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label for="PEMBANGKIT">Nama Pembangkit</label>
                                                    <input type="text" name="PEMBANGKIT" id="PEMBANGKIT" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="LONGITUDEX">Longitude (X)</label>
                                                    <input type="text" name="LONGITUDEX" id="LONGITUDEX" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="LATITUDEY">Latitude (Y)</label>
                                                    <input type="text" name="LATITUDEY" id="LATITUDEY" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="STATUS_OPERASI">Status Operasi</label>
                                                    <input type="text" name="STATUS_OPERASI" id="STATUS_OPERASI" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="INC">INC</label>
                                                    <input type="number" name="INC" id="INC" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="OGF">OGF</label>
                                                    <input type="number" name="OGF" id="OGF" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="SPARE">Spare</label>
                                                    <input type="number" name="SPARE" id="SPARE" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="COUPLE">Couple</label>
                                                    <input type="number" name="COUPLE" id="COUPLE" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="STATUS_SCADA">Status SCADA</label>
                                                    <input type="text" name="STATUS_SCADA" id="STATUS_SCADA" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="IP_GATEWAY">IP Gateway</label>
                                                    <input type="text" name="IP_GATEWAY" id="IP_GATEWAY" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="IP_RTU">IP RTU</label>
                                                    <input type="text" name="IP_RTU" id="IP_RTU" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="MERK_RTU">Merk RTU</label>
                                                    <input type="text" name="MERK_RTU" id="MERK_RTU" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="SN_RTU">SN RTU</label>
                                                    <input type="text" name="SN_RTU" id="SN_RTU" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="THN_INTEGRASI">Tahun Integrasi</label>
                                                    <input type="text" name="THN_INTEGRASI" id="THN_INTEGRASI" class="form-control" placeholder="Contoh: 2023">
                                                </div>
                                            </div>

                                            <a href="<?= base_url('Pembangkit') ?>" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
