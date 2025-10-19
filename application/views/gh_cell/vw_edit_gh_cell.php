<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-square me-2 text-secondary"></i> Edit GH Cell
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Edit GH Cell</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Gh_cell/edit/' . urlencode($gh_cell['SSOTNUMBER'] ?? '')); ?>" method="post">
					<div class="row g-3">
						<input type="hidden" name="original_SSOTNUMBER" value="<?= htmlentities($gh_cell['SSOTNUMBER'] ?? ''); ?>">
						<div class="col-md-6">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" name="SSOTNUMBER" value="<?= htmlentities($gh_cell['SSOTNUMBER'] ?? ''); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">CX Unit</label>
							<input type="text" class="form-control" name="CXUNIT" value="<?= htmlentities($gh_cell['CXUNIT'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Unit Name</label>
							<input type="text" class="form-control" name="UNITNAME" value="<?= htmlentities($gh_cell['UNITNAME'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Asset Number</label>
							<input type="text" class="form-control" name="ASSETNUM" value="<?= htmlentities($gh_cell['ASSETNUM'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Gardu Hubung</label>
							<input type="text" class="form-control" name="GARDU_HUBUNG" value="<?= htmlentities($gh_cell['GARDU_HUBUNG'] ?? ''); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Nama Cell</label>
							<input type="text" class="form-control" name="NAMA_CELL" value="<?= htmlentities($gh_cell['NAMA_CELL'] ?? ''); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Jenis Cell</label>
							<input type="text" class="form-control" name="JENIS_CELL" value="<?= htmlentities($gh_cell['JENIS_CELL'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status Operasi</label>
							<input type="text" class="form-control" name="STATUS_OPERASI" value="<?= htmlentities($gh_cell['STATUS_OPERASI'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status SCADA</label>
							<input type="text" class="form-control" name="STATUS_SCADA" value="<?= htmlentities($gh_cell['STATUS_SCADA'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Ratio CT</label>
							<input type="text" class="form-control" name="RATIO_CT" value="<?= htmlentities($gh_cell['RATIO_CT'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk Cell</label>
							<input type="text" class="form-control" name="MERK_CELL" value="<?= htmlentities($gh_cell['MERK_CELL'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Type Cell</label>
							<input type="text" class="form-control" name="TYPE_CELL" value="<?= htmlentities($gh_cell['TYPE_CELL'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Cell</label>
							<input type="text" class="form-control" name="THN_CELL" value="<?= htmlentities($gh_cell['THN_CELL'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Merk Relay</label>
							<input type="text" class="form-control" name="MERK_RELAY" value="<?= htmlentities($gh_cell['MERK_RELAY'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Type Relay</label>
							<input type="text" class="form-control" name="TYPE_RELAY" value="<?= htmlentities($gh_cell['TYPE_RELAY'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Tahun Relay</label>
							<input type="text" class="form-control" name="THN_RELAY" value="<?= htmlentities($gh_cell['THN_RELAY'] ?? ''); ?>">
						</div>

						<!-- Additional list-view fields -->
						<div class="col-12 mt-2">
							<h6 class="text-secondary">Additional Attributes</h6>
						</div>
						<?php
						$extra_fields = [
							'LOCATION','DESCRIPTION','VENDOR','MANUFACTURER','INSTALLDATE','PRIORITY','STATUS','TUJDNUMBER',
							'CHANGEBY','CHANGEDATE','CXCLASSIFICATIONDESC','CXPENYULANG','NAMA_LOCATION','LONGITUDEX','LATITUDEY',
							'ISASSET','STATUS_KEPEMILIKAN','BURDEN','FAKTOR_KALI','JENIS_CT','KELAS_CT','KELAS_PROTEKSI','PRIMER_SEKUNDER',
							'TIPE_CT','OWNERSYSID','ISOLASI_KUBIKEL','JENIS_MVCELL','TH_BUAT','TYPE_MVCELL','CELL_TYPE'
						];
						foreach ($extra_fields as $field): ?>
							<div class="col-md-4">
								<label class="form-label"><?= $field; ?></label>
								<input type="text" class="form-control" name="<?= $field; ?>" value="<?= htmlentities($gh_cell[$field] ?? ''); ?>">
							</div>
						<?php endforeach; ?>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Gh_cell'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
