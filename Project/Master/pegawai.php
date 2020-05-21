<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pegawai | Master</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-master/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
  include("../sidebar.php");
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Pegawai.php">Reset</a></li>
              <li class="breadcrumb-item active">Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Disable Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id Pegawai</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>No Hp</th>
                  <th>Banned</th>
                </tr>
                </thead>
                <tbody id="pegawai">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Id Pegawai</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>No Hp</th>
                  <th>Banned</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- general form elements -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body" id="ubah">
                 
                </div>
                <!-- /.card-body -->

                
            </div>
            <!-- /.card -->


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
            
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

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
<!-- bs-custom-file-input -->
<script src="../AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-master/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-master/dist/js/demo.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
<script>
    jabatan();
    function jabatan(){
        $.ajax({
            method0: "post",
            url: "pegawai/jabatan.php",
            success: function (response) {
                $("#jabatan").html(response);
            }
        });
    }
    getAkun();
    function getAkun(){
      $.ajax({
        method: "post",
        url: "pegawai/ambilPegawai.php",
        success: function (response) {
          $("#pegawai").html(response);
        }
      });
    }
    function tambah(){
      var nama=$("#nama").val();
      var email=$("#email").val();
      var jabatan=$("#jabatan").val();
      var nohp=$("#nohp").val();
      $.ajax({
          method: "post",
          url: "pegawai/tambah_pegawai.php",
          data: {
            nama:nama,
            email:email,
            jabatan:jabatan,
            nohp:nohp
          },
          success: function (response) {
            getAkun();
          }
      });
    }

    function NumberOnly(evt){
        var input= String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(input))){
            evt.preventDefault();
        }
    }


</script>