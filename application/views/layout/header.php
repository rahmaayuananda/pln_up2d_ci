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

  <!-- PLN Theme (palette + overrides) -->
  <link rel="stylesheet" href="<?= base_url('assets/assets/css/pln-theme.css'); ?>">

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
            class="nav-link d-flex align-items-center justify-content-between <?= ($this->uri->segment(1) == 'up3' || $this->uri->segment(1) == 'assets') ? 'active text-dark bg-light' : 'text-secondary' ?>"
            data-bs-toggle="collapse" role="button"
            aria-expanded="<?= ($this->uri->segment(1) == 'up3' || $this->uri->segment(1) == 'assets') ? 'true' : 'false' ?>"
            aria-controls="menuAsset"
            style="font-weight: 600;">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text">Asset</span>
            </div>
          </a>
        </li>

        <div class="collapse <?= ($this->uri->segment(1) == 'up3'
                                || $this->uri->segment(1) == 'ulp'
                                || $this->uri->segment(1) == 'unit'
                                || $this->uri->segment(1) == 'gardu_induk'
                                || $this->uri->segment(1) == 'gi_cell'
                                || $this->uri->segment(1) == 'gardu_hubung'
                                || $this->uri->segment(1) == 'assets') ? 'show' : '' ?>" id="menuAsset">

          <ul class="nav flex-column submenu-list">

            <!-- Menu UP3 -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'up3') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('up3'); ?>">
                <i class="fas fa-layer-group me-2 text-primary"></i>UP3
              </a>
            </li>

            <!-- Menu ULP -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'ulp') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('ulp'); ?>">
                <i class="fas fa-sitemap me-2 text-success"></i>ULP
              </a>
            </li>

            <!-- <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(2) == 'table' && $this->uri->segment(3) == 'unit') ? 'active' : '' ?>" href="<?= base_url('assets/table/unit'); ?>"><i class="fas fa-building me-2 text-success"></i>Unit</a></li> -->
            <!-- Menu Unit -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'unit') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('unit'); ?>">
                <i class="fas fa-building me-2 text-success"></i>Unit
              </a>
            </li>

            <!-- <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(3) == 'gi') ? 'active' : '' ?>" href="<?= base_url('assets/table/gi'); ?>"><i class="fas fa-bolt me-2 text-warning"></i>Gardu Induk</a></li> -->
            <!-- Menu Gardu Induk -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'gardu_induk') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('gardu_induk'); ?>">
                <i class="fas fa-bolt me-2 text-warning"></i>Gardu Induk
              </a>
            </li>

            <!-- <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(3) == 'gi_cell') ? 'active' : '' ?>" href="<?= base_url('assets/table/gi_cell'); ?>"><i class="fas fa-wave-square me-2 text-info"></i>GI Cell</a></li> -->
            <!-- Menu GI Cell -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'gi_cell') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('gi_cell'); ?>">
                <i class="fas fa-wave-square me-2 text-info"></i>GI Cell
              </a>
            </li>

            <!-- <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(3) == 'gh') ? 'active' : '' ?>" href="<?= base_url('assets/table/gh'); ?>"><i class="fas fa-network-wired me-2 text-primary"></i>Gardu Hubung</a></li> -->
            <!-- Menu Gardu Hubung -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'gardu_hubung') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('gardu_hubung'); ?>">
                <i class="fas fa-network-wired me-2 text-primary"></i>Gardu Hubung
              </a>
            </li>

            <!-- <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(3) == 'gh_cell') ? 'active' : '' ?>" href="<?= base_url('assets/table/gh_cell'); ?>"><i class="fas fa-square me-2 text-secondary"></i>GH Cell</a></li> -->
            <!-- Menu GH Cell -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'gh_cell') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('gh_cell'); ?>">
                <i class="fas fa-square me-2 text-secondary"></i>GH Cell
              </a>
            </li>

            <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(3) == 'pembangkit') ? 'active' : '' ?>" href="<?= base_url('assets/table/pembangkit'); ?>"><i class="fas fa-industry me-2 text-danger"></i>Pembangkit</a></li>
            <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(3) == 'kit_cell') ? 'active' : '' ?>" href="<?= base_url('assets/table/kit_cell'); ?>"><i class="fas fa-microchip me-2 text-primary"></i>KIT Cell</a></li>
            <li class="nav-item"><a class="nav-link <?= ($this->uri->segment(3) == 'lbs_recloser') ? 'active' : '' ?>" href="<?= base_url('assets/table/lbs_recloser'); ?>"><i class="fas fa-toggle-on me-2 text-warning"></i>LBS / Recloser</a></li>
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
  <!-- header ends; footer view will close the document -->
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('chart-line').getContext('2d');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
          label: 'Sales',
          data: [50, 60, 70, 80, 90, 100, 110],
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 3,
          tension: 0.4,
          fill: false,
          pointBackgroundColor: 'rgba(75, 192, 192, 1)',
          pointRadius: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              color: 'rgba(200, 200, 200, 0.2)',
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      }
    });
  </script>
</body>