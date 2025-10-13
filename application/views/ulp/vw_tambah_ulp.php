<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <!-- Konten Utama -->
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card shadow">
                                    <div class="card-header bg-primary text-white font-weight-bold">
                                        Form Tambah Data ULP
                                    </div>

                                    <div class="card-body">
                                        <form action="<?= base_url('Ulp/tambah'); ?>" method="POST">
                                            
                                            <!-- CXUNIT -->
                                            <div class="form-group mb-3">
                                                <label for="CXUNIT">Kode CXUNIT</label>
                                                <input type="text" name="CXUNIT" class="form-control" id="CXUNIT"
                                                    placeholder="Masukkan Kode CXUNIT" required>
                                            </div>

                                            <!-- NAMA ULP -->
                                            <div class="form-group mb-3">
                                                <label for="NAMA_ULP">Nama ULP</label>
                                                <input type="text" name="NAMA_ULP" class="form-control" id="NAMA_ULP"
                                                    placeholder="Masukkan Nama ULP" required>
                                            </div>

                                            <!-- UP3 -->
                                            <div class="form-group mb-3">
                                                <label for="UP3_2D">UP3 (Unit Pelaksana Pelayanan Pelanggan)</label>
                                                <select name="UP3_2D" id="UP3_2D" class="form-control select2" required>
                                                    <option value="">-- Pilih UP3 --</option>
                                                    <?php foreach ($up3 as $u): ?>
                                                        <option value="<?= $u['UP3_2D']; ?>">
                                                            <?= $u['NAMA_UP3']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <!-- Tombol -->
                                            <div class="mt-4">
                                                <a href="<?= base_url('Ulp'); ?>" class="btn btn-danger">
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
