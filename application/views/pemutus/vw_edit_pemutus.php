<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-toggle-on me-2 text-warning"></i> Edit Pemutus (LBS - RECLOSER)
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Edit Pemutus</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Pemutus/edit/' . $pemutus['SSOTNUMBER_LBSREC']); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" name="SSOTNUMBER_LBSREC" value="<?= htmlentities($pemutus['SSOTNUMBER_LBSREC'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" readonly>
						</div>
						<div class="col-md-6">
							<label class="form-label">Unit Layanan</label>
							<input type="text" class="form-control" name="UNIT_LAYANAN" value="<?= htmlentities($pemutus['UNIT_LAYANAN'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Penyulang</label>
							<input type="text" class="form-control" name="PENYULANG" value="<?= htmlentities($pemutus['PENYULANG'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Keypoint</label>
							<input type="text" class="form-control" name="KEYPOINT" value="<?= htmlentities($pemutus['KEYPOINT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Fungsi KP</label>
							<input type="text" class="form-control" name="FUNGSI_KP" value="<?= htmlentities($pemutus['FUNGSI_KP'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status SCADA</label>
							<input type="text" class="form-control" name="STATUS_SCADA" value="<?= htmlentities($pemutus['STATUS_SCADA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Media Komdat</label>
							<input type="text" class="form-control" name="MEDIA_KOMDAT" value="<?= htmlentities($pemutus['MEDIA_KOMDAT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Merk Komdat</label>
							<input type="text" class="form-control" name="MERK_KOMDAT" value="<?= htmlentities($pemutus['MERK_KOMDAT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Pemutus'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
