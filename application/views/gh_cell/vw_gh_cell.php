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
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari data GH Cell...">
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="ghCellTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CX Unit</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asset Num</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SSOT Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vendor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Manufacturer</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Install Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Priority</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TU JD Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Change By</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Change Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CX Classification</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CX Penyulang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Location</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Longitude X</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Latitude Y</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Burden</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Faktor Kali</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Is Asset</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis CT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas CT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas Proteksi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Primer Sekunder</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Kepemilikan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe CT</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($gh_cell)): ?>
                                <tr>
                                    <td colspan="30" class="text-center text-secondary py-4">Belum ada data</td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $no = $start_no;
                                foreach ($gh_cell as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXUNIT'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['UNITNAME'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['ASSETNUM'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['SSOTNUMBER'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LOCATION'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['DESCRIPTION'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['VENDOR'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['MANUFACTURER'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['INSTALLDATE'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['PRIORITY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TUJDNUMBER'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CHANGEBY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CHANGEDATE'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXCLASSIFICATIONDESC'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['CXPENYULANG'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['NAMA_LOCATION'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LONGITUDEX'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['LATITUDEY'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['BURDEN'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['FAKTOR_KALI'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['ISASSET'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['JENIS_CT'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['KELAS_CT'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['KELAS_PROTEKSI'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['PRIMER_SEKUNDER'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['STATUS_KEPEMILIKAN'] ?? ''); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TIPE_CT'] ?? ''); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Gh_cell/detail/' . $row['SSOTNUMBER']); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Gh_cell/edit/' . $row['SSOTNUMBER']); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('Gh_cell/hapus/' . $row['SSOTNUMBER']); ?>" class="btn btn-danger btn-xs btn-hapus" title="Hapus">
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

<script>
    function changePerPage(value) {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', value);
        url.searchParams.delete('page'); // Reset to first page
        window.location.href = url.toString();
    }

    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("ghCellTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }
</script>