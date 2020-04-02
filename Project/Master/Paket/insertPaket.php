<?php 
require_once("../../config.php");
    // if(isset($_POST['submit'])){
    //     $npaket  = $_POST['nama'];
    //     $hpaket = $_POST['harga'];
    //     $idk = $_POST['idk'];
    //     $idp = $_POST['idp'];
    //     if($npaket == '' && $hpaket == '' && $idk == '' && $idp == ''){
    //         echo "<script>alert('Terdapat isian yang kosong');</script>";
    //     }else{
    //         $jum2 = 0;
    //         $query = "SELECT count(id_paket) jml FROM paket";
    //         $rs = mysqli_query($conn,$query);
    //         foreach($rs as $key=>$data) {
    //             $jum2 = $data['jml'];
    //         }
    //         $jum2 ++;
    //         $id_paket = "PK".$jum2;
    //         $query = "INSERT INTO paket (`id_paket`, `nama_paket`, id_kategori, `harga_paket`, id_promo, status)VALUES ('$id_paket','$npaket', '$idk','$hpaket','$idp',1)";
    //         if(mysqli_query($conn,$query) == true){
    //             echo "<script>alert('Berhasil input data');</script>";
    //             header("Location:InsertPaket.php");
                
    //         } else{
    //             echo "<script>alert('Tidak Berhasil input data');</script>";
    //         }
    //     }
    // }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Paket.php</title>
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

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Insert Paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Paket.php">Back</a></li>
              <li class="breadcrumb-item active">Table Paket</li>
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
              <!-- <form role="form" action = "insertPaket.php" method ="post"> -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Paket</label>
                    <input type="text" class="form-control" id="Npaket" placeholder="Masukan Nama Paket" name ="npaket">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Paket</label>
                    <input type="number" class="form-control" id="Hpaket" placeholder="Masukan Harga Paket" name ="hpaket">
                  </div>
                  <div class="form-group">
                      <label for="inputStatus">Kategori Paket</label>
                      <select class="form-control custom-select" id="Kpaket" name="kpaket">
                      <option selected disabled>Pilih satu</option>
                      <?php  
                          $query3 = "SELECT * FROM KATEGORI WHERE STATUS_KATEGORI = 'A'";
                          $list3 = $conn->query($query3);
                          foreach ($list3 as $key => $value) {
                              $kat = $value['nama_kategori'];
                              ?>        
                          <option value="<?= $value['id_kategori']?>"><?= $value['nama_kategori']?></option>
                      <?php } ?> 
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="inputStatus">Promo Paket</label>
                      <select class="form-control custom-select" id="Ppaket" name="ppaket">
                      <option selected disabled>Pilih satu</option>
                      <?php  
                          $query3 = "SELECT * FROM PROMO";
                          $list3 = $conn->query($query3);
                          foreach ($list3 as $key => $value) {
                              $kat = $value['nama_promo'];
                              ?>        
                          <option value="<?= $value['id_promo']?>"><?= $value['nama_promo']?></option>
                      <?php } ?> 
                      </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="Submit">Submit</button>
                </div>
              <!-- </form> -->
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
    $('#Submit').click(function () {
          let npaket = $('#Npaket').val();
          let hpaket = $('#Hpaket').val();
          let kpaket = $('#Kpaket').val();
          let ppaket = $('#Ppaket').val();
          if(npaket != "" && hpaket != "" && idk != "" && idp != ""){
              $.ajax({
                  url: "insertDatabase.php",
                  method: 'post',
                  data: {
                      npaket : npaket,
                      hpaket : hpaket,
                      kpaket : kpaket,
                      ppaket : ppaket
                  },
                  success: function(result){   
                    alert(result);
                    if(result != "Data Kembar"){
                      document.location.href = 'insertPaket.php';
                    }
                  }
              });
          }else{
              alert("Terdapat isian yang kosong!");
          }
      });
</script>
</body>
</html>

