<main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3"></div>
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
                            <input type="date" class="form-control" name="TANGGAL_PENGADUAN"
                                value="<?= htmlentities($pengaduan['TANGGAL_PENGADUAN'] ?? ''); ?>" required>
                        </div>

                        <!-- Tanggal Proses -->
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" class="form-control" name="TANGGAL_PROSES"
                                value="<?= htmlentities($pengaduan['TANGGAL_PROSES'] ?? ''); ?>">
                        </div>

                        <!-- Jenis Pengaduan -->
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

                        <!-- Item Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Pilih Item Pengaduan</label>
                            <select id="item_pengaduan" name="ITEM_PENGADUAN" class="form-control" required>
                                <option value="">-- Pilih Item Pengaduan --</option>
                                <?php if (!empty($pengaduan['ITEM_PENGADUAN'])): ?>
                                    <option value="<?= htmlentities($pengaduan['ITEM_PENGADUAN'] ?? ''); ?>" selected>
                                        <?= htmlentities($pengaduan['ITEM_PENGADUAN'] ?? ''); ?>
                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="col-md-6">
                            <label class="form-label">PIC</label>
                            <input type="text" id="pic" class="form-control" name="PIC"
                                value="<?= htmlentities($pengaduan['PIC'] ?? ''); ?>"
                                placeholder="Otomatis terisi setelah pilih item..." readonly>
                        </div>

                        <!-- Laporan -->
                        <div class="col-md-12">
                            <label class="form-label">Laporan</label>
                            <textarea name="LAPORAN" rows="4" class="form-control" required><?= htmlentities($pengaduan['LAPORAN'] ?? ''); ?></textarea>
                        </div>

                        <!-- Foto Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Pengaduan</label>
                            <?php if (!empty($pengaduan['FOTO_PENGADUAN'])): ?>
                                <div class="mt-2 mb-2">
                                    <img src="<?= base_url('uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN']); ?>" alt="Foto Pengaduan"
                                        class="img-thumbnail rounded" style="max-width:200px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="FOTO_PENGADUAN" class="form-control" accept="image/*"
                                onchange="previewImage(event, 'preview_pengaduan')">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                            <div class="mt-2">
                                <img id="preview_pengaduan" src="#" alt="Preview Foto Pengaduan"
                                    class="img-thumbnail rounded" style="max-width:200px; display:none;">
                            </div>
                        </div>

                        <!-- Foto Proses -->
                        <div class="col-md-6">
                            <label class="form-label">Foto Proses</label>
                            <?php if (!empty($pengaduan['FOTO_PROSES'])): ?>
                                <div class="mt-2 mb-2">
                                    <img src="<?= base_url('uploads/proses/' . $pengaduan['FOTO_PROSES']); ?>" alt="Foto Proses"
                                        class="img-thumbnail rounded" style="max-width:200px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="FOTO_PROSES" class="form-control" accept="image/*"
                                onchange="previewImage(event, 'preview_proses')">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                            <div class="mt-2">
                                <img id="preview_proses" src="#" alt="Preview Foto Proses"
                                    class="img-thumbnail rounded" style="max-width:200px; display:none;">
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="STATUS" class="form-control">
                                <option value="Menunggu" <?= ($pengaduan['STATUS'] == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                                <option value="Diproses" <?= ($pengaduan['STATUS'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                                <option value="Selesai" <?= ($pengaduan['STATUS'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT DINAMIS -->
    <script>
        const dataPengaduan = {
            "Gardu Induk": ["Failed", "PMT", "Proteksi", "Kabel", "Kubikel", "lain-lain.."],
            "Gardu Hubung": ["Failed", "PMT", "Proteksi", "Kabel", "Kubikel", "Rectifier", "Baterai", "lain-lain.."],
            "Recloser": ["Failed", "PMT", "Proteksi", "Kabel", "VT", "Panel", "Baterai", "lain-lain.."],
            "LBS": ["Failed", "PMT", "Proteksi", "Kabel", "VT", "Panel", "Baterai", "lain-lain.."],
            "Radio Komunikasi": ["Failed", "Antenna", "Base Station", "HT", "lain-lain.."]
        };

        const picMapping = {
            "Failed": "Operasi Sistem Distribusi",
            "PMT": "Pemeliharaan",
            "Proteksi": "Fasilitas Operasi",
            "Kabel": "Perencanaan",
            "Kubikel": "Pemeliharaan",
            "Rectifier": "Fasilitas Operasi",
            "Baterai": "K3L & KAM",
            "VT": "Fasilitas Operasi",
            "Panel": "Pemeliharaan",
            "Antenna": "Operasi Sistem Distribusi",
            "Base Station": "Fasilitas Operasi",
            "HT": "K3L & KAM",
            "lain-lain..": "Perencanaan"
        };

        const jenisSelect = document.getElementById("jenis_pengaduan");
        const itemSelect = document.getElementById("item_pengaduan");
        const picInput = document.getElementById("pic");

        // Saat jenis pengaduan berubah
        jenisSelect.addEventListener("change", function() {
            const selectedJenis = this.value;
            itemSelect.innerHTML = "<option value=''>-- Pilih Item Pengaduan --</option>";
            picInput.value = "";

            if (dataPengaduan[selectedJenis]) {
                dataPengaduan[selectedJenis].forEach(item => {
                    const opt = document.createElement("option");
                    opt.value = item;
                    opt.textContent = item;
                    itemSelect.appendChild(opt);
                });
            }
        });

        // Saat item dipilih → PIC otomatis
        itemSelect.addEventListener("change", function() {
            const selectedItem = this.value;
            picInput.value = picMapping[selectedItem] || "";
        });

        // Preview gambar
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
                preview.src = "#";
                preview.style.display = 'none';
            }
        }

        // === Saat halaman edit pertama kali dimuat ===
        document.addEventListener("DOMContentLoaded", function() {
            const currentJenis = jenisSelect.value;
            const currentItem = "<?= $pengaduan['ITEM_PENGADUAN'] ?? ''; ?>";

            // Tampilkan daftar item sesuai jenis saat ini
            if (dataPengaduan[currentJenis]) {
                itemSelect.innerHTML = "<option value=''>-- Pilih Item Pengaduan --</option>";
                dataPengaduan[currentJenis].forEach(item => {
                    const opt = document.createElement("option");
                    opt.value = item;
                    opt.textContent = item;
                    if (item === currentItem) opt.selected = true;
                    itemSelect.appendChild(opt);
                });

                // Set PIC sesuai item yang tersimpan
                if (picMapping[currentItem]) {
                    picInput.value = picMapping[currentItem];
                }
            }
        });
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
    </style>
</main>