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
                    <a href="<?= base_url('Pemutus/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    <a href="<?= base_url('import/pemutus') ?>" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-file-import me-1"></i> Import
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <label class="me-2 mb-0 text-sm">Tampilkan:</label>
                        <select class="form-select form-select-sm" style="width: auto; padding-right: 2rem;" onchange="changePerPage(this.value)">
                            <option value="5" <?= ($per_page == 5) ? 'selected' : ''; ?>>5</option>
                            <option value="10" <?= ($per_page == 10) ? 'selected' : ''; ?>>10</option>
                            <option value="25" <?= ($per_page == 25) ? 'selected' : ''; ?>>25</option>
                            <option value="50" <?= ($per_page == 50) ? 'selected' : ''; ?>>50</option>
                            <option value="100" <?= ($per_page == 100) ? 'selected' : ''; ?>>100</option>
                            <option value="500" <?= ($per_page == 500) ? 'selected' : ''; ?>>500</option>
                        </select>
                        <span class="ms-2 text-sm">dari <?= $total_rows; ?> data</span>
                    </div>
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari data Pemutus...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="pemutusTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CXUNIT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">UNITNAME</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">UP3_2D</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ASSETNUM</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SSOTNUMBER</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LOCATION</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DESCRIPTION</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">VENDOR</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MANUFACTURER</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">INSTALLDATE</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PRIORITY</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STATUS</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TUJDNUMBER</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CHANGEBY</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CHANGEDATE</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CXCLASSIFICATIONDESC</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NAMA_LOCATION</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LONGITUDEX</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">LATITUDEY</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISASSET</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PEREDAM</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STATUS_KEPEMILIKAN</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CXPENYULANG</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TH_BUAT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TYPE_LBS</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MODE_OPERASI</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TYPE_RECLOSER</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MODE_OPR</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TYPE_OPERASI</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TYPE_SECTIONALIZER</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PEMUTUS_TYPE</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pemutus)): ?>
                                <tr>
                                    <td colspan="33" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $no = $start_no;
                                foreach ($pemutus as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXUNIT'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UNITNAME'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UP3_2D'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['ASSETNUM'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['SSOTNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['DESCRIPTION'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['VENDOR'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MANUFACTURER'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['INSTALLDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['PRIORITY'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TUJDNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CHANGEBY'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CHANGEDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXCLASSIFICATIONDESC'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['NAMA_LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LONGITUDEX'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LATITUDEY'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['ISASSET'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['PEREDAM'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_KEPEMILIKAN'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXPENYULANG'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TH_BUAT'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TYPE_LBS'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MODE_OPERASI'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TYPE_RECLOSER'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MODE_OPR'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TYPE_OPERASI'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TYPE_SECTIONALIZER'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><span class="badge badge-sm bg-gradient-<?= ($row['PEMUTUS_TYPE'] == 'LBS') ? 'info' : (($row['PEMUTUS_TYPE'] == 'RECLOSER') ? 'warning' : 'success'); ?>"><?= htmlentities($row['PEMUTUS_TYPE'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Pemutus/detail/' . $row['id']); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Pemutus/edit/' . $row['id']); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Pemutus/hapus/' . $row['id']); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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

<!-- Script pencarian dan per-page -->
<script>
    function searchTable() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#pemutusTable tbody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(input) ? '' : 'none';
        });
    }

    function changePerPage(perPage) {
        window.location.href = '<?= base_url('pemutus/index'); ?>?per_page=' + perPage;
    }

    // Konfirmasi hapus ditangani global di layout/footer.php
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