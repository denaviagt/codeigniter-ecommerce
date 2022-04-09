<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Biaya Kirim</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Biaya Kirim</a></div>
                <div class="breadcrumb-item">form Edit Biaya Kirim</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Forms</h2>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <form action="<?= site_url('biayakirim/edit') ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Biaya Kirim</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="<?= $biaya_kirim->idBiayaKirim ?>">
                                <div class="form-group">
                                    <label>Nama Kurir</label>
                                    <label>Select Nama Kurir</label>
                                    <select class="form-control" name="kurir">
                                        <?php foreach ($kurir as $item) { ?>
                                        <option value="<?= $item->idKurir?>"><?= $item->namaKurir?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kota Asal</label>
                                    <select class="form-control" name="kotaAsal">
                                        <?php foreach ($kota as $item) { ?>
                                        <option value="<?= $item->idKota?>"><?= $item->namaKota?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kota Tujuan</label>
                                    <select class="form-control" name="kotaTujuan">
                                        <?php foreach ($kota as $item) { ?>
                                        <option value="<?= $item->idKota?>"><?= $item->namaKota?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <input type="text" class="form-control" name="biaya" id="biaya">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>