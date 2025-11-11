<main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3"></div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white d-flex align-items-center justify-content-between">
                <strong>Form Edit Pengaduan</strong>
            </div>

            <div class="card-body">
                <?php
                $user_role = strtolower($this->session->userdata('user_role') ?? '');
                $is_up3 = ($user_role === 'up3');
                $readonly = $is_up3 ? 'readonly' : '';
                $disabled = $is_up3 ? 'disabled' : '';
                ?>

                <form id="editPengaduanForm" action="<?= base_url('Pengaduan/edit/' . urlencode($pengaduan['ID_PENGADUAN'])); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- Unit Pelaksana -->
                        <div class="col-md-4">
                            <label class="form-label">Unit Pelaksana</label>
                            <select name="NAMA_UP3" class="form-control" <?= $disabled; ?> required>
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
                            <input type="date" class="form-control" name="TANGGAL_PENGADUAN" value="<?= htmlentities($pengaduan['TANGGAL_PENGADUAN']); ?>" <?= $readonly; ?> required>
                        </div>

                        <!-- Tanggal Proses -->
                        <div class="col-md-4" id="tanggalProsesContainer" style="display:none;">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" name="TANGGAL_PROSES" class="form-control" value="<?= htmlentities($pengaduan['TANGGAL_PROSES'] ?? ''); ?>" <?= $readonly; ?>>
                        </div>

                        <!-- Tanggal Selesai -->
                        <div class="col-md-4" id="tanggalSelesaiContainer" style="display:none;">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="TANGGAL_SELESAI" id="tanggalSelesai" class="form-control" value="<?= htmlentities($pengaduan['TANGGAL_SELESAI'] ?? ''); ?>" <?= $readonly; ?>>
                        </div>

                        <!-- Jenis Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pengaduan</label>
                            <select id="jenis_pengaduan" name="JENIS_PENGADUAN" class="form-control" <?= $disabled; ?> required>
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

                        <!-- Item Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Pilih Item Pengaduan</label>
                            <select id="item_pengaduan" name="ITEM_PENGADUAN" class="form-control" <?= $disabled; ?> required>
                                <option value="">-- Pilih Item Pengaduan --</option>
                                <?php if (!empty($pengaduan['ITEM_PENGADUAN'])): ?>
                                    <option value="<?= htmlentities($pengaduan['ITEM_PENGADUAN']); ?>" selected><?= htmlentities($pengaduan['ITEM_PENGADUAN']); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="col-md-6">
                            <label class="form-label">PIC</label>
                            <select name="PIC" id="pic" class="form-control" <?= $disabled; ?> required>
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

                        <!-- Laporan, Tindak Lanjut, Catatan -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Laporan</label>
                                    <textarea name="LAPORAN" rows="5" class="form-control" required><?= htmlentities($pengaduan['LAPORAN']); ?></textarea>
                                </div>

                                <div class="col-md-6" id="tindakLanjutContainer" style="display:none;">
                                    <label class="form-label">Tindak Lanjut</label>
                                    <textarea name="TINDAK_LANJUT" rows="5" class="form-control" <?= $readonly; ?>><?= htmlentities($pengaduan['TINDAK_LANJUT'] ?? ''); ?></textarea>
                                </div>

                                <div class="col-md-6" id="catatanContainer" style="display:none;">
                                    <label class="form-label">Catatan</label>
                                    <textarea name="CATATAN" rows="5" class="form-control" <?= $readonly; ?>><?= htmlentities($pengaduan['CATATAN'] ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Foto Pengaduan & Proses -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Foto Pengaduan</label>
                                    <?php if (!empty($pengaduan['FOTO_PENGADUAN'])): ?>
                                        <div class="mt-2 mb-2">
                                            <img src="<?= base_url('uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN']); ?>" class="img-thumbnail rounded" style="max-width:200px;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="FOTO_PENGADUAN" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_pengaduan')">
                                    <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                                    <div class="mt-2">
                                        <img id="preview_pengaduan" src="#" class="img-thumbnail rounded" style="max-width:200px; display:none;">
                                    </div>
                                </div>

                                <div class="col-md-6" id="fotoProsesContainer" style="display:none;">
                                    <label class="form-label">Foto Proses</label>
                                    <?php if (!empty($pengaduan['FOTO_PROSES'])): ?>
                                        <div class="mt-2 mb-2">
                                            <img src="<?= base_url('uploads/proses/' . $pengaduan['FOTO_PROSES']); ?>" class="img-thumbnail rounded" style="max-width:200px;">
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="FOTO_PROSES" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_proses')" <?= $disabled; ?>>
                                    <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                                    <div class="mt-2">
                                        <img id="preview_proses" src="#" class="img-thumbnail rounded" style="max-width:200px; display:none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="STATUS" id="statusSelect" class="form-control" <?= $is_up3 ? 'disabled' : 'required'; ?>>
                                <option value="Lapor" <?= in_array(($pengaduan['STATUS'] ?? ''), ['Lapor', 'Menunggu']) ? 'selected' : ''; ?>>Lapor</option>
                                <option value="Diproses" <?= ($pengaduan['STATUS'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                                <option value="Selesai" <?= ($pengaduan['STATUS'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                            <?php if ($is_up3): ?>
                                <input type="hidden" name="STATUS" value="<?= htmlentities($pengaduan['STATUS'] ?? 'Lapor', ENT_QUOTES, 'UTF-8'); ?>">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const statusSelect = document.getElementById("statusSelect");
        const tanggalProsesContainer = document.getElementById("tanggalProsesContainer");
        const tanggalSelesaiContainer = document.getElementById("tanggalSelesaiContainer");
        const tindakLanjutContainer = document.getElementById("tindakLanjutContainer");
        const catatanContainer = document.getElementById("catatanContainer");
        const fotoProsesContainer = document.getElementById("fotoProsesContainer");
        const tanggalSelesaiInput = document.getElementById("tanggalSelesai");

        function updateStatusFields() {
            const value = statusSelect.value;
            const today = new Date().toISOString().split('T')[0];
            tanggalProsesContainer.style.display = (value === "Diproses" || value === "Selesai") ? "block" : "none";
            tanggalSelesaiContainer.style.display = (value === "Selesai") ? "block" : "none";
            tindakLanjutContainer.style.display = (value === "Diproses") ? "block" : "none";
            catatanContainer.style.display = (value === "Selesai") ? "block" : "none";
            fotoProsesContainer.style.display = (value === "Diproses") ? "block" : "none";

            if (value === "Selesai" && !tanggalSelesaiInput.value) {
                tanggalSelesaiInput.value = today;
            }
        }

        statusSelect.addEventListener("change", updateStatusFields);
        document.addEventListener("DOMContentLoaded", updateStatusFields);

        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>

    <style>
        .form-label {
            font-weight: 600;
            color: #2c3e50;
        }

        .img-thumbnail {
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
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

        .btn {
            border-radius: 0.5rem;
        }
    </style>
</main>