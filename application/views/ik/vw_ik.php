<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data IK</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-info-circle me-2 text-warning"></i> Data IK
                </h6>
            </nav>

            <!-- ICON kanan -->
            <div class="d-flex align-items-center ms-auto">
                <ul class="navbar-nav flex-row align-items-center mb-0">
                    <li class="nav-item d-flex align-items-center me-3">
                        <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                    <li class="nav-item px-2 d-flex align-items-center me-3">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>

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

    <!-- Content -->
    <div class="container-fluid py-4">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success text-white">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-white">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card mb-4 shadow border-0 rounded-4">
            <div class="card-header py-2 d-flex justify-content-between align-items-center bg-gradient-primary text-white rounded-top-4">
                <h6 class="mb-0 d-flex align-items-center">Tabel Data IK</h6>
                <div class="d-flex align-items-center" style="padding-top: 16px;">
                    <?php if (can_create()): ?>
                        <a href="<?= base_url('Ik/tambah') ?>" class="btn btn-sm btn-light text-primary me-2 d-flex align-items-center">
                            <i class="fas fa-plus me-1"></i> Tambah
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <label class="mb-0 me-2 text-sm">Tampilkan:</label>
                        <select id="perPageSelectIk" class="form-select form-select-sm" style="width: 80px; padding-right: 2rem;" onchange="changePerPageIk(this.value)">
                            <option value="5" <?= ($per_page == 5) ? 'selected' : ''; ?>>5</option>
                            <option value="10" <?= ($per_page == 10) ? 'selected' : ''; ?>>10</option>
                            <option value="25" <?= ($per_page == 25) ? 'selected' : ''; ?>>25</option>
                            <option value="50" <?= ($per_page == 50) ? 'selected' : ''; ?>>50</option>
                            <option value="100" <?= ($per_page == 100) ? 'selected' : ''; ?>>100</option>
                            <option value="500" <?= ($per_page == 500) ? 'selected' : ''; ?>>500</option>
                        </select>
                        <span class="ms-3 text-sm">dari <?= $total_rows ?? 0; ?> data</span>
                    </div>
                    <input type="text" id="searchInputIk" onkeyup="searchTableIk()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari IK...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="ikTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Dokumen</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama File</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($ik)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-4">Belum ada data IK</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = isset($start_no) ? $start_no : 1;
                                foreach ($ik as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['NAMA_FILE'] ?? '-'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CREATED_BY'] ?? '-'); ?></td>
                                        <td class="text-sm">
                                            <?php if (!empty($row['FILE_IK'])): ?>
                                                <span class="badge bg-gradient-info text-white p-2"><?= htmlentities($row['FILE_IK']); ?></span>
                                            <?php else: ?>
                                                <span class="text-muted fst-italic">Tidak ada file</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($row['FILE_IK'])): ?>
                                                <a href="<?= base_url('uploads/ik/' . $row['FILE_IK']); ?>" target="_blank" class="btn btn-info btn-xs text-white me-1" title="Lihat File">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('uploads/ik/' . $row['FILE_IK']); ?>" download class="btn btn-success btn-xs text-white me-1" title="Unduh File">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (can_edit()): ?>
                                                <a href="<?= base_url('Ik/edit/' . ($row['ID_IK'] ?? '')); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (can_delete()): ?>
                                                <a href="javascript:void(0);" onclick="confirmDelete('<?= base_url('Ik/hapus/' . ($row['ID_IK'] ?? '')); ?>')" class="btn btn-danger btn-xs" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <?= $pagination ?? ''; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "File IK ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    function changePerPageIk(perPage) {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        url.searchParams.set('page', '1');
        window.location.href = url.toString();
    }

    function searchTableIk() {
        const input = document.getElementById('searchInputIk');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('ikTable');
        const tr = table.getElementsByTagName('tr');
        for (let i = 1; i < tr.length; i++) {
            let txtValue = tr[i].textContent || tr[i].innerText;
            tr[i].style.display = (txtValue.toUpperCase().indexOf(filter) > -1) ? '' : 'none';
        }
    }
</script>

<!-- Style -->
<style>
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        padding: 0.75rem 1rem;
    }

    .card-header h6 {
        color: #fff;
        margin: 0;
        font-weight: 600;
    }

    .breadcrumb .breadcrumb-item.active,
    .breadcrumb .breadcrumb-item a.opacity-5,
    .breadcrumb .breadcrumb-item.text-white {
        color: #ffffff !important;
    }

    .bg-gradient-primary {
        background: linear-gradient(90deg, #005C99, #0099CC);
    }

    .table-row-odd {
        background-color: #ffffff;
    }

    .table-row-even {
        background-color: #f5f7fa;
    }

    #ikTable tbody tr:hover {
        background-color: #e9ecef !important;
        transition: 0.2s ease-in-out;
    }

    .btn-xs {
        padding: 2px 6px;
        font-size: 11px;
        border-radius: 4px;
    }

    .btn-xs i {
        font-size: 12px;
    }

    #ikTable tbody tr td {
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        font-size: 13px !important;
    }

    #ikTable tbody td.text-center {
        vertical-align: middle !important;
        text-align: center !important;
        padding-top: 6px !important;
        padding-bottom: 6px !important;
    }

    #ikTable tbody td.text-center .btn {
        margin: 2px 3px;
    }

    #ikTable thead th {
        padding-top: 8px !important;
        padding-bottom: 8px !important;
        font-size: 12px !important;
    }

    #ikTable tbody tr {
        line-height: 1.15;
    }
</style>