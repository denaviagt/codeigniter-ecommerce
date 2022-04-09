<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Kurir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kurir</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>

        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title">Data Kurir</h2>
                </div>
                <div>
                    <a href="<?= site_url('kurir/add');?>" class="btn btn-primary">Tambah</a>
                </div>
            </div>

            <div class=" row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Kurir</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kurir</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($kurir as $item) { ?>
                                    <tr>
                                        <td><?= $item->idKurir?></td>
                                        <td><?= $item->namaKurir?></td>
                                        <td><a href="<?=site_url('kurir/edit/'. $item->idKurir) ?>"
                                                class="btn btn-info">Edit</a>
                                            <a href="<?=site_url('kurir/delete/'. $item->idKurir) ?>"
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