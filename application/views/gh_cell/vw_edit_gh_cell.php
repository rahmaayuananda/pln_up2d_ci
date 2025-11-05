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
					<input type="hidden" name="original_SSOTNUMBER" value="<?= htmlentities($gh_cell['SSOTNUMBER'] ?? ''); ?>">
					<div class="row g-3">
						<!-- Only fields that exist in database (34 columns) -->
						<div class="col-md-4">
							<label class="form-label">CXUNIT</label>
							<input type="text" class="form-control" name="CXUNIT" value="<?= htmlentities($gh_cell['CXUNIT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">UNITNAME</label>
							<input type="text" class="form-control" name="UNITNAME" value="<?= htmlentities($gh_cell['UNITNAME'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ASSETNUM</label>
							<input type="number" class="form-control" name="ASSETNUM" value="<?= htmlentities($gh_cell['ASSETNUM'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">SSOTNUMBER</label>
							<input type="text" class="form-control" name="SSOTNUMBER" value="<?= htmlentities($gh_cell['SSOTNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">LOCATION</label>
							<input type="text" class="form-control" name="LOCATION" value="<?= htmlentities($gh_cell['LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-12">
							<label class="form-label">DESCRIPTION</label>
							<input type="text" class="form-control" name="DESCRIPTION" value="<?= htmlentities($gh_cell['DESCRIPTION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">VENDOR</label>
							<input type="text" class="form-control" name="VENDOR" value="<?= htmlentities($gh_cell['VENDOR'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">MANUFACTURER</label>
							<input type="text" class="form-control" name="MANUFACTURER" value="<?= htmlentities($gh_cell['MANUFACTURER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">INSTALLDATE</label>
							<input type="date" class="form-control" name="INSTALLDATE" value="<?= htmlentities($gh_cell['INSTALLDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">PRIORITY</label>
							<input type="text" class="form-control" name="PRIORITY" value="<?= htmlentities($gh_cell['PRIORITY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS</label>
							<input type="text" class="form-control" name="STATUS" value="<?= htmlentities($gh_cell['STATUS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TUJDNUMBER</label>
							<input type="text" class="form-control" name="TUJDNUMBER" value="<?= htmlentities($gh_cell['TUJDNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CHANGEBY</label>
							<input type="text" class="form-control" name="CHANGEBY" value="<?= htmlentities($gh_cell['CHANGEBY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CHANGEDATE</label>
							<input type="text" class="form-control" name="CHANGEDATE" value="<?= htmlentities($gh_cell['CHANGEDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">CXCLASSIFICATIONDESC</label>
							<input type="text" class="form-control" name="CXCLASSIFICATIONDESC" value="<?= htmlentities($gh_cell['CXCLASSIFICATIONDESC'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">CXPENYULANG</label>
							<input type="text" class="form-control" name="CXPENYULANG" value="<?= htmlentities($gh_cell['CXPENYULANG'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-12">
							<label class="form-label">NAMA_LOCATION</label>
							<input type="text" class="form-control" name="NAMA_LOCATION" value="<?= htmlentities($gh_cell['NAMA_LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">LONGITUDEX</label>
							<input type="text" class="form-control" name="LONGITUDEX" value="<?= htmlentities($gh_cell['LONGITUDEX'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">LATITUDEY</label>
							<input type="text" class="form-control" name="LATITUDEY" value="<?= htmlentities($gh_cell['LATITUDEY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ISASSET</label>
							<input type="text" class="form-control" name="ISASSET" value="<?= htmlentities($gh_cell['ISASSET'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS_KEPEMILIKAN</label>
							<input type="text" class="form-control" name="STATUS_KEPEMILIKAN" value="<?= htmlentities($gh_cell['STATUS_KEPEMILIKAN'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">BURDEN</label>
							<input type="number" class="form-control" name="BURDEN" value="<?= htmlentities($gh_cell['BURDEN'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">FAKTOR_KALI</label>
							<input type="text" class="form-control" name="FAKTOR_KALI" value="<?= htmlentities($gh_cell['FAKTOR_KALI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">JENIS_CT</label>
							<input type="text" class="form-control" name="JENIS_CT" value="<?= htmlentities($gh_cell['JENIS_CT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">KELAS_CT</label>
							<input type="text" class="form-control" name="KELAS_CT" value="<?= htmlentities($gh_cell['KELAS_CT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">KELAS_PROTEKSI</label>
							<input type="text" class="form-control" name="KELAS_PROTEKSI" value="<?= htmlentities($gh_cell['KELAS_PROTEKSI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">PRIMER_SEKUNDER</label>
							<input type="text" class="form-control" name="PRIMER_SEKUNDER" value="<?= htmlentities($gh_cell['PRIMER_SEKUNDER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TIPE_CT</label>
							<input type="text" class="form-control" name="TIPE_CT" value="<?= htmlentities($gh_cell['TIPE_CT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">OWNERSYSID</label>
							<input type="text" class="form-control" name="OWNERSYSID" value="<?= htmlentities($gh_cell['OWNERSYSID'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ISOLASI_KUBIKEL</label>
							<input type="text" class="form-control" name="ISOLASI_KUBIKEL" value="<?= htmlentities($gh_cell['ISOLASI_KUBIKEL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">JENIS_MVCELL</label>
							<input type="text" class="form-control" name="JENIS_MVCELL" value="<?= htmlentities($gh_cell['JENIS_MVCELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TH_BUAT</label>
							<input type="text" class="form-control" name="TH_BUAT" value="<?= htmlentities($gh_cell['TH_BUAT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">TYPE_MVCELL</label>
							<input type="text" class="form-control" name="TYPE_MVCELL" value="<?= htmlentities($gh_cell['TYPE_MVCELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CELL_TYPE</label>
							<select class="form-control" name="CELL_TYPE">
								<option value="">-- Pilih --</option>
								<option value="CT" <?= (isset($gh_cell['CELL_TYPE']) && $gh_cell['CELL_TYPE'] == 'CT') ? 'selected' : ''; ?>>CT</option>
								<option value="MVCELL" <?= (isset($gh_cell['CELL_TYPE']) && $gh_cell['CELL_TYPE'] == 'MVCELL') ? 'selected' : ''; ?>>MVCELL</option>
							</select>
						</div>
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
