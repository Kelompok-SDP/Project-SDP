<?php 

require_once("../config.php");

    if(isset($_POST['submit'])){
        $nama  = $_POST['nama'];
        $harga = $_POST['harga'];
        $awalP = $_POST['awalP'];
        $akhirP = $_POST['akhirP'];
       $bx = false;
        if($nama == ''){
            echo "<script>alert('nama Promo tidak boleh kosong');</script>";
             echo "<script>document.location.href='InsertPromo.php';</script>";
        } else
        if($harga == '' || $harga<1){
            echo "<script>alert('harga tidak valid');</script>";
            echo "<script>document.location.href='InsertPromo.php';</script>";
        }  else if( $akhirP==''){
            echo "<script>alert('tanggal tidak valid');</script>";  
            echo "<script>document.location.href='InsertPromo.php';</script>";
        }
        else if ($awalP> $akhirP){
            echo "<script>alert('tanggal tidak valid');</script>";
            echo "<script>document.location.href='InsertPromo.php';</script>";
        }
        else{
            $jum2 =0;
            $query = "SELECT  count(id_promo) jml FROM promo";
            $rs=  mysqli_query($conn,$query);
            foreach($rs as $key=>$data) {
                $jum2 = $data['jml'];
            }
            $target_dir = "promo/PrImage/"; //<- ini folder tujuannya
            $target_file = $target_dir. basename($_FILES["gambar"]["name"]); //murni mendapatkan namanya saja tanpa path nya 
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if($file_type !="jpg" && $file_type !="png"){
                echo "<script>alert('Tipe file hanya jpg dan png saja');</script>";
                echo "<script>document.location.href='InsertPromo.php';</script>";
            } else if($_FILES["gambar"]["size"] > 500000){
                echo "<script>alert('File size terlalu besar');</script>";
                echo "<script>document.location.href='InsertPromo.php';</script>";
            } else{
              $gambar = '';
              if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)){
               $gambar= $target_file;
              } 
            }
            $awalP  = strtotime($awalP);
            $akhirP  = strtotime($akhirP);
            $nawal = date('Y-m-d',$awalP);
            $nakhir = date('Y-m-d',$akhirP);
            $jum2 ++;
            $id_promo = "PR".$jum2;
            $query = "INSERT INTO promo (`id_promo`, `nama_promo`,`harga_promo`,`periode_awal`,`periode_akhir`,`gambar_promo`,`status_promo`)VALUES ('$id_promo','$nama',$harga,'$nawal','$nakhir','$gambar',1)";
            if(mysqli_query($conn,$query) == true){
                echo "<script>alert('Berhasil input data');</script>";
                echo "<script>document.location.href='InsertPromo.php';</script>";

            } else{
                echo "<script>alert('Tidak Berhasil input data');</script>";
                echo "<script>document.location.href='InsertPromo.php';</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Promo</title>
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
   <!-- daterange picker -->
   <link rel="stylesheet" href="../AdminLTE-master/plugins/daterangepicker/daterangepicker.css">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php include("../sidebar.php"); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Insert Promo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Promo.php">Back</a></li>
              <li class="breadcrumb-item active">Table Promo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
              <form role="form" action = "#" method ="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Promo</label>
                    <input type="text" class="form-control" id="namKat" placeholder="Masukan Nama Promo" name ="nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Promo</label>
                    <input type="number" class="form-control" id="jenisKat" placeholder="Masukan Harga Promo" name = "harga">
                  </div>
                         <!-- Date range -->
                    <div class="form-group">
                        <label>Awal Periode:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control float-right" name="awalP">
                        </div>
                        <!-- /.input group -->
                     </div>
                      
                     <div class="form-group">
                        <label>Akhir Periode:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control float-right" name="akhirP">
                        </div>
                        <!-- /.input group -->
                     </div>
                     <div class="input-group">
                        Pilih Gambar :
                        <input type="file" name="gambar" id="gambar">
                     </div>
                        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
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
<!-- date-range-picker -->
<script src="../AdminLTE-master/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-master/dist/js/demo.js"></script>
<!-- page script -->
<script>

</script>
</body>
</html>

