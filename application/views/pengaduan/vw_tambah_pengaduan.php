<main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3"></div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white d-flex align-items-center justify-content-between">
                <strong>Form Tambah Pengaduan</strong>
            </div>

            <div class="card-body">
                <?php
                $user_role = strtolower($this->session->userdata('user_role') ?? '');
                $is_up3 = ($user_role === 'up3');
                $disabled = $is_up3 ? 'disabled' : '';
                ?>

                <form id="formPengaduan" action="<?= base_url('Pengaduan/tambah'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- Unit Pelaksana -->
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" name="TANGGAL_PENGADUAN" required>
                        </div>

                        <!-- Tanggal Proses -->
                        <div class="col-md-4" id="tanggalProsesContainer" style="display:none;">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" name="TANGGAL_PROSES" class="form-control">
                        </div>

                        <!-- Tanggal Selesai -->
                        <div class="col-md-4" id="tanggalSelesaiContainer" style="display:none;">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="TANGGAL_SELESAI" id="tanggalSelesai" class="form-control">
                        </div>

                        <!-- Jenis Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Jenis Pengaduan</label>
                            <select id="jenis_pengaduan" name="JENIS_PENGADUAN" class="form-control" required>
                                <option value="">-- Pilih Jenis Pengaduan --</option>
                                <option value="Gardu Induk">Gardu Induk</option>
                                <option value="Gardu Hubung">Gardu Hubung</option>
                                <option value="Recloser">Recloser</option>
                                <option value="LBS">LBS</option>
                                <option value="Radio Komunikasi">Radio Komunikasi</option>
                            </select>
                        </div>

                        <!-- Item Pengaduan -->
                        <div class="col-md-6">
                            <label class="form-label">Pilih Item Pengaduan</label>
                            <select id="item_pengaduan" name="ITEM_PENGADUAN" class="form-control" required>
                                <option value="">-- Pilih Item Pengaduan --</option>
                            </select>
                        </div>

                        <!-- PIC -->
                        <div class="col-md-6">
                            <label class="form-label">PIC</label>
                            <select name="PIC" class="form-control" required>
                                <option value="">-- Pilih PIC --</option>
                                <option value="Operasi Sistem Distribusi">Operasi Sistem Distribusi</option>
                                <option value="Fasilitas Operasi">Fasilitas Operasi</option>
                                <option value="Pemeliharaan">Pemeliharaan</option>
                                <option value="K3L & KAM">K3L & KAM</option>
                                <option value="Perencanaan">Perencanaan</option>
                            </select>
                        </div>

                        <!-- Laporan dan Catatan -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Laporan</label>
                                    <textarea name="LAPORAN" rows="5" class="form-control" placeholder="Masukkan laporan pengaduan..." required></textarea>
                                </div>

                                <div class="col-md-6" id="tindakLanjutContainer" style="display:none;">
                                    <label class="form-label">Tindak Lanjut</label>
                                    <textarea name="TINDAK_LANJUT" rows="5" class="form-control" placeholder="Masukkan tindak lanjut..."></textarea>
                                </div>

                                <div class="col-md-6" id="catatanContainer" style="display:none;">
                                    <label class="form-label">Catatan</label>
                                    <textarea name="CATATAN" rows="5" class="form-control" placeholder="Masukkan catatan jika pengaduan sudah selesai..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Foto Pengaduan dan Proses -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Foto Pengaduan</label>
                                    <input type="file" name="FOTO_PENGADUAN" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_pengaduan')">
                                    <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                                    <div class="mt-2">
                                        <img id="preview_pengaduan" src="#" class="img-thumbnail rounded" style="max-width:200px; display:none;">
                                    </div>
                                </div>

                                <div class="col-md-6" id="fotoProsesContainer" style="display:none;">
                                    <label class="form-label">Foto Proses</label>
                                    <input type="file" name="FOTO_PROSES" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_proses')">
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
                                <option value="Lapor" selected>Lapor</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                            <?php if ($is_up3): ?>
                                <input type="hidden" name="STATUS" value="Lapor">
                            <?php endif; ?>
                        </div>

                    </div>

                    <div class="mt-4 text-end">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const dataPengaduan = {
            "Gardu Induk": ["Failed", "PMT", "Proteksi", "Kabel", "Kubikel", "lain-lain.."],
            "Gardu Hubung": ["Failed", "PMT", "Proteksi", "Kabel", "Kubikel", "Rectifier", "Baterai", "lain-lain.."],
            "Recloser": ["Failed", "PMT", "Proteksi", "Kabel", "VT", "Panel", "Baterai", "lain-lain.."],
            "LBS": ["Failed", "PMT", "Proteksi", "Kabel", "VT", "Panel", "Baterai", "lain-lain.."],
            "Radio Komunikasi": ["Failed", "Antenna", "Base Station", "HT", "lain-lain.."]
        };

        const jenisSelect = document.getElementById("jenis_pengaduan");
        const itemSelect = document.getElementById("item_pengaduan");
        const statusSelect = document.getElementById("statusSelect");
        const fotoProsesContainer = document.getElementById("fotoProsesContainer");
        const tindakLanjutContainer = document.getElementById("tindakLanjutContainer");
        const catatanContainer = document.getElementById("catatanContainer");
        const tanggalProsesContainer = document.getElementById("tanggalProsesContainer");
        const tanggalSelesaiContainer = document.getElementById("tanggalSelesaiContainer");
        const tanggalSelesaiInput = document.getElementById("tanggalSelesai");

        // Ganti isi item berdasarkan jenis pengaduan
        jenisSelect.addEventListener("change", function() {
            const selectedJenis = this.value;
            itemSelect.innerHTML = "<option value=''>-- Pilih Item Pengaduan --</option>";
            if (dataPengaduan[selectedJenis]) {
                dataPengaduan[selectedJenis].forEach(item => {
                    const opt = document.createElement("option");
                    opt.value = item;
                    opt.textContent = item;
                    itemSelect.appendChild(opt);
                });
            }
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
                preview.style.display = 'none';
            }
        }

        // Tampilkan field dinamis berdasarkan status
        statusSelect.addEventListener("change", function() {
            const value = this.value;
            fotoProsesContainer.style.display = (value === "Diproses") ? "block" : "none";
            tindakLanjutContainer.style.display = (value === "Diproses") ? "block" : "none";
            tanggalProsesContainer.style.display = (value === "Diproses") ? "block" : "none";
            catatanContainer.style.display = (value === "Selesai") ? "block" : "none";
            tanggalSelesaiContainer.style.display = (value === "Selesai") ? "block" : "none";

            if (value === "Selesai") {
                const today = new Date().toISOString().split('T')[0];
                tanggalSelesaiInput.value = today;
            } else {
                tanggalSelesaiInput.value = "";
            }
        });
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