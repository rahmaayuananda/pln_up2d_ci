<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header bg-gradient-primary text-white">
                <h6 class="mb-0">Notifikasi</h6>
            </div>
            <div class="card-body">
                <?php if (empty($notifikasi)): ?>
                    <p>Tidak ada notifikasi.</p>
                <?php else: ?>
                    <div class="list-group">
                        <?php foreach ($notifikasi as $n): ?>
                            <a href="<?= htmlentities($n['LINK'] ?? '#', ENT_QUOTES, 'UTF-8'); ?>" class="list-group-item list-group-item-action <?= ($n['IS_READ']) ? '' : 'list-group-item-warning'; ?>">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1"><?= htmlentities($n['TITLE'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h6>
                                    <small><?= htmlentities($n['CREATED_AT'] ?? '', ENT_QUOTES, 'UTF-8'); ?></small>
                                </div>
                                <p class="mb-1"><?= htmlentities($n['MESSAGE'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                                <?php if (!$n['IS_READ']): ?>
                                    <small><a href="<?= base_url('Notifikasi/mark_read/' . $n['ID_NOTIF']); ?>">Tandai sudah dibaca</a></small>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('Notifikasi/mark_all_read'); ?>" class="btn btn-sm btn-primary">Tandai Semua Dibilang</a>
            </div>
        </div>
    </div>
</main>
<main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3 d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bolder mb-0">
                <i class="ni ni-bell-55 text-primary text-sm opacity-10 me-2"></i>
                Notifikasi Aktivitas
            </h6>
            <div class="position-relative">
                <a href="<?= base_url('notifikasi'); ?>" class="btn btn-light position-relative">
                    <i class="ni ni-bell-55 text-primary"></i>
                    <span id="notifBadge"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= $unread_count ?? 0 ?>
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="card shadow-lg border-radius-xl">
            <div class="card-header bg-gradient-primary text-white d-flex align-items-center justify-content-between">
                <h6 class="mb-0"><i class="ni ni-notification-70 me-2 text-white"></i> Riwayat Aktivitas Sistem</h6>
            </div>

            <div class="card-body px-4 py-3">
                <table class="table table-hover align-middle mb-0" id="notifTable">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>Pengguna</th>
                            <th>Aksi</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($notifikasi)): ?>
                            <?php $no = 1;
                            foreach ($notifikasi as $n): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d M Y H:i', strtotime($n['TANGGAL_AKSI'])) ?></td>
                                    <td><?= htmlspecialchars($n['USER_ID']) ?></td>
                                    <td>
                                        <?php if ($n['JENIS_AKSI'] == 'Tambah'): ?>
                                            <span class="badge bg-success">Tambah</span>
                                        <?php elseif ($n['JENIS_AKSI'] == 'Edit'): ?>
                                            <span class="badge bg-warning text-dark">Edit</span>
                                        <?php elseif ($n['JENIS_AKSI'] == 'Hapus'): ?>
                                            <span class="badge bg-danger">Hapus</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary"><?= $n['JENIS_AKSI'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($n['DESKRIPSI']) ?></td>
                                    <td>
                                        <?php if ($n['STATUS_BACA'] == 'Belum Dibaca'): ?>
                                            <span class="badge bg-danger">Belum Dibaca</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Dibaca</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada aktivitas yang tercatat</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- 🔁 AJAX Auto Refresh Notifikasi -->
<script>
    function updateNotifikasi() {
        fetch('<?= base_url("notifikasi/get_latest"); ?>')
            .then(response => response.json())
            .then(data => {
                document.getElementById('notifBadge').innerText = data.unread_count ?? 0;

                let tbody = '';
                let no = 1;
                data.latest.forEach(n => {
                    let badgeClass = n.JENIS_AKSI === 'Tambah' ? 'bg-success' :
                        (n.JENIS_AKSI === 'Edit' ? 'bg-warning text-dark' :
                            (n.JENIS_AKSI === 'Hapus' ? 'bg-danger' : 'bg-secondary'));

                    tbody += `
                        <tr>
                            <td>${no++}</td>
                            <td>${new Date(n.TANGGAL_AKSI).toLocaleString('id-ID')}</td>
                            <td>${n.USER_ID}</td>
                            <td><span class="badge ${badgeClass}">${n.JENIS_AKSI}</span></td>
                            <td>${n.DESKRIPSI}</td>
                            <td>
                                ${n.STATUS_BACA === 'Belum Dibaca'
                                    ? '<span class="badge bg-danger">Belum Dibaca</span>'
                                    : '<span class="badge bg-secondary">Dibaca</span>'
                                }
                            </td>
                        </tr>
                    `;
                });

                document.querySelector('#notifTable tbody').innerHTML = tbody;
            });
    }

    // Refresh otomatis tiap 10 detik
    setInterval(updateNotifikasi, 10000);
</script>

<style>
    .card-header {
        font-weight: 600;
        font-size: 15px;
    }

    .badge {
        font-size: 11px;
        padding: 5px 8px;
    }

    table tr:hover {
        background-color: #f5f7fa !important;
    }
</style>