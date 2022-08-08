<!-- CSS Style -->
<style type="text/css">
    .content__gambar {
        width: auto;
        display: grid;
        row-gap: 2rem;
        grid-template-columns: repeat(2, 1fr);
    }

    .list-name {
        list-style: none;
    }

    .list-name li {
        margin-bottom: 1rem;
    }

    .btn {
        background-color: transparent;
        background-image: url('../../../dist/img/check.png');
        background-repeat: no-repeat;
        background-position: center;
        height: 25px;
        border: 2px solid black;
    }

    .active {
        background-color: green;
    }

    .shape {
        z-index: 100;
        position: absolute;
        top: 10;
        left: 20px;
    }

    /* .shape button[aria-pressed="true"] {
        display: inline;
    } */
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $berkas->keterangan; ?></h1>
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
                            <div>
                                <img src="data:<?= $berkas->tipe_berkas; ?>;base64,<?= $berkas->berkas; ?>" width="450" height="500">
                                <?php foreach ($detailBerkas as $key => $value) { ?>
                                    <img class="shape" style="display: none;" id="<?= substr($value->keterangan_detail_berkas, 0, 3) ?>" src="data:<?= $value->tipe_detail_berkas; ?>;base64,<?= $value->file_upload; ?>" width="450" height="500">
                                <?php } ?>
                            </div>

                            <ul class="list-name">
                                <?php foreach ($detailBerkas as $key => $value) { ?>
                                    <li>
                                        <button type="button" onclick="myFunction()" id="btn-pict" class="btn" data-toggle="button" target="#<?= substr($value->keterangan_detail_berkas, 0, 3) ?>" aria-pressed="false"></button> <?= $value->keterangan_detail_berkas ?>
                                    </li>
                                <?php } ?>
                            </ul>
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

<script>
    btnToogle = document.getElementById('btn-pict');
    <?php foreach ($detailBerkas as $key => $value) { ?>
        viewPict = document.getElementById("<?= substr($value->keterangan_detail_berkas, 0, 3) ?>");
    <?php } ?>

    function myFunction() {
        if (btnToogle.getAttribute('aria-pressed') === "false") {
            viewPict.style.display = "inline";
            console.log(btnToogle.getAttribute('target'));
        } else {
            viewPict.style.display = "none";
            console.log('benar');
        }
    }
</script>