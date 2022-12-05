
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Travelin Aja | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/travel/assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/travel/assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/travel/assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/travel/assets/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/travel/assets/template/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="http://localhost/travel/assets/template/plugins/summernote/summernote-bs4.min.css">
  <style>
    body:not(.layout-fixed) .main-sidebar {
      height: 100%;
      min-height: 100vh;
    }
  </style>
</head>

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
        <a href="<?= base_url('auth/logout')?>" class="nav-link" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-fw fa-sign-out-alt"></i>Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="http://localhost/travel/assets/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Travelin Aja</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://localhost/travel/assets/template/dist/img/default.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">      
          <a href="#" class="d-block"><?= $user['name']; ?></a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
             <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link  ">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Customer</p>
                </a>
              </li>
           <li class="nav-item">
            <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-map"></i>
                  <p>Wisata</p>
                </a>
              </li>
              <li class="nav-item ">
             <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-car-side"></i>
                  <p>Tour
                  <i class="right fas fa-angle-left"></i> 
                  </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="far fa-image nav-icon"></i>
                  <p>Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-car"></i>
                  <p>Kendaraan</p>
                </a>
              </li>
              </li>
        </ul>
        <li class="nav-item">
            <a href="#" class="nav-link ">
                  <i class="fas fa-user-cog"></i>
                  <p>Profil</p>
                </a>
              </li>
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
            <h1 class="m-0"><?= $title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid"><?= $title?>
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= base_url('assets/template/dist/img/'). $user['image'];?>">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $user['name'];?></h5>
        <p class="card-text"><?= $user['email'];?></p>
        <p class="card-text"><small 
        class="text-muted">Member Sejak <?= date('d F Y', $user['date_created']);?></small></p>
      </div>
    </div>
  </div>
</div>
       
 <!-- /.content-wrapper -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->


 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
 <!-- jQuery -->
 <script src="http://localhost/travel/assets/template/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="http://localhost/travel/assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="http://localhost/travel/assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/jszip/jszip.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="http://localhost/travel/assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 
 <!-- AdminLTE App -->
 <script src="http://localhost/travel/assets/template/dist/js/adminlte.min.js"></script>
 <!-- Summernote -->
<script src="http://localhost/travel/assets/template/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="http://localhost/travel/assets/template/dist/js/demo.js"></script>
 <script src="http://localhost/travel/assets/template/ckeditor/ckeditor.js'?>"></script>
 <script type="text/javascript" src="http://localhost/travel/assets/template/plugins/toast/jquery.toast.min.js'?>"></script>
 <!-- Page specific script -->
 <script>
  $(function () {
    $("#example3").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    CKEDITOR.replace('ckeditor');
  });
</script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script> 
 </body>

 </html>