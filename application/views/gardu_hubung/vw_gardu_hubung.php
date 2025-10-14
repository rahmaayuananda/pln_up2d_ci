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
                <div class="px-3 mt-3 mb-3">
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" placeholder="Cari data Gardu Hubung...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="ghTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SSOT Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Layanan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gardu Hubung</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Longitude (X)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Latitude (Y)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Operasi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status SCADA</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IP Gateway</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IP RTU</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merk RTU</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Komunikasi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Integrasi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Pasang Batt</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">FOTO BANGUNAN</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">FOTO BATT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">FOTO SUSUNAN CELL</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">FOTO RECTI</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merk Recti</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thn Recti</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">FOTO GROUNDING</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grounding Ohm</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($gardu_hubung)): ?>
                                <tr>
                                    <td colspan="24" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1;
                                foreach ($gardu_hubung as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                               <td class="text-sm"><?= htmlentities($row['SSOTNUMBER_GH'] ?? ''); ?></td>
                                               <td class="text-sm"><?= htmlentities($row['UNIT_LAYANAN'] ?? ''); ?></td>
                                               <td class="text-sm"><?= htmlentities($row['GARDU_HUBUNG'] ?? ''); ?></td>
                                               <td class="text-sm"><?= htmlentities($row['LONGITUDEX'] ?? ''); ?></td>
                                               <td class="text-sm"><?= htmlentities($row['LATITUDEY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['ADDRESS'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_OPERASI'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_SCADA'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['IP_GATEWAY'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['IP_RTU'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MERK_RTU'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['KOMUNIKASI'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TGL_INTEGRASI'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TGL_PASANG_BATT'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>

                                        <!-- FOTO -->
                                        <td class="text-center">
                                            <?php if (!empty($row['FOTO_BANGUNAN'])): ?>
                                                <a href="<?= base_url('uploads/foto/' . $row['FOTO_BANGUNAN']); ?>" target="_blank" class="badge bg-info text-white">Bangunan</a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($row['FOTO_BATT'])): ?>
                                                <a href="<?= base_url('uploads/foto/' . $row['FOTO_BATT']); ?>" target="_blank" class="badge bg-warning text-dark">Batt</a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($row['FOTO_SUSUNAN_CELL'])): ?>
                                                <a href="<?= base_url('uploads/foto/' . $row['FOTO_SUSUNAN_CELL']); ?>" target="_blank" class="badge bg-success text-white">Cell</a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($row['FOTO_RECTI'])): ?>
                                                <a href="<?= base_url('uploads/foto/' . $row['FOTO_RECTI']); ?>" target="_blank" class="badge bg-secondary text-white">Recti</a>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-sm"><?= htmlentities($row['MERK_RECTI'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['THN_RECTI'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>

                                        <td class="text-center">
                                            <?php if (!empty($row['FOTO_GROUNDING'])): ?>
                                                <a href="<?= base_url('uploads/foto/' . $row['FOTO_GROUNDING']); ?>" target="_blank" class="badge bg-primary text-white">Grounding</a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-sm"><?= htmlentities($row['GROUNDING_OHM'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>

                                        <!-- Aksi -->
                                        <td class="text-center">
                                            <a href="<?= base_url('Gardu_hubung/detail/' . $row['SSOTNUMBER_GH']); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Gardu_hubung/edit/' . $row['SSOTNUMBER_GH']); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Gardu_hubung/hapus/' . $row['SSOTNUMBER_GH']); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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