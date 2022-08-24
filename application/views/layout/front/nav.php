<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">histologi.fkung@gmail.com</a>
      <i class="bi bi-phone"></i> <a> +6285233215280</a>
    </div>
    <div class="d-none d-lg-flex social-links align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
    </div>
  </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="<?php echo base_url(); ?>">Atlas Histologi Digital</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?php echo base_url(); ?>">Beranda</a></li>
        <li><a class="nav-link scrollto <?php echo $this->uri->segment(2) == 'about' ? 'active' : '' ?>" href="<?php echo base_url(); ?>#about">Tentang</a></li>
        <li><a class="nav-link scrollto <?php echo $this->uri->segment(2) == 'atlas' ? 'active' : '' ?>" href="<?php echo base_url(); ?>#services">Atlas</a></li>
        <!-- <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
        <li><a class="nav-link scrollto <?php echo $this->uri->segment(2) == 'contact' ? 'active' : '' ?>" href="<?php echo base_url(); ?>#contact">Hubungi Kami</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <a href="#appointment" class="appointment-btn scrollto"><i class="fa fa-search"></i></a>

  </div>
</header><!-- End Header -->