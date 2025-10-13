<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800">Edit Data ULP</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">Form Ubah ULP</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('Ulp/edit/' . $ulp['CXUNIT']); ?>" method="POST">
                                            <div class="form-group mb-3">
                                                <label>Kode ULP (CXUNIT)</label>
                                                <input type="text" class="form-control" value="<?= $ulp['CXUNIT']; ?>" disabled>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="NAMA_ULP">Nama ULP</label>
                                                <input type="text" name="NAMA_ULP" id="NAMA_ULP" class="form-control" value="<?= $ulp['NAMA_ULP']; ?>" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="UP3_2D">Kode UP3</label>
                                                <input type="text" name="UP3_2D" id="UP3_2D" class="form-control" value="<?= $ulp['UP3_2D']; ?>" required>
                                            </div>
                                            <a href="<?= base_url('Ulp') ?>" class="btn btn-danger">Batal</a>
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
