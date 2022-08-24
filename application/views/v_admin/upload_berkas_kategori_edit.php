<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Upload Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Upload</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form enctype="multipart/form-data" method="POST" action="<?php echo base_url() . 'admin/update_kategori/' . $kategori[0]->kode_kategori; ?>">
                            <div class="form-group">
                                <input type="text" name="kode_kategori" class="form-control" value="<?= $kategori[0]->kode_kategori ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <img src="data:<?= $kategori[0]->tipe_berkas_kategori; ?>;base64,<?= $kategori[0]->berkas_kategori; ?>" width="200" height="100">
                            </div>

                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" id="berkas" name="berkas" accept="image/*"><span name="old" value="<?= $kategori[0]->nama_berkas_kategori; ?>"><?php echo $kategori[0]->nama_berkas_kategori; ?></span>
                            </div>
        
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <div class="col-sm-6"><input type="text" class="form-control" name="nama_kategori" value="<?= $kategori[0]->nama_kategori; ?>"></div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="col-sm-6"><input type="text" class="form-control" name="keterangan" value="<?= $kategori[0]->keterangan_kategori;?>"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <button class="btn btn-primary btn-sm" type="submit" style="color: white;">SIMPAN</i></button>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->