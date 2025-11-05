<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-toggle-on me-2 text-warning"></i> Tambah Pemutus (LBS - RECLOSER)
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Tambah Pemutus</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Pemutus/tambah'); ?>" method="post">
					<div class="row g-3">
						<!-- 31 database columns from lbs_recloser table (correct structure) -->
						<div class="col-md-4">
							<label class="form-label">CXUNIT</label>
							<input type="text" class="form-control" name="CXUNIT">
						</div>
						<div class="col-md-4">
							<label class="form-label">UNITNAME</label>
							<input type="text" class="form-control" name="UNITNAME">
						</div>
						<div class="col-md-4">
							<label class="form-label">UP3_2D</label>
							<input type="text" class="form-control" name="UP3_2D">
						</div>
						<div class="col-md-4">
							<label class="form-label">ASSETNUM</label>
							<input type="text" class="form-control" name="ASSETNUM">
						</div>
						<div class="col-md-8">
							<label class="form-label">SSOTNUMBER <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="SSOTNUMBER" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">LOCATION</label>
							<input type="text" class="form-control" name="LOCATION">
						</div>
						<div class="col-md-6">
							<label class="form-label">NAMA_LOCATION</label>
							<input type="text" class="form-control" name="NAMA_LOCATION">
						</div>
						<div class="col-md-12">
							<label class="form-label">DESCRIPTION</label>
							<textarea class="form-control" name="DESCRIPTION" rows="2"></textarea>
						</div>
						<div class="col-md-4">
							<label class="form-label">VENDOR</label>
							<input type="text" class="form-control" name="VENDOR">
						</div>
						<div class="col-md-4">
							<label class="form-label">MANUFACTURER</label>
							<input type="text" class="form-control" name="MANUFACTURER">
						</div>
						<div class="col-md-4">
							<label class="form-label">INSTALLDATE</label>
							<input type="date" class="form-control" name="INSTALLDATE">
						</div>
						<div class="col-md-3">
							<label class="form-label">PRIORITY</label>
							<input type="number" class="form-control" name="PRIORITY">
						</div>
						<div class="col-md-3">
							<label class="form-label">STATUS</label>
							<input type="text" class="form-control" name="STATUS">
						</div>
						<div class="col-md-3">
							<label class="form-label">TUJDNUMBER</label>
							<input type="text" class="form-control" name="TUJDNUMBER">
						</div>
						<div class="col-md-3">
							<label class="form-label">CHANGEBY</label>
							<input type="text" class="form-control" name="CHANGEBY">
						</div>
						<div class="col-md-6">
							<label class="form-label">CHANGEDATE</label>
							<input type="datetime-local" class="form-control" name="CHANGEDATE">
						</div>
						<div class="col-md-6">
							<label class="form-label">CXCLASSIFICATIONDESC</label>
							<input type="text" class="form-control" name="CXCLASSIFICATIONDESC">
						</div>
						<div class="col-md-3">
							<label class="form-label">LONGITUDEX</label>
							<input type="text" class="form-control" name="LONGITUDEX">
						</div>
						<div class="col-md-3">
							<label class="form-label">LATITUDEY</label>
							<input type="text" class="form-control" name="LATITUDEY">
						</div>
						<div class="col-md-3">
							<label class="form-label">ISASSET</label>
							<select class="form-select" name="ISASSET">
								<option value="">-- Pilih --</option>
								<option value="1">Ya</option>
								<option value="0">Tidak</option>
							</select>
						</div>
						<div class="col-md-3">
							<label class="form-label">PEREDAM</label>
							<select class="form-select" name="PEREDAM">
								<option value="">-- Pilih --</option>
								<option value="VACUUM">VACUUM</option>
								<option value="SF6">SF6</option>
								<option value="MINYAK">MINYAK</option>
							</select>
						</div>
						<div class="col-md-4">
							<label class="form-label">STATUS_KEPEMILIKAN</label>
							<input type="text" class="form-control" name="STATUS_KEPEMILIKAN">
						</div>
						<div class="col-md-4">
							<label class="form-label">CXPENYULANG</label>
							<input type="text" class="form-control" name="CXPENYULANG">
						</div>
						<div class="col-md-4">
							<label class="form-label">TH_BUAT</label>
							<input type="text" class="form-control" name="TH_BUAT">
						</div>
						<div class="col-md-4">
							<label class="form-label">TYPE_LBS</label>
							<select class="form-select" name="TYPE_LBS">
								<option value="">-- Pilih --</option>
								<option value="BERBEBAN">BERBEBAN</option>
								<option value="TIDAK BERBEBAN">TIDAK BERBEBAN</option>
							</select>
						</div>
						<div class="col-md-4">
							<label class="form-label">MODE_OPERASI (Recloser)</label>
							<input type="text" class="form-control" name="MODE_OPERASI">
						</div>
						<div class="col-md-4">
							<label class="form-label">TYPE_RECLOSER</label>
							<input type="text" class="form-control" name="TYPE_RECLOSER">
						</div>
						<div class="col-md-4">
							<label class="form-label">MODE_OPR (Sectio)</label>
							<select class="form-select" name="MODE_OPR">
								<option value="">-- Pilih --</option>
								<option value="Remote">Remote</option>
								<option value="Manual">Manual</option>
							</select>
						</div>
						<div class="col-md-4">
							<label class="form-label">TYPE_OPERASI</label>
							<select class="form-select" name="TYPE_OPERASI">
								<option value="">-- Pilih --</option>
								<option value="BERTEGANGAN">BERTEGANGAN</option>
								<option value="TIDAK BERTEGANGAN">TIDAK BERTEGANGAN</option>
							</select>
						</div>
						<div class="col-md-4">
							<label class="form-label">TYPE_SECTIONALIZER</label>
							<select class="form-select" name="TYPE_SECTIONALIZER">
								<option value="">-- Pilih --</option>
								<option value="BERBEBAN">BERBEBAN</option>
								<option value="TIDAK BERBEBAN">TIDAK BERBEBAN</option>
							</select>
						</div>
						<div class="col-md-12">
							<label class="form-label">PEMUTUS_TYPE <span class="text-danger">*</span></label>
							<select class="form-select" name="PEMUTUS_TYPE" required>
								<option value="">-- Pilih Type Pemutus --</option>
								<option value="LBS">LBS</option>
								<option value="RECLOSER">RECLOSER</option>
								<option value="SECTIONALIZER">SECTIONALIZER</option>
							</select>
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Pemutus'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
