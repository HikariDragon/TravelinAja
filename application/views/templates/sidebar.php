<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-warning navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('dashboard') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('contact') ?>" class="nav-link <?php if ($title=='Contact') {echo 'active';}?>">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Travelin Aja</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/template/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
             <a href="<?= base_url('dashboard') ?>" class="nav-link <?php if ($title=='Dashboard') {echo 'active';}?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
         
          <li class="nav-item">
            <a href="<?= base_url('customer') ?>" class="nav-link <?php if ($title=='Customer') {echo 'active';}?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Customer</p>
                </a>
              </li>
           <li class="nav-item">
            <a href="<?= base_url('wisata') ?>" class="nav-link <?php if ($title=='Wisata') {echo 'active';}?>">
                  <i class="nav-icon fas fa-map"></i>
                  <p>Wisata</p>
                </a>
              </li>
              <li class="nav-item menu-open">
             <a href="<?= base_url('') ?>" class="nav-link <?php if ($title=='Galeri') {echo 'active';}?>">
                  <i class="nav-icon fas fa-car-side"></i>
                  <p>Tour
                  <i class="right fas fa-angle-left"></i> 
                  </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('galeri') ?>" class="nav-link <?php if ($title=='Galeri') {echo 'active';}?>">
                  <i class="far fa-image nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('kendaraan') ?>" class="nav-link <?php if ($title=='Kendaraan') {echo 'active';}?>">
                  <i class="nav-icon fas fa-car"></i>
                  <p>Kendaraan</p>
                </a>
              </li>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
    
        