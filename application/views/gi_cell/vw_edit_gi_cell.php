<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-wave-square me-2 text-info"></i> Edit GI Cell
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Edit GI Cell</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Gi_cell/edit/' . urlencode($gi_cell['SSOTNUMBER_GI_CELL'])); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" value="<?= htmlentities($gi_cell['SSOTNUMBER_GI_CELL']); ?>" disabled>
						</div>
						<div class="col-md-6">
							<label class="form-label">Gardu Induk</label>
							<input type="text" class="form-control" name="GARDU_INDUK" value="<?= htmlentities($gi_cell['GARDU_INDUK']); ?>" required>
						</div>
						<div class="col-md-3">
							<label class="form-label">TD</label>
							<input type="text" class="form-control" name="TD" value="<?= htmlentities($gi_cell['TD']); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">Kapasitas TD (MVA)</label>
							<input type="text" class="form-control" name="KAP_TD_MVA" value="<?= htmlentities($gi_cell['KAP_TD_MVA']); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Nama Cell</label>
							<input type="text" class="form-control" name="NAMA_CELL" value="<?= htmlentities($gi_cell['NAMA_CELL']); ?>" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">Jenis Cell</label>
							<input type="text" class="form-control" name="JENIS_CELL" value="<?= htmlentities($gi_cell['JENIS_CELL']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status Operasi</label>
							<input type="text" class="form-control" name="STATUS_OPERASI" value="<?= htmlentities($gi_cell['STATUS_OPERASI']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status SCADA</label>
							<input type="text" class="form-control" name="STATUS_SCADA" value="<?= htmlentities($gi_cell['STATUS_SCADA']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk Cell</label>
							<input type="text" class="form-control" name="MERK_CELL" value="<?= htmlentities($gi_cell['MERK_CELL']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Type Cell</label>
							<input type="text" class="form-control" name="TYPE_CELL" value="<?= htmlentities($gi_cell['TYPE_CELL']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Cell</label>
							<input type="text" class="form-control" name="THN_CELL" value="<?= htmlentities($gi_cell['THN_CELL']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk Relay</label>
							<input type="text" class="form-control" name="MERK_RELAY" value="<?= htmlentities($gi_cell['MERK_RELAY']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Type Relay</label>
							<input type="text" class="form-control" name="TYPE_RELAY" value="<?= htmlentities($gi_cell['TYPE_RELAY']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Relay</label>
							<input type="text" class="form-control" name="THN_RELAY" value="<?= htmlentities($gi_cell['THN_RELAY']); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Ratio CT</label>
							<input type="text" class="form-control" name="RATIO_CT" value="<?= htmlentities($gi_cell['RATIO_CT']); ?>">
						</div>
						<div class="col-md-8">
							<label class="form-label">ID GI (Relasi, opsional)</label>
							<input type="text" class="form-control" name="ID_GI" value="<?= htmlentities($gi_cell['ID_GI']); ?>">
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Gi_cell'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
