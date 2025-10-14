<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <!-- <h6 class="font-weight-bolder text-white mb-0">
                <i class="fas fa-comments me-2"></i> Edit Data Pengaduan
            </h6> -->
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white">
                <strong>Form Edit Pengaduan</strong>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Pengaduan/edit/' . urlencode($pengaduan['ID_PENGADUAN'])); ?>" method="post" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- ID Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">ID Pengaduan</label>
                            <input type="text" class="form-control" value="<?= htmlentities($pengaduan['ID_PENGADUAN']); ?>" disabled>
                        </div>

                        <!-- NAMA UP3 -->
                        <div class="col-md-6">
                            <label class="form-label">Nama UP3</label>
                            <input type="text" class="form-control" name="NAMA_UP3" value="<?= htmlentities($pengaduan['NAMA_UP3']); ?>" required>
                        </div>

                        <!-- TANGGAL PENGADUAN -->
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" name="TANGGAL_PENGADUAN" value="<?= htmlentities($pengaduan['TANGGAL_PENGADUAN']); ?>" required>
                        </div>

                        <!-- JENIS PENGADUAN -->
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pengaduan</label>
                            <input type="text" class="form-control" name="JENIS_PENGADUAN" value="<?= htmlentities($pengaduan['JENIS_PENGADUAN']); ?>" required>
                        </div>

                        <!-- LAPORAN -->
                        <div class="col-md-12">
                            <label class="form-label">Laporan</label>
                            <textarea class="form-control" name="LAPORAN" rows="3" required><?= htmlentities($pengaduan['LAPORAN']); ?></textarea>
                        </div>

                        <!-- FOTO PENGADUAN -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Pengaduan</label>
                            <?php if (!empty($pengaduan['FOTO_PENGADUAN'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN']); ?>" alt="Foto Pengaduan" class="img-fluid rounded" style="max-height: 150px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="FOTO_PENGADUAN">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                        </div>

                        <!-- TANGGAL PROSES -->
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" class="form-control" name="TANGGAL_PROSES" value="<?= htmlentities($pengaduan['TANGGAL_PROSES']); ?>">
                        </div>

                        <!-- FOTO PROSES -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Proses</label>
                            <?php if (!empty($pengaduan['FOTO_PROSES'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('uploads/proses/' . $pengaduan['FOTO_PROSES']); ?>" alt="Foto Proses" class="img-fluid rounded" style="max-height: 150px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="FOTO_PROSES">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                        </div>

                        <!-- STATUS -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="STATUS" required>
                                <option value="Belum Diproses" <?= $pengaduan['STATUS'] == 'Belum Diproses' ? 'selected' : ''; ?>>Belum Diproses</option>
                                <option value="Diproses" <?= $pengaduan['STATUS'] == 'Diproses' ? 'selected' : ''; ?>>Diproses</option>
                                <option value="Selesai" <?= $pengaduan['STATUS'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="col-md-6">
                            <label class="form-label">PIC (Person in Charge)</label>
                            <input type="text" class="form-control" name="PIC" value="<?= htmlentities($pengaduan['PIC']); ?>">
                        </div>

                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-4">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>