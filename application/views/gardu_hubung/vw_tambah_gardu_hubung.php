<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-network-wired me-2"></i> Tambah Gardu Hubung
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Tambah Gardu Hubung</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Gardu_hubung/tambah'); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" name="SSOTNUMBER_GH" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Unit Layanan</label>
							<input type="text" class="form-control" name="UNIT_LAYANAN" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Gardu Hubung</label>
							<input type="text" class="form-control" name="GARDU_HUBUNG" required>
						</div>
						<div class="col-md-3">
							<label class="form-label">Longitude (X)</label>
							<input type="text" class="form-control" name="LONGITUDEX">
						</div>
						<div class="col-md-3">
							<label class="form-label">Latitude (Y)</label>
							<input type="text" class="form-control" name="LATITUDEY">
						</div>
						<div class="col-md-12">
							<label class="form-label">Alamat</label>
							<input type="text" class="form-control" name="ADDRESS">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status Operasi</label>
							<input type="text" class="form-control" name="STATUS_OPERASI">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status SCADA</label>
							<input type="text" class="form-control" name="STATUS_SCADA">
						</div>
						<div class="col-md-4">
							<label class="form-label">IP Gateway</label>
							<input type="text" class="form-control" name="IP_GATEWAY">
						</div>
						<div class="col-md-4">
							<label class="form-label">IP RTU</label>
							<input type="text" class="form-control" name="IP_RTU">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk RTU</label>
							<input type="text" class="form-control" name="MERK_RTU">
						</div>
						<div class="col-md-4">
							<label class="form-label">Komunikasi</label>
							<input type="text" class="form-control" name="KOMUNIKASI">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tgl Integrasi</label>
							<input type="text" class="form-control" name="TGL_INTEGRASI">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tgl Pasang Batt</label>
							<input type="text" class="form-control" name="TGL_PASANG_BATT">
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Gardu_hubung'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
