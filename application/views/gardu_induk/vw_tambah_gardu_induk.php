<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- Konten Utama -->
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card shadow">
                                    <div class="card-header bg-primary text-white font-weight-bold">
                                        Form Tambah Data Gardu Induk
                                    </div>

                                    <div class="card-body">
                                        <form action="<?= base_url('Gardu_induk/tambah'); ?>" method="POST">

                                            <!-- ID_GI -->
                                            <!-- <div class="form-group mb-3">
                                                <label for="ID_GI">ID Gardu Induk</label>
                                                <input type="number" name="ID_GI" class="form-control" id="ID_GI"
                                                    placeholder="Masukkan ID Gardu Induk" required>
                                            </div> -->

                                            <!-- UNIT_LAYANAN -->
                                            <div class="form-group mb-3">
                                                <label for="UNIT_LAYANAN">Unit Layanan</label>
                                                <input type="text" name="UNIT_LAYANAN" class="form-control"
                                                    id="UNIT_LAYANAN" placeholder="Masukkan Unit Layanan" required>
                                            </div>

                                            <!-- GARDU_INDUK -->
                                            <div class="form-group mb-3">
                                                <label for="GARDU_INDUK">Nama Gardu Induk</label>
                                                <input type="text" name="GARDU_INDUK" class="form-control"
                                                    id="GARDU_INDUK" placeholder="Masukkan Nama Gardu Induk" required>
                                            </div>

                                            <!-- Koordinat -->
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="LONGITUDEX">Longitude (X)</label>
                                                    <input type="text" name="LONGITUDEX" class="form-control"
                                                        id="LONGITUDEX" placeholder="Contoh: 101.123456">
                                                </div>
                                                <div class="col">
                                                    <label for="LATITUDEY">Latitude (Y)</label>
                                                    <input type="text" name="LATITUDEY" class="form-control"
                                                        id="LATITUDEY" placeholder="Contoh: -0.567890">
                                                </div>
                                            </div>

                                            <!-- STATUS_OPERASI -->
                                            <div class="form-group mb-3">
                                                <label for="STATUS_OPERASI">Status Operasi</label>
                                                <select name="STATUS_OPERASI" id="STATUS_OPERASI" class="form-control">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="OPERATING">OPERATING</option>
                                                    <option value="NOT READY">NOT READY</option>
                                                    <option value="INACTIVE">INACTIVE</option>
                                                    <option value="REQOPERATING">REQOPERATING</option>
                                                </select>
                                            </div>

                                            <!-- Data Teknis -->
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="JML_TD">Jumlah TD</label>
                                                    <input type="number" name="JML_TD" id="JML_TD" class="form-control" placeholder="Masukkan jumlah TD">
                                                </div>
                                                <div class="col">
                                                    <label for="INC">INC</label>
                                                    <input type="number" name="INC" id="INC" class="form-control" placeholder="Masukkan nilai INC">
                                                </div>
                                                <div class="col">
                                                    <label for="OGF">OGF</label>
                                                    <input type="number" name="OGF" id="OGF" class="form-control" placeholder="Masukkan nilai OGF">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="SPARE">Spare</label>
                                                    <input type="number" name="SPARE" id="SPARE" class="form-control" placeholder="Masukkan jumlah spare">
                                                </div>
                                                <div class="col">
                                                    <label for="COUPLE">Couple</label>
                                                    <input type="number" name="COUPLE" id="COUPLE" class="form-control" placeholder="Masukkan jumlah couple">
                                                </div>
                                                <div class="col">
                                                    <label for="BUS_RISER">Bus Riser</label>
                                                    <input type="number" name="BUS_RISER" id="BUS_RISER" class="form-control" placeholder="Masukkan bus riser">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="BBVT">BBVT</label>
                                                    <input type="number" name="BBVT" id="BBVT" class="form-control" placeholder="Masukkan BBVT">
                                                </div>
                                                <div class="col">
                                                    <label for="PS">PS</label>
                                                    <input type="number" name="PS" id="PS" class="form-control" placeholder="Masukkan PS">
                                                </div>
                                            </div>

                                            <!-- STATUS_SCADA -->
                                            <div class="form-group mb-3">
                                                <label for="STATUS_SCADA">Status SCADA</label>
                                                <select name="STATUS_SCADA" id="STATUS_SCADA" class="form-control">
                                                    <option value="">-- Pilih Status SCADA --</option>
                                                    <option value="INTEGRASI">INTEGRASI</option>
                                                    <option value="NON INTEGRASI">NON INTEGRASI</option>
                                                </select>
                                            </div>

                                            <!-- IP dan RTU -->
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="IP_GATEWAY">IP Gateway</label>
                                                    <input type="text" name="IP_GATEWAY" id="IP_GATEWAY" class="form-control" placeholder="Contoh: 192.168.0.1">
                                                </div>
                                                <div class="col">
                                                    <label for="IP_RTU">IP RTU</label>
                                                    <input type="text" name="IP_RTU" id="IP_RTU" class="form-control" placeholder="Contoh: 192.168.0.10">
                                                </div>
                                            </div>

                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label for="MERK_RTU">Merk RTU</label>
                                                    <input type="text" name="MERK_RTU" id="MERK_RTU" class="form-control" placeholder="Masukkan merk RTU">
                                                </div>
                                                <div class="col">
                                                    <label for="SN_RTU">SN RTU</label>
                                                    <input type="text" name="SN_RTU" id="SN_RTU" class="form-control" placeholder="Masukkan serial number RTU">
                                                </div>
                                                <div class="col">
                                                    <label for="THN_INTEGRASI">Tahun Integrasi</label>
                                                    <input type="text" name="THN_INTEGRASI" id="THN_INTEGRASI" class="form-control" placeholder="Contoh: 2023">
                                                </div>
                                            </div>

                                            <!-- Tombol -->
                                            <div class="mt-4">
                                                <a href="<?= base_url('Gardu_induk'); ?>" class="btn btn-danger">
                                                    <i class="fas fa-times me-1"></i> Batal
                                                </a>
                                                <button type="submit" name="tambah" class="btn btn-primary float-right">
                                                    <i class="fas fa-save me-1"></i> Simpan Data
                                                </button>
                                            </div>
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

<!-- Style tambahan -->
<style>
    .card {
        border-radius: 10px;
    }

    .card-header {
        font-size: 1rem;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn {
        border-radius: 6px;
        padding: 8px 18px;
    }
</style>