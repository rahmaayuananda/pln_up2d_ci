<?php $this->load->view('layout/header'); ?>
<main class="main-content position-relative border-radius-lg">
  <div class="container-fluid py-4">
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <div class="card">
      <div class="card-header"><h5 class="mb-0">Import <?= isset($target_table) ? strtoupper($target_table) : 'GI'; ?> - Phase 1</h5></div>
      <div class="card-body">
        <p class="text-sm text-muted">Unggah file CSV (maks 10 MB). XLSX akan didukung pada langkah berikutnya.</p>
        <form action="<?= base_url('import/preview/' . ($entity ?? 'gi')); ?>" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">File CSV</label>
            <input type="file" class="form-control" name="file" accept=".csv,.xlsx" required>
          </div>
          <button class="btn btn-primary">Preview</button>
          <?php if (($entity ?? 'gi') === 'gi'): ?>
            <a href="<?= base_url('assets/sample/gi_sample.csv'); ?>" class="btn btn-info ms-2">Download Sample</a>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>
