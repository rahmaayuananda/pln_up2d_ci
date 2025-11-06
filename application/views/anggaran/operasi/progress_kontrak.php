<main class="main-content position-relative border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Progress Kontrak</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0"><i class="fas <?= $icon ?> me-2"></i> Progress Kontrak</h6>
            </nav>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlentities($error) ?></div>
        <?php endif; ?>

        <div class="card mb-4 shadow border-0 rounded-4">
            <div class="card-header py-2 d-flex justify-content-between align-items-center bg-gradient-primary text-white rounded-top-4">
                <h6 class="mb-0">Data Progress Kontrak</h6>
                <div class="d-flex align-items-center">
                    <a href="<?= base_url('anggaran/operasi/add_progress_kontrak'); ?>" class="btn btn-sm btn-light text-primary me-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                    
                    <a href="#" class="btn btn-sm btn-light text-secondary" onclick="downloadCSVProgressKontrak()">
                        <i class="fas fa-file-csv me-1"></i> Download CSV
                    </a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 bg-white">
                <div class="px-3 mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <label class="mb-0 me-2 text-sm">Tampilkan:</label>
                        <select id="perPageSelectProgressKontrak" class="form-select form-select-sm" style="width: 80px; padding-right: 2rem;" onchange="changePerPageProgressKontrak(this.value)">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                        </select>
                        <span class="ms-3 text-sm">dari <?= count($rows) ?> data</span>
                    </div>
                    <input type="text" id="searchInputProgressKontrak" onkeyup="searchTableProgressKontrak()" class="form-control form-control-sm rounded-3" style="max-width: 300px;" placeholder="Cari data Progress Kontrak...">
                </div>

                <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="progressKontrakTable">
                            <thead class="bg-light">
                                <tr>
                                    <?php if (!empty($fields)): ?>
                                        <?php foreach ($fields as $f): ?>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><?= htmlentities($f) ?></th>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Belum ada kolom</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($rows)): ?>
                                    <tr><td colspan="<?= max(1, count($fields)) ?>" class="text-center text-secondary py-4">Belum ada data</td></tr>
                                <?php else: ?>
                                    <?php foreach ($rows as $r): ?>
                                        <tr>
                                            <?php foreach ($fields as $f): ?>
                                                <td class="text-sm"><?= isset($r[$f]) ? htmlentities((string)$r[$f]) : '' ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <nav>
                        <ul class="pagination pagination-sm mb-0 asset-pagination" id="paginationProgressKontrak"></ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>


<style>
.asset-pagination .page-item {
    margin: 0 2px;
}
.asset-pagination .page-link {
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #005C99;
    background: #fff;
    border: none;
    box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    font-weight: 500;
    font-size: 16px;
    transition: background 0.2s, color 0.2s;
}
.asset-pagination .page-item.active .page-link {
    background: #116A7B;
    color: #fff;
    box-shadow: 0 4px 12px rgba(17,106,123,0.12);
}
.asset-pagination .page-link:hover {
    background: #e9ecef;
    color: #005C99;
}
.asset-pagination .page-item.disabled .page-link {
    color: #adb5bd;
    background: #fff;
    cursor: not-allowed;
}
.asset-pagination .page-link.last {
    border-radius: 20px;
    width: auto;
    padding: 0 16px;
}
</style>
<script>
let currentPage = 1;
let perPage = 10;
function getFilteredRows() {
    const input = document.getElementById('searchInputProgressKontrak');
    const filter = (input.value || '').toUpperCase();
    const table = document.getElementById('progressKontrakTable');
    const allRows = Array.from(table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'));
    if (!filter) return allRows;
    return allRows.filter(row => (row.textContent || row.innerText || '').toUpperCase().indexOf(filter) > -1);
}

function renderTableProgressKontrak() {
    const table = document.getElementById('progressKontrakTable');
    const tbody = table.getElementsByTagName('tbody')[0];
    const rows = getFilteredRows();
    const total = rows.length;
    const start = (currentPage - 1) * perPage;
    const end = start + perPage;
    rows.forEach((row, i) => {
        row.style.display = (i >= start && i < end) ? '' : 'none';
    });
    renderPaginationProgressKontrak(total);
}

function renderPaginationProgressKontrak(total) {
    const pagination = document.getElementById('paginationProgressKontrak');
    pagination.innerHTML = '';
    const totalPages = Math.ceil(total / perPage);
    if (totalPages <= 1) return;
    // Prev
    pagination.appendChild(createPageItem('«', currentPage > 1, () => setPage(currentPage - 1)));
    // Pages
    for (let i = 1; i <= totalPages; i++) {
        pagination.appendChild(createPageItem(i, true, () => setPage(i), i === currentPage));
    }
    // Next
    pagination.appendChild(createPageItem('»', currentPage < totalPages, () => setPage(currentPage + 1)));
    // Last
    pagination.appendChild(createPageItem('Last', currentPage < totalPages, () => setPage(totalPages), false, true));
}

function createPageItem(text, enabled, onClick, active = false, isLast = false) {
    const li = document.createElement('li');
    li.className = 'page-item' + (enabled ? '' : ' disabled') + (active ? ' active' : '');
    const a = document.createElement('a');
    a.className = 'page-link' + (isLast ? ' last' : '');
    a.href = '#';
    a.innerText = text;
    if (enabled) a.onclick = function(e){e.preventDefault();onClick();};
    li.appendChild(a);
    return li;
}

function setPage(page) {
    currentPage = page;
    renderTableProgressKontrak();
}

function changePerPageProgressKontrak(val) {
    perPage = parseInt(val);
    currentPage = 1;
    renderTableProgressKontrak();
}

function searchTableProgressKontrak() {
    currentPage = 1;
    renderTableProgressKontrak();
}

function downloadCSVProgressKontrak() {
    const table = document.getElementById('progressKontrakTable');
    let csv = '';
    const rows = getFilteredRows();
    const header = table.querySelectorAll('thead th');
    let headerRow = [];
    for (let h of header) headerRow.push('"' + h.innerText.replace(/"/g, '""') + '"');
    csv += headerRow.join(',') + '\n';
    for (let row of rows) {
        let cols = row.querySelectorAll('td');
        let rowData = [];
        for (let col of cols) rowData.push('"' + col.innerText.replace(/"/g, '""') + '"');
        csv += rowData.join(',') + '\n';
    }
    const blob = new Blob([csv], { type: 'text/csv' });
    const link = document.createElement('a');
    link.href = window.URL.createObjectURL(blob);
    link.download = 'progress_kontrak_op.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('perPageSelectProgressKontrak').value = perPage;
    renderTableProgressKontrak();
});
</script>
