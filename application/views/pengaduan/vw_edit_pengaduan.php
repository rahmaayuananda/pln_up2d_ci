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
                <form action="<?= base_url('Pengaduan/edit/' . urlencode($pengaduan['ID_PENGADUAN'])); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- Unit Pelaksana -->
                        <div class="col-md-4">
                            <label class="form-label">Unit Pelaksana</label>
                            <select name="NAMA_UP3" class="form-control" required>
                                <option value="">-- Pilih UP --</option>
                                <option value="PEKANBARU" <?= $pengaduan['NAMA_UP3'] == 'PEKANBARU' ? 'selected' : ''; ?>>PEKANBARU</option>
                                <option value="DUMAI" <?= $pengaduan['NAMA_UP3'] == 'DUMAI' ? 'selected' : ''; ?>>DUMAI</option>
                                <option value="TANJUNG PINANG" <?= $pengaduan['NAMA_UP3'] == 'TANJUNG PINANG' ? 'selected' : ''; ?>>TANJUNG PINANG</option>
                                <option value="RENGAT" <?= $pengaduan['NAMA_UP3'] == 'RENGAT' ? 'selected' : ''; ?>>RENGAT</option>
                                <option value="BANGKINANG" <?= $pengaduan['NAMA_UP3'] == 'BANGKINANG' ? 'selected' : ''; ?>>BANGKINANG</option>
                                <option value="UP2D_Riau" <?= $pengaduan['NAMA_UP3'] == 'UP2D_Riau' ? 'selected' : ''; ?>>UP2D Riau</option>
                            </select>
                        </div>

                        <!-- Tanggal Pengaduan -->
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" name="TANGGAL_PENGADUAN" value="<?= htmlentities($pengaduan['TANGGAL_PENGADUAN']); ?>" required>
                        </div>

                        <!-- Tanggal Proses -->
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" class="form-control" name="TANGGAL_PROSES" value="<?= htmlentities($pengaduan['TANGGAL_PROSES']); ?>">
                        </div>

                        <!-- Jenis Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pengaduan</label>
                            <select name="JENIS_PENGADUAN" class="form-control select2-modern" required>
                                <option value="">-- Pilih atau Ketik Jenis Pengaduan --</option>
                                <?php
                                $jenis_list = [
                                    "Gagal Control",
                                    "Filed",
                                    "Keypoint Mati",
                                    "Baterai Hilang/Rusak",
                                    "Panel Hilang",
                                    "Kabel Control Rusak",
                                    "Mekanik Lock",
                                    "Gangguan Mekanik",
                                    "VT Meledak",
                                    "Tidak Bisa Komunikasi",
                                    "PMT Lock",
                                    "Repty Fire Padam",
                                    "Baterai Repty Fire",
                                    "Proteksi Tembus",
                                    "Relay Proteksi Padam",
                                    "Kubikel Terbakar",
                                    "Kubikel Berdesir",
                                    "Keypoint Pindah",
                                    "Keypoint Baru",
                                    "Permintaan Integrasi",
                                    "SLD Tidak Sesuai"
                                ];
                                foreach ($jenis_list as $jenis) {
                                    $selected = ($pengaduan['JENIS_PENGADUAN'] == $jenis) ? 'selected' : '';
                                    echo "<option value='$jenis' $selected>$jenis</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="col-md-6">
                            <label class="form-label">PIC</label>
                            <input type="text" class="form-control" name="PIC" value="<?= htmlentities($pengaduan['PIC']); ?>" placeholder="Nama penanggung jawab...">
                        </div>

                        <!-- Laporan -->
                        <div class="col-md-12">
                            <label class="form-label">Laporan</label>
                            <textarea name="LAPORAN" rows="4" class="form-control" placeholder="Masukkan laporan pengaduan..." required><?= htmlentities($pengaduan['LAPORAN']); ?></textarea>
                        </div>

                        <!-- Foto Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Pengaduan</label>
                            <?php if (!empty($pengaduan['FOTO_PENGADUAN'])): ?>
                                <div class="mt-2 mb-2">
                                    <img src="<?= base_url('uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN']); ?>" alt="Foto Pengaduan" class="img-thumbnail rounded" style="max-width:200px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="FOTO_PENGADUAN" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_pengaduan')">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                            <div class="mt-2">
                                <img id="preview_pengaduan" src="#" alt="Preview Foto Pengaduan" class="img-thumbnail rounded" style="max-width: 200px; display: none;">
                            </div>
                        </div>

                        <!-- Foto Proses -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Proses</label>
                            <?php if (!empty($pengaduan['FOTO_PROSES'])): ?>
                                <div class="mt-2 mb-2">
                                    <img src="<?= base_url('uploads/proses/' . $pengaduan['FOTO_PROSES']); ?>" alt="Foto Proses" class="img-thumbnail rounded" style="max-width:200px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="FOTO_PROSES" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_proses')">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                            <div class="mt-2">
                                <img id="preview_proses" src="#" alt="Preview Foto Proses" class="img-thumbnail rounded" style="max-width: 200px; display: none;">
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="STATUS" class="form-control">
                                <option value="Menunggu" <?= $pengaduan['STATUS'] == 'Menunggu' ? 'selected' : ''; ?>>Menunggu</option>
                                <option value="Diproses" <?= $pengaduan['STATUS'] == 'Diproses' ? 'selected' : ''; ?>>Diproses</option>
                                <option value="Selesai" <?= $pengaduan['STATUS'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </div>

                    </div>

                    <!-- Tombol -->
                    <div class="mt-4">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Preview Gambar -->
    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "#";
                preview.style.display = 'none';
            }
        }
    </script>

    <style>
        .img-thumbnail {
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
        }

        input.form-control,
        select.form-control,
        .select2-container .select2-selection--single {
            height: 40px !important;
            font-size: 0.9rem;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 6px 12px;
        }
    </style>
</main>