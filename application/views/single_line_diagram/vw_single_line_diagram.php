<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Single Line Diagram</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-project-diagram me-2"></i> Single Line Diagram
                </h6>
            </nav>
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
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton"></ul>
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

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-white">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card mb-4 shadow border-0 rounded-4">
            <div class="card-header py-3 bg-gradient-primary text-white rounded-top-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-4">
                        <div>
                            <h6 class="mb-0 fw-bold text-white"><i class="fas fa-project-diagram me-2"></i> Tabel Single Line Diagram</h6>
                        </div>
                        <!-- moved per-page control out of colored header to above the table -->
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <?php if (can_create()): ?>
                        <div>
                            <a href="<?= base_url('single_line_diagram/tambah') ?>" class="btn btn-sm btn-light text-primary">
                                <i class="fas fa-plus me-1"></i> Tambah
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">

                <!-- White control row above the table (per-page left, search right) -->
                <div class="px-3 py-2 mb-2 bg-white rounded-3 d-flex align-items-center justify-content-between" style="border:1px solid #eef3f6;">
                    <div class="d-flex align-items-center">
                        <label class="mb-0 me-2 fw-bold" style="color:#324a5f;">Tampilkan:</label>
                        <select id="perPageSelectTop" class="form-select form-select-sm" style="width:90px;">
                            <?php $options = [5,10,25,50,100]; $currentPer = $this->input->get('per_page') ? (int)$this->input->get('per_page') : 5; ?>
                            <?php foreach ($options as $opt): ?>
                                <option value="<?= $opt ?>" <?= ($opt == $currentPer) ? 'selected' : '' ?>><?= $opt ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="ms-3" style="color:#324a5f; opacity:0.85;">dari <?= $total_rows ?? count($sld) ?> data</div>
                    </div>

                    <div style="min-width:300px; max-width:640px;">
                        <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control form-control-sm rounded-3" placeholder="Cari GI atau Penyulang...">
                    </div>
                </div>

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="sldTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Pelaksana</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama GI</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Penyulang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">File Diagram</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($sld)): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-secondary py-4">
                                        Belum ada data Single Line Diagram
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $no = $start_no;
                                foreach ($sld as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>

                                        <!-- ✅ Kolom baru: Unit Pelaksana -->
                                        <td class="text-sm fw-bold">
                                            <?= !empty($row['NAMA_UNIT']) ? htmlentities($row['NAMA_UNIT']) : '<span class="text-muted fst-italic">Tidak ada data</span>'; ?>
                                        </td>

                                        <td class="text-sm fw-bold"><?= htmlentities($row['NAMA_GI']); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['NAMA_PENYULANG']); ?></td>

                                        <td class="text-center">
                                            <?php if (!empty($row['FILE_PDF'])): ?>
                                                <span class="badge bg-gradient-info text-white p-2">PDF Tersedia</span>
                                            <?php else: ?>
                                                <span class="text-muted fst-italic">Tidak ada file</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if (!empty($row['FILE_PDF'])): ?>
                                                <a href="<?= base_url('uploads/sld/' . $row['FILE_PDF']); ?>" target="_blank"
                                                    class="btn btn-info btn-xs text-white me-1" title="Lihat File PDF">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (can_edit()): ?>
                                            <a href="<?= base_url('single_line_diagram/edit/' . $row['ID_SLD']); ?>"
                                                class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <?php endif; ?>

                                            <?php if (can_delete()): ?>
                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('<?= base_url('single_line_diagram/hapus/' . $row['ID_SLD']); ?>')"
                                                class="btn btn-danger btn-xs" title="Hapus">
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
            </div>
        </div>
        <!-- Pagination links (summary removed) -->
        <div class="d-flex justify-content-end align-items-center mt-2 px-3">
            <?php if (!empty($pagination)): ?>
                <nav id="sldPagination" aria-label="Page navigation">
                    <?= $pagination ?>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</main>

<!-- Script dan Style tetap -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data SLD ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    function searchTable() {
        const inputTop = document.getElementById('searchInputTop') || document.getElementById('searchInput');
        const input = inputTop.value.toLowerCase();
        const rows = document.querySelectorAll('#sldTable tbody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(input) ? '' : 'none';
        });
    }

    // per-page selector at top
    document.getElementById('perPageSelectTop').addEventListener('change', function() {
        const per = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', per);
        url.searchParams.set('page', 1);
        window.location.href = url.toString();
    });
</script>

<style>
    .bg-gradient-primary {
        background: linear-gradient(90deg, #00416A, #0099CC);
    }

    .card-header h6 {
        color: #fff !important;
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

    #sldTable tbody tr:hover {
        background-color: #e9ecef !important;
        transition: 0.2s ease-in-out;
    }

    .btn-xs {
        padding: 4px 6px;
        font-size: 11px;
        border-radius: 5px;
    }

    .btn-xs i {
        font-size: 12px;
    }

    input#searchInput {
        max-width: 1100px;
    }

    /* Pagination rounded buttons like screenshot */
    #sldPagination .pagination {
        margin: 0;
        padding: 0;
        display: flex;
        gap: 8px;
        align-items: center;
    }

    #sldPagination .pagination li {
        list-style: none;
    }

    #sldPagination .pagination .page-link {
        border-radius: 50% !important;
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.35rem 0.45rem;
        border: 1px solid #e9ecef;
        color: #495057;
    }

    #sldPagination .pagination .page-item.active .page-link,
    #sldPagination .pagination .page-item .page-link:hover {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    /* refine pagination spacing */
    #sldPagination { padding-right: 8px; }
</style>