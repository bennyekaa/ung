<!-- CSS Style -->
<style type="text/css">
    /* For small devices */
    @media screen and (max-width: 450px) {
        .content__gambar {
            width: auto;
            display: grid;
            row-gap: 2rem;
            grid-template-columns: repeat(1, 1fr);
        }

        .content__gambar img {
            width: 200px;
            height: 150px;
        }
    }

    /* For medium devices */
    @media screen and (min-width: 586px) {
        .content__gambar {
            width: auto;
            display: grid;
            row-gap: 2rem;
            grid-template-columns: repeat(1, 1fr);
        }

        .content__gambar img {
            width: 300px;
            height: 250px;
        }
    }

    @media screen and (min-width: 768px) {
        .content__gambar {
            width: auto;
            display: grid;
            row-gap: 2rem;
            grid-template-columns: repeat(2, 1fr);
        }

        .content__gambar img {
            width: 300px;
            height: 250px;
        }
    }

    @media screen and (min-width: 1024px) {
        .content__gambar {
            width: auto;
            display: grid;
            row-gap: 2rem;
            grid-template-columns: repeat(2, 1fr);
        }

        .content__gambar img {
            width: 400px;
            height: 300px;
        }
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
                                <img src="data:<?= $value->tipe_berkas; ?>;base64,<?= $value->berkas; ?>">
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