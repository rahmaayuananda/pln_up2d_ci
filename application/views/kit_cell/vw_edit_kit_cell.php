<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-microchip me-2 text-primary"></i> Edit Penyulang
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Edit KIT Cell</strong></div>
			<div class="card-body">
				<?php if ($this->session->flashdata('error')): ?>
					<div class="alert alert-danger text-white">
						<?= $this->session->flashdata('error'); ?>
					</div>
				<?php endif; ?>
				<form action="<?= base_url('Kit_cell/edit/' . urlencode($kit_cell['SSOTNUMBER'] ?? '')); ?>" method="post">
					<input type="hidden" name="original_SSOTNUMBER" value="<?= htmlentities($kit_cell['SSOTNUMBER'] ?? ''); ?>">
					<div class="row g-3">
						<!-- 34 database columns from kit_cell table -->
						<div class="col-md-4">
							<label class="form-label">CXUNIT</label>
							<input type="text" class="form-control" name="CXUNIT" value="<?= htmlentities($kit_cell['CXUNIT'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">UNITNAME</label>
							<input type="text" class="form-control" name="UNITNAME" value="<?= htmlentities($kit_cell['UNITNAME'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ASSETNUM</label>
							<input type="text" class="form-control" name="ASSETNUM" value="<?= htmlentities($kit_cell['ASSETNUM'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">SSOTNUMBER <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="SSOTNUMBER" value="<?= htmlentities($kit_cell['SSOTNUMBER'] ?? ''); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">LOCATION</label>
							<input type="text" class="form-control" name="LOCATION" value="<?= htmlentities($kit_cell['LOCATION'] ?? ''); ?>">
						</div>
						<div class="col-md-12">
							<label class="form-label">DESCRIPTION</label>
							<textarea class="form-control" name="DESCRIPTION" rows="2"><?= htmlentities($kit_cell['DESCRIPTION'] ?? ''); ?></textarea>
						</div>
						<div class="col-md-4">
							<label class="form-label">VENDOR</label>
							<input type="text" class="form-control" name="VENDOR" value="<?= htmlentities($kit_cell['VENDOR'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">MANUFACTURER</label>
							<input type="text" class="form-control" name="MANUFACTURER" value="<?= htmlentities($kit_cell['MANUFACTURER'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">INSTALLDATE</label>
							<input type="date" class="form-control" name="INSTALLDATE" value="<?= htmlentities($kit_cell['INSTALLDATE'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">PRIORITY</label>
							<input type="text" class="form-control" name="PRIORITY" value="<?= htmlentities($kit_cell['PRIORITY'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">STATUS</label>
							<input type="text" class="form-control" name="STATUS" value="<?= htmlentities($kit_cell['STATUS'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">TUJDNUMBER</label>
							<input type="text" class="form-control" name="TUJDNUMBER" value="<?= htmlentities($kit_cell['TUJDNUMBER'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">CHANGEBY</label>
							<input type="text" class="form-control" name="CHANGEBY" value="<?= htmlentities($kit_cell['CHANGEBY'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CHANGEDATE</label>
							<input type="date" class="form-control" name="CHANGEDATE" value="<?= htmlentities($kit_cell['CHANGEDATE'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CXCLASSIFICATIONDESC</label>
							<input type="text" class="form-control" name="CXCLASSIFICATIONDESC" value="<?= htmlentities($kit_cell['CXCLASSIFICATIONDESC'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CXPENYULANG</label>
							<input type="text" class="form-control" name="CXPENYULANG" value="<?= htmlentities($kit_cell['CXPENYULANG'] ?? ''); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">NAMA_LOCATION</label>
							<input type="text" class="form-control" name="NAMA_LOCATION" value="<?= htmlentities($kit_cell['NAMA_LOCATION'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">LONGITUDEX</label>
							<input type="text" class="form-control" name="LONGITUDEX" value="<?= htmlentities($kit_cell['LONGITUDEX'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">LATITUDEY</label>
							<input type="text" class="form-control" name="LATITUDEY" value="<?= htmlentities($kit_cell['LATITUDEY'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">ISASSET</label>
							<input type="text" class="form-control" name="ISASSET" value="<?= htmlentities($kit_cell['ISASSET'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">STATUS_KEPEMILIKAN</label>
							<input type="text" class="form-control" name="STATUS_KEPEMILIKAN" value="<?= htmlentities($kit_cell['STATUS_KEPEMILIKAN'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">BURDEN</label>
							<input type="text" class="form-control" name="BURDEN" value="<?= htmlentities($kit_cell['BURDEN'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">FAKTOR_KALI</label>
							<input type="text" class="form-control" name="FAKTOR_KALI" value="<?= htmlentities($kit_cell['FAKTOR_KALI'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">JENIS_CT</label>
							<input type="text" class="form-control" name="JENIS_CT" value="<?= htmlentities($kit_cell['JENIS_CT'] ?? ''); ?>">
						</div>
						<div class="col-md-3">
							<label class="form-label">KELAS_CT</label>
							<input type="text" class="form-control" name="KELAS_CT" value="<?= htmlentities($kit_cell['KELAS_CT'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">KELAS_PROTEKSI</label>
							<input type="text" class="form-control" name="KELAS_PROTEKSI" value="<?= htmlentities($kit_cell['KELAS_PROTEKSI'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">PRIMER_SEKUNDER</label>
							<input type="text" class="form-control" name="PRIMER_SEKUNDER" value="<?= htmlentities($kit_cell['PRIMER_SEKUNDER'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TIPE_CT</label>
							<input type="text" class="form-control" name="TIPE_CT" value="<?= htmlentities($kit_cell['TIPE_CT'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">OWNERSYSID</label>
							<input type="text" class="form-control" name="OWNERSYSID" value="<?= htmlentities($kit_cell['OWNERSYSID'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ISOLASI_KUBIKEL</label>
							<input type="text" class="form-control" name="ISOLASI_KUBIKEL" value="<?= htmlentities($kit_cell['ISOLASI_KUBIKEL'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">JENIS_MVCELL</label>
							<input type="text" class="form-control" name="JENIS_MVCELL" value="<?= htmlentities($kit_cell['JENIS_MVCELL'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TH_BUAT</label>
							<input type="text" class="form-control" name="TH_BUAT" value="<?= htmlentities($kit_cell['TH_BUAT'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TYPE_MVCELL</label>
							<input type="text" class="form-control" name="TYPE_MVCELL" value="<?= htmlentities($kit_cell['TYPE_MVCELL'] ?? ''); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CELL_TYPE</label>
							<select class="form-select" name="CELL_TYPE">
								<option value="">-- Pilih --</option>
								<option value="CT" <?= (isset($kit_cell['CELL_TYPE']) && $kit_cell['CELL_TYPE'] == 'CT') ? 'selected' : ''; ?>>CT</option>
								<option value="MVCELL" <?= (isset($kit_cell['CELL_TYPE']) && $kit_cell['CELL_TYPE'] == 'MVCELL') ? 'selected' : ''; ?>>MVCELL</option>
							</select>
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Kit_cell'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
