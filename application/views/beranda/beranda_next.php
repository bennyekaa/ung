<!-- CSS Style -->
<style type="text/css">
    .content__gambar {
        width: auto;
        display: grid;
        row-gap: 2rem;
        grid-template-columns: repeat(3, 1fr);
    }
</style>

<section id="services" class="services">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pilih Gambar</h3>
                    </div>
                    <div class="card-body content__gambar">
                        <?php foreach ($berkas as $key => $value) { ?>
                            <a href="<?= base_url('front/atlas_next/' . $value->kode_berkas); ?>">
                                <img src="data:<?= $value->tipe_berkas; ?>;base64,<?= $value->berkas; ?>" width="400" height="300">
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
</section><!-- End Services Section -->