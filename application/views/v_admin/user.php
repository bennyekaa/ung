<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
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
              <h3 class="card-title">Data Pengguna</h3>
            </div>
            <div class="card-body">
              <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><?= $_SESSION['message']; ?></h5>
                  <?php unset($_SESSION['message']); ?>
                </div>
              <?php } ?>
              <div class="row">
                <div>
                  <button type="button" title="Tambah" class="btn btn-success btn-block" onclick="window.location.href='<?php echo base_url('admin/add_user'); ?>'"><i class="fa fa-plus "></i></button>
                </div>
              </div>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th style="width: 10px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($user as $key => $value) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->user ?></td>
                      <td><?php echo $value->pass ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/edit_user/' . $value->id_user); ?>" type="button" title="Edit" class="btn btn-warning btn-sm btn-block"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url('admin/hapus_user/' . $value->id_user); ?>" type="button" title="Hapus" class="btn btn-danger btn-sm btn-block"><i class="fa fa-crosshairs"></i></a>
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