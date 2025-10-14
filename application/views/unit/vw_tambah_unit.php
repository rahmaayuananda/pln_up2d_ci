<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-building me-2 text-success"></i> Tambah Unit
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Tambah Unit</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Unit/tambah'); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">Unit Pelaksana</label>
							<input type="text" class="form-control" name="UNIT_PELAKSANA" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Unit Layanan</label>
							<input type="text" class="form-control" name="UNIT_LAYANAN" required>
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
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Unit'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
