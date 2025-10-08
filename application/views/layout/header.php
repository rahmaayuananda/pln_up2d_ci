<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/assets/img/logo_pln.png'); ?>">

  <title>PLN UP2D RIAU</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Argon Dashboard CSS -->
  <link id="pagestyle" href="<?= base_url('assets/assets/css/argon-dashboard.css?v=2.1.0'); ?>" rel="stylesheet" />

  <!-- Custom Sidebar CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/assets/css/sidebar.css'); ?>">

</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <!-- Sidebar -->
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>

      <a class="navbar-brand m-0" href="<?= base_url('dashboard'); ?>">
        <img src="<?= base_url('assets/assets/img/logo_pln.png'); ?>" alt="Logo PLN"
          class="navbar-brand-img h-100" style="height: 55px; width: auto;">
        <span class="ms-2 font-weight-bold text-dark">PLN UP2D RIAU</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>"
            href="<?= base_url('dashboard'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- Asset -->
        <li class="nav-item">
          <a href="#menuAsset"
            class="nav-link d-flex align-items-center justify-content-between 
            <?= in_array($this->uri->segment(1), ['Gardu_induk', 'Gardu_hubung', 'Ulp', 'Penyulang', 'Lbs', 'Recloser', 'Rele', 'Up3']) ? 'active text-dark' : 'text-secondary' ?>"
            data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menuAsset"
            style="font-weight: 600; background-color: transparent;">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text">Asset</span>
            </div>
          </a>
        </li>



        <div class="collapse <?= ($this->uri->segment(1) == 'Gardu_induk' || $this->uri->segment(1) == 'Gardu_hubung'
                                || $this->uri->segment(1) == 'Ulp' || $this->uri->segment(1) == 'Penyulang'
                                || $this->uri->segment(1) == 'Lbs' || $this->uri->segment(1) == 'Recloser'
                                || $this->uri->segment(1) == 'Rele' || $this->uri->segment(1) == 'Up3') ? 'show' : '' ?>" id="menuAsset">
          <ul class="nav flex-column submenu-list">

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Up3') ? 'active' : '' ?>" href="<?= base_url('Up3'); ?>">
                <i class="fas fa-industry me-2 text-primary"></i>UP3
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Gardu_induk') ? 'active' : '' ?>" href="<?= base_url('Gardu_induk'); ?>">
                <i class="fas fa-bolt me-2 text-warning"></i>GI
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Gardu_hubung') ? 'active' : '' ?>" href="<?= base_url('Gardu_hubung'); ?>">
                <i class="fas fa-network-wired me-2 text-info"></i>GH
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Ulp') ? 'active' : '' ?>" href="<?= base_url('Ulp'); ?>">
                <i class="fas fa-building me-2 text-success"></i>ULP
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Penyulang') ? 'active' : '' ?>" href="<?= base_url('Penyulang'); ?>">
                <i class="fas fa-plug me-2 text-danger"></i>Penyulang
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Lbs') ? 'active' : '' ?>" href="<?= base_url('Lbs'); ?>">
                <i class="fas fa-toggle-on me-2 text-primary"></i>LBS
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Recloser') ? 'active' : '' ?>" href="<?= base_url('Recloser'); ?>">
                <i class="fas fa-sync-alt me-2 text-warning"></i>Recloser
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Rele') ? 'active' : '' ?>" href="<?= base_url('Rele'); ?>">
                <i class="fas fa-shield-alt me-2 text-secondary"></i>Rele
              </a>
            </li>
          </ul>
        </div>
        </li>

        <!-- Billing -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/billing'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>

        <!-- Virtual Reality -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/virtual-reality'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>

        <!-- RTL -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/rtl'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>

        <!-- Account Pages -->
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Pages</h6>
        </li>

        <!-- Profile -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/profile'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>

        <!-- Sign In -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/sign-in'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-key-25 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>

        <!-- Sign Up -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/sign-up'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>
</body>

</html>