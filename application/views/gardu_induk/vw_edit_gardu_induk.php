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
                                            <!-- Use SSOTNUMBER as canonical identifier plus legacy ID_GI for compatibility -->
                                            <input type="hidden" name="ID_GI" value="<?= htmlentities($gardu_induk['ID_GI'] ?? $gardu_induk['SSOTNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                            <input type="hidden" name="original_SSOTNUMBER" value="<?= htmlentities($gardu_induk['SSOTNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                                            <div class="form-group">
                                                <label for="SSOTNUMBER">SSOTNUMBER</label>
                                                <input type="text" name="SSOTNUMBER" value="<?= htmlentities($gardu_induk['SSOTNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="SSOTNUMBER">
                                            </div>

                                            <div class="form-group">
                                                <label for="UP3_2D">UP3_2D</label>
                                                <input type="text" name="UP3_2D" value="<?= htmlentities($gardu_induk['UP3_2D'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="UP3_2D">
                                            </div>

                                            <div class="form-group">
                                                <label for="UNITNAME_UP3">UNITNAME_UP3</label>
                                                <input type="text" name="UNITNAME_UP3" value="<?= htmlentities($gardu_induk['UNITNAME_UP3'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="UNITNAME_UP3">
                                            </div>

                                            <div class="form-group">
                                                <label for="CXUNIT">CXUNIT</label>
                                                <input type="text" name="CXUNIT" value="<?= htmlentities($gardu_induk['CXUNIT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="CXUNIT">
                                            </div>

                                            <div class="form-group">
                                                <label for="UNITNAME">UNITNAME</label>
                                                <input type="text" name="UNITNAME" value="<?= htmlentities($gardu_induk['UNITNAME'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="UNITNAME">
                                            </div>

                                            <div class="form-group">
                                                <label for="LOCATION">LOCATION</label>
                                                <input type="text" name="LOCATION" value="<?= htmlentities($gardu_induk['LOCATION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="LOCATION">
                                            </div>

                                            <div class="form-group">
                                                <label for="DESCRIPTION">DESCRIPTION</label>
                                                <input type="text" name="DESCRIPTION" value="<?= htmlentities($gardu_induk['DESCRIPTION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="DESCRIPTION">
                                            </div>

                                            <div class="form-group">
                                                <label for="STATUS">STATUS</label>
                                                <input type="text" name="STATUS" value="<?= htmlentities($gardu_induk['STATUS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="STATUS">
                                            </div>

                                            <div class="form-group">
                                                <label for="TUJDNUMBER">TUJDNUMBER</label>
                                                <input type="text" name="TUJDNUMBER" value="<?= htmlentities($gardu_induk['TUJDNUMBER'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="TUJDNUMBER">
                                            </div>

                                            <div class="form-group">
                                                <label for="ASSETCLASSHI">ASSETCLASSHI</label>
                                                <input type="text" name="ASSETCLASSHI" value="<?= htmlentities($gardu_induk['ASSETCLASSHI'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="ASSETCLASSHI">
                                            </div>

                                            <div class="form-group">
                                                <label for="SADDRESSCODE">SADDRESSCODE</label>
                                                <input type="text" name="SADDRESSCODE" value="<?= htmlentities($gardu_induk['SADDRESSCODE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="SADDRESSCODE">
                                            </div>

                                            <div class="form-group">
                                                <label for="CXCLASSIFICATIONDESC">CXCLASSIFICATIONDESC</label>
                                                <input type="text" name="CXCLASSIFICATIONDESC" value="<?= htmlentities($gardu_induk['CXCLASSIFICATIONDESC'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="CXCLASSIFICATIONDESC">
                                            </div>

                                            <div class="form-group">
                                                <label for="PENYULANG">PENYULANG</label>
                                                <input type="text" name="PENYULANG" value="<?= htmlentities($gardu_induk['PENYULANG'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="PENYULANG">
                                            </div>

                                            <div class="form-group">
                                                <label for="PARENT">PARENT</label>
                                                <input type="text" name="PARENT" value="<?= htmlentities($gardu_induk['PARENT'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="PARENT">
                                            </div>

                                            <div class="form-group">
                                                <label for="PARENT_DESCRIPTION">PARENT_DESCRIPTION</label>
                                                <input type="text" name="PARENT_DESCRIPTION" value="<?= htmlentities($gardu_induk['PARENT_DESCRIPTION'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="PARENT_DESCRIPTION">
                                            </div>

                                            <div class="form-group">
                                                <label for="INSTALLDATE">INSTALLDATE</label>
                                                <input type="text" name="INSTALLDATE" value="<?= htmlentities($gardu_induk['INSTALLDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="INSTALLDATE">
                                            </div>

                                            <div class="form-group">
                                                <label for="ACTUALOPRDATE">ACTUALOPRDATE</label>
                                                <input type="text" name="ACTUALOPRDATE" value="<?= htmlentities($gardu_induk['ACTUALOPRDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="ACTUALOPRDATE">
                                            </div>

                                            <div class="form-group">
                                                <label for="CHANGEDATE">CHANGEDATE</label>
                                                <input type="text" name="CHANGEDATE" value="<?= htmlentities($gardu_induk['CHANGEDATE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="CHANGEDATE">
                                            </div>

                                            <div class="form-group">
                                                <label for="CHANGEBY">CHANGEBY</label>
                                                <input type="text" name="CHANGEBY" value="<?= htmlentities($gardu_induk['CHANGEBY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="CHANGEBY">
                                            </div>

                                            <div class="form-group">
                                                <label for="LONGITUDEX">LONGITUDEX</label>
                                                <input type="text" name="LONGITUDEX" value="<?= htmlentities($gardu_induk['LONGITUDEX'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="LONGITUDEX">
                                            </div>

                                            <div class="form-group">
                                                <label for="LATITUDEY">LATITUDEY</label>
                                                <input type="text" name="LATITUDEY" value="<?= htmlentities($gardu_induk['LATITUDEY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="LATITUDEY">
                                            </div>

                                            <div class="form-group">
                                                <label for="FORMATTEDADDRESS">FORMATTEDADDRESS</label>
                                                <input type="text" name="FORMATTEDADDRESS" value="<?= htmlentities($gardu_induk['FORMATTEDADDRESS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="FORMATTEDADDRESS">
                                            </div>

                                            <div class="form-group">
                                                <label for="STREETADDRESS">STREETADDRESS</label>
                                                <input type="text" name="STREETADDRESS" value="<?= htmlentities($gardu_induk['STREETADDRESS'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="STREETADDRESS">
                                            </div>

                                            <div class="form-group">
                                                <label for="CITY">CITY</label>
                                                <input type="text" name="CITY" value="<?= htmlentities($gardu_induk['CITY'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="CITY">
                                            </div>

                                            <div class="form-group">
                                                <label for="ISASSET">ISASSET</label>
                                                <input type="text" name="ISASSET" value="<?= htmlentities($gardu_induk['ISASSET'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="ISASSET">
                                            </div>

                                            <div class="form-group">
                                                <label for="STATUS_KEPEMILIKAN">STATUS_KEPEMILIKAN</label>
                                                <input type="text" name="STATUS_KEPEMILIKAN" value="<?= htmlentities($gardu_induk['STATUS_KEPEMILIKAN'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="STATUS_KEPEMILIKAN">
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