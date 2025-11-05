<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-network-wired me-2"></i> Edit Gardu Hubung
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Edit Gardu Hubung</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Gardu_hubung/edit/' . urlencode($gardu_hubung['SSOTNUMBER'] ?? $gardu_hubung['SSOTNUMBER_GH'] ?? '')); ?>" method="post">
					<input type="hidden" name="original_SSOTNUMBER" value="<?= htmlentities($gardu_hubung['SSOTNUMBER'] ?? $gardu_hubung['SSOTNUMBER_GH'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
					<div class="row g-3">
						<div class="col-md-4">
							<label class="form-label">UP3_2D</label>
							<input type="text" class="form-control" name="UP3_2D" value="<?= htmlentities($gardu_hubung['UP3_2D'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">UNITNAME_UP3</label>
							<input type="text" class="form-control" name="UNITNAME_UP3" value="<?= htmlentities($gardu_hubung['UNITNAME_UP3'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CXUNIT</label>
							<input type="text" class="form-control" name="CXUNIT" value="<?= htmlentities($gardu_hubung['CXUNIT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">UNITNAME</label>
							<input type="text" class="form-control" name="UNITNAME" value="<?= htmlentities($gardu_hubung['UNITNAME'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">LOCATION</label>
							<input type="text" class="form-control" name="LOCATION" value="<?= htmlentities($gardu_hubung['LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" name="SSOTNUMBER" value="<?= htmlentities($gardu_hubung['SSOTNUMBER'] ?? $gardu_hubung['SSOTNUMBER_GH'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-6">
							<label class="form-label">DESCRIPTION</label>
							<input type="text" class="form-control" name="DESCRIPTION" value="<?= htmlentities($gardu_hubung['DESCRIPTION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">STATUS</label>
							<input type="text" class="form-control" name="STATUS" value="<?= htmlentities($gardu_hubung['STATUS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">TUJDNUMBER</label>
							<input type="text" class="form-control" name="TUJDNUMBER" value="<?= htmlentities($gardu_hubung['TUJDNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ASSETCLASSHI</label>
							<input type="text" class="form-control" name="ASSETCLASSHI" value="<?= htmlentities($gardu_hubung['ASSETCLASSHI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">SADDRESSCODE</label>
							<input type="text" class="form-control" name="SADDRESSCODE" value="<?= htmlentities($gardu_hubung['SADDRESSCODE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-6">
							<label class="form-label">CXCLASSIFICATIONDESC</label>
							<input type="text" class="form-control" name="CXCLASSIFICATIONDESC" value="<?= htmlentities($gardu_hubung['CXCLASSIFICATIONDESC'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">PENYULANG</label>
							<input type="text" class="form-control" name="PENYULANG" value="<?= htmlentities($gardu_hubung['PENYULANG'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-6">
							<label class="form-label">PARENT</label>
							<input type="text" class="form-control" name="PARENT" value="<?= htmlentities($gardu_hubung['PARENT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">PARENT_DESCRIPTION</label>
							<input type="text" class="form-control" name="PARENT_DESCRIPTION" value="<?= htmlentities($gardu_hubung['PARENT_DESCRIPTION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">INSTALLDATE</label>
							<input type="text" class="form-control" name="INSTALLDATE" value="<?= htmlentities($gardu_hubung['INSTALLDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ACTUALOPRDATE</label>
							<input type="text" class="form-control" name="ACTUALOPRDATE" value="<?= htmlentities($gardu_hubung['ACTUALOPRDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">CHANGEDATE</label>
							<input type="text" class="form-control" name="CHANGEDATE" value="<?= htmlentities($gardu_hubung['CHANGEDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">CHANGEBY</label>
							<input type="text" class="form-control" name="CHANGEBY" value="<?= htmlentities($gardu_hubung['CHANGEBY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">Latitude (Y)</label>
							<input type="text" class="form-control" name="LATITUDEY" value="<?= htmlentities($gardu_hubung['LATITUDEY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Longitude (X)</label>
							<input type="text" class="form-control" name="LONGITUDEX" value="<?= htmlentities($gardu_hubung['LONGITUDEX'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-6">
							<label class="form-label">FORMATTEDADDRESS</label>
							<input type="text" class="form-control" name="FORMATTEDADDRESS" value="<?= htmlentities($gardu_hubung['FORMATTEDADDRESS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">STREETADDRESS</label>
							<input type="text" class="form-control" name="STREETADDRESS" value="<?= htmlentities($gardu_hubung['STREETADDRESS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">CITY</label>
							<input type="text" class="form-control" name="CITY" value="<?= htmlentities($gardu_hubung['CITY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">ISASSET</label>
							<input type="text" class="form-control" name="ISASSET" value="<?= htmlentities($gardu_hubung['ISASSET'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS_KEPEMILIKAN</label>
							<input type="text" class="form-control" name="STATUS_KEPEMILIKAN" value="<?= htmlentities($gardu_hubung['STATUS_KEPEMILIKAN'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">EXTERNALREFID</label>
							<input type="text" class="form-control" name="EXTERNALREFID" value="<?= htmlentities($gardu_hubung['EXTERNALREFID'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">JENIS_PELAYANAN</label>
							<input type="text" class="form-control" name="JENIS_PELAYANAN" value="<?= htmlentities($gardu_hubung['JENIS_PELAYANAN'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">NO_SLO</label>
							<input type="text" class="form-control" name="NO_SLO" value="<?= htmlentities($gardu_hubung['NO_SLO'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-4">
							<label class="form-label">OWNERSYSID</label>
							<input type="text" class="form-control" name="OWNERSYSID" value="<?= htmlentities($gardu_hubung['OWNERSYSID'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">SLOACTIVEDATE</label>
							<input type="text" class="form-control" name="SLOACTIVEDATE" value="<?= htmlentities($gardu_hubung['SLOACTIVEDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS_RC</label>
							<input type="text" class="form-control" name="STATUS_RC" value="<?= htmlentities($gardu_hubung['STATUS_RC'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>

						<div class="col-md-6">
							<label class="form-label">TYPE_GARDU</label>
							<input type="text" class="form-control" name="TYPE_GARDU" value="<?= htmlentities($gardu_hubung['TYPE_GARDU'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Gardu_hubung'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
