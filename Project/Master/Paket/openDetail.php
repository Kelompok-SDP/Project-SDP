<?php
require_once("../../config.php");
    $id  = $_POST['detail'];
    $query="SELECT * from paket where id_paket = '$id'";
    $hasil = mysqli_query($conn,$query);
    $gambar = "";
    $harga = "";
    $awalperiode ="";
    $akhirperiode = "";
    $nama = "";
    $desk = "";
    $idm = "";
    $sdpaket = "";
    $dpaket = "";
    foreach ($hasil as $key=>$data){
        $harga = $data['harga_paket'];
        $nama = $data['nama_paket'];
        $gambar = $data['gambar'];
    }
   
     $hasil_rupiah = "Rp " . number_format($harga,2,',','.');

    $query2 = "SELECT * from paket_menu where id_paket = '$id'";
    $hasil2 = mysqli_query($conn,$query2);
    foreach ($hasil2 as $key=>$data){
      $idm = $data["id_menu"];
      $query3 = "SELECT * from menu where id_menu = '$idm'";
      $hasil3 = mysqli_query($conn,$query3);
      foreach ($hasil3 as $key=>$data){
        $dmenu = $dmenu."- ". $data['nama_menu']."<br>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$nama?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE-master/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- KODING NYA DI SINI GAEESSSS -->
          <div class="card card-primary">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Paket :<?php echo " ".$nama;?></label>
                        <hr style="border-width:3px;color:grey;">
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Harga Paket : Rp.<?php echo " ".$hasil_rupiah;?></label>
                        <hr style="border-width:3px;color:grey;">
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Deskripsi Paket :<?php echo "<br>". $dmenu;?></label>
                        <hr style="border-width:3px;color:grey;">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Menu Image</label>
                        <br>
                        <img src=<?="../Menu/".$gambar?> style="width:500px;height:400px;" alt="image not Found">
                        <br>
                        <label for="inputStatus">Source :<?=$gambar;?></label>
                    </div>
                    
                    
                
                </div>
                <!-- /.card-body -->
               
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<script src="../../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../AdminLTE-master/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE-master/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE-master/dist/js/demo.js"></script>
<!-- page script -->
<script>

</script>
</body>
</html>
