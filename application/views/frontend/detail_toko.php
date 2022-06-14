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
                                <li class="nav-item"><a href="<?= site_url('home/toko');?>" class="nav-link">Toko</a>
                                </li>
                                <li class="nav-item"><a href="http://localhost/tokokita/index.php/member/ubah_profil"
                                        class="nav-link">Ubah Profil</a></li>
                                <li class="nav-item"><a href="http://localhost/tokokita/index.php/member/logout"
                                        class="nav-link">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active"
                                                href="<?= site_url('home/create_produk/'. $id);?>">Tambah
                                                Produk</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Produk</h4>
                                    <div class="card-header-action">

                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Berat</th>
                                                <th>Deskripsi</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach ($data_produk as $item) { ?>
                                            <tr>
                                                <td><?= $item->namaProduk?></td>
                                                <td><?= $item->harga?></td>
                                                <td><?= $item->stok?></td>
                                                <td><?= $item->berat?></td>
                                                <td><?= $item->deskripsiProduk?></td>
                                                <td><?= $item->foto?></td>
                                                <td>
                                                    <a href="<?= site_url('home/detail_toko/'.$item->idToko);?>"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </section>
</div>