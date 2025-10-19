<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="card shadow-lg custom-card">
                            <div class="card-header bg-gradient-primary text-white text-center">
                                <h6 class="mb-0">
                                    <i class="fas fa-microchip me-2 text-primary"></i> Detail Penyulang
                                </h6>
                            </div>

                            <div class="card-body">
                                <?php
                                // Gunakan keys yang sama seperti di tabel (`vw_kit_cell.php`) dan tampilkan label yang ramah
                                $fields = [
                                    'SSOTNUMBER' => 'SSOT Number',
                                    'CXUNIT' => 'Kode Unit',
                                    'UNITNAME' => 'Nama Unit',
                                    'LOCATION' => 'Lokasi',
                                    'DESCRIPTION' => 'Deskripsi',
                                    'VENDOR' => 'Vendor',
                                    'MANUFACTURER' => 'Manufacturer',
                                    'INSTALLDATE' => 'Tanggal Pasang',
                                    'PRIORITY' => 'Prioritas',
                                    'STATUS' => 'Status',
                                    'TUJDNUMBER' => 'Nomor TUJD',
                                    'CHANGEBY' => 'Diubah Oleh',
                                    'CHANGEDATE' => 'Tanggal Perubahan',
                                    'CXCLASSIFICATIONDESC' => 'Klasifikasi',
                                    'CXPENYULANG' => 'Kode Penyulang',
                                    'NAMA_LOCATION' => 'Nama Lokasi',
                                    'LONGITUDEX' => 'Longitude (X)',
                                    'LATITUDEY' => 'Latitude (Y)',
                                    'ISASSET' => 'Status Aset',
                                    'STATUS_KEPEMILIKAN' => 'Status Kepemilikan',
                                    'BURDEN' => 'Burden',
                                    'FAKTOR_KALI' => 'Faktor Kali',
                                    'JENIS_CT' => 'Jenis CT',
                                    'KELAS_CT' => 'Kelas CT',
                                    'KELAS_PROTEKSI' => 'Kelas Proteksi',
                                    'PRIMER_SEKUNDER' => 'Primer/Sekunder',
                                    'TIPE_CT' => 'Tipe CT',
                                    'OWNERSYSID' => 'Owner Sys ID',
                                    'ISOLASI_KUBIKEL' => 'Isolasi Kubikel',
                                    'JENIS_MVCELL' => 'Jenis MV Cell',
                                    'TH_BUAT' => 'Tahun Buat',
                                    'TYPE_MVCELL' => 'Type MV Cell',
                                    'CELL_TYPE' => 'Cell Type'
                                ];

                                foreach ($fields as $key => $label): ?>
                                    <div class="row mb-2">
                                        <div class="col-md-4 fw-bold text-secondary"><?= $label; ?></div>
                                        <div class="col-md-8"><?= htmlentities($kit_cell[$key] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                                    </div>
                                <?php endforeach; ?>

                                <div class="row mb-2">
                                    <div class="col-md-4 fw-bold text-secondary">ID Pembangkit (Relasi)</div>
                                    <div class="col-md-8">
                                        <?php if (!empty($kit_cell['ID_PEMBANGKIT'])): ?>
                                            <a href="<?= base_url('Pembangkit/detail/' . urlencode($kit_cell['ID_PEMBANGKIT'])); ?>" class="text-primary">[<?= htmlentities($kit_cell['ID_PEMBANGKIT']); ?>] Lihat Pembangkit</a>
                                        <?php else: ?>
                                            <em class="text-muted">Tidak terhubung</em>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center bg-light">
                                <a href="<?= base_url('Kit_cell') ?>" class="btn btn-danger">
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

<style>
    .custom-card { border-radius: 12px; max-width: 900px; margin: 0 auto; }
    .bg-gradient-primary { background: linear-gradient(90deg, #005C99, #0099CC); }
    .fw-bold { font-weight: 600; }
</style>
