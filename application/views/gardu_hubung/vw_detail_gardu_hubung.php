<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="container-fluid py-4">
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-8">
						<div class="card shadow-lg custom-card">
							<div class="card-header bg-gradient-primary text-white text-center">
								<h6 class="mb-0">
									<i class="fas fa-network-wired me-2"></i> Detail Gardu Hubung
								</h6>
							</div>

							<div class="card-body">
								<?php
								// Gunakan keys yang sama seperti di tabel (vw_gardu_hubung.php)
								$fields = [
									'UP3_2D' => 'UP3 2D',
									'UNITNAME_UP3' => 'Unit UP3',
									'CXUNIT' => 'Kode Unit',
									'UNITNAME' => 'Nama Unit',
									'LOCATION' => 'Lokasi',
									'SSOTNUMBER' => 'SSOT Number',
									'DESCRIPTION' => 'Deskripsi / Nama Gardu',
									'STATUS' => 'Status',
									'TUJDNUMBER' => 'Nomor TUJD',
									'ASSETCLASSHI' => 'Kelas Aset',
									'SADDRESSCODE' => 'Kode Alamat',
									'CXCLASSIFICATIONDESC' => 'Klasifikasi',
									'PENYULANG' => 'Penyulang',
									'PARENT' => 'Induk (Parent)',
									'PARENT_DESCRIPTION' => 'Deskripsi Induk',
									'INSTALLDATE' => 'Tanggal Pasang',
									'ACTUALOPRDATE' => 'Tanggal Operasi',
									'CHANGEDATE' => 'Tanggal Perubahan',
									'CHANGEBY' => 'Diubah Oleh',
									'LATITUDEY' => 'Latitude (Y)',
									'LONGITUDEX' => 'Longitude (X)',
									'FORMATTEDADDRESS' => 'Alamat Lengkap',
									'STREETADDRESS' => 'Alamat Jalan',
									'CITY' => 'Kota',
									'ISASSET' => 'Status Aset',
									'STATUS_KEPEMILIKAN' => 'Status Kepemilikan',
									'EXTERNALREFID' => 'External Ref ID',
									'JENIS_PELAYANAN' => 'Jenis Pelayanan',
									'NO_SLO' => 'No SLO',
									'OWNERSYSID' => 'Owner Sys ID',
									'SLOACTIVEDATE' => 'SLO Active Date',
									'STATUS_RC' => 'Status RC',
									'TYPE_GARDU' => 'Tipe Gardu',
									// tambahan teknis jika ada
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
									'GROUNDING_OHM' => 'Grounding Ohm'
								];

								foreach ($fields as $key => $label): ?>
									<div class="row mb-2">
										<div class="col-md-4 fw-bold"><?= $label; ?></div>
										<div class="col-md-8"><?= htmlentities($gardu_hubung[$key] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
									</div>
								<?php endforeach; ?>
							</div>

							<div class="card-footer text-center bg-light">
								<a href="<?= base_url('Gardu_hubung') ?>" class="btn btn-danger">
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

    .btn-secondary {
        border-radius: 8px;
    }
</style>
