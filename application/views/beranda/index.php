<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="content">
                    <h3>Mengapa Atlas Histologi Digital ?</h3>
                    <p>
                        Media belajar yang mendukung digitalisasi pendidikan sesuai era industri 4.0 dan society 5.0. Media belajar yang interaktif dan mudah diakses akan membantu mahasiswa kedokteran dalam memahami histologi secara efektif dan efisien
                    </p>
                    <div class="text-center">
                        <a href="http://fk.ung.ac.id/" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="icon-boxes d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-receipt"></i>
                                <h4>Mudah Diakses</h4>
                                <p>Mudah diakses dari mana saja dengan menggunakan gawai</p>
                            </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-cube-alt"></i>
                                <h4>Sistematis</h4>
                                <p>Tersusun secara sistematis untuk memudahkan tahapan belajar</p>
                            </div>
                        </div>
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box mt-4 mt-xl-0">
                                <i class="bx bx-images"></i>
                                <h4>Interaktif</h4>
                                <p>Animasi penunjukan struktur histologi yang interaktif, sehingga mempersingkat <em>learning curve</em></p>
                            </div>
                        </div>
                    </div>
                </div><!-- End .content-->
            </div>
        </div>

    </div>
</section><!-- End Why Us Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                <a href="" class="glightbox"></a>
            </div>

            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                <h3>Awal Mula Atlas Digital Histologi</h3>
                <p>Atlas histologi pertama kali dikembangkan oleh Departemen Histologi Fakultas Kedokteran Universitas Negeri Gorontalo pada awal tahun 2022 untuk menjawab tantangan era digitalisasi di berbagai sektor, termasuk dunia pendidikan kedokteran</p>

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-fingerprint"></i></div>
                    <h4 class="title"><a href="">Menawarkan Solusi</a></h4>
                    <p class="description">Pada umumnya mahasiswa kedokteran kesulitan dalam memahami histologi, sehingga dibutuhkan media pembelajaran inovatif</p>
                </div>

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-gift"></i></div>
                    <h4 class="title"><a href="">Memudahkan</a></h4>
                    <p class="description">Dengan memanfaatkan teknologi digital yang ada, atlas digital histologi menjadi alternatif media belajar yang mudah diakses dari mana saja</p>
                </div>

                <div class="icon-box">
                    <div class="icon"><i class="bx bx-atom"></i></div>
                    <h4 class="title"><a href="">Meningkatkan Pemahaman</a></h4>
                    <p class="description">Pemberian marker stuktur histologi didesain seinteraktif mungkin bersamaan dengan deskripsi singkatnya untuk meningkatkan pemahaman</p>
                </div>

            </div>
        </div>

    </div>
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        <div class="section-title">
            <h2>Atlas</h2>
        </div>


        <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                <a href="" class="icon-box" style="background: background-repeat: no-repeat;">
                    <div class="icon"><i class="fas fa-pills"></i></div>
        <a href=""><img src="front/img/Jaringan-Epitel.jpg" width="100%" height="100%"></a>
        <div style="padding-top: 50%; color: black;">
            <h4>JARINGAN EPITEL & KELENJAR</h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
        </div>
        </a>
    </div> -->
        <div class="row">
            <?php foreach ($kategori as $key => $value) { ?>
                <div class="col-lg-4" style="padding-top: 15px;">
                    <a href="<?= base_url('front/atlas/' . $value->kode_kategori); ?>">
                        <img src="data:<?= $value->tipe_berkas_kategori; ?>;base64,<?= $value->berkas_kategori; ?>" width="100%" height="100%">
                    </a>
                    
                    <!-- <div style="padding-top: 40%; color: black;"> -->
                    <div style="position: absolute;
                                    bottom: 5px;
                                    right: 20px;
                                    left: 20px;
                                    background-color: grey;
                                    color: white;
                                    padding-left: 5px;
                                    padding-right: 5px;">
                        <h5><?= $value->nama_kategori; ?></h5>
                        <p><?= $value->keterangan_kategori; ?></p>
                    </div>
                    <!-- </div> -->
                    </a>
                </div>
            <?php } ?>

        </div>

    </div>
</section><!-- End Services Section -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Contact</h2>
            <h3>
                <p>Fakultas Kedokteran Universitas Negeri Gorontalo</p>
            </h3>
        </div>
    </div>

    <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.5162371223!2d123.0635278!3d0.5580761!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6e7ac812ef312e3f!2sFakultas%20Kedokteran%20Universitas%20Negeri%20Gorontalo!5e0!3m2!1sid!2sid!4v1660914054102!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container">
        <div class="row mt-5">

            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Dulalowo Timur, Kota Tengah, Kota Gorontalo, Gorontalo 96128</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>histologi.fkung@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p> +6285233215280</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">
                <form action="<?= base_url() . 'front/saran'; ?>" method="post" role="form" id="contactForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="pesan" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <!-- <div id="msgSubmit" class="sent-message hidden">Message Submitted!</div> -->
                    <!-- <div class="sent-message">Your message has been sent. Thank you!</div> -->
                    <div class="text-center"><button class="btn btn-info" onclick="myFunction()" type="submit">Send Message</button></div>
                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
<script>
    function myFunction() {
        alert("Terima Kasih Sudah Memberi Kami Masukkan :)");
    }
</script>