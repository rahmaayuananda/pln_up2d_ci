<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Unit</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-building me-2 text-success"></i> Data Unit
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
                <h6 class="mb-0">Tabel Data Unit</h6>
                <div class="d-flex align-items-center">
                    <?php if (can_create()): ?>
                        <a href="<?= base_url('Unit/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                            <i class="fas fa-plus me-1"></i> Tambah
                        </a>
                        <a href="<?= base_url('import/unit') ?>" class="btn btn-sm btn-light text-success">
                            <i class="fas fa-file-import me-1"></i> Import
                        </a>
                    <?php endif; ?>
                    <a href="<?= base_url('Unit/export_csv') ?>" class="btn btn-sm btn-light text-secondary ms-2">
                        <i class="fas fa-file-csv me-1"></i> Download CSV
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <label class="mb-0 me-2 text-sm">Tampilkan:</label>
                        <select id="perPageSelectUnit" class="form-select form-select-sm" style="width: 80px; padding-right: 2rem;" onchange="changePerPageUnit(this.value)">
                            <option value="5" <?= ($per_page == 5) ? 'selected' : ''; ?>>5</option>
                            <option value="10" <?= ($per_page == 10) ? 'selected' : ''; ?>>10</option>
                            <option value="25" <?= ($per_page == 25) ? 'selected' : ''; ?>>25</option>
                            <option value="50" <?= ($per_page == 50) ? 'selected' : ''; ?>>50</option>
                            <option value="100" <?= ($per_page == 100) ? 'selected' : ''; ?>>100</option>
                            <option value="500" <?= ($per_page == 500) ? 'selected' : ''; ?>>500</option>
                        </select>
                        <span class="ms-3 text-sm">dari <?= $total_rows ?? 0; ?> data</span>
                    </div>
                    <input type="text" id="searchInputUnit" onkeyup="searchTableUnit()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari data Unit...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="unitTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-col="0" onclick="sortTableUnit(0)">No <span class="sort-indicator"></span></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-col="1" onclick="sortTableUnit(1)">Unit Pelaksana <span class="sort-indicator"></span></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-col="2" onclick="sortTableUnit(2)">Unit Layanan <span class="sort-indicator"></span></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-col="3" onclick="sortTableUnit(3)">Longitude (X) <span class="sort-indicator"></span></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-col="4" onclick="sortTableUnit(4)">Latitude (Y) <span class="sort-indicator"></span></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-col="5" onclick="sortTableUnit(5)">Alamat <span class="sort-indicator"></span></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                            <!-- filters removed; table supports client-side sorting only -->
                        </thead>
                        <tbody>
                            <?php if (empty($unit)): ?>
                                <tr>
                                    <td colspan="7" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $no = $start_no;
                                foreach ($unit as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UNIT_PELAKSANA']); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UNIT_LAYANAN']); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LONGITUDEX']); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LATITUDEY']); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['ADDRESS']); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Unit/detail/' . $row['ID_UNIT']); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <?php if (can_edit()): ?>
                                                <a href="<?= base_url('Unit/edit/' . $row['ID_UNIT']); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (can_delete()): ?>
                                                <a href="<?= base_url('Unit/hapus/' . $row['ID_UNIT']); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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

<!-- Script Pencarian dan Per-page -->
<script>
    function changePerPageUnit(perPage) {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        url.searchParams.set('page', '1');
        window.location.href = url.toString();
    }

    function searchTableUnit() {
        const input = document.getElementById('searchInputUnit');
        const filter = (input.value || '').toUpperCase();
        const table = document.getElementById('unitTable');
        const tr = table.getElementsByTagName('tr');

        // start from 1 to skip header row(s)
        for (let i = 1; i < tr.length; i++) {
            const row = tr[i];
            const txtValue = row.textContent || row.innerText || '';
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }

    // Hapus konfirmasi dan horizontal scroll ditangani global pada layout/footer.php
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

    #unitTable tbody tr:hover {
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

    .sort-indicator {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-left: 6px;
        vertical-align: middle;
    }

    .sort-asc::after {
        content: '\25B2';
        font-size: 10px;
        margin-left: 4px;
    }

    .sort-desc::after {
        content: '\25BC';
        font-size: 10px;
        margin-left: 4px;
    }

    /* Make compact padding the default for the table (applies for all per_page values) */
    #unitTable tbody tr td {
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        font-size: 13px !important;
    }

    #unitTable tbody tr {
        line-height: 1.15;
    }

    #unitTable thead th {
        padding-top: 8px !important;
        padding-bottom: 8px !important;
        font-size: 12px !important;
    }

    /* Rata tengah vertikal & horizontal untuk kolom aksi + beri jarak atas-bawah */
    #unitTable tbody td.text-center {
        vertical-align: middle !important;
        /* tetap di tengah vertikal */
        text-align: center !important;
        /* di tengah horizontal */
        padding-top: 6px !important;
        /* jarak atas */
        padding-bottom: 6px !important;
        /* jarak bawah */
    }

    /* Jarak antar tombol */
    #unitTable tbody td.text-center .btn {
        margin: 2px 3px;
        /* jarak atas-bawah 2px, kiri-kanan 3px */
    }
</style>
<script>
    // Client-side sorting only (no column or global filtering)
    (function() {
        let sortState = {
            index: null,
            asc: true
        };

        window.sortTableUnit = function(colIndex) {
            const table = document.getElementById('unitTable');
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.querySelectorAll('tr'));

            // Determine if column is numeric (cols 0,3,4)
            const numericCols = [0, 3, 4];

            if (sortState.index === colIndex) {
                sortState.asc = !sortState.asc;
            } else {
                sortState.index = colIndex;
                sortState.asc = true;
            }

            rows.sort((a, b) => {
                const aCell = getCellText(a, colIndex);
                const bCell = getCellText(b, colIndex);
                if (numericCols.includes(colIndex)) {
                    const aNum = parseFloat(aCell.replace(/,/g, '')) || 0;
                    const bNum = parseFloat(bCell.replace(/,/g, '')) || 0;
                    return sortState.asc ? aNum - bNum : bNum - aNum;
                }
                if (aCell < bCell) return sortState.asc ? -1 : 1;
                if (aCell > bCell) return sortState.asc ? 1 : -1;
                return 0;
            });

            rows.forEach(r => tbody.appendChild(r));
            updateRowNumbersAndStripes();
            updateSortIndicators();
        };

        function getCellText(row, colIndex) {
            const cells = row.children;
            if (colIndex < cells.length) {
                return (cells[colIndex].textContent || cells[colIndex].innerText).trim();
            }
            return '';
        }

        function updateRowNumbersAndStripes() {
            const table = document.getElementById('unitTable');
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.querySelectorAll('tr'));
            let no = parseInt('<?= $start_no; ?>', 10) || 1;
            rows.forEach((r, idx) => {
                const firstCell = r.children[0];
                if (firstCell) firstCell.textContent = no + idx;
                r.classList.remove('table-row-odd', 'table-row-even');
                r.classList.add(((idx % 2) === 0) ? 'table-row-odd' : 'table-row-even');
            });
        }

        function updateSortIndicators() {
            const headers = document.querySelectorAll('#unitTable thead tr:first-child th');
            headers.forEach((th, idx) => {
                th.classList.remove('sort-asc', 'sort-desc');
                if (sortState.index === idx) {
                    th.classList.add(sortState.asc ? 'sort-asc' : 'sort-desc');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // initial indicator reset (in case)
            updateSortIndicators();
            // apply compact rows if per_page <= 10 (read from URL)
            try {
                const params = new URLSearchParams(window.location.search);
                const per = parseInt(params.get('per_page') || '<?= $per_page ?? 0; ?>', 10) || 0;
                if (per > 0 && per <= 10) {
                    const table = document.getElementById('unitTable');
                    if (table) table.classList.add('compact-rows');
                }
            } catch (e) {
                // ignore
            }
        });
    })();
</script>