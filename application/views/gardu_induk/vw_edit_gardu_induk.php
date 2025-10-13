<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="container mt-3">
                        <h1 class="h3 mb-4 text-gray-800 font-bold"><?php echo $judul; ?></h1>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white font-weight-bold">
                                        Form Ubah Data Gardu Induk
                                    </div>

                                    <div class="card-body">
                                        <form action="<?= base_url('gardu_induk/update'); ?>" method="POST">
                                            <input type="hidden" name="ID_GI" value="<?= $gardu_induk['ID_GI']; ?>">

                                            <div class="form-group">
                                                <label for="UNIT_LAYANAN">Unit Layanan</label>
                                                <input type="text" name="UNIT_LAYANAN"
                                                    value="<?= $gardu_induk['UNIT_LAYANAN']; ?>"
                                                    class="form-control" id="UNIT_LAYANAN" placeholder="Masukkan Unit Layanan">
                                            </div>

                                            <div class="form-group">
                                                <label for="GARDU_INDUK">Gardu Induk</label>
                                                <input type="text" name="GARDU_INDUK"
                                                    value="<?= $gardu_induk['GARDU_INDUK']; ?>"
                                                    class="form-control" id="GARDU_INDUK" placeholder="Masukkan Nama Gardu Induk">
                                            </div>

                                            <div class="form-group">
                                                <label for="LONGITUDEX">Longitude (X)</label>
                                                <input type="text" name="LONGITUDEX"
                                                    value="<?= $gardu_induk['LONGITUDEX']; ?>"
                                                    class="form-control" id="LONGITUDEX" placeholder="Contoh: 100.123456">
                                            </div>

                                            <div class="form-group">
                                                <label for="LATITUDEY">Latitude (Y)</label>
                                                <input type="text" name="LATITUDEY"
                                                    value="<?= $gardu_induk['LATITUDEY']; ?>"
                                                    class="form-control" id="LATITUDEY" placeholder="Contoh: -0.123456">
                                            </div>

                                            <div class="form-group">
                                                <label for="STATUS_OPERASI">Status Operasi</label>
                                                <select name="STATUS_OPERASI" id="STATUS_OPERASI" class="form-control">
                                                    <option value="Operasi" <?= $gardu_induk['STATUS_OPERASI'] == "Operasi" ? 'selected' : ''; ?>>Operasi</option>
                                                    <option value="Tidak Operasi" <?= $gardu_induk['STATUS_OPERASI'] == "Tidak Operasi" ? 'selected' : ''; ?>>Tidak Operasi</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="JML_TD">Jumlah TD</label>
                                                <input type="number" name="JML_TD" value="<?= $gardu_induk['JML_TD']; ?>" class="form-control" id="JML_TD">
                                            </div>

                                            <div class="form-group">
                                                <label for="INC">INC</label>
                                                <input type="number" name="INC" value="<?= $gardu_induk['INC']; ?>" class="form-control" id="INC">
                                            </div>

                                            <div class="form-group">
                                                <label for="OGF">OGF</label>
                                                <input type="number" name="OGF" value="<?= $gardu_induk['OGF']; ?>" class="form-control" id="OGF">
                                            </div>

                                            <div class="form-group">
                                                <label for="SPARE">SPARE</label>
                                                <input type="number" name="SPARE" value="<?= $gardu_induk['SPARE']; ?>" class="form-control" id="SPARE">
                                            </div>

                                            <div class="form-group">
                                                <label for="COUPLE">COUPLE</label>
                                                <input type="number" name="COUPLE" value="<?= $gardu_induk['COUPLE']; ?>" class="form-control" id="COUPLE">
                                            </div>

                                            <div class="form-group">
                                                <label for="BUS_RISER">BUS RISER</label>
                                                <input type="number" name="BUS_RISER" value="<?= $gardu_induk['BUS_RISER']; ?>" class="form-control" id="BUS_RISER">
                                            </div>

                                            <div class="form-group">
                                                <label for="BBVT">BBVT</label>
                                                <input type="number" name="BBVT" value="<?= $gardu_induk['BBVT']; ?>" class="form-control" id="BBVT">
                                            </div>

                                            <div class="form-group">
                                                <label for="PS">PS</label>
                                                <input type="number" name="PS" value="<?= $gardu_induk['PS']; ?>" class="form-control" id="PS">
                                            </div>

                                            <div class="form-group">
                                                <label for="STATUS_SCADA">Status SCADA</label>
                                                <select name="STATUS_SCADA" id="STATUS_SCADA" class="form-control">
                                                    <option value="Terintegrasi" <?= $gardu_induk['STATUS_SCADA'] == "Terintegrasi" ? 'selected' : ''; ?>>Terintegrasi</option>
                                                    <option value="Belum Terintegrasi" <?= $gardu_induk['STATUS_SCADA'] == "Belum Terintegrasi" ? 'selected' : ''; ?>>Belum Terintegrasi</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="IP_GATEWAY">IP Gateway</label>
                                                <input type="text" name="IP_GATEWAY" value="<?= $gardu_induk['IP_GATEWAY']; ?>" class="form-control" id="IP_GATEWAY" placeholder="Contoh: 192.168.1.1">
                                            </div>

                                            <div class="form-group">
                                                <label for="IP_RTU">IP RTU</label>
                                                <input type="text" name="IP_RTU" value="<?= $gardu_induk['IP_RTU']; ?>" class="form-control" id="IP_RTU" placeholder="Contoh: 192.168.1.2">
                                            </div>

                                            <div class="form-group">
                                                <label for="MERK_RTU">Merk RTU</label>
                                                <input type="text" name="MERK_RTU" value="<?= $gardu_induk['MERK_RTU']; ?>" class="form-control" id="MERK_RTU">
                                            </div>

                                            <div class="form-group">
                                                <label for="SN_RTU">SN RTU</label>
                                                <input type="text" name="SN_RTU" value="<?= $gardu_induk['SN_RTU']; ?>" class="form-control" id="SN_RTU">
                                            </div>

                                            <div class="form-group">
                                                <label for="THN_INTEGRASI">Tahun Integrasi</label>
                                                <input type="text" name="THN_INTEGRASI" value="<?= $gardu_induk['THN_INTEGRASI']; ?>" class="form-control" id="THN_INTEGRASI" placeholder="Contoh: 2023">
                                            </div>

                                            <a href="<?= base_url('gardu_induk') ?>" class="btn btn-danger">Tutup</a>
                                            <button type="submit" name="edit" class="btn btn-primary float-right">
                                                Ubah Gardu Induk
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>