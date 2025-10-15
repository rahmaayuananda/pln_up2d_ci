<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="card shadow-lg custom-card">
                            <div class="card-header bg-gradient-primary text-white text-center">
                                <h6 class="mb-0" style="color: white;">
                                    <i class="fas fa-file-alt me-2 text-warning"></i> Detail Pengaduan
                                </h6>
                            </div>

                            <div class="card-body">
                                <?php
                                $fields = [
                                    'ID_PENGADUAN'      => 'ID Pengaduan',
                                    'NAMA_UP3'          => 'Nama UP3',
                                    'TANGGAL_PENGADUAN' => 'Tanggal Pengaduan',
                                    'JENIS_PENGADUAN'   => 'Jenis Pengaduan',
                                    'ITEM_PENGADUAN'    => 'Item Pengaduan',
                                    'LAPORAN'           => 'Laporan',
                                    'FOTO_PENGADUAN'    => 'Foto Pengaduan',
                                    'TANGGAL_PROSES'    => 'Tanggal Proses',
                                    'FOTO_PROSES'       => 'Foto Proses',
                                    'STATUS'            => 'Status',
                                    'PIC'               => 'PIC'
                                ];

                                foreach ($fields as $key => $label): ?>
                                    <div class="row mb-3">
                                        <div class="col-md-4 fw-bold"><?= $label; ?></div>
                                        <div class="col-md-8">
                                            <?php if (strpos($key, 'FOTO_') === 0 && !empty($pengaduan[$key])): ?>
                                                <?php
                                                $folder = ($key === 'FOTO_PROSES') ? 'proses' : 'pengaduan';
                                                ?>
                                                <img src="<?= base_url('uploads/' . $folder . '/' . $pengaduan[$key]); ?>"
                                                    alt="<?= $label; ?>"
                                                    class="img-thumbnail"
                                                    style="max-width: 200px;">
                                            <?php else: ?>
                                                <?= !empty($pengaduan[$key]) ? htmlspecialchars($pengaduan[$key]) : '-'; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="card-footer text-center bg-light">
                                <a href="<?= base_url('Pengaduan') ?>" class="btn btn-danger">
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
    .custom-card {
        border-radius: 12px;
        max-width: 800px;
        margin: 0 auto;
        padding: 5px 0;
    }

    .card-header {
        background: linear-gradient(90deg, #005C99, #0099CC);
        font-weight: 600;
        font-size: 16px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 12px;
    }

    .card-body {
        padding: 20px 25px;
    }

    .fw-bold {
        font-weight: 600;
        color: #003366;
    }

    .card-footer {
        border-top: 1px solid #ddd;
        padding: 15px;
    }

    .btn-danger {
        border-radius: 8px;
    }

    img.img-thumbnail {
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
    }
</style>