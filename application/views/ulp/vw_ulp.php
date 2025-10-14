<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data ULP</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-sitemap me-2 text-success"></i> Data ULP
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
                <h6 class="mb-0">Tabel Data ULP</h6>
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('Ulp/tambah') ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    <a href="<?= base_url('import/ulp') ?>" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-file-import me-1"></i> Import
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3">
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" placeholder="Cari data ULP...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="ulpTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CXUNIT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama ULP</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">UP3_2D</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($ulp)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1;
                                foreach ($ulp as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXUNIT'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['NAMA_ULP'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UP3_2D'] ?? ''); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Ulp/detail/' . $row['CXUNIT']); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Ulp/edit/' . $row['CXUNIT']); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Ulp/hapus/' . $row['CXUNIT']); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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

<!-- Script Pencarian -->
<script>
    function searchTable() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const rows = document.querySelectorAll("#ulpTable tbody tr");
        rows.forEach(row => {
            const visible = Array.from(row.cells).some(cell =>
                cell.textContent.toLowerCase().includes(input)
            );
            row.style.display = visible ? "" : "none";
        });
    }

    // Hapus konfirmasi ditangani global pada layout/footer.php
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

    #ulpTable tbody tr:hover {
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