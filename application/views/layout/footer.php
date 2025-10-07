<footer class="footer pt-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>document.write(new Date().getFullYear())</script>,
                    made with <i class="fa fa-heart"></i> by
                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                    for a better web.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item"><a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a></li>
                    <li class="nav-item"><a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a></li>
                    <li class="nav-item"><a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a></li>
                    <li class="nav-item"><a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</main>

<!-- Core JS Files -->
<script src="<?= base_url('assets/assets/js/core/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/assets/js/core/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?= base_url('assets/assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
<script src="<?= base_url('assets/assets/js/argon-dashboard.min.js') ?>"></script>

<!-- Font Awesome & Nucleo -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet">
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet">

<!-- Argon Dashboard JS -->
<script src="<?= base_url('assets/assets/js/argon-dashboard.min.js?v=2.1.0'); ?>"></script>

<script>
  // Scrollbar untuk Windows
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = { damping: '0.5' }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
