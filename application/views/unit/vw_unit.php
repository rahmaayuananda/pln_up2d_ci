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
                    <a href="<?= base_url('Unit/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    <a href="<?= base_url('import/unit') ?>" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-file-import me-1"></i> Import
                    </a>
                    <a href="<?= base_url('Unit/export_csv') ?>" class="btn btn-sm btn-light text-secondary ms-2">
                        <i class="fas fa-file-csv me-1"></i> Download CSV
                    </a>
                    <!-- Layout mode toggles: Conservative (7 rows), Dense (10 rows, fixed body), Auto-fit -->
                    <div class="btn-group ms-3" role="group" aria-label="Layout modes">
                        <button id="modeConservative" type="button" class="btn btn-sm btn-outline-light" title="Conservative (7 rows)">7-row</button>
                        <button id="modeDense" type="button" class="btn btn-sm btn-outline-light" title="Dense (10 rows)">10-row</button>
                        <button id="modeAutofit" type="button" class="btn btn-sm btn-outline-light" title="Auto-fit">Auto</button>
                    </div>
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
                                            <a href="<?= base_url('Unit/edit/' . $row['ID_UNIT']); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Unit/hapus/' . $row['ID_UNIT']); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
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
        align-items: center; /* center title and buttons vertically */
        padding: 0.75rem 1rem;
    }

    .card-header h6 {
        color: #fff;
        margin: 0;
        font-weight: 600;
    }

    /* Hide the top page title (Data Unit) as requested */
    nav[aria-label="breadcrumb"] .font-weight-bolder.text-white.mb-0 { display: none !important; }

    /* Ensure breadcrumb active/title is visible on dark header */
    .breadcrumb .breadcrumb-item.active,
    .breadcrumb .breadcrumb-item a.opacity-5,
    .breadcrumb .breadcrumb-item.text-white {
        color: #ffffff !important;
    }

    /* Hide breadcrumb (small path) entirely to keep header area clean */
    .breadcrumb { display: none !important; }

    .bg-gradient-primary {
        background: linear-gradient(90deg, #005C99, #0099CC);
    }

    .card-header .d-flex.align-items-center a {
        transform: none; /* remove manual offset */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        vertical-align: middle;
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
        line-height: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: auto;
    }

    .btn-xs i {
        font-size: 12px;
        line-height: 1;
        display: inline-block;
    }
    .sort-indicator {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-left: 6px;
        vertical-align: middle;
    }
    .sort-asc::after { content: '\25B2'; font-size: 10px; margin-left:4px; }
    .sort-desc::after { content: '\25BC'; font-size: 10px; margin-left:4px; }
    /* Make compact padding the default for the table (applies for all per_page values)
       Keep table header and body cells vertically aligned and the same height. */
    /* Force identical vertical spacing and line-height for header and body cells */
    #unitTable thead th,
    #unitTable tbody tr td {
        padding-top: 6px !important;
        padding-bottom: 6px !important;
        line-height: 1 !important;
        vertical-align: middle !important;
    }
    #unitTable thead th { font-size: 11px !important; }
    #unitTable tbody tr td { font-size: 12px !important; }
    #unitTable tbody tr {
        line-height: 1.15;
    }
    /* compact adjustments when showing 10 rows: toned down */
    /* Keep breadcrumb hidden but restore navbar and moderate paddings */
    body.asset-compact .breadcrumb { display: none !important; }
    body.asset-compact .container-fluid.py-4 { padding-top: 6px !important; padding-bottom: 6px !important; }
    body.asset-compact nav.navbar { display: block !important; padding-top: 4px !important; padding-bottom: 4px !important; }
    body.asset-compact .main-content { padding-top: 8px !important; margin-top: 0 !important; }
    body.asset-compact .card { margin-bottom: 2px !important; }
    body.asset-compact .card-header { padding-top: 6px !important; padding-bottom: 6px !important; }
    body.asset-compact .card-body { padding-top: 6px !important; padding-bottom: 6px !important; }
    body.asset-compact .card-header h6 { font-size: 14px !important; margin-bottom: 0 !important; line-height: 1 !important; }
    body.asset-compact .card-header .d-flex.align-items-center a { transform: none !important; padding: 6px 8px !important; font-size: 12px !important; }
    /* shrink controls row */
    body.asset-compact .card-body > .px-3 { padding-top: 4px !important; padding-bottom: 4px !important; }
    body.asset-compact #perPageSelectUnit, body.asset-compact #searchInputUnit { height: 28px !important; padding-top: 2px !important; padding-bottom: 2px !important; font-size: 13px !important; }
    /* compact table cells and header - final minimal squeeze */
    body.asset-compact #unitTable thead th { padding-top: 3px !important; padding-bottom: 3px !important; font-size: 10.5px !important; }
    body.asset-compact #unitTable tbody tr td { padding-top: 3px !important; padding-bottom: 3px !important; font-size: 11.5px !important; line-height: 1 !important; }
    /* reduce footer/pagination height */
    /* show pagination/footer in compact mode */
    body.asset-compact .card-footer { display: block !important; padding-top: 6px !important; padding-bottom: 6px !important; }
    /* reduce extra gaps in responsive table wrapper */
    body.asset-compact .table-responsive { margin-bottom: 0 !important; }
    /* Slightly reduce action button sizes in compact mode (tiny change) */
    body.asset-compact .btn-xs { padding: 3px 5px !important; font-size: 10px !important; }
</style>
<script>
    // Client-side sorting only (no column or global filtering)
    (function() {
        let sortState = { index: null, asc: true };

        window.sortTableUnit = function(colIndex) {
            const table = document.getElementById('unitTable');
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.querySelectorAll('tr'));

            // Determine if column is numeric (cols 0,3,4)
            const numericCols = [0,3,4];

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
                r.classList.remove('table-row-odd','table-row-even');
                r.classList.add(((idx % 2) === 0) ? 'table-row-odd' : 'table-row-even');
            });
        }

        function updateSortIndicators() {
            const headers = document.querySelectorAll('#unitTable thead tr:first-child th');
            headers.forEach((th, idx) => {
                th.classList.remove('sort-asc','sort-desc');
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
                    try { document.body.classList.add('asset-compact'); } catch(e) {}
                }
            } catch (e) {
                // ignore
            }
        });
    })();
</script>

    <!-- Layout mode controller -->
    <script>
        (function() {
            const btnCon = document.getElementById('modeConservative');
            const btnDense = document.getElementById('modeDense');
            const btnAuto = document.getElementById('modeAutofit');

            function clearMode() {
                document.body.classList.remove('layout-conservative','layout-dense','layout-auto');
                // remove any forced wrapper height
                const w = document.querySelector('.table-responsive'); if (w) { w.style.height = ''; w.style.overflow = ''; }
            }

            function applyConservative() {
                clearMode();
                document.body.classList.add('layout-conservative');
                // set wrapper to show exactly 7 rows using fixed row height (compact)
                const wrapper = document.querySelector('.table-responsive');
                const headerH = 44; const rowH = 42; const rows = 7;
                if (wrapper) { wrapper.style.height = (headerH + rowH * rows) + 'px'; wrapper.style.overflow = 'hidden'; }
            }

            function applyDense() {
                clearMode();
                document.body.classList.add('layout-dense');
                const wrapper = document.querySelector('.table-responsive');
                const headerH = 44; const rowH = 42; const rows = 10;
                if (wrapper) { wrapper.style.height = (headerH + rowH * rows) + 'px'; wrapper.style.overflow = 'auto'; }
            }

            function applyAuto() {
                clearMode();
                document.body.classList.add('layout-auto');
                // run existing fit function if present
                try { if (typeof fitTableRows === 'function') fitTableRows(); } catch(e){}
            }

            if (btnCon) btnCon.addEventListener('click', applyConservative);
            if (btnDense) btnDense.addEventListener('click', applyDense);
            if (btnAuto) btnAuto.addEventListener('click', applyAuto);

            // default: auto
            document.addEventListener('DOMContentLoaded', function(){ applyAuto(); });
        })();
    </script>

    <style>
        /* Layout classes for quick preview */
        body.layout-conservative .card { /* visually emphasize compact */ }
        body.layout-dense .card { }
        body.layout-auto .card { }
    </style>

<!-- Auto-fit table rows into card area so N rows (<=10) are fully visible and footer sits below -->
<script>
    (function() {
        function fitTableRows() {
            try {
                const wrapper = document.querySelector('.table-responsive');
                const table = document.getElementById('unitTable');
                if (!wrapper || !table) return;

                // count visible rows (skip hidden ones from search)
                const allRows = Array.from(table.tBodies[0].rows).filter(r => r.style.display !== 'none');
                const rowsToFit = Math.min(10, allRows.length);

                const thead = table.querySelector('thead');
                const headRect = thead ? thead.getBoundingClientRect() : {height: 0};

                // sum heights of the first rowsToFit rows
                let rowsHeight = 0;
                for (let i = 0; i < rowsToFit; i++) {
                    const r = allRows[i];
                    if (!r) break;
                    const rect = r.getBoundingClientRect();
                    rowsHeight += rect.height;
                }

                // small extra padding to account for borders
                const extra = 8;

                const desired = Math.ceil(headRect.height + rowsHeight + extra);

                // compute available space: distance from wrapper top to viewport bottom minus footer area (~80px)
                const wrapperTop = wrapper.getBoundingClientRect().top;
                const avail = Math.max(window.innerHeight - wrapperTop - 120, 0);

                // If desired fits in available viewport space, set wrapper height to desired and disable internal scroll.
                if (desired <= avail) {
                    wrapper.style.height = desired + 'px';
                    wrapper.style.overflow = 'hidden';
                } else {
                    // otherwise cap to available and allow internal scrolling
                    wrapper.style.height = avail + 'px';
                    wrapper.style.overflow = 'auto';
                }
            } catch (e) {
                // ignore errors
                console.error(e);
            }
        }

        window.addEventListener('resize', fitTableRows);
        // run after a short delay to ensure fonts and rendering settled
        window.addEventListener('load', function() { setTimeout(fitTableRows, 80); });
        document.addEventListener('DOMContentLoaded', function() { setTimeout(fitTableRows, 80); });
    })();
</script>

<style>
    /* ensure table wrapper allows our JS to control height cleanly */
    .table-responsive { overflow: visible; }
</style>