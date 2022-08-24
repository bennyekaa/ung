<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Berkas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Berkas</a></li>
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
            <div class="card-header">
              <h3 class="card-title">Data Berkas</h3>
            </div>
            <div class="card-body">
              <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><?= $_SESSION['message'];?></h5>
                  <?php unset($_SESSION['message']); ?>
                </div>
              <?php } ?>
              <div class="row">
                <div>
                  <button type="button" title="Upload" class="btn btn-success btn-block" onclick="window.location.href='<?php echo base_url('admin/upload_berkas'); ?>'"><i class="fa fa-plus "></i></button>
                </div>
              </div>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Berkas</th>
                    <th>Nama Berkas</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                    <th style="width: 10px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($berkas as $key => $value) { ?>
                    <tr>
                      <td><?php echo $value->kode_berkas ?></td>
                      <td><?php echo $value->nama_berkas ?></td>
                      <td><img src="data:<?= $value->tipe_berkas; ?>;base64,<?= $value->berkas; ?>" width="200" height="100"></td>
                      <td><?php echo $value->keterangan ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/edit/' . $value->kode_berkas); ?>" type="button" title="Edit" class="btn btn-warning btn-sm btn-block"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url('admin/hapus/' . $value->kode_berkas); ?>" type="button" title="Hapus" class="btn btn-danger btn-sm btn-block"><i class="fa fa-crosshairs"></i></a>
                        <a href="<?php echo base_url('admin/gambar_next/' . $value->kode_berkas); ?>" type="button" title="Detail" class="btn btn-success btn-sm btn-block"><i class="fa fa-arrow-right"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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