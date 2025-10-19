<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3"></div>
    </nav>

    <!-- Content -->
    <div class="container-fluid py-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white rounded-top-4">
                <strong><i class="fas fa-edit me-2"></i> Form Edit BPM</strong>
            </div>

            <div class="card-body">
                <form action="<?= base_url('Bpm/edit/' . urlencode($bpm['ID_BPM'])); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- Nama File -->
                        <div class="col-md-6">
                            <label class="form-label">Nama File BPM</label>
                            <input type="text" class="form-control" name="NAMA_FILE"
                                value="<?= htmlentities($bpm['NAMA_FILE'] ?? ''); ?>" required>
                        </div>

                        <!-- Created By -->
                        <div class="col-md-6">
                            <label class="form-label">Dibuat Oleh</label>
                            <input type="text" class="form-control" name="CREATED_BY"
                                value="<?= htmlentities($bpm['CREATED_BY'] ?? ''); ?>" required>
                        </div>

                        <!-- File BPM -->
                        <div class="col-md-12">
                            <label class="form-label">File BPM</label>
                            <?php if (!empty($bpm['FILE_BPM'])): ?>
                                <div class="mt-2 mb-3">
                                    <p class="mb-1">
                                        <i class="fas fa-file-alt text-primary me-1"></i>
                                        <strong>File saat ini:</strong> <?= htmlentities($bpm['FILE_BPM']); ?>
                                    </p>
                                    <a href="<?= base_url('uploads/bpm/' . $bpm['FILE_BPM']); ?>" target="_blank" class="btn btn-sm btn-info text-white me-2">
                                        <i class="fas fa-eye me-1"></i> Lihat File
                                    </a>
                                    <a href="<?= base_url('uploads/bpm/' . $bpm['FILE_BPM']); ?>" download class="btn btn-sm btn-success text-white">
                                        <i class="fas fa-download me-1"></i> Unduh
                                    </a>
                                </div>
                            <?php else: ?>
                                <p class="text-muted">Belum ada file diunggah.</p>
                            <?php endif; ?>

                            <input type="file" name="FILE_BPM" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                                onchange="previewFileName(this)">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>

                            <div class="mt-2" id="file-preview" style="display:none;">
                                <i class="fas fa-file-upload text-success me-1"></i>
                                <span id="file-name"></span>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4">
                        <a href="<?= base_url('Bpm'); ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        // Preview nama file yang diunggah
        function previewFileName(input) {
            const filePreview = document.getElementById('file-preview');
            const fileName = document.getElementById('file-name');

            if (input.files && input.files[0]) {
                fileName.textContent = input.files[0].name;
                filePreview.style.display = 'block';
            } else {
                filePreview.style.display = 'none';
            }
        }
    </script>

    <!-- STYLE -->
    <style>
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 600;
        }

        .bg-gradient-primary {
            background: linear-gradient(90deg, #005C99, #0099CC);
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
        }

        input.form-control {
            height: 40px !important;
            font-size: 0.9rem;
        }

        #file-preview {
            font-size: 0.9rem;
        }

        .btn i {
            font-size: 0.85rem;
        }
    </style>
</main>