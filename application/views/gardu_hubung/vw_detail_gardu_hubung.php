<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Detail Gardu Hubung</h1>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="card shadow-lg custom-card">
                            <div class="card-header bg-gradient-primary text-white text-center">
                                <h6 class="mb-0"><i class="fas fa-network-wired me-2"></i> Detail Gardu Hubung</h6>
                            </div>
                            <div class="card-body">
                                <?php
                                $fields = [
                                    'SSOTNUMBER_GH' => 'SSOT Number',
                                    'UNIT_LAYANAN' => 'Unit Layanan',
                                    'GARDU_HUBUNG' => 'Gardu Hubung',
                                    'LONGITUDEX' => 'Longitude (X)',
                                    'LATITUDEY' => 'Latitude (Y)',
                                    'ADDRESS' => 'Alamat',
                                    'STATUS_OPERASI' => 'Status Operasi',
                                    'STATUS_SCADA' => 'Status SCADA',
                                    'IP_GATEWAY' => 'IP Gateway',
                                    'IP_RTU' => 'IP RTU',
                                    'MERK_RTU' => 'Merk RTU',
                                    'KOMUNIKASI' => 'Komunikasi',
                                    'TGL_INTEGRASI' => 'Tgl Integrasi',
                                    'TGL_PASANG_BATT' => 'Tgl Pasang Batt',
                                    'MERK_RECTI' => 'Merk Recti',
                                    'THN_RECTI' => 'Tahun Recti',
                                    'GROUNDING_OHM' => 'Grounding Ohm',
                                ];
                                foreach ($fields as $key => $label): ?>
                                    <div class="row mb-2">
                                        <div class="col-md-4 fw-bold"><?= $label; ?></div>
                                        <div class="col-md-8"><?= htmlentities($gardu_hubung[$key] ?? ''); ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="card-footer text-center bg-light">
                                <a href="<?= base_url('Gardu_hubung') ?>" class="btn btn-danger"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .custom-card { border-radius: 12px; max-width: 800px; margin: 0 auto; padding: 5px 0; }
    .card-header { background: linear-gradient(90deg, #005C99, #0099CC); font-weight: 600; font-size: 16px; border-top-left-radius: 12px; border-top-right-radius: 12px; padding: 12px; }
    .card-body { padding: 20px 25px; }
    .fw-bold { font-weight: 600; color: #003366; }
    .card-footer { border-top: 1px solid #ddd; padding: 15px; }
    .btn-danger { border-radius: 8px; }
</style>
