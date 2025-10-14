<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-microchip me-2 text-primary"></i> Tambah KIT Cell
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Tambah KIT Cell</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Kit_cell/tambah'); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" name="SSOTNUMBER_KIT_CELL" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Pembangkit</label>
							<input type="text" class="form-control" name="PEMBANGKIT" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Nama Cell</label>
							<input type="text" class="form-control" name="NAMA_CELL" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Jenis Cell</label>
							<input type="text" class="form-control" name="JENIS_CELL">
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
							<label class="form-label">Ratio CT</label>
							<input type="text" class="form-control" name="RATIO_CT">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk Cell</label>
							<input type="text" class="form-control" name="MERK_CELL">
						</div>
						<div class="col-md-4">
							<label class="form-label">Type Cell</label>
							<input type="text" class="form-control" name="TYPE_CELL">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Cell</label>
							<input type="text" class="form-control" name="THN_CELL">
						</div>
						<div class="col-md-6">
							<label class="form-label">Merk Relay</label>
							<input type="text" class="form-control" name="MERK_RELAY">
						</div>
						<div class="col-md-6">
							<label class="form-label">Type Relay</label>
							<input type="text" class="form-control" name="TYPE_RELAY">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Relay</label>
							<input type="text" class="form-control" name="THN_RELAY">
						</div>
						<div class="col-md-8">
							<label class="form-label">ID Pembangkit (Relasi, opsional)</label>
							<input type="text" class="form-control" name="ID_PEMBANGKIT">
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Kit_cell'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
