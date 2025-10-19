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
            class="nav-link d-flex align-items-center justify-content-between 
            <?= (
              $this->uri->segment(1) == 'unit' ||
              $this->uri->segment(1) == 'ulp' ||
              $this->uri->segment(1) == 'gardu_induk' ||
              $this->uri->segment(1) == 'gi_cell' ||
              $this->uri->segment(1) == 'gardu_hubung' ||
              $this->uri->segment(1) == 'gh_cell' ||
              $this->uri->segment(1) == 'Pembangkit' ||
              $this->uri->segment(1) == 'Kit_cell' ||
              $this->uri->segment(1) == 'Pemutus' ||
              $this->uri->segment(1) == 'assets'
            ) ? 'active text-dark bg-light' : 'text-secondary' ?>"
            data-bs-toggle="collapse"
            role="button"
            aria-expanded="<?= (
                              $this->uri->segment(1) == 'unit' ||
                              $this->uri->segment(1) == 'ulp' ||
                              $this->uri->segment(1) == 'gardu_induk' ||
                              $this->uri->segment(1) == 'gi_cell' ||
                              $this->uri->segment(1) == 'gardu_hubung' ||
                              $this->uri->segment(1) == 'gh_cell' ||
                              $this->uri->segment(1) == 'Pembangkit' ||
                              $this->uri->segment(1) == 'Kit_cell' ||
                              $this->uri->segment(1) == 'Pemutus' ||
                              $this->uri->segment(1) == 'assets'
                            ) ? 'true' : 'false' ?>"
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

        <!-- Submenu -->
        <div class="collapse <?= (
                                $this->uri->segment(1) == 'unit' ||
                                $this->uri->segment(1) == 'ulp' ||
                                $this->uri->segment(1) == 'gardu_induk' ||
                                $this->uri->segment(1) == 'gi_cell' ||
                                $this->uri->segment(1) == 'gardu_hubung' ||
                                $this->uri->segment(1) == 'gh_cell' ||
                                $this->uri->segment(1) == 'Pembangkit' ||
                                $this->uri->segment(1) == 'Kit_cell' ||
                                $this->uri->segment(1) == 'Pemutus' ||
                                $this->uri->segment(1) == 'assets'
                              ) ? 'show' : '' ?>" id="menuAsset">

          <ul class="nav flex-column submenu-list">
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
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'gi_cell') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('gi_cell'); ?>">
                <i class="fas fa-wave-square me-2 text-info"></i>GI Penyulang
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'gardu_hubung') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('gardu_hubung'); ?>">
                <i class="fas fa-network-wired me-2 text-primary"></i>Gardu Hubung
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'gh_cell') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('gh_cell'); ?>">
                <i class="fas fa-square me-2 text-secondary"></i>GH Penyulang
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Pembangkit') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('Pembangkit'); ?>">
                <i class="fas fa-industry me-2 text-danger"></i>Pembangkit
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Kit_cell') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('Kit_cell'); ?>">
                <i class="fas fa-microchip me-2 text-primary"></i>Kit Penyulang
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'Pemutus') ? 'active bg-primary text-white' : '' ?>" href="<?= base_url('Pemutus'); ?>">
                <i class="fas fa-toggle-on me-2 text-warning"></i>Pemutus
              </a>
            </li>
          </ul>
        </div>

        <!-- Pengaduan -->
        <li class="nav-item">
          <a class="nav-link <?= ($this->uri->segment(1) == 'pengaduan') ? 'active' : '' ?>"
            href="<?= base_url('pengaduan'); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="ni ni-credit-card text-dark text-sm opacity-10"></i> -->
              <i class="fas fa-file-alt text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaduan</span>
          </a>
        </li>

        <!-- Pustaka -->
        <li class="nav-item">
          <a href="#menuPustaka"
            class="nav-link d-flex align-items-center justify-content-between <?= (
                                                                                in_array($this->uri->segment(1), ['sop', 'bpm', 'ik', 'road_map', 'spln'])
                                                                              ) ? 'active' : '' ?>"
            data-bs-toggle="collapse"
            role="button"
            aria-expanded="<?= in_array($this->uri->segment(1), ['sop', 'bpm', 'ik', 'road_map', 'spln']) ? 'true' : 'false' ?>"
            aria-controls="menuPustaka">
            <div class="d-flex align-items-center">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pustaka</span>
            </div>
          </a>
        </li>

        <!-- Submenu Pustaka -->
        <div class="collapse <?= in_array($this->uri->segment(1), ['sop', 'bpm', 'ik', 'road_map', 'spln']) ? 'show' : '' ?>"
          id="menuPustaka">
          <ul class="nav flex-column submenu-list">

            <!-- Submenu SOP -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'sop') ? 'active' : '' ?>"
                href="<?= base_url('sop'); ?>">
                <div
                  class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-file-alt text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">SOP</span>
              </a>
            </li>

            <!-- Submenu BPM -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'bpm') ? 'active' : '' ?>"
                href="<?= base_url('bpm'); ?>">
                <div
                  class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-project-diagram text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">BPM</span>
              </a>
            </li>

            <!-- Submenu IK -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'ik') ? 'active' : '' ?>"
                href="<?= base_url('ik'); ?>">
                <div
                  class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-info-circle text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">IK</span>
              </a>
            </li>

            <!-- Submenu Road Map -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'road_map') ? 'active' : '' ?>"
                href="<?= base_url('road_map'); ?>">
                <div
                  class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-road text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Road Map</span>
              </a>
            </li>

            <!-- Submenu SPLN -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'spln') ? 'active' : '' ?>"
                href="<?= base_url('spln'); ?>">
                <div
                  class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-bolt text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">SPLN</span>
              </a>
            </li>
          </ul>
        </div>

        <!-- Operasi -->
        <li class="nav-item">
          <a href="#menuOperasi"
            class="nav-link d-flex align-items-center justify-content-between <?= (
                                                                                in_array($this->uri->segment(1), ['operasi', 'single_line_diagram'])
                                                                              ) ? 'active' : '' ?>"
            data-bs-toggle="collapse"
            role="button"
            aria-expanded="<?= in_array($this->uri->segment(1), ['operasi', 'single_line_diagram']) ? 'true' : 'false' ?>"
            aria-controls="menuOperasi">
            <div class="d-flex align-items-center">
              <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-world text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Operasi</span>
            </div>
          </a>
        </li>

        <!-- Submenu Operasi -->
        <div class="collapse <?= in_array($this->uri->segment(1), ['operasi', 'single_line_diagram']) ? 'show' : '' ?>" id="menuOperasi">
          <ul class="nav flex-column submenu-list">

            <!-- <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'data_operasi') ? 'active' : '' ?>"
                href="<?= base_url('data_operasi'); ?>">
                <i class="fas fa-cogs me-2"></i> Data Operasi
              </a>
            </li> -->

            <!-- Submenu Single Line Diagram -->
            <li class="nav-item">
              <a class="nav-link <?= ($this->uri->segment(1) == 'single_line_diagram') ? 'active' : '' ?>"
                href="<?= base_url('single_line_diagram'); ?>">
                <div
                  class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-project-diagram text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Single Line Diagram</span>
              </a>
            </li>

          </ul>
        </div>

        <!-- Anggaran -->
        <li class="nav-item">
          <a href="#menuAnggaran"
            class="nav-link d-flex align-items-center justify-content-between"
            data-bs-toggle="collapse"
            role="button"
            aria-expanded="false"
            aria-controls="menuAnggaran">
            <div class="d-flex align-items-center">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Anggaran</span>
            </div>
          </a>
        </li>

        <!-- Submenu Anggaran -->
        <div class="collapse" id="menuAnggaran">
          <ul class="nav flex-column submenu-list">
            <!-- Anggaran Instansi (collapsible subgroup) -->
            <li class="nav-item">
              <a href="#anggaranInstansi"
                class="nav-link d-flex align-items-center justify-content-between <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'instansi') ? 'active' : '' ?>"
                data-bs-toggle="collapse"
                role="button"
                aria-expanded="<?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'instansi') ? 'true' : 'false' ?>"
                aria-controls="anggaranInstansi">
                <div><i class="fas fa-building me-2"></i> Anggaran Instansi</div>
              </a>
            </li>

            <div class="collapse <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'instansi') ? 'show' : '' ?>" id="anggaranInstansi">
              <ul class="nav flex-column submenu-list ps-3">
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'instansi' && $this->uri->segment(3) == 'progress_kontrak') ? 'active' : '' ?>" href="<?= base_url('anggaran/instansi/progress_kontrak'); ?>">
                    <span style="font-size:9px; line-height:1; display:inline-block; width:8px; text-align:center; color:#6c757d;" class="me-2">&bull;</span> Progress Kontrak
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'instansi' && $this->uri->segment(3) == 'rekomposisi') ? 'active' : '' ?>" href="<?= base_url('anggaran/instansi/rekomposisi'); ?>">
                    <span style="font-size:9px; line-height:1; display:inline-block; width:8px; text-align:center; color:#6c757d;" class="me-2">&bull;</span> Rekomposisi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'instansi' && $this->uri->segment(3) == 'monitoring') ? 'active' : '' ?>" href="<?= base_url('anggaran/instansi/monitoring'); ?>">
                    <span style="font-size:9px; line-height:1; display:inline-block; width:8px; text-align:center; color:#6c757d;" class="me-2">&bull;</span> Monitoring
                  </a>
                </li>
              </ul>
            </div>

            <!-- Anggaran Operasi (collapsible subgroup) -->
            <li class="nav-item">
              <a href="#anggaranOperasi"
                class="nav-link d-flex align-items-center justify-content-between <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'operasi') ? 'active' : '' ?>"
                data-bs-toggle="collapse"
                role="button"
                aria-expanded="<?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'operasi') ? 'true' : 'false' ?>"
                aria-controls="anggaranOperasi">
                <div><i class="fas fa-cogs me-2"></i> Anggaran Operasi</div>
              </a>
            </li>

            <div class="collapse <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'operasi') ? 'show' : '' ?>" id="anggaranOperasi">
              <ul class="nav flex-column submenu-list ps-3">
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'operasi' && $this->uri->segment(3) == 'progress_kontrak') ? 'active' : '' ?>" href="<?= base_url('anggaran/operasi/progress_kontrak'); ?>">
                    <span style="font-size:9px; line-height:1; display:inline-block; width:8px; text-align:center; color:#6c757d;" class="me-2">&bull;</span> Progress Kontrak
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'operasi' && $this->uri->segment(3) == 'rekomposisi') ? 'active' : '' ?>" href="<?= base_url('anggaran/operasi/rekomposisi'); ?>">
                    <span style="font-size:9px; line-height:1; display:inline-block; width:8px; text-align:center; color:#6c757d;" class="me-2">&bull;</span> Rekomposisi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= ($this->uri->segment(1) == 'anggaran' && $this->uri->segment(2) == 'operasi' && $this->uri->segment(3) == 'monitoring') ? 'active' : '' ?>" href="<?= base_url('anggaran/operasi/monitoring'); ?>">
                    <span style="font-size:9px; line-height:1; display:inline-block; width:8px; text-align:center; color:#6c757d;" class="me-2">&bull;</span> Monitoring
                  </a>
                </li>
              </ul>
            </div>
          </ul>
        </div>


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

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Select2 JS + jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>