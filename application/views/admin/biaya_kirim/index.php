<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Biaya Kirim</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Biaya Kirim</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>

        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title">Data Biaya Kirim</h2>
                </div>
                <div>
                    <a href="<?= site_url('biayakirim/add');?>" class="btn btn-primary">Tambah</a>
                </div>
            </div>

            <div class=" row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Biaya Kirim</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kurur</th>
                                        <th>Kota Asal</th>
                                        <th>Kota Tujuan</th>
                                        <th>Biaya</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($biaya_kirim as $item) { ?>
                                    <tr>
                                        <td><?= $item->idBiayaKirim?></td>
                                        <td><?= $item->namaKurir?></td>
                                        <td><?= $item->kotaAsal?></td>
                                        <td><?= $item->kotaTujuan?></td>
                                        <td><?= $item->biaya?></td>
                                        <td><a href="<?=site_url('biayakirim/edit/'. $item->idBiayaKirim) ?>"
                                                class="btn btn-info">Edit</a>
                                            <a href="<?=site_url('biayakirim/delete/'. $item->idBiayaKirim) ?>"
                                                class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>