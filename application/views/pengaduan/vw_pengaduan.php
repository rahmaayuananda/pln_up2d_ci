<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Pengaduan</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">
                    <i class="fas fa-file-alt me-2 text-warning"></i> Data Pengaduan
                </h6>
            </nav>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid py-4">

        <!-- 🔹 Flash Message -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-white alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?= $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- 🔹 Card -->
        <div class="card mb-4 shadow border-0 rounded-4">
            <div class="card-header py-2 d-flex justify-content-between align-items-center bg-gradient-primary text-white rounded-top-4">
                <h6 class="mb-0">Tabel Data Pengaduan</h6>
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('Pengaduan/tambah') ?>"
                        class="btn btn-sm btn-light text-primary btn-tambah">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <!-- Filter & Search -->
                <div class="px-3 mt-3 mb-3 d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center mb-2 mb-md-0">
                        <label class="mb-0 me-2 text-sm">Tampilkan:</label>
                        <select id="perPageSelectPengaduan" class="form-select form-select-sm" style="width: 80px;" onchange="changePerPagePengaduan(this.value)">
                            <?php
                            $per_page = isset($per_page) ? $per_page : 10;
                            $options = [5, 10, 25, 50, 100, 500];
                            foreach ($options as $opt) {
                                $selected = ($per_page == $opt) ? 'selected' : '';
                                echo "<option value='$opt' $selected>$opt</option>";
                            }
                            ?>
                        </select>
                        <span class="ms-3 text-sm">dari <?= isset($total_rows) ? $total_rows : 0; ?> data</span>
                    </div>
                    <input type="text" id="searchInputPengaduan" onkeyup="searchTablePengaduan()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari data pengaduan...">
                </div>

                <!-- Table -->
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="pengaduanTable">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama UP3</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengaduan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Pengaduan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item Pengaduan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PIC</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pengaduan = isset($pengaduan) ? $pengaduan : [];
                            $start_no = isset($start_no) ? $start_no : 1;

                            if (empty($pengaduan)): ?>
                                <tr>
                                    <td colspan="8" class="text-center text-secondary py-4">Belum ada data pengaduan</td>
                                </tr>
                                <?php else:
                                $no = $start_no;
                                foreach ($pengaduan as $row): ?>
                                    <tr class="<?= ($no % 2 == 0) ? 'table-row-even' : 'table-row-odd'; ?>">
                                        <td class="text-sm"><?= $no++; ?></td>
                                        <td class="text-sm"><?= htmlentities($row['NAMA_UP3'] ?? '-'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['TANGGAL_PENGADUAN'] ?? '-'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['JENIS_PENGADUAN'] ?? '-'); ?></td>
                                        <td class="text-sm"><?= htmlentities($row['ITEM_PENGADUAN'] ?? '-'); ?></td>
                                        <td>
                                            <span class="badge 
                                                <?= ($row['STATUS'] ?? '') == 'Selesai' ? 'bg-success' : (($row['STATUS'] ?? '') == 'Diproses' ? 'bg-warning text-dark' : 'bg-secondary'); ?>">
                                                <?= htmlentities($row['STATUS'] ?? '-'); ?>
                                            </span>
                                        </td>
                                        <td class="text-sm"><?= htmlentities($row['PIC'] ?? '-'); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Pengaduan/detail/' . ($row['ID_PENGADUAN'] ?? '')); ?>" class="btn btn-info btn-xs text-white me-1" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="<?= base_url('Pengaduan/edit/' . ($row['ID_PENGADUAN'] ?? '')); ?>" class="btn btn-warning btn-xs text-white me-1" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="confirmDelete('<?= base_url('Pengaduan/hapus/' . ($row['ID_PENGADUAN'] ?? '')); ?>')" class="btn btn-danger btn-xs" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="card-footer d-flex justify-content-end">
                    <?= isset($pagination) ? $pagination : ''; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
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

    function changePerPagePengaduan(perPage) {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        url.searchParams.set('page', '1');
        window.location.href = url.toString();
    }

    function searchTablePengaduan() {
        const input = document.getElementById('searchInputPengaduan');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('pengaduanTable');
        const tr = table.getElementsByTagName('tr');
        for (let i = 1; i < tr.length; i++) {
            let txtValue = tr[i].textContent || tr[i].innerText;
            tr[i].style.display = (txtValue.toUpperCase().indexOf(filter) > -1) ? '' : 'none';
        }
    }
</script>

<!-- Style -->
<style>
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    #pengaduanTable tbody tr:hover {
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

    .btn-tambah {
        position: relative;
        top: 10px;
        /* 👉 ubah nilai ini sesuai kebutuhan kamu (misal 15px, 20px) */
    }
</style>