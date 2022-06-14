<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Menu Utama Dashboard Member</h1>

        </div>

        <div class="section-body">
            <div id="output-status"></div>
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Member</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="http://localhost/tokokita/index.php/member"
                                        class="nav-link">Beranda</a></li>
                                <li class="nav-item"><a href="http://localhost/tokokita/index.php/member/transaksi"
                                        class="nav-link">Transaksi</a></li>
                                <li class="nav-item"><a
                                        href="http://localhost/tokokita/index.php/member/riwayat_transaksi"
                                        class="nav-link">Riwayat Transaksi</a></li>
                                <li class="nav-item"><a href="http://localhost/tokokita/index.php/member/toko"
                                        class="nav-link">Toko</a></li>
                                <li class="nav-item"><a href="http://localhost/tokokita/index.php/member/ubah_profil"
                                        class="nav-link">Ubah Profil</a></li>
                                <li class="nav-item"><a href="http://localhost/tokokita/index.php/member/logout"
                                        class="nav-link">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-12">
                    <form id="setting-form" method="post" enctype="multipart/form-data"
                        action="<?php echo site_url('home/insert_produk/'. $id_toko);?>">
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Form Membuat Produk Baru</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Isikan data-data berikut ini!</p>
                                <input type="hidden" name="idToko" class="form-control" id="idToko"
                                    value="<?php echo $id_toko ?>">
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama
                                        Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nama_produk" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Kategori Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <select class="custom-select" name="id_kategori">
                                            <option selected="" disabled>Pilih Kategori</option>
                                            <?php foreach ($kategori as $item) { ?>
                                            <option value="<?= $item->idKategori?>"><?= $item->namaKategori?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title"
                                        class="form-control-label col-sm-3 text-md-right">Harga</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="harga" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title"
                                        class="form-control-label col-sm-3 text-md-right">Stok</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="number" name="stok" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-title"
                                        class="form-control-label col-sm-3 text-md-right">Berat</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="number" name="berat" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description"
                                        class="form-control-label col-sm-3 text-md-right">Deskripsi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control" name="deskripsi" id="site-description"
                                            rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Foto Produk</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="foto">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>