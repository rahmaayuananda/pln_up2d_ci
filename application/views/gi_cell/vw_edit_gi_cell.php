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
				<form action="<?= base_url('Gi_cell/edit/' . urlencode($gi_cell['SSOTNUMBER'] ?? $gi_cell['SSOTNUMBER_GI_CELL'] ?? '')); ?>" method="post">
					<input type="hidden" name="original_SSOTNUMBER" value="<?= htmlentities($gi_cell['SSOTNUMBER'] ?? $gi_cell['SSOTNUMBER_GI_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
					<div class="row g-3">
						<!-- Add missing fields to align with list view -->
						<div class="col-md-4">
							<label class="form-label">CXUNIT</label>
							<input type="text" class="form-control" name="CXUNIT" value="<?= htmlentities($gi_cell['CXUNIT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">UNITNAME</label>
							<input type="text" class="form-control" name="UNITNAME" value="<?= htmlentities($gi_cell['UNITNAME'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ASSETNUM</label>
							<input type="text" class="form-control" name="ASSETNUM" value="<?= htmlentities($gi_cell['ASSETNUM'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" name="SSOTNUMBER" value="<?= htmlentities($gi_cell['SSOTNUMBER'] ?? $gi_cell['SSOTNUMBER_GI_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Gardu Induk</label>
							<input type="text" class="form-control" name="GARDU_INDUK" value="<?= htmlentities($gi_cell['GARDU_INDUK'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
						</div>
						<div class="col-md-3">
							<label class="form-label">TD</label>
							<input type="text" class="form-control" name="TD" value="<?= htmlentities($gi_cell['TD'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">Kapasitas TD (MVA)</label>
							<input type="text" class="form-control" name="KAP_TD_MVA" value="<?= htmlentities($gi_cell['KAP_TD_MVA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Nama Cell</label>
							<input type="text" class="form-control" name="NAMA_CELL" value="<?= htmlentities($gi_cell['NAMA_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">LOCATION</label>
							<input type="text" class="form-control" name="LOCATION" value="<?= htmlentities($gi_cell['LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">DESCRIPTION</label>
							<input type="text" class="form-control" name="DESCRIPTION" value="<?= htmlentities($gi_cell['DESCRIPTION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">VENDOR</label>
							<input type="text" class="form-control" name="VENDOR" value="<?= htmlentities($gi_cell['VENDOR'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">MANUFACTURER</label>
							<input type="text" class="form-control" name="MANUFACTURER" value="<?= htmlentities($gi_cell['MANUFACTURER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">INSTALLDATE</label>
							<input type="text" class="form-control" name="INSTALLDATE" value="<?= htmlentities($gi_cell['INSTALLDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">PRIORITY</label>
							<input type="text" class="form-control" name="PRIORITY" value="<?= htmlentities($gi_cell['PRIORITY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS</label>
							<input type="text" class="form-control" name="STATUS" value="<?= htmlentities($gi_cell['STATUS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TUJDNUMBER</label>
							<input type="text" class="form-control" name="TUJDNUMBER" value="<?= htmlentities($gi_cell['TUJDNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CHANGEBY</label>
							<input type="text" class="form-control" name="CHANGEBY" value="<?= htmlentities($gi_cell['CHANGEBY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CHANGEDATE</label>
							<input type="text" class="form-control" name="CHANGEDATE" value="<?= htmlentities($gi_cell['CHANGEDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">CXCLASSIFICATIONDESC</label>
							<input type="text" class="form-control" name="CXCLASSIFICATIONDESC" value="<?= htmlentities($gi_cell['CXCLASSIFICATIONDESC'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">CXPENYULANG</label>
							<input type="text" class="form-control" name="CXPENYULANG" value="<?= htmlentities($gi_cell['CXPENYULANG'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">NAMA_LOCATION</label>
							<input type="text" class="form-control" name="NAMA_LOCATION" value="<?= htmlentities($gi_cell['NAMA_LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Jenis Cell</label>
							<input type="text" class="form-control" name="JENIS_CELL" value="<?= htmlentities($gi_cell['JENIS_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status Operasi</label>
							<input type="text" class="form-control" name="STATUS_OPERASI" value="<?= htmlentities($gi_cell['STATUS_OPERASI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status SCADA</label>
							<input type="text" class="form-control" name="STATUS_SCADA" value="<?= htmlentities($gi_cell['STATUS_SCADA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk Cell</label>
							<input type="text" class="form-control" name="MERK_CELL" value="<?= htmlentities($gi_cell['MERK_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Type Cell</label>
							<input type="text" class="form-control" name="TYPE_CELL" value="<?= htmlentities($gi_cell['TYPE_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Cell</label>
							<input type="text" class="form-control" name="THN_CELL" value="<?= htmlentities($gi_cell['THN_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk Relay</label>
							<input type="text" class="form-control" name="MERK_RELAY" value="<?= htmlentities($gi_cell['MERK_RELAY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Type Relay</label>
							<input type="text" class="form-control" name="TYPE_RELAY" value="<?= htmlentities($gi_cell['TYPE_RELAY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Relay</label>
							<input type="text" class="form-control" name="THN_RELAY" value="<?= htmlentities($gi_cell['THN_RELAY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Ratio CT</label>
							<input type="text" class="form-control" name="RATIO_CT" value="<?= htmlentities($gi_cell['RATIO_CT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-8">
							<label class="form-label">ID GI (Relasi, opsional)</label>
							<input type="text" class="form-control" name="ID_GI" value="<?= htmlentities($gi_cell['ID_GI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
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
