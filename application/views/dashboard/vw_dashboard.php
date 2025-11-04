<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="ni ni-tv-2 text-white text-sm opacity-10 me-2"></i> Dashboard
                </h6>
            </nav>

            <!-- 🔥 ICON kanan -->
            <div class="d-flex align-items-center ms-auto">
                <ul class="navbar-nav flex-row align-items-center mb-0">
                    <!-- Sign In -->
                    <li class="nav-item d-flex align-items-center me-3">
                        <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>

                    <!-- Pengaturan -->
                    <li class="nav-item px-2 d-flex align-items-center me-3">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>

                    <?php if (isset($user_role) && strtolower($user_role) === 'admin'): ?>
                    <!-- Login Activity Monitor (Admin Only) -->
                    <li class="nav-item px-2 d-flex align-items-center me-3">
                        <a href="javascript:;" class="nav-link text-white p-0" id="loginActivityBtn" title="Monitor Login Activity">
                            <i class="fa fa-users cursor-pointer"></i>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- Notifikasi -->
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="<?= base_url('Notifikasi'); ?>" class="nav-link text-white p-0 position-relative" title="Lihat Notifikasi">
                            <i class="fa fa-bell cursor-pointer" style="font-size: 18px;"></i>
                            <span id="notifBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 9px; display: none;">
                                0
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
     
    <div class="container-fluid py-4">
        <!-- Login counter widget (separate from notifications) -->
        <div class="row mb-3">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="card login-count-card">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <!-- Left Section: Icon & Badge -->
                            <div class="col-auto">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="icon icon-shape bg-gradient-info shadow-info rounded-circle d-flex align-items-center justify-content-center mb-2" style="width:64px; height:64px;">
                                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img">
                                            <path d="M8 12h8" stroke="#FFFFFF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 8l4 4-4 4" stroke="#FFFFFF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M3 3v18a2 2 0 0 0 2 2h8" stroke="#FFFFFF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <?php if (isset($user_role) && $user_role): 
                                        // Determine badge color based on role
                                        $badge_color = 'bg-gradient-secondary';
                                        $role_lower = strtolower($user_role);
                                        if (strpos($role_lower, 'admin') !== false) {
                                            $badge_color = 'bg-gradient-danger';
                                        } elseif (strpos($role_lower, 'perencanaan') !== false) {
                                            $badge_color = 'bg-gradient-primary';
                                        } elseif (strpos($role_lower, 'operasi') !== false) {
                                            $badge_color = 'bg-gradient-success';
                                        } elseif (strpos($role_lower, 'pemeliharaan') !== false) {
                                            $badge_color = 'bg-gradient-warning';
                                        } elseif (strpos($role_lower, 'fasilitas') !== false) {
                                            $badge_color = 'bg-gradient-info';
                                        }
                                    ?>
                                        <span class="badge <?php echo $badge_color; ?>" style="font-size: 0.7rem; padding: 0.4em 0.7em;">
                                            <i class="fas fa-user-tag" style="font-size: 0.65rem;"></i>
                                            <span class="ms-1"><?php echo strtoupper(htmlspecialchars($user_role)); ?></span>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Right Section: Info -->
                            <div class="col">
                                <div class="ps-2">
                                    <p class="text-xs text-uppercase text-secondary font-weight-bold mb-1 opacity-7">Login Count</p>
                                    <h4 class="font-weight-bolder mb-2" style="font-size: 2rem; line-height: 1;">
                                        <?php echo isset($login_count) ? intval($login_count) : '—'; ?>
                                    </h4>
                                    <p class="text-sm mb-0 text-secondary" style="line-height: 1.4;">
                                        <i class="far fa-clock me-1 text-info"></i>
                                        <span class="font-weight-normal">Last login:</span>
                                    </p>
                                    <p class="text-sm mb-0 font-weight-bold" style="line-height: 1.2;">
                                        <?php echo isset($last_login) && $last_login ? $last_login : '—'; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                                    <h5 class="font-weight-bolder">
                                        $53,000
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        since yesterday
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                                    <h5 class="font-weight-bolder">
                                        2,300
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                                    <h5 class="font-weight-bolder">
                                        +3,462
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                        since last quarter
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                    <h5 class="font-weight-bolder">
                                        $103,430
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales overview -->
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Sales overview</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Show -->
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url('assets/assets/img/p2tl_pln.png'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3" style="width:25px; height:25px; line-height:25px;">
                                        <i class="ni ni-camera-compact text-dark opacity-10" style="font-size:12px;"></i>
                                    </div>
                                    <!-- <h5 class="text-white mb-1">Get started with Argon</h5>
                                      <p>There's nothing I really wanted to do in life that I wasn't able to get good at.</p> -->
                                </div>
                            </div>

                            <div class="carousel-item h-100" style="background-image: url('assets/assets/img/Pln_stop_listrik_ilegal.png'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape bg-white border-radius-md mb-3"
                                        style=" width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; line-height: 0; /* penting untuk hilangkan offset bawaan */">
                                        <!-- <i class="ni ni-bulb-61 text-dark opacity-10" style="font-size: 14px; margin: 0; padding: 0;"></i> -->
                                        <i class="ni ni-bulb-61 text-dark opacity-10"
                                            style="font-size: 14px; margin: 0; padding: 0; position: relative; top: -1px;"></i>
                                    </div>
                                    <!-- <h5 class="text-white mb-1">Faster way to create web pages</h5>
                                      <p>That's my skill. I'm not really specifically talented at anything except for the ability to learn.</p> -->
                                </div>
                            </div>

                            <div class="carousel-item h-100" style="background-image: url('assets/assets/img/penertiban.png'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">

                                    <div class="icon icon-shape bg-white border-radius-md mb-3"
                                        style="width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; line-height: 1; padding-top: 1px; /* sedikit menaikkan ikon agar sejajar */">
                                        <i class="ni ni-trophy text-dark opacity-10"
                                            style="font-size: 14px; margin: 0; padding: 0; position: relative; top: -1px;"></i>
                                    </div>

                                    <!-- <h5 class="text-white mb-1">Share with us your design tips!</h5>
                                      <p>Don't be afraid to be wrong because you can't learn anything from a compliment.</p> -->

                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales by Country -->
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Sales by Country</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="<?= base_url('assets/assets/img/icons/flags/US.png'); ?>" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">United States</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">2500</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$230,900</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">29.9%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="<?= base_url('assets/assets/img/icons/flags/DE.png'); ?>" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Germany</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">3.900</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$440,000</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">40.22%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="<?= base_url('assets/assets/img/icons/flags/GB.png'); ?>" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Great Britain</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">1.400</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$190,700</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">23.44%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="<?= base_url('assets/assets/img/icons/flags/BR.png'); ?>" alt="Country flag">
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Country:</p>
                                                <h6 class="text-sm mb-0">Brasil</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                            <h6 class="text-sm mb-0">562</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Value:</p>
                                            <h6 class="text-sm mb-0">$143,960</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                            <h6 class="text-sm mb-0">32.14%</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- CATEGORIES -->
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">

                            <!-- Devices -->
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon bg-gradient-dark shadow text-center d-flex align-items-center justify-content-center me-3"
                                        style="width: 25px; height: 25px; border-radius: 50%;">
                                        <i class="ni ni-mobile-button text-white opacity-10" style="font-size: 12px;"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                        <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                                    </div>
                                </div>
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                    <i class="ni ni-bold-right" aria-hidden="true"></i>
                                </button>
                            </li>

                            <!-- Tickets -->
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon bg-gradient-dark shadow text-center d-flex align-items-center justify-content-center me-3"
                                        style="width: 25px; height: 25px; border-radius: 50%;">
                                        <i class="ni ni-tag text-white opacity-10" style="font-size: 12px;"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                        <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                                    </div>
                                </div>
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                    <i class="ni ni-bold-right" aria-hidden="true"></i>
                                </button>
                            </li>

                            <!-- Error Logs -->
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon bg-gradient-dark shadow text-center d-flex align-items-center justify-content-center me-3"
                                        style="width: 25px; height: 25px; border-radius: 50%;">
                                        <i class="ni ni-box-2 text-white opacity-10" style="font-size: 12px;"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                        <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                                    </div>
                                </div>
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                    <i class="ni ni-bold-right" aria-hidden="true"></i>
                                </button>
                            </li>

                            <!-- Happy Users -->
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon bg-gradient-dark shadow text-center d-flex align-items-center justify-content-center me-3"
                                        style="width: 25px; height: 25px; border-radius: 50%;">
                                        <i class="ni ni-satisfied text-white opacity-10" style="font-size: 12px;"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                        <span class="text-xs font-weight-bold">+ 430</span>
                                    </div>
                                </div>
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                    <i class="ni ni-bold-right" aria-hidden="true"></i>
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Login Activity Monitor (Admin Only) -->
    <div class="modal fade" id="loginActivityModal" tabindex="-1" aria-labelledby="loginActivityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginActivityModalLabel">
                        <i class="fa fa-users me-2"></i>Login Activity Monitor
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Role Selector -->
                    <div class="mb-3">
                        <label for="roleSelector" class="form-label">Select Role:</label>
                        <select class="form-select" id="roleSelector">
                            <option value="">-- All Roles Summary --</option>
                            <option value="Perencanaan">Perencanaan</option>
                            <option value="Admin">Admin</option>
                            <option value="Operasi Sistem Distribusi">Operasi Sistem Distribusi</option>
                            <option value="Fasilitas Operasi">Fasilitas Operasi</option>
                            <option value="Pemeliharaan">Pemeliharaan</option>
                            <option value="K3L & KAM">K3L & KAM</option>
                        </select>
                    </div>

                    <!-- Loading Spinner -->
                    <div id="loadingSpinner" class="text-center my-4" style="display:none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading data...</p>
                    </div>

                    <!-- Summary View (All Roles) -->
                    <div id="summaryView" style="display:none;">
                        <h6 class="mb-3" style="font-size: 0.95rem;">Login Summary by Role</h6>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 35%;">Role</th>
                                        <th style="width: 18%;" class="text-center">Users</th>
                                        <th style="width: 18%;" class="text-center">Logins</th>
                                        <th style="width: 29%;">Latest</th>
                                    </tr>
                                </thead>
                                <tbody id="summaryTableBody">
                                    <!-- Populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Detail View (Specific Role) -->
                    <div id="detailView" style="display:none;">
                        <h6 class="mb-3" style="font-size: 0.95rem;">Users in <span id="selectedRoleName" class="text-primary"></span> Role</h6>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 8%;" class="text-center">#</th>
                                        <th style="width: 28%;">Name</th>
                                        <th style="width: 32%;">Email</th>
                                        <th style="width: 12%;" class="text-center">Count</th>
                                        <th style="width: 20%;">Last Login</th>
                                    </tr>
                                </thead>
                                <tbody id="detailTableBody">
                                    <!-- Populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="alert alert-danger" style="display:none;" role="alert">
                        <i class="fa fa-exclamation-triangle me-2"></i>
                        <span id="errorText"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- Global Styles for Login Count Card (All Roles) -->
<style>
/* Login Count Card - Professional Layout */
.login-count-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease !important;
}

.login-count-card:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15) !important;
}

.login-count-card .icon-shape {
    transition: transform 0.2s ease !important;
}

.login-count-card:hover .icon-shape {
    transform: scale(1.05) !important;
}

/* Badge styling for better alignment */
.login-count-card .badge {
    white-space: nowrap;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .login-count-card .col-auto {
        margin-bottom: 0.5rem;
    }
    
    .login-count-card h4 {
        font-size: 1.5rem !important;
    }
}
</style>

<?php if (isset($user_role) && strtolower($user_role) === 'admin'): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginActivityBtn = document.getElementById('loginActivityBtn');
    const loginActivityModal = new bootstrap.Modal(document.getElementById('loginActivityModal'));
    const roleSelector = document.getElementById('roleSelector');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const summaryView = document.getElementById('summaryView');
    const detailView = document.getElementById('detailView');
    const errorMessage = document.getElementById('errorMessage');

    // Open modal on button click
    loginActivityBtn.addEventListener('click', function() {
        loginActivityModal.show();
        loadLoginStats(); // Load summary by default
    });

    // Handle role change
    roleSelector.addEventListener('change', function() {
        loadLoginStats();
    });

    function loadLoginStats() {
        const selectedRole = roleSelector.value;
        
        // Show loading, hide others
        loadingSpinner.style.display = 'block';
        summaryView.style.display = 'none';
        detailView.style.display = 'none';
        errorMessage.style.display = 'none';

        // Build URL
        const url = selectedRole 
            ? '<?= base_url('dashboard/get_role_login_stats') ?>?role=' + encodeURIComponent(selectedRole)
            : '<?= base_url('dashboard/get_role_login_stats') ?>';

        // Fetch data
        fetch(url)
            .then(response => response.json())
            .then(data => {
                loadingSpinner.style.display = 'none';
                
                if (data.success) {
                    if (data.summary) {
                        // Show summary view
                        displaySummary(data.summary);
                    } else if (data.users) {
                        // Show detail view
                        displayDetails(data.role, data.users);
                    }
                } else {
                    showError(data.message || 'Failed to load data');
                }
            })
            .catch(error => {
                loadingSpinner.style.display = 'none';
                showError('Network error: ' + error.message);
            });
    }

    function displaySummary(summary) {
        const tbody = document.getElementById('summaryTableBody');
        tbody.innerHTML = '';

        if (summary.length === 0) {
            tbody.innerHTML = '<tr><td colspan="4" class="text-center">No data available</td></tr>';
        } else {
            summary.forEach(item => {
                const row = document.createElement('tr');
                const formattedDate = formatDateTime(item.latest_login);
                row.innerHTML = `
                    <td><strong style="font-size: 0.85rem;">${escapeHtml(item.role || 'N/A')}</strong></td>
                    <td class="text-center">${item.total_users || 0}</td>
                    <td class="text-center"><span class="badge bg-primary">${item.total_logins || 0}</span></td>
                    <td><small>${formattedDate}</small></td>
                `;
                tbody.appendChild(row);
            });
        }

        summaryView.style.display = 'block';
    }

    function displayDetails(role, users) {
        document.getElementById('selectedRoleName').textContent = role;
        const tbody = document.getElementById('detailTableBody');
        tbody.innerHTML = '';

        if (users.length === 0) {
            tbody.innerHTML = '<tr><td colspan="5" class="text-center">No users found for this role</td></tr>';
        } else {
            users.forEach((user, index) => {
                const row = document.createElement('tr');
                const formattedDate = formatDateTime(user.last_login);
                row.innerHTML = `
                    <td class="text-center">${index + 1}</td>
                    <td style="font-size: 0.85rem;">${escapeHtml(user.name || 'N/A')}</td>
                    <td><small>${escapeHtml(user.email || 'N/A')}</small></td>
                    <td class="text-center"><span class="badge bg-info">${user.login_count || 0}</span></td>
                    <td><small>${formattedDate}</small></td>
                `;
                tbody.appendChild(row);
            });
        }

        detailView.style.display = 'block';
    }

    function formatDateTime(dateTimeString) {
        if (!dateTimeString || dateTimeString === 'Never') {
            return 'Never';
        }
        
        try {
            // Format: 2025-11-03 07:29:03 -> 03/11 07:29
            const parts = dateTimeString.split(' ');
            if (parts.length === 2) {
                const datePart = parts[0].split('-');
                const timePart = parts[1].substring(0, 5); // Get HH:MM only
                return `${datePart[2]}/${datePart[1]} ${timePart}`;
            }
            return dateTimeString;
        } catch (e) {
            return dateTimeString;
        }
    }

    function showError(message) {
        document.getElementById('errorText').textContent = message;
        errorMessage.style.display = 'block';
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});
</script>

<style>
/* Responsive Modal for Login Activity Monitor */
#loginActivityModal .modal-dialog {
    max-width: 700px;
    width: 90%;
    margin: 1.75rem auto;
}

#loginActivityModal .modal-content {
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

#loginActivityModal .modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
    padding: 1rem 1.25rem;
}

#loginActivityModal .modal-header h5 {
    font-size: 1.1rem;
    margin: 0;
    color: #344767;
}

#loginActivityModal .modal-body {
    padding: 1.25rem;
}

/* Responsive breakpoints for different screen sizes */
@media (min-width: 1400px) {
    #loginActivityModal .modal-dialog {
        max-width: 800px;
    }
}

@media (max-width: 1366px) {
    /* Common laptop resolution */
    #loginActivityModal .modal-dialog {
        max-width: 650px;
        width: 85%;
    }
}

@media (max-width: 1200px) {
    #loginActivityModal .modal-dialog {
        max-width: 600px;
        width: 85%;
    }
}

@media (max-width: 992px) {
    #loginActivityModal .modal-dialog {
        max-width: 90%;
        width: 90%;
        margin: 1rem auto;
    }
    
    #loginActivityModal .table {
        font-size: 0.875rem;
    }
    
    #loginActivityModal .modal-body {
        padding: 1rem;
    }
}

@media (max-width: 768px) {
    #loginActivityModal .modal-dialog {
        max-width: 95%;
        width: 95%;
        margin: 0.5rem auto;
    }
    
    #loginActivityModal .table {
        font-size: 0.813rem;
    }
    
    #loginActivityModal .modal-body {
        padding: 0.75rem;
    }
    
    #loginActivityModal .table th,
    #loginActivityModal .table td {
        padding: 0.4rem;
    }
}

@media (max-width: 576px) {
    #loginActivityModal .modal-dialog {
        max-width: 98%;
        width: 98%;
        margin: 0.25rem auto;
    }
    
    #loginActivityModal .table {
        font-size: 0.75rem;
    }
    
    #loginActivityModal .modal-header h5 {
        font-size: 0.95rem;
    }
    
    #loginActivityModal .modal-body {
        padding: 0.5rem;
    }
    
    #loginActivityModal .badge {
        font-size: 0.7rem;
        padding: 0.25em 0.4em;
    }
}

/* Ensure table is always responsive */
#loginActivityModal .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 0;
}

/* Better table styling */
#loginActivityModal .table {
    margin-bottom: 0;
    font-size: 0.875rem;
}

#loginActivityModal .table th {
    border-top: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.65rem;
    letter-spacing: 0.5px;
    padding: 0.5rem;
}

#loginActivityModal .table td {
    vertical-align: middle;
    padding: 0.5rem;
}

#loginActivityModal .table-light {
    background-color: #f6f9fc;
}

/* Small text improvements */
#loginActivityModal small {
    font-size: 0.875em;
    color: #67748e;
}

/* Loading spinner centering */
#loadingSpinner {
    min-height: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Form select styling */
#loginActivityModal .form-select {
    font-size: 0.875rem;
    padding: 0.5rem 0.75rem;
}

#loginActivityModal .form-label {
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

</style>
<?php endif; ?>