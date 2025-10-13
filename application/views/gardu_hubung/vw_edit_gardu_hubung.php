<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800">Edit Data Gardu Hubung</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">Form Ubah Data Gardu Hubung</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('Gardu_hubung/edit/' . $gardu_hubung['SSOTNUMBER_GH']); ?>" method="POST">
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label>SSOT Number</label>
                                                    <input type="text" class="form-control" value="<?= $gardu_hubung['SSOTNUMBER_GH']; ?>" disabled>
                                                </div>
                                                <div class="col">
                                                    <label for="UNIT_LAYANAN">Unit Layanan</label>
                                                    <input type="text" name="UNIT_LAYANAN" id="UNIT_LAYANAN" class="form-control" value="<?= $gardu_hubung['UNIT_LAYANAN']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="GARDU_HUBUNG">Nama Gardu Hubung</label>
                                                <input type="text" name="GARDU_HUBUNG" id="GARDU_HUBUNG" class="form-control" value="<?= $gardu_hubung['GARDU_HUBUNG']; ?>">
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="LONGITUDEX">Longitude (X)</label>
                                                    <input type="text" name="LONGITUDEX" id="LONGITUDEX" class="form-control" value="<?= $gardu_hubung['LONGITUDEX']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="LATITUDEY">Latitude (Y)</label>
                                                    <input type="text" name="LATITUDEY" id="LATITUDEY" class="form-control" value="<?= $gardu_hubung['LATITUDEY']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="ADDRESS">Alamat</label>
                                                <input type="text" name="ADDRESS" id="ADDRESS" class="form-control" value="<?= $gardu_hubung['ADDRESS']; ?>">
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="STATUS_OPERASI">Status Operasi</label>
                                                    <input type="text" name="STATUS_OPERASI" id="STATUS_OPERASI" class="form-control" value="<?= $gardu_hubung['STATUS_OPERASI']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="STATUS_SCADA">Status SCADA</label>
                                                    <input type="text" name="STATUS_SCADA" id="STATUS_SCADA" class="form-control" value="<?= $gardu_hubung['STATUS_SCADA']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="IP_GATEWAY">IP Gateway</label>
                                                    <input type="text" name="IP_GATEWAY" id="IP_GATEWAY" class="form-control" value="<?= $gardu_hubung['IP_GATEWAY']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="IP_RTU">IP RTU</label>
                                                    <input type="text" name="IP_RTU" id="IP_RTU" class="form-control" value="<?= $gardu_hubung['IP_RTU']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="MERK_RTU">Merk RTU</label>
                                                    <input type="text" name="MERK_RTU" id="MERK_RTU" class="form-control" value="<?= $gardu_hubung['MERK_RTU']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="KOMUNIKASI">Komunikasi</label>
                                                    <input type="text" name="KOMUNIKASI" id="KOMUNIKASI" class="form-control" value="<?= $gardu_hubung['KOMUNIKASI']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="TGL_INTEGRASI">Tgl Integrasi</label>
                                                    <input type="date" name="TGL_INTEGRASI" id="TGL_INTEGRASI" class="form-control" value="<?= $gardu_hubung['TGL_INTEGRASI']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="TGL_PASANG_BATT">Tgl Pasang Batt</label>
                                                    <input type="date" name="TGL_PASANG_BATT" id="TGL_PASANG_BATT" class="form-control" value="<?= $gardu_hubung['TGL_PASANG_BATT']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="MERK_RECTI">Merk Recti</label>
                                                    <input type="text" name="MERK_RECTI" id="MERK_RECTI" class="form-control" value="<?= $gardu_hubung['MERK_RECTI']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="THN_RECTI">Tahun Recti</label>
                                                    <input type="text" name="THN_RECTI" id="THN_RECTI" class="form-control" value="<?= $gardu_hubung['THN_RECTI']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="GROUNDING_OHM">Grounding Ohm</label>
                                                    <input type="text" name="GROUNDING_OHM" id="GROUNDING_OHM" class="form-control" value="<?= $gardu_hubung['GROUNDING_OHM']; ?>">
                                                </div>
                                            </div>

                                            <a href="<?= base_url('Gardu_hubung') ?>" class="btn btn-danger">Batal</a>
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
