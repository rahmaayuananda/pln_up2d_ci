<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3"></div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white">
                <strong>Form Edit Pengaduan</strong>
            </div>
            <div class="card-body">
                <form id="editPengaduanForm" action="<?= base_url('Pengaduan/edit/' . urlencode($pengaduan['ID_PENGADUAN'])); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- Unit Pelaksana -->
                        <div class="col-md-4">
                            <label class="form-label">Unit Pelaksana</label>
                            <select name="NAMA_UP3" class="form-control" required>
                                <option value="">-- Pilih UP --</option>
                                <?php
                                $upList = ['PEKANBARU', 'DUMAI', 'TANJUNG PINANG', 'RENGAT', 'BANGKINANG', 'UP2D_Riau'];
                                foreach ($upList as $up) {
                                    $selected = ($pengaduan['NAMA_UP3'] == $up) ? 'selected' : '';
                                    echo "<option value='$up' $selected>$up</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Tanggal Pengaduan -->
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" name="TANGGAL_PENGADUAN" value="<?= htmlentities($pengaduan['TANGGAL_PENGADUAN']); ?>" required>
                        </div>

                        <!-- 🟩 Tanggal Proses -->
                        <div class="col-md-4" id="tanggalProsesContainer" style="display:none;">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" class="form-control" name="TANGGAL_PROSES" value="<?= htmlentities($pengaduan['TANGGAL_PROSES'] ?? ''); ?>">
                        </div>

                        <!-- Jenis & Item Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pengaduan</label>
                            <select id="jenis_pengaduan" name="JENIS_PENGADUAN" class="form-control" required>
                                <option value="">-- Pilih Jenis Pengaduan --</option>
                                <?php
                                $jenisList = ["Gardu Induk", "Gardu Hubung", "Recloser", "LBS", "Radio Komunikasi"];
                                foreach ($jenisList as $jenis) {
                                    $selected = ($pengaduan['JENIS_PENGADUAN'] == $jenis) ? 'selected' : '';
                                    echo "<option value='$jenis' $selected>$jenis</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pilih Item Pengaduan</label>
                            <select id="item_pengaduan" name="ITEM_PENGADUAN" class="form-control" required>
                                <option value="">-- Pilih Item Pengaduan --</option>
                                <?php if (!empty($pengaduan['ITEM_PENGADUAN'])): ?>
                                    <option value="<?= htmlentities($pengaduan['ITEM_PENGADUAN']); ?>" selected><?= htmlentities($pengaduan['ITEM_PENGADUAN']); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="col-md-6">
                            <label class="form-label">PIC</label>
                            <select name="PIC" id="pic" class="form-control" required>
                                <option value="">-- Pilih PIC --</option>
                                <?php
                                $picList = ["Operasi Sistem Distribusi", "Fasilitas Operasi", "Pemeliharaan", "K3L & KAM", "Perencanaan"];
                                foreach ($picList as $pic) {
                                    $selected = ($pengaduan['PIC'] == $pic) ? 'selected' : '';
                                    echo "<option value='$pic' $selected>$pic</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- 🟩 Laporan, Tindak Lanjut / Catatan -->
                        <div class="col-md-12">
                            <div class="row">
                                <!-- Laporan -->
                                <div class="col-md-6">
                                    <label class="form-label">Laporan</label>
                                    <textarea name="LAPORAN" id="laporan" rows="6" class="form-control" required><?= htmlentities($pengaduan['LAPORAN']); ?></textarea>
                                </div>

                                <!-- Tindak Lanjut (status = Diproses) -->
                                <div class="col-md-6" id="tindakLanjutContainer" style="display:none;">
                                    <label class="form-label">Tindak Lanjut</label>
                                    <textarea name="TINDAK_LANJUT" id="tindak_lanjut" rows="6" class="form-control"><?= htmlentities($pengaduan['TINDAK_LANJUT'] ?? ''); ?></textarea>
                                </div>

                                <!-- Catatan (status = Selesai) -->
                                <div class="col-md-6" id="catatanContainer" style="display:none;">
                                    <label class="form-label">Catatan</label>
                                    <textarea name="CATATAN" id="catatan" rows="6" class="form-control"><?= htmlentities($pengaduan['CATATAN'] ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- FOTO -->
                        <div class="col-md-12">
                            <div class="row">
                                <!-- Foto Pengaduan -->
                                <div class="col-md-6">
                                    <label class="form-label">Foto Pengaduan</label>
                                    <?php if (!empty($pengaduan['FOTO_PENGADUAN'])): ?>
                                        <div class="mt-2 mb-2">
                                            <img src="<?= base_url('uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN']); ?>" class="img-thumbnail rounded" style="max-width:200px;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="FOTO_PENGADUAN" id="foto_pengaduan" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_pengaduan')">
                                    <div class="mt-2">
                                        <img id="preview_pengaduan" src="#" class="img-thumbnail rounded" style="max-width:200px; display:none;">
                                    </div>
                                </div>

                                <!-- Foto Proses -->
                                <div class="col-md-6" id="fotoProsesContainer" style="display:none;">
                                    <label class="form-label">Foto Proses</label>
                                    <?php if (!empty($pengaduan['FOTO_PROSES'])): ?>
                                        <div class="mt-2 mb-2">
                                            <img src="<?= base_url('uploads/proses/' . $pengaduan['FOTO_PROSES']); ?>" class="img-thumbnail rounded" style="max-width:200px;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="FOTO_PROSES" id="foto_proses" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_proses')">
                                    <div class="mt-2">
                                        <img id="preview_proses" src="#" class="img-thumbnail rounded" style="max-width:200px; display:none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STATUS -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="STATUS" id="statusSelect" class="form-control" required>
                                <option value="Menunggu" <?= ($pengaduan['STATUS'] == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                                <option value="Diproses" <?= ($pengaduan['STATUS'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                                <option value="Selesai" <?= ($pengaduan['STATUS'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </div>
                    </div>

                    <!-- TOMBOL -->
                    <div class="mt-4">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        const statusSelect = document.getElementById("statusSelect");
        const tanggalProsesContainer = document.getElementById("tanggalProsesContainer");
        const tindakLanjutContainer = document.getElementById("tindakLanjutContainer");
        const catatanContainer = document.getElementById("catatanContainer");
        const fotoProsesContainer = document.getElementById("fotoProsesContainer");

        function updateStatusFields() {
            if (statusSelect.value === "Diproses") {
                tanggalProsesContainer.style.display = "block";
                tindakLanjutContainer.style.display = "block";
                catatanContainer.style.display = "none";
                fotoProsesContainer.style.display = "block";
            } else if (statusSelect.value === "Selesai") {
                // 🟩 Perubahan: Tanggal Proses tetap tampil
                tanggalProsesContainer.style.display = "block";
                tindakLanjutContainer.style.display = "none";
                catatanContainer.style.display = "block";
                fotoProsesContainer.style.display = "none";
            } else {
                tanggalProsesContainer.style.display = "none";
                tindakLanjutContainer.style.display = "none";
                catatanContainer.style.display = "none";
                fotoProsesContainer.style.display = "none";
            }
        }

        statusSelect.addEventListener("change", updateStatusFields);
        document.addEventListener("DOMContentLoaded", updateStatusFields);

        // Preview foto
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
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
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
        }

        select.form-control,
        input.form-control {
            height: 40px !important;
            font-size: 0.9rem;
        }

        textarea.form-control {
            resize: vertical;
            font-size: 0.9rem;
        }
    </style>
</main>