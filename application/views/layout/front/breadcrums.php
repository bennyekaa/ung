<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><?php $kategori->nama_kategori; ?></h2>
            <ol>
                <li><a href="<?php echo base_url('')?>">Home</a></li>
                <li><?php echo $halaman;?></li>
                <?php if($next){?>
                <li><?php echo $halaman_next;?></li>
                <?php }?>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs Section -->