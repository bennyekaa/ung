<!-- CSS Style -->
<style type="text/css">
  /* img {
    justify-content: space-around;
  } */

  .content__gambar {
    width: auto;
    display: grid;
    row-gap: 2rem;
    grid-template-columns: repeat(3, 1fr);
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>BERANDA</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
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
              <h3 class="card-title">Pilih Gambar</h3>
            </div>
            <div class="card-body content__gambar">
              <?php foreach ($berkas as $key => $value) { ?>
                <a href="<?= base_url('admin/beranda_next/' . $value->kode_berkas); ?>">
                  <img src="data:<?= $value->tipe_berkas; ?>;base64,<?= $value->berkas; ?>" width="250" height="300">
                </a>
              <?php } ?>
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