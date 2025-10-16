<main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Gardu Hubung</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-network-wired me-2"></i> Data Gardu Hubung
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
                <h6 class="mb-0">Tabel Data Gardu Hubung</h6>
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('Gardu_hubung/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    <a href="<?= base_url('import/gardu_hubung') ?>" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-file-import me-1"></i> Import
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <label class="mb-0 me-2 text-sm">Tampilkan:</label>
                        <select id="perPageSelectGH" class="form-select form-select-sm" style="width: 80px; padding-right: 2rem;" onchange="changePerPageGH(this.value)">
                            <option value="5" <?= ($per_page == 5) ? 'selected' : ''; ?>>5</option>
                            <option value="10" <?= ($per_page == 10) ? 'selected' : ''; ?>>10</option>
                            <option value="25" <?= ($per_page == 25) ? 'selected' : ''; ?>>25</option>
                            <option value="50" <?= ($per_page == 50) ? 'selected' : ''; ?>>50</option>
                            <option value="100" <?= ($per_page == 100) ? 'selected' : ''; ?>>100</option>
                            <option value="500" <?= ($per_page == 500) ? 'selected' : ''; ?>>500</option>
                        </select>
                        <span class="ms-3 text-sm">dari <?= $total_rows; ?> data</span>
                    </div>
                    <input type="text" id="searchInputGH" onkeyup="searchTableGH()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari data Gardu Hubung...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="ghTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SSOT Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Longitude (X)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Latitude (Y)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Street Address</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">City</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($gardu_hubung)): ?>
                                <tr>
                                    <td colspan="11" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $no = $start_no;
                                foreach ($gardu_hubung as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['SSOTNUMBER'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LOCATION'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['DESCRIPTION'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UNITNAME'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LONGITUDEX'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LATITUDEY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STREETADDRESS'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CITY'] ?? ''); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Gardu_hubung/detail/' . urlencode($row['SSOTNUMBER'] ?? '')); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Gardu_hubung/edit/' . urlencode($row['SSOTNUMBER'] ?? '')); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Gardu_hubung/hapus/' . urlencode($row['SSOTNUMBER'] ?? '')); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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

    .table-row-odd {
        background-color: #ffffff;
    }

    .table-row-even {
        background-color: #f5f7fa;
    }

    #ghTable tbody tr:hover {
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

<script>
    function changePerPageGH(perPage) {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        url.searchParams.set('page', '1');
        window.location.href = url.toString();
    }

    function searchTableGH() {
        const input = document.getElementById('searchInputGH');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('ghTable');
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
</script>