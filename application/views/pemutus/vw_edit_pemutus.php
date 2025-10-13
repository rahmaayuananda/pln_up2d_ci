<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800">Edit Data Pemutus</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">Form Ubah Pemutus</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('Pemutus/edit/' . $pemutus['SSOTNUMBER_LBSREC']); ?>" method="POST">
                                            <div class="form-group mb-3">
                                                <label>SSOT Number</label>
                                                <input type="text" class="form-control" value="<?= $pemutus['SSOTNUMBER_LBSREC']; ?>" disabled>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="UNIT_LAYANAN">Unit Layanan</label>
                                                    <input type="text" name="UNIT_LAYANAN" id="UNIT_LAYANAN" class="form-control" value="<?= $pemutus['UNIT_LAYANAN']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="PENYULANG">Penyulang</label>
                                                    <input type="text" name="PENYULANG" id="PENYULANG" class="form-control" value="<?= $pemutus['PENYULANG']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="KEYPOINT">Keypoint</label>
                                                    <input type="text" name="KEYPOINT" id="KEYPOINT" class="form-control" value="<?= $pemutus['KEYPOINT']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="FUNGSI_KP">Fungsi KP</label>
                                                    <input type="text" name="FUNGSI_KP" id="FUNGSI_KP" class="form-control" value="<?= $pemutus['FUNGSI_KP']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="STATUS_SCADA">Status SCADA</label>
                                                    <input type="text" name="STATUS_SCADA" id="STATUS_SCADA" class="form-control" value="<?= $pemutus['STATUS_SCADA']; ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="MEDIA_KOMDAT">Media Komdat</label>
                                                    <input type="text" name="MEDIA_KOMDAT" id="MEDIA_KOMDAT" class="form-control" value="<?= $pemutus['MEDIA_KOMDAT']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="MERK_KOMDAT">Merk Komdat</label>
                                                <input type="text" name="MERK_KOMDAT" id="MERK_KOMDAT" class="form-control" value="<?= $pemutus['MERK_KOMDAT']; ?>">
                                            </div>

                                            <a href="<?= base_url('Pemutus') ?>" class="btn btn-danger">Batal</a>
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
