<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $kategori->nama_kategori; ?></h2>
            <ol>
                <li><a href="<?php echo base_url('')?>">Home</a></li>
                <li><?= $kategori->menu;?></li>
                <?php if($next){?>
                <li><?= $gambar[0]->kode_berkas;?></li>
                <?php }?>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->