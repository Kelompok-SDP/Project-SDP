<?php
require_once("../../config.php");
    $id  = $_POST['detail'];
    $query="SELECT * from promo where id_promo = '$id'";
    $hasil = mysqli_query($conn,$query);
    $gambar = "";
    $awalperiode ="";
    $akhirperiode = "";
    $nama = "";
    $detail = "";
    $jenis = "";
    foreach ($hasil as $key=>$data){
        $nama = $data['nama_promo'];
        $awalperiode = $data['periode_awal'];
        $akhirperiode = $data['periode_akhir'];
        $gambar = $data['gambar_promo'];
        $detail = $data["detail_promo"];
        $jenis = $data['jenis_promo'];
    }
    $jwnis ='';
    if($jenis =="M"){
      $jwnis = "Promo Menu"; 
    }else if($jenis=="HR"){
      $jwnis = "Promo Hari Raya";
    }else{
      $jwnis = "Promo Buy 1 Get 1 Free";
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
                        <label for="exampleInputEmail1">Nama Promo :<?php echo " ".$nama;?></label>
                        <hr style="border-width:3px;color:grey;">
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Detail Promo :<br><?php echo $detail;?></label>
                        <hr style="border-width:3px;color:grey;">
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Jenis Promo :<br><?php echo $jwnis;?></label>
                        <hr style="border-width:3px;color:grey;">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Periode Promo : <?php echo " ".$awalperiode." - ".$akhirperiode;?></label>
                        <hr style="border-width:3px;color:grey;">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Promo Image</label>
                        <br>
                        <img src=<?=$gambar?> style="width:500px;height:400px;" alt="image not Found">
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
