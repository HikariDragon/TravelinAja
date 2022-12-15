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
          <a href="http://localhost/travel/dashboard" class="nav-link"><i class="fas fa-house-user">Home</i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link "><i class="fas fa-phone">Contact</i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('auth/logout') ?>" class="nav-link" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-fw fa-sign-out-alt"></i>Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-warning elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/template/') ?>dist/img/logotravel.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Travelin Aja</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets/template/') ?>dist/img/default.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $user['name']; ?></a>
          </div>
        </div>

        <!--query-->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = '$role_id'
                    ORDER BY `user_access_menu`.`menu_id` ASC
                  ";

        $menu = $this->db->query($queryMenu)->row_array();

        ?>

        <!-- looping Menu -->

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <?php
            $menuId = $menu['id'];
            $querySubMenu = "SELECT *
                  FROM `user_sub_menu` JOIN `user_menu` 
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                  WHERE `user_sub_menu`.`menu_id` = '$menuId'
                  AND `user_sub_menu`.`is_active` = 1
                ";

            $subMenu = $this->db->query($querySubMenu)->result_array();
            // var_dump($subMenu);

            ?>

            <?php foreach ($subMenu as $sm) : ?>
              <li class="nav-item">
                <a href="<?= base_url($sm['url']); ?>" class="nav-link <?php if ($title == $sm['title']) {
                                                                          echo 'active';
                                                                        } ?>">
                  <i class="<?= $sm['icon']; ?>"></i>
                  <p><?= $sm['title']; ?></p>
                </a>
              </li>
            <?php endforeach ?>


         






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