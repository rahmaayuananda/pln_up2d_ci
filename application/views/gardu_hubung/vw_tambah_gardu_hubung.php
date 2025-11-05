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
						<!-- Fields matching database structure (same as edit form) -->
						<div class="col-md-4">
							<label class="form-label">UP3_2D</label>
							<input type="text" class="form-control" name="UP3_2D">
						</div>
						<div class="col-md-4">
							<label class="form-label">UNITNAME_UP3</label>
							<input type="text" class="form-control" name="UNITNAME_UP3">
						</div>
						<div class="col-md-4">
							<label class="form-label">CXUNIT</label>
							<input type="text" class="form-control" name="CXUNIT">
						</div>

						<div class="col-md-4">
							<label class="form-label">UNITNAME</label>
							<input type="text" class="form-control" name="UNITNAME">
						</div>
						<div class="col-md-4">
							<label class="form-label">LOCATION</label>
							<input type="text" class="form-control" name="LOCATION">
						</div>
						<div class="col-md-4">
							<label class="form-label">SSOTNUMBER <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="SSOTNUMBER" required>
						</div>

						<div class="col-md-6">
							<label class="form-label">DESCRIPTION</label>
							<input type="text" class="form-control" name="DESCRIPTION">
						</div>
						<div class="col-md-6">
							<label class="form-label">STATUS</label>
							<input type="text" class="form-control" name="STATUS">
						</div>

						<div class="col-md-4">
							<label class="form-label">TUJDNUMBER</label>
							<input type="text" class="form-control" name="TUJDNUMBER">
						</div>
						<div class="col-md-4">
							<label class="form-label">ASSETCLASSHI</label>
							<input type="text" class="form-control" name="ASSETCLASSHI">
						</div>
						<div class="col-md-4">
							<label class="form-label">SADDRESSCODE</label>
							<input type="text" class="form-control" name="SADDRESSCODE">
						</div>

						<div class="col-md-6">
							<label class="form-label">CXCLASSIFICATIONDESC</label>
							<input type="text" class="form-control" name="CXCLASSIFICATIONDESC">
						</div>
						<div class="col-md-6">
							<label class="form-label">PENYULANG</label>
							<input type="text" class="form-control" name="PENYULANG">
						</div>

						<div class="col-md-6">
							<label class="form-label">PARENT</label>
							<input type="text" class="form-control" name="PARENT">
						</div>
						<div class="col-md-6">
							<label class="form-label">PARENT_DESCRIPTION</label>
							<input type="text" class="form-control" name="PARENT_DESCRIPTION">
						</div>

						<div class="col-md-4">
							<label class="form-label">INSTALLDATE</label>
							<input type="date" class="form-control" name="INSTALLDATE">
						</div>
						<div class="col-md-4">
							<label class="form-label">ACTUALOPRDATE</label>
							<input type="date" class="form-control" name="ACTUALOPRDATE">
						</div>
						<div class="col-md-4">
							<label class="form-label">CHANGEDATE</label>
							<input type="text" class="form-control" name="CHANGEDATE">
						</div>

						<div class="col-md-4">
							<label class="form-label">CHANGEBY</label>
							<input type="text" class="form-control" name="CHANGEBY">
						</div>

						<div class="col-md-4">
							<label class="form-label">LATITUDEY</label>
							<input type="text" class="form-control" name="LATITUDEY" placeholder="Contoh: -6.2088">
						</div>
						<div class="col-md-4">
							<label class="form-label">LONGITUDEX</label>
							<input type="text" class="form-control" name="LONGITUDEX" placeholder="Contoh: 106.8456">
						</div>

						<div class="col-md-6">
							<label class="form-label">FORMATTEDADDRESS</label>
							<input type="text" class="form-control" name="FORMATTEDADDRESS">
						</div>
						<div class="col-md-6">
							<label class="form-label">STREETADDRESS</label>
							<input type="text" class="form-control" name="STREETADDRESS">
						</div>

						<div class="col-md-4">
							<label class="form-label">CITY</label>
							<input type="text" class="form-control" name="CITY">
						</div>
						<div class="col-md-4">
							<label class="form-label">ISASSET</label>
							<input type="text" class="form-control" name="ISASSET">
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS_KEPEMILIKAN</label>
							<input type="text" class="form-control" name="STATUS_KEPEMILIKAN">
						</div>

						<div class="col-md-4">
							<label class="form-label">EXTERNALREFID</label>
							<input type="text" class="form-control" name="EXTERNALREFID">
						</div>
						<div class="col-md-4">
							<label class="form-label">JENIS_PELAYANAN</label>
							<input type="text" class="form-control" name="JENIS_PELAYANAN">
						</div>
						<div class="col-md-4">
							<label class="form-label">NO_SLO</label>
							<input type="text" class="form-control" name="NO_SLO">
						</div>

						<div class="col-md-4">
							<label class="form-label">OWNERSYSID</label>
							<input type="text" class="form-control" name="OWNERSYSID">
						</div>
						<div class="col-md-4">
							<label class="form-label">SLOACTIVEDATE</label>
							<input type="date" class="form-control" name="SLOACTIVEDATE">
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS_RC</label>
							<input type="text" class="form-control" name="STATUS_RC">
						</div>

						<div class="col-md-6">
							<label class="form-label">TYPE_GARDU</label>
							<input type="text" class="form-control" name="TYPE_GARDU">
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
