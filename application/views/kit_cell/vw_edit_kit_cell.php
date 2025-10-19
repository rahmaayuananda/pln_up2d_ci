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
						<div class="col-md-6">
							<label class="form-label">SSOT Number</label>
							<input type="text" class="form-control" name="SSOTNUMBER" value="<?= htmlentities($kit_cell['SSOTNUMBER'] ?? ''); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Nama Pembangkit (Teks)</label>
							<input type="text" class="form-control" name="PEMBANGKIT" value="<?= htmlentities($kit_cell['PEMBANGKIT'] ?? ''); ?>" placeholder="Nama pembangkit (opsional jika pakai relasi)">
						</div>
						<div class="col-md-6">
							<label class="form-label">Nama Cell</label>
							<input type="text" class="form-control" name="NAMA_CELL" value="<?= htmlentities($kit_cell['NAMA_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Jenis Cell</label>
							<input type="text" class="form-control" name="JENIS_CELL" value="<?= htmlentities($kit_cell['JENIS_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status Operasi</label>
							<input type="text" class="form-control" name="STATUS_OPERASI" value="<?= htmlentities($kit_cell['STATUS_OPERASI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Status SCADA</label>
							<input type="text" class="form-control" name="STATUS_SCADA" value="<?= htmlentities($kit_cell['STATUS_SCADA'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Ratio CT</label>
							<input type="text" class="form-control" name="RATIO_CT" value="<?= htmlentities($kit_cell['RATIO_CT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Merk Cell</label>
							<input type="text" class="form-control" name="MERK_CELL" value="<?= htmlentities($kit_cell['MERK_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Type Cell</label>
							<input type="text" class="form-control" name="TYPE_CELL" value="<?= htmlentities($kit_cell['TYPE_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Cell</label>
							<input type="text" class="form-control" name="THN_CELL" value="<?= htmlentities($kit_cell['THN_CELL'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Merk Relay</label>
							<input type="text" class="form-control" name="MERK_RELAY" value="<?= htmlentities($kit_cell['MERK_RELAY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-6">
							<label class="form-label">Type Relay</label>
							<input type="text" class="form-control" name="TYPE_RELAY" value="<?= htmlentities($kit_cell['TYPE_RELAY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-4">
							<label class="form-label">Tahun Relay</label>
							<input type="text" class="form-control" name="THN_RELAY" value="<?= htmlentities($kit_cell['THN_RELAY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
						</div>
						<div class="col-md-8">
							<label class="form-label">Relasi ke Pembangkit (opsional)</label>
							<select class="form-select" name="ID_PEMBANGKIT">
								<option value="">-- Pilih Pembangkit --</option>
								<?php if (!empty($pembangkit_list)) : ?>
									<?php foreach ($pembangkit_list as $p) : 
										$selected = (isset($kit_cell['ID_PEMBANGKIT']) && (string)$kit_cell['ID_PEMBANGKIT'] === (string)$p['ID_PEMBANGKIT']) ? 'selected' : '';
									?>
										<option value="<?= htmlentities($p['ID_PEMBANGKIT']); ?>" <?= $selected; ?>>[<?= htmlentities($p['ID_PEMBANGKIT']); ?>] <?= htmlentities($p['NAMA_PEMBANGKIT'] ?? ($p['PEMBANGKIT'] ?? '')); ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>
							<small class="text-muted">Kosongkan jika tidak ingin mengikat ke data Pembangkit.</small>
						</div>

						<!-- Additional list-view fields (align with vw_kit_cell.php columns) -->
						<div class="col-12 mt-3">
							<h6 class="text-secondary">Additional Attributes</h6>
						</div>
						<?php
						$extra_fields = [
							'CXUNIT','UNITNAME','LOCATION','DESCRIPTION','VENDOR','MANUFACTURER','INSTALLDATE','PRIORITY','STATUS','TUJDNUMBER',
							'CHANGEBY','CHANGEDATE','CXCLASSIFICATIONDESC','CXPENYULANG','NAMA_LOCATION','LONGITUDEX','LATITUDEY',
							'ISASSET','STATUS_KEPEMILIKAN','BURDEN','FAKTOR_KALI','JENIS_CT','KELAS_CT','KELAS_PROTEKSI','PRIMER_SEKUNDER',
							'TIPE_CT','OWNERSYSID','ISOLASI_KUBIKEL','JENIS_MVCELL','TH_BUAT','TYPE_MVCELL','CELL_TYPE'
						];
						foreach ($extra_fields as $field): ?>
							<div class="col-md-4">
								<label class="form-label"><?= $field; ?></label>
								<input type="text" class="form-control" name="<?= $field; ?>" value="<?= htmlentities($kit_cell[$field] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
							</div>
						<?php endforeach; ?>
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
