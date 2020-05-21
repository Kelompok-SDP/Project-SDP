<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-master/dist/css/adminlte.min.css">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/bootstrap-slider/css/bootstrap-slider.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../Master/Menu.php" class="brand-link">
      <img src="../Master/Menu/Image/sdp.jpg"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SDP Team</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../Master/Menu/Image/logo2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Uwenak Restoran</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Menu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Menu</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview" style="margin-left:10%">
                  <li class="nav-item">
                    <a href="Menu.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Detail Menu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Insert_Menu.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Insert Menu</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="Paket.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Paket</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview" style="margin-left:10%">
                  <li class="nav-item">
                    <a href="Paket.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Detail Paket</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Insert_Paket.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Insert Paket</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="Akun.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Akun</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="Pegawai.php" class="nav-link">
                  <i class="nav-icon far fa-circle"></i>
                  <p>Master Pegawai
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left:10%">
                  <li class="nav-item">
                    <a href="Pegawai.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Detail Pegawai</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Insert_Pegawai.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Insert Pegawai</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="Kategori.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Kategori<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview" style="margin-left:10%">
                  <li class="nav-item">
                    <a href="Kategori.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Detail Kategori</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Insert_Kategori.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Insert Kategori</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="Promo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Promo <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview" style="margin-left:10%">
                  <li class="nav-item">
                    <a href="Promo.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Detail Promo</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Insert_Promo.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Insert Promo</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="Report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Kupon.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Kupon <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview" style="margin-left:10%">
                  <li class="nav-item">
                    <a href="Kupon.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Detail Kupon</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="Insert_kupon.php" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Insert Kupon</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="Login_master.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Log Out</p>
            </a>
          </li>
          <li class="nav-item" style="height: 125vh;">
            <p>
              <span class="right badge badge-danger"></span>
            </p>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../AdminLTE-master/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-master/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-master/dist/js/demo.js"></script>
<!-- Ion Slider -->
<script src="../AdminLTE-master/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="../AdminLTE-master/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()

    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
      min     : 2000,
      max     : 50000,
      from    : 0,
      to      : 0,
      type    : 'double',
      step    : 1000,
      prefix  : 'Rp ',
      prettify: false,
      hasGrid : true
    })

    $('#range_12').ionRangeSlider({
      min     : 2000,
      max     : 50000,
      from    : 0,
      to      : 0,
      type    : 'double',
      step    : 1000,
      prefix  : 'Rp ',
      prettify: false,
      hasGrid : true
    })
    $('#range_13').ionRangeSlider({
      min     : 0,
      max     : 20,
      from    : 0,
      to      : 0,
      type    : 'double',
      step    : 1,
      prefix  : '',
      prettify: false,
      hasGrid : true
    })
    $('#range_14').ionRangeSlider({
      min     : 0,
      max     : 20,
      from    : 0,
      to      : 0,
      type    : 'double',
      step    : 1,
      prefix  : '',
      prettify: false,
      hasGrid : true
    })
  })
</script>
</body>
</html>
