<?php $this->load->view('layout/header'); ?>
<main class="main-content position-relative border-radius-lg">
  <div class="container-fluid py-4">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <div class="card">
      <div class="card-header"><h5 class="mb-0">Status Import</h5></div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between"><span>Job ID</span><strong>#<?= (int)$job->id; ?></strong></li>
          <li class="list-group-item d-flex justify-content-between"><span>File</span><span><?= htmlspecialchars($job->original_filename); ?></span></li>
          <li class="list-group-item d-flex justify-content-between"><span>Total Rows</span><strong><?= (int)$job->total_rows; ?></strong></li>
          <li class="list-group-item d-flex justify-content-between"><span>Inserted</span><strong><?= (int)$job->inserted; ?></strong></li>
          <li class="list-group-item d-flex justify-content-between"><span>Failed</span><strong><?= (int)$job->failed; ?></strong></li>
          <li class="list-group-item d-flex justify-content-between"><span>Status</span><span class="badge bg-primary"><?= htmlspecialchars($job->status); ?></span></li>
        </ul>
        <div class="mt-3 d-flex gap-2">
          <?php
            // Map target_table to controller URL
            $controllerMap = [
              'gi' => 'gardu_induk',
              'gh' => 'gardu_hubung',
              'gi_cell' => 'gi_cell',
              'gh_cell' => 'gh_cell',
              'kit_cell' => 'kit_cell',
              'lbs_recloser' => 'Pemutus',
              'pembangkit' => 'Pembangkit',
              'unit' => 'unit',
              'ulp' => 'ulp'
            ];
            $backUrl = isset($controllerMap[$job->target_table]) ? $controllerMap[$job->target_table] : 'dashboard';
            $tableLabel = strtoupper(str_replace('_', ' ', $job->target_table));
          ?>
          <a href="<?= base_url($backUrl); ?>" class="btn btn-secondary">Kembali ke Tabel <?= htmlspecialchars($tableLabel); ?></a>
          <?php if ($job->status === 'done'): ?>
            <a href="<?= base_url('import/commit/'.$job->id); ?>" class="btn btn-success" onclick="return confirm('Pindahkan data dari staging ke tabel <?= htmlspecialchars($job->target_table); ?>?');">Commit ke Tabel <?= htmlspecialchars($tableLabel); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>
