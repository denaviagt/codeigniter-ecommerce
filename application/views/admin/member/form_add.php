<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Member</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Member</a></div>
                <div class="breadcrumb-item">form Tambah Member</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Forms</h2>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <form action="<?= site_url('member/store') ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Member</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" id="username">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="namaKonsumen" id="namaKonsumen">
                                </div>
                                <div class="form-group">
                                    <label>Kota</label>
                                    <select class="form-control" name="idKota">
                                        <?php foreach ($kota as $item) { ?>
                                        <option value="<?= $item->idKota?>"><?= $item->namaKota?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat">
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="text" class="form-control" name="telp" id="telp">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="y">Aktif</option>
                                        <option value="n">Tidak Aktif</option>
                                    </select>
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