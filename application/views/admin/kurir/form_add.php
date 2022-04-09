<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Kurir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Kurir</a></div>
                <div class="breadcrumb-item">form Tambah Kurir</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Forms</h2>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <form action="<?= site_url('kurir/store') ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tambah Kurir</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Kurir</label>
                                    <input type="text" class="form-control" name="namaKurir" id="namaKurir">
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