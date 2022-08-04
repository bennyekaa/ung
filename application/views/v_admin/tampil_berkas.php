<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tampil Foto Presstest</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="window.location.href='<?php echo base_url(); ?>log/logout'">Log Out</button>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php echo $error; ?>
            <div class="row">
                <div class="col-12">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-info btn-lg btn-block" onclick="window.location.href='<?php echo $back; ?>'"><i class="fa fa-arrow-left "></i> Kembali</button>
                    </div>
                    <br>
                    <div class="card">
                        <div class="col-lg">
                            <img src="<?php echo base_url('dist/upload/' . $berkas[0]->nama_berkas); ?>" />>
                        </div>
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