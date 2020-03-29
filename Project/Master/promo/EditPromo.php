<?php
     require_once("../../config.php");
     $id = '';
     $id  = $_GET['id'];
     $query  = "SELECT * FROM promo WHERE id_promo = '$id'";
     $res = mysqli_query($conn,$query);
     $nama = "";
     $harga = 0;
     $awp = '';
     $akp = '';
     foreach ($res as $key=>$data){
         $nama  = $data['nama_promo'];
         $harga = $data['harga_promo'];
        $awp = $data['periode_awal'];
        $akp = $data['periode_akhir'];
     }
     $awp = strtotime($awp);
     $akp = strtotime($akp);
     $np = date('Y-m-d',$awp);
     $nkp = date('Y-m-d',$akp);

     if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $nama  = $_POST['nama'];
        $harga = $_POST['harga'];
        $awalP = $_POST['awalP'];
        $akhirP = $_POST['akhirP'];
        $awalP  = strtotime($awalP);
        $akhirP  = strtotime($akhirP);
        $nawal = date('Y-m-d',$awalP);
        $nakhir = date('Y-m-d',$akhirP);
        $query = "UPDATE `promo` SET `nama_promo`='$nama',`harga_promo`=$harga,`periode_awal`='$nawal', `periode_akhir`='$nakhir' WHERE id_promo = '$id'";
        if(mysqli_query($conn,$query) == true){
           header("location:Promo.php");
        } else {
            echo "alert('tidak Berhasil men-update');";
        }   
     } 
      else if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $query = "UPDATE `promo` SET `status_promo`=0 WHERE id_promo = '$id'";
        if(mysqli_query($conn,$query) == true){
           header("location:Promo.php");
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
  <link rel="stylesheet" href="../../AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE-master/dist/css/adminlte.min.css">
   <!-- daterange picker -->
   <link rel="stylesheet" href="../../AdminLTE-master/plugins/daterangepicker/daterangepicker.css">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Promo</h1>
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
              <form role="form" action = "#" method ="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Promo</label>
                    <input type="text" class="form-control" id="namKat" placeholder="Masukan Nama Promo" name ="nama" value="<?=$nama?>">
                    <input type="hidden" class="form-control" id="jenisKat" name = "id" value=<?=$id?>>
                </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Promo</label>
                    <input type="number" class="form-control" id="jenisKat" placeholder="Masukan Harga Promo" name = "harga" value="<?=$harga?>">
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
                            <input type="date" class="form-control float-right" name="awalP" value="<?=$np?>">
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
                            <input type="date" class="form-control float-right" name="akhirP"  value="<?=$nkp?>">
                        </div>
                        <!-- /.input group -->
                     </div>

                        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Save</button>
                  <button type="submit" class="btn btn-primary" name="delete" style="background-color:red;">Delete <i class="fas fa-trash" style="left-padding:12px;"></i></button></button>
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
<!-- date-range-picker -->
<script src="../../AdminLTE-master/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE-master/dist/js/demo.js"></script>
<!-- page script -->
<script>

</script>
</body>
</html>

