<!-- CSS Style -->
<style type="text/css">
    .list-name {
        list-style: none;
    }

    .list-name li {
        margin-bottom: 1rem;
    }

    .btn {
        height: 25px;
        border: 2px solid black;
    }

    .shape__pict {
        z-index: 100;
        position: absolute;
        top: 10;
        left: 20px;
        display: none;
    }

    .active-pict {
        display: inline;
    }

    /* For small devices */
    @media screen and (max-width: 450px) {
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

    /* For medium devices */
    @media screen and (min-width: 586px) {
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

    @media screen and (min-width: 768px) {
        .content__gambar {
            width: auto;
            display: grid;
            row-gap: 2rem;
            grid-template-columns: repeat(2, 1fr);
        }

        .content__gambar img {
            width: 400px;
            height: 350px;
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
            width: 600px;
            height: 400px;
        }
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 5rem;">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gambar <?= $berkas->keterangan; ?></h3>
                        </div>
                        <div class="card-body content__gambar">
                            <div>
                                <img src="data:<?= $berkas->tipe_berkas; ?>;base64,<?= $berkas->berkas; ?>">
                                <?php foreach ($detailBerkas as $key => $value) { ?>
                                    <div class="shape__pict">
                                        <img src="data:<?= $value->tipe_detail_berkas; ?>;base64,<?= $value->file_upload; ?>">
                                    </div>
                                <?php } ?>
                            </div>

                            <ul class="list-name">
                                <?php foreach ($detailBerkas as $key => $value) { ?>
                                    <li>
                                        <button type="button" id="btn-pict" class="btn pict__button" data-toggle="button" aria-pressed="false"></button> <?= $value->keterangan_detail_berkas ?>
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
    const pictBtn = document.querySelectorAll('.pict__button'),
        pictViews = document.querySelectorAll('.shape__pict');

    let modalAdd = function(modalClick) {
        pictViews[modalClick].classList.add('active-pict');
        pictBtn[modalClick].classList.add('btn-success');
    };
    let modalRemove = function(modalClick) {
        pictViews[modalClick].classList.remove('active-pict');
        pictBtn[modalClick].classList.remove('btn-success');
    };

    // function linkAction() {
    //     const pictBtnId = document.getElementById('btn-pict');
    //     pictBtnId.classList.toggle('btn-success');
    // }

    pictBtn.forEach((modalBtn, i) => {
        modalBtn.addEventListener('click', () => {
            if (modalBtn.getAttribute('aria-pressed') === "false") {
                modalAdd(i);
            } else {
                modalRemove(i);
            }
        });
    })


    // pictBtnId.forEach((pressBtn, i) => {
    //     pressBtn.addEventListener('click', () => {
    //         pressBtn.classList.toggle('btn-success')
    //     })
    // });
</script>