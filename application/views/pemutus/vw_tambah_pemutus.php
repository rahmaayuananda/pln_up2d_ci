<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800">Tambah Data Pemutus</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">Form Tambah Pemutus</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('Pemutus/tambah'); ?>" method="POST">
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="SSOTNUMBER_LBSREC">SSOT Number</label>
                                                    <input type="text" name="SSOTNUMBER_LBSREC" id="SSOTNUMBER_LBSREC" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label for="UNIT_LAYANAN">Unit Layanan</label>
                                                    <input type="text" name="UNIT_LAYANAN" id="UNIT_LAYANAN" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="PENYULANG">Penyulang</label>
                                                    <input type="text" name="PENYULANG" id="PENYULANG" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="KEYPOINT">Keypoint</label>
                                                    <input type="text" name="KEYPOINT" id="KEYPOINT" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="FUNGSI_KP">Fungsi KP</label>
                                                    <input type="text" name="FUNGSI_KP" id="FUNGSI_KP" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="STATUS_SCADA">Status SCADA</label>
                                                    <input type="text" name="STATUS_SCADA" id="STATUS_SCADA" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="MEDIA_KOMDAT">Media Komdat</label>
                                                    <input type="text" name="MEDIA_KOMDAT" id="MEDIA_KOMDAT" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="MERK_KOMDAT">Merk Komdat</label>
                                                    <input type="text" name="MERK_KOMDAT" id="MERK_KOMDAT" class="form-control">
                                                </div>
                                            </div>

                                            <a href="<?= base_url('Pemutus') ?>" class="btn btn-danger">Batal</a>
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
