<main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3"></div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white">
                <strong>Form Tambah Pengaduan</strong>
            </div>
            <div class="card-body">
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

                        <!-- Tanggal Proses (HIDDEN DEFAULT) -->
                        <div class="col-md-4" id="tanggalProsesContainer" style="display:none;">
                            <label class="form-label">Tanggal Proses</label>
                            <input type="date" name="TANGGAL_PROSES" class="form-control">
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
                            <select name="PIC" id="pic" class="form-control" required>
                                <option value="">-- Pilih PIC --</option>
                                <option value="Operasi Sistem Distribusi">Operasi Sistem Distribusi</option>
                                <option value="Fasilitas Operasi">Fasilitas Operasi</option>
                                <option value="Pemeliharaan">Pemeliharaan</option>
                                <option value="K3L & KAM">K3L & KAM</option>
                                <option value="Perencanaan">Perencanaan</option>
                            </select>
                        </div>

                        <!-- Laporan, Tindak Lanjut, Catatan -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Laporan</label>
                                    <textarea name="LAPORAN" id="laporan" rows="6" class="form-control" placeholder="Masukkan laporan pengaduan..." required></textarea>
                                </div>

                                <div class="col-md-6" id="tindakLanjutContainer" style="display:none;">
                                    <label class="form-label">Tindak Lanjut</label>
                                    <textarea name="TINDAK_LANJUT" id="tindak_lanjut" rows="6" class="form-control" placeholder="Masukkan tindak lanjut..."></textarea>
                                </div>

                                <div class="col-md-6" id="catatanContainer" style="display:none;">
                                    <label class="form-label">Catatan</label>
                                    <textarea name="CATATAN" id="catatan" rows="6" class="form-control" placeholder="Masukkan catatan jika pengaduan sudah selesai..."></textarea>
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
                                        <img id="preview_pengaduan" src="#" alt="Preview Foto Pengaduan" class="img-thumbnail rounded" style="max-width: 200px; display:none;">
                                    </div>
                                </div>

                                <div class="col-md-6" id="fotoProsesContainer" style="display:none;">
                                    <label class="form-label">Foto Proses</label>
                                    <input type="file" name="FOTO_PROSES" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_proses')">
                                    <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                                    <div class="mt-2">
                                        <img id="preview_proses" src="#" alt="Preview Foto Proses" class="img-thumbnail rounded" style="max-width: 200px; display:none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="STATUS" id="statusSelect" class="form-control" required>
                                <option value="Lapor">Lapor</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="<?= base_url('Pengaduan'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Pilihan item pengaduan
        const dataPengaduan = {
            "Gardu Induk": ["Failed", "PMT", "Proteksi", "Kabel", "Kubikel", "lain-lain.."],
            "Gardu Hubung": ["Failed", "PMT", "Proteksi", "Kabel", "Kubikel", "Rectifier", "Baterai", "lain-lain.."],
            "Recloser": ["Failed", "PMT", "Proteksi", "Kabel", "VT", "Panel", "Baterai", "lain-lain.."],
            "LBS": ["Failed", "PMT", "Proteksi", "Kabel", "VT", "Panel", "Baterai", "lain-lain.."],
            "Radio Komunikasi": ["Failed", "Antenna", "Base Station", "HT", "lain-lain.."]
        };

        const jenisSelect = document.getElementById("jenis_pengaduan");
        const itemSelect = document.getElementById("item_pengaduan");

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

        // Preview foto
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

        // Logika tampil dinamis
        const statusSelect = document.getElementById("statusSelect");
        const fotoProsesContainer = document.getElementById("fotoProsesContainer");
        const tindakLanjutContainer = document.getElementById("tindakLanjutContainer");
        const catatanContainer = document.getElementById("catatanContainer");
        const tanggalProsesContainer = document.getElementById("tanggalProsesContainer");

        statusSelect.addEventListener("change", function() {
            if (this.value === "Diproses") {
                fotoProsesContainer.style.display = "block";
                tindakLanjutContainer.style.display = "block";
                tanggalProsesContainer.style.display = "block";
                catatanContainer.style.display = "none";
            } else if (this.value === "Selesai") {
                fotoProsesContainer.style.display = "none";
                tindakLanjutContainer.style.display = "none";
                tanggalProsesContainer.style.display = "none";
                catatanContainer.style.display = "block";
            } else {
                fotoProsesContainer.style.display = "none";
                tindakLanjutContainer.style.display = "none";
                tanggalProsesContainer.style.display = "none";
                catatanContainer.style.display = "none";
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

        textarea.form-control {
            resize: vertical;
            font-size: 0.9rem;
        }
    </style>
</main>