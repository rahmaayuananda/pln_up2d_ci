<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Pembangkit</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-industry me-2 text-danger"></i> Data Pembangkit
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
                <h6 class="mb-0">Tabel Data Pembangkit</h6>
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('Pembangkit/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    <a href="<?= base_url('import/pembangkit') ?>" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-file-import me-1"></i> Import
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3">
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" placeholder="Cari data pembangkit...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="pembangkitTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Layanan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembangkit</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Longitude (X)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Latitude (Y)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Operasi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">INC</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">OGF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Spare</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Couple</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status SCADA</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IP Gateway</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IP RTU</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merk RTU</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SN RTU</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Integrasi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pembangkit)): ?>
                                <tr>
                                    <td colspan="17" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1;
                                foreach ($pembangkit as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UNIT_LAYANAN'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['PEMBANGKIT'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LONGITUDEX'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LATITUDEY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_OPERASI'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['INC'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['OGF'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['SPARE'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['COUPLE'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_SCADA'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['IP_GATEWAY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['IP_RTU'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MERK_RTU'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['SN_RTU'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['THN_INTEGRASI'] ?? ''); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Pembangkit/detail/' . $row['ID_PEMBANGKIT']); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Pembangkit/edit/' . $row['ID_PEMBANGKIT']); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Pembangkit/hapus/' . $row['ID_PEMBANGKIT']); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
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

    #pembangkitTable tbody tr:hover {
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