<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Upload Berkas</h1>
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
                        <form enctype="multipart/form-data" method="POST" action="<?php echo base_url() . 'admin/aksi_upload'; ?>">
                            <div class="form-group">
                                <input type="text" name="kode_berkas" class="form-control" value="GMB<?php echo sprintf("%04s", $kode_berkas) ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kode_kategori" id="kategori">
                                    <option disabled selected> Pilih </option>
                                    <?php
                                    foreach ($kategori ?? [] as $key => $value) {
                                    ?>
                                        <option value="<?= $value->kode_kategori ?>"><?= $value->nama_kategori ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" id="berkas" name="berkas" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="col-sm-6"><input type="text" class="form-control" name="keterangan"></div>
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