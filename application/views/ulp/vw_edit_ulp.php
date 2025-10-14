<main class="main-content position-relative border-radius-lg ">
	<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
		<div class="container-fluid py-1 px-3">
			<h6 class="font-weight-bolder text-white mb-0">
				<i class="fas fa-sitemap me-2 text-success"></i> Edit ULP
			</h6>
		</div>
	</nav>
	<div class="container-fluid py-4">
		<div class="card shadow border-0 rounded-4">
			<div class="card-header bg-gradient-primary text-white"><strong>Form Edit ULP</strong></div>
			<div class="card-body">
				<form action="<?= base_url('Ulp/edit/' . urlencode($ulp['CXUNIT'])); ?>" method="post">
					<div class="row g-3">
						<div class="col-md-6">
							<label class="form-label">CXUNIT</label>
							<input type="text" class="form-control" value="<?= htmlentities($ulp['CXUNIT']); ?>" disabled>
						</div>
						<div class="col-md-6">
							<label class="form-label">Nama ULP</label>
							<input type="text" class="form-control" name="NAMA_ULP" value="<?= htmlentities($ulp['NAMA_ULP']); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">UP3_2D</label>
							<input type="text" class="form-control" name="UP3_2D" value="<?= htmlentities($ulp['UP3_2D']); ?>" required>
						</div>
					</div>
					<div class="mt-4">
						<a href="<?= base_url('Ulp'); ?>" class="btn btn-secondary">Batal</a>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
