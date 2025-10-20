<div class="main-content position-relative border-radius-lg"><!-- 🔧 Perubahan: ditambah class untuk konsistensi -->
    <section class="section">
        <div class="section-body">
            <div class="container-fluid py-4"><!-- 🔧 Perubahan: ditambah py-4 agar jarak sama -->
                <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow border-0 rounded-4"><!-- 🔧 Perubahan: ubah ke gaya card utama -->
                            <div class="card-header bg-gradient-primary text-white text-center rounded-top-4"><!-- 🔧 Perubahan warna -->
                                <h6 class="mb-0 text-white">
                                    <i class="fas fa-file-alt me-2 text-white"></i> Detail Pengaduan
                                </h6>
                            </div>

                            <div class="card-body">
                                <!-- ID & Nama UP3 -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">ID Pengaduan</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['ID_PENGADUAN'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">Nama UP3</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['NAMA_UP3'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tanggal Pengaduan & Tanggal Proses -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">Tanggal Pengaduan</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['TANGGAL_PENGADUAN'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">Tanggal Proses</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['TANGGAL_PROSES'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Jenis & Item Pengaduan -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">Jenis Pengaduan</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['JENIS_PENGADUAN'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">Item Pengaduan</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['ITEM_PENGADUAN'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Laporan -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="detail-item">
                                            <span class="label">Laporan</span>
                                            <p class="value"><?= nl2br(htmlspecialchars($pengaduan['LAPORAN'] ?? '-')); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Foto Pengaduan & Foto Proses -->
                                <div class="row mb-4 text-center">
                                    <?php if (!empty($pengaduan['FOTO_PENGADUAN'])): ?>
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <span class="label d-block mb-2">Foto Pengaduan</span>
                                            <img src="<?= base_url('uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN']); ?>"
                                                class="img-thumbnail rounded" style="max-width: 90%;"><!-- 🔧 Perubahan: gunakan .img-thumbnail -->
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($pengaduan['FOTO_PROSES'])): ?>
                                        <div class="col-md-6">
                                            <span class="label d-block mb-2">Foto Proses</span>
                                            <img src="<?= base_url('uploads/proses/' . $pengaduan['FOTO_PROSES']); ?>"
                                                class="img-thumbnail rounded" style="max-width: 90%;"><!-- 🔧 Perubahan -->
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Status & PIC -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">Status</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['STATUS'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <span class="label">PIC</span>
                                            <p class="value"><?= htmlspecialchars($pengaduan['PIC'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center bg-light border-top">
                                <!-- 🔧 Perubahan: ganti warna tombol agar konsisten -->
                                <a href="<?= base_url('Pengaduan') ?>" class="btn btn-secondary px-4 me-2">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- STYLE TAMBAHAN -->
<style>
    /* 🔧 Perubahan: diseragamkan dengan form edit */
    .img-thumbnail {
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        transition: transform 0.2s ease-in-out;
    }

    .img-thumbnail:hover {
        transform: scale(1.03);
    }

    .form-label,
    .label {
        font-weight: 600;
        color: #2c3e50;
    }

    .value {
        color: #333;
        margin: 0;
    }

    .detail-item {
        background: #f8f9fc;
        border-radius: 10px;
        padding: 10px 15px;
        margin-bottom: 10px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .card-header {
        background: linear-gradient(90deg, #007bff, #0056d2);
        /* 🔧 Perubahan: sama dengan bg-gradient-primary */
        font-weight: 600;
        font-size: 17px;
        padding: 14px;
    }

    .card-footer {
        border-top: 1px solid #e0e0e0;
        padding: 18px;
        border-radius: 0 0 14px 14px;
    }

    .btn {
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056d2;
    }
</style>