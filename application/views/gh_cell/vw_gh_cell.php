<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data GH Cell</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-square me-2 text-secondary"></i> Data GH Cell - Penyulang
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
                <h6 class="mb-0">Tabel Data GH Cell</h6>
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('Gh_cell/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    <a href="<?= base_url('import/gh_cell') ?>" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-file-import me-1"></i> Import
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3">
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" placeholder="Cari data GH Cell...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="ghCellTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SSOT Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gardu Hubung</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Cell</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Cell</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Operasi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merk Cell</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Cell</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Cell</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status SCADA</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merk Relay</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type Relay</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Relay</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ratio CT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($gh_cell)): ?>
                                <tr>
                                    <td colspan="15" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $no = $start_no;
                                foreach ($gh_cell as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['SSOTNUMBER'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['GARDU_HUBUNG'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['NAMA_CELL'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['JENIS_CELL'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_OPERASI'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MERK_CELL'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TYPE_CELL'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['THN_CELL'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_SCADA'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MERK_RELAY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TYPE_RELAY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['THN_RELAY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['RATIO_CT'] ?? ''); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Gh_cell/detail/' . urlencode($row['SSOTNUMBER'])); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Gh_cell/edit/' . urlencode($row['SSOTNUMBER'])); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Gh_cell/hapus/' . urlencode($row['SSOTNUMBER'])); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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

    .card-header .d-flex.align-items-center a {
        transform: translateY(10px);
    }

    .table-row-odd {
        background-color: #ffffff;
    }

    .table-row-even {
        background-color: #f5f7fa;
    }

    #ghCellTable tbody tr:hover {
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