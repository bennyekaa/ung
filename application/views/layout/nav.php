<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    Preloader
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('admin'); ?>" class="brand-link">
        <img src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">UNG</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <?php
            if ($this->session->userdata('user') !== FALSE) {
            ?>
              <a class="d-block">Hi,</a>
          </div>
        <?php } else { ?>
          <a href="<?php echo base_url('admin'); ?>" class="d-block">Hi, <?php echo $this->session->userdata('user'); ?></a>
        <?php } ?>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url('admin'); ?>" class="nav-link <?php if ($page == 'dashboard') {
                                                                            echo "active";
                                                                          } ?>">
                <!-- <a href="#" class="nav-link active"> -->
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <!--  -->
            <li class="nav-item <?php if ($page == 'master') {
                                  echo "menu-open";
                                } ?>">
              <a href="#" class="nav-link <?php if ($page == 'master') {
                                            echo "active";
                                          } ?>">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                  Master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>admin/gambar" class="nav-link <?php if ($this->uri->segment(2) == 'gambar') {
                                                                                    echo "active";
                                                                                  } ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Gambar
                    </p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>