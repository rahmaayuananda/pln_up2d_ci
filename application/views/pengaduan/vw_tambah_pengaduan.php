<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar Atas -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <!-- <h6 class="font-weight-bolder text-white mb-0">
                <i class="fas fa-exclamation-circle me-2 text-secondary"></i> Tambah Data Pengaduan
            </h6> -->
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white">
                <strong>Form Tambah Pengaduan</strong>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Pengaduan/tambah'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- Nama UP3 -->
                        <div class="col-md-6">
                            <label class="form-label">Unit Pelaksana</label>
                            <select name="NAMA_UP3" class="form-control" required>
                                <option value="">-- Pilih UP --</option>
                                <option value="PEKANBARU">PEKANBARU</option>
                                <option value="DUMAI">DUMAI</option>
                                <option value="TANJUNG PINANG">TANJUNG PINANG</option>
                                <option value="RENGAT">RENGAT</option>
                                <option value="BANGKINANG">BANGKINANG</option>
                                <option value="UP2D_Riau">UP2D Riau</option>
                            </select>
                        </div>

                        <!-- Tanggal Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" name="TANGGAL_PENGADUAN" required>
                        </div>

                        <!-- Jenis Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pengaduan</label>
                            <select name="JENIS_PENGADUAN" class="form-control" required>
                                <option value="">-- Pilih Jenis Pengaduan --</option>
                                <option value="Gagal Control">Gagal Control</option>
                                <option value="Filed">Filed</option>
                                <option value="Keypoint Mati">Keypoint Mati</option>
                                <option value="Baterai Hilang/Rusak">Baterai Hilang/Rusak</option>
                                <option value="Panel Hilang">Panel Hilang</option>
                                <option value="Kabel Control Rusak">Kabel Control Rusak</option>
                                <option value="Mekanik Lock">Mekanik Lock</option>
                                <option value="Gangguan Mekanik">Gangguan Mekanik</option>
                                <option value="VT Meledak">VT Meledak</option>
                                <option value="Tidak Bisa Komunikasi">Tidak Bisa Komunikasi</option>
                                <option value="PMT Lock">PMT Lock</option>
                                <option value="Repty Fire Padam">Repty Fire Padam</option>
                                <option value="Baterai Repty Fire">Baterai Repty Fire</option>
                                <option value="Proteksi Tembus">Proteksi Tembus</option>
                                <option value="Relay Proteksi Padam">Relay Proteksi Padam</option>
                                <option value="Kubikel Terbakar">Kubikel Terbakar</option>
                                <option value="Kubikel Berdesir">Kubikel Berdesir</option>
                                <option value="Keypoint Pindah">Keypoint Pindah</option>
                                <option value="Keypoint Baru">Keypoint Baru</option>
                                <option value="Permintaan Integrasi">Permintaan Integrasi</option>
                                <option value="SLD Tidak Sesuai">SLD Tidak Sesuai</option>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="col-md-6">
                            <label class="form-label">PIC</label>
                            <input type="text" class="form-control" name="PIC" placeholder="Nama penanggung jawab...">
                        </div>

                        <!-- Laporan -->
                        <div class="col-md-12">
                            <label class="form-label">Laporan</label>
                            <textarea name="LAPORAN" rows="4" class="form-control" placeholder="Masukkan laporan pengaduan..." required></textarea>
                        </div>

                        <!-- Foto Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Pengaduan</label>
                            <input type="file" name="FOTO_PENGADUAN" class="form-control" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                        </div>

                        <!-- Tanggal Proses -->
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" name="TANGGAL_PROSES" class="form-control">
                        </div>

                        <!-- Foto Proses -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Proses</label>
                            <input type="file" name="FOTO_PROSES" class="form-control" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="STATUS" class="form-control">
                                <option value="Menunggu">Menunggu</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>

                    </div>

                    <!-- Tombol -->
                    <div class="mt-4">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>