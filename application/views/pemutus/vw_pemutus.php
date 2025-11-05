<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Pemutus</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-toggle-on me-2 text-warning"></i> Data Pemutus - LBS / RECLOSER
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
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton"></ul>
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

        <div class="card mb-4 shadow border-0 rounded-4">
            <div class="card-header py-2 d-flex justify-content-between align-items-center bg-gradient-primary text-white rounded-top-4">
                <h6 class="mb-0">Tabel Data Pemutus</h6>
                <div class="d-flex align-items-center">
                    <?php if (can_create()): ?>
                    <a href="<?= base_url('Pemutus/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    <a href="<?= base_url('import/pemutus') ?>" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-file-import me-1"></i> Import
                    </a>
                    <?php endif; ?>
                    <a href="<?= base_url('Pemutus/export_csv') ?>" class="btn btn-sm btn-light text-secondary ms-2">
                        <i class="fas fa-file-csv me-1"></i> Download CSV
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <label class="mb-0 me-2 text-sm">Tampilkan:</label>
                        <select id="perPageSelect" class="form-select form-select-sm" style="width: 80px; padding-right: 2rem;" onchange="changePerPage(this.value)">
                            <option value="5" <?= ($per_page == 5) ? 'selected' : ''; ?>>5</option>
                            <option value="10" <?= ($per_page == 10) ? 'selected' : ''; ?>>10</option>
                            <option value="25" <?= ($per_page == 25) ? 'selected' : ''; ?>>25</option>
                            <option value="50" <?= ($per_page == 50) ? 'selected' : ''; ?>>50</option>
                            <option value="100" <?= ($per_page == 100) ? 'selected' : ''; ?>>100</option>
                            <option value="500" <?= ($per_page == 500) ? 'selected' : ''; ?>>500</option>
                        </select>
                        <span class="ms-3 text-sm">dari <?= $total_rows; ?> data</span>
                    </div>
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari data Pemutus...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="pemutusTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SSOTNUMBER</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CXUNIT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">UNITNAME</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LOCATION</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DESCRIPTION</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pemutus)): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $no = $start_no;
                                foreach ($pemutus as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['SSOTNUMBER'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXUNIT'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UNITNAME'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LOCATION'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['DESCRIPTION'] ?? ''); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Pemutus/detail/' . urlencode($row['SSOTNUMBER'])); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <?php if (can_edit()): ?>
                                            <a href="<?= base_url('Pemutus/edit/' . urlencode($row['SSOTNUMBER'])); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (can_delete()): ?>
                                            <a href="<?= base_url('Pemutus/hapus/' . urlencode($row['SSOTNUMBER'])); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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
                    <?= $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Script pencarian -->
<script>
    function changePerPage(perPage) {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        url.searchParams.set('page', '1'); // Reset ke halaman 1
        window.location.href = url.toString();
    }

    function searchTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('pemutusTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            let txtValue = tr[i].textContent || tr[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
    // global search removed; sorting-only
</script>

<style>
    #pemutusTable thead th {
        cursor: pointer;
    }

    .pem-sort-asc::after {
        content: '\25B2';
        font-size: 10px;
        margin-left: 6px;
    }

    .pem-sort-desc::after {
        content: '\25BC';
        font-size: 10px;
        margin-left: 6px;
    }
</style>
<script>
    (function() {
        const table = document.getElementById('pemutusTable');
        if (!table) return;
        let sortState = {
            index: null,
            asc: true
        };

        function getCellText(r, i) {
            return (r.children[i] && (r.children[i].textContent || r.children[i].innerText) || '').trim();
        }

        function updateNumbers() {
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.querySelectorAll('tr'));
            let no = parseInt('<?= $start_no; ?>', 10) || 1;
            rows.forEach((r, idx) => {
                if (r.children[0]) r.children[0].textContent = no + idx;
                r.classList.remove('table-row-odd', 'table-row-even');
                r.classList.add((idx % 2 === 0) ? 'table-row-odd' : 'table-row-even');
            });
        }

        function updateIndicators() {
            const headers = table.querySelectorAll('thead th');
            headers.forEach((th, i) => {
                th.classList.remove('pem-sort-asc', 'pem-sort-desc');
                if (sortState.index === i) th.classList.add(sortState.asc ? 'pem-sort-asc' : 'pem-sort-desc');
            });
        }

        function sortBy(col) {
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.querySelectorAll('tr'));
            if (sortState.index === col) sortState.asc = !sortState.asc;
            else {
                sortState.index = col;
                sortState.asc = true;
            }
            const numeric = [0];
            rows.sort((a, b) => {
                const A = getCellText(a, col);
                const B = getCellText(b, col);
                if (numeric.includes(col)) {
                    return sortState.asc ? (parseFloat(A) || 0) - (parseFloat(B) || 0) : (parseFloat(B) || 0) - (parseFloat(A) || 0);
                }
                if (A < B) return sortState.asc ? -1 : 1;
                if (A > B) return sortState.asc ? 1 : -1;
                return 0;
            });
            rows.forEach(r => tbody.appendChild(r));
            updateNumbers();
            updateIndicators();
        }
        document.addEventListener('DOMContentLoaded', () => {
            const headers = table.querySelectorAll('thead th');
            headers.forEach((th, idx) => th.addEventListener('click', () => sortBy(idx)));
        });
    })();
</script>
</script>

<!-- Style tambahan -->
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

    /* Ensure breadcrumb active/title is visible on dark header */
    .breadcrumb .breadcrumb-item.active,
    .breadcrumb .breadcrumb-item a.opacity-5,
    .breadcrumb .breadcrumb-item.text-white {
        color: #ffffff !important;
    }

    /* compact default for pemutusTable (assets dropdown) */
    #pemutusTable tbody tr td {
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        font-size: 13px !important;
    }

    #pemutusTable tbody tr {
        line-height: 1.15;
    }

    #pemutusTable thead th {
        padding-top: 8px !important;
        padding-bottom: 8px !important;
        font-size: 12px !important;
    }

    .bg-gradient-primary {
        background: linear-gradient(90deg, #005C99, #0099CC);
    }

    .card-header .d-flex.align-items-center a {
        transform: translateY(10px);
    }

    .table-row-odd {
        background-color: #ffffff;
    }

    .table-row-even {
        background-color: #f5f7fa;
    }

    #pemutusTable tbody tr:hover {
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
</style>