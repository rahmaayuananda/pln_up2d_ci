<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="container-fluid py-4">
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-8">
						<div class="card shadow-lg custom-card">
							<div class="card-header bg-gradient-primary text-white text-center">
								<h6 class="mb-0">
									<i class="fas fa-square me-2 text-secondary"></i> Detail GH Cell (Penyulang)
								</h6>
							</div>

							<div class="card-body">
								<?php
								$fields = [
									'SSOTNUMBER_GH_CELL' => 'SSOT Number',
									'GARDU_HUBUNG'       => 'Gardu Hubung',
									'NAMA_CELL'          => 'Nama Cell',
									'JENIS_CELL'         => 'Jenis Cell',
									'STATUS_OPERASI'     => 'Status Operasi',
									'STATUS_SCADA'       => 'Status SCADA',
									'MERK_CELL'          => 'Merk Cell',
									'TYPE_CELL'          => 'Type Cell',
									'THN_CELL'           => 'Tahun Cell',
									'MERK_RELAY'         => 'Merk Relay',
									'TYPE_RELAY'         => 'Type Relay',
									'THN_RELAY'          => 'Tahun Relay',
									'RATIO_CT'           => 'Ratio CT',
								];
								foreach ($fields as $key => $label): ?>
									<div class="row mb-2">
										<div class="col-md-4 fw-bold"><?= $label; ?></div>
										<div class="col-md-8"><?= htmlentities($gh_cell[$key] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
									</div>
								<?php endforeach; ?>
							</div>

							<div class="card-footer text-center bg-light">
								<a href="<?= base_url('Gh_cell') ?>" class="btn btn-danger">
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
