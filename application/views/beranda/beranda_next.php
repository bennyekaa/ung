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

<section id="services" class="services">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="card-body content__gambar">
                    <?php foreach ($berkas as $key => $value) { ?>
                        <a href="<?= base_url('admin/beranda_next/' . $value->kode_berkas); ?>">
                            <img src="data:<?= $value->tipe_berkas; ?>;base64,<?= $value->berkas; ?>" width="250" height="300">
                        </a>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-pills"></i></div>
                    <h4><a href="">Sed ut perspiciatis</a></h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-hospital-user"></i></div>
                    <h4><a href="">Magni Dolores</a></h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-dna"></i></div>
                    <h4><a href="">Nemo Enim</a></h4>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-wheelchair"></i></div>
                    <h4><a href="">Dele cardo</a></h4>
                    <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box">
                    <div class="icon"><i class="fas fa-notes-medical"></i></div>
                    <h4><a href="">Divera don</a></h4>
                    <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Services Section -->