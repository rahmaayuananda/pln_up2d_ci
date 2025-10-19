<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-toggle-on me-2 text-warning"></i> Tambah Pemutus (LBS - RECLOSER)
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Tambah Pemutus</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Pemutus/tambah'); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
								<label class="form-label">SSOT Number</label>
								<input type="text" class="form-control" name="SSOTNUMBER" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Unit Layanan</label>
							<input type="text" class="form-control" name="UNIT_LAYANAN" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Penyulang</label>
							<input type="text" class="form-control" name="PENYULANG">
						</div>
						<div class="col-md-6">
							<label class="form-label">Keypoint</label>
							<input type="text" class="form-control" name="KEYPOINT">
						</div>
						<div class="col-md-4">
							<label class="form-label">Fungsi KP</label>
							<input type="text" class="form-control" name="FUNGSI_KP">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status SCADA</label>
							<input type="text" class="form-control" name="STATUS_SCADA">
						</div>
						<div class="col-md-4">
							<label class="form-label">Media Komdat</label>
							<input type="text" class="form-control" name="MEDIA_KOMDAT">
						</div>
						<div class="col-md-6">
							<label class="form-label">Merk Komdat</label>
							<input type="text" class="form-control" name="MERK_KOMDAT">
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Pemutus'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
