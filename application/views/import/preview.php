<?php $this->load->view('layout/header'); ?>
<main class="main-content position-relative border-radius-lg">
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Preview 100 Baris Pertama</h5>
        <form action="<?= base_url('import/process/' . ($entity ?? 'gi')); ?>" method="post" class="mb-0">
          <input type="hidden" name="job_id" value="<?= (int)$job_id; ?>">
          <?php $isGi = (($entity ?? 'gi') === 'gi'); ?>
          <button class="btn btn-success"><?= $isGi ? 'Mulai Import ke Staging' : 'Mulai Import (Direct Append)'; ?></button>
        </form>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <?php foreach ($headers as $h): ?>
                  <th><?= htmlspecialchars($h); ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $r): ?>
                <tr>
                  <?php foreach ($r as $c): ?>
                    <td><?= htmlspecialchars($c); ?></td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('layout/footer'); ?>
