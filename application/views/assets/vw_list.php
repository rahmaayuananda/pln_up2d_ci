<main class="main-content position-relative border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= htmlentities($title) ?></li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0"><i class="fas <?= $icon ?> me-2"></i><?= htmlentities($title) ?></h6>
      </nav>
    </div>
  </nav>

  <div class="container-fluid py-4">
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= htmlentities($error) ?></div>
    <?php endif; ?>

    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="mb-0">Data <?= htmlentities($title) ?></h6>
        <!-- Placeholder for actions: add/export in future -->
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <?php foreach ($fields as $f): ?>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= htmlentities($f) ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($rows)): ?>
                <tr><td colspan="<?= count($fields) ?>" class="text-center text-secondary py-4">Belum ada data</td></tr>
              <?php else: ?>
                <?php foreach ($rows as $r): ?>
                  <tr>
                    <?php foreach ($fields as $f): ?>
                      <td class="text-sm"><?= isset($r[$f]) ? htmlentities((string)$r[$f]) : '' ?></td>
                    <?php endforeach; ?>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
