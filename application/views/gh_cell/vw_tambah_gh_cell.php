<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800">Tambah Data GH Cell</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">Form Tambah GH Cell</div>
                                    <div class="card-body">
                                        <form action="<?= base_url('Gh_cell/tambah'); ?>" method="POST">
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="SSOTNUMBER_GH_CELL">SSOT Number</label>
                                                    <input type="text" name="SSOTNUMBER_GH_CELL" id="SSOTNUMBER_GH_CELL" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label for="GARDU_HUBUNG">Gardu Hubung</label>
                                                    <input type="text" name="GARDU_HUBUNG" id="GARDU_HUBUNG" class="form-control" required>
                                                </div>
                                                <div class="col">
                                                    <label for="NAMA_CELL">Nama Cell</label>
                                                    <input type="text" name="NAMA_CELL" id="NAMA_CELL" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="JENIS_CELL">Jenis Cell</label>
                                                    <input type="text" name="JENIS_CELL" id="JENIS_CELL" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="STATUS_OPERASI">Status Operasi</label>
                                                    <input type="text" name="STATUS_OPERASI" id="STATUS_OPERASI" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="MERK_CELL">Merk Cell</label>
                                                    <input type="text" name="MERK_CELL" id="MERK_CELL" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="TYPE_CELL">Type Cell</label>
                                                    <input type="text" name="TYPE_CELL" id="TYPE_CELL" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="THN_CELL">Tahun Cell</label>
                                                    <input type="text" name="THN_CELL" id="THN_CELL" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="STATUS_SCADA">Status SCADA</label>
                                                    <input type="text" name="STATUS_SCADA" id="STATUS_SCADA" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="MERK_RELAY">Merk Relay</label>
                                                    <input type="text" name="MERK_RELAY" id="MERK_RELAY" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="TYPE_RELAY">Type Relay</label>
                                                    <input type="text" name="TYPE_RELAY" id="TYPE_RELAY" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="THN_RELAY">Tahun Relay</label>
                                                    <input type="text" name="THN_RELAY" id="THN_RELAY" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="RATIO_CT">Ratio CT</label>
                                                    <input type="text" name="RATIO_CT" id="RATIO_CT" class="form-control">
                                                </div>
                                            </div>

                                            <a href="<?= base_url('Gh_cell') ?>" class="btn btn-danger">Batal</a>
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
