<?php
    require_once("../../config.php");

    $id = $_GET['id'];

    $query = "SELECT * FROM PAKET WHERE ID_PAKET = '$id'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_num_rows($res);
    if($row > 0){
        foreach ($res as $key => $value) {
            $gbr = $value['gambar'];
        }
    }else{
        echo "<script>alert('Tidak ada hasil record!');</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Gambar</title>
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
            <h1>Edit Gambar Paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Paket.php">Back</a></li>
              <li class="breadcrumb-item active">Table Menu</li>
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
              <?php
                $query = "SELECT * FROM PAKET WHERE id_paket = '$id'";
                $list = $conn->query($query);
                foreach($list as $key=>$data){
                    $nmenu = $data['nama_paket'];
                    $angka = $data["harga_paket"];
                    $hmenu = "Rp " . number_format($angka,2,',','.');
                    $kmenu = $data['id_kategori'];
                    //$pmenu = $data['id_promo'];
                }
              ?>
              <label for="exampleInputEmail1"><h4>Detail Paket </h4></label><br>
              <label for="exampleInputEmail1">Nama Paket </label><label for="exampleInputEmail1"><?=": ".$nmenu?></label><br>
              <label for="exampleInputEmail1">Harga Paket </label><label for="exampleInputEmail1"><?=": ".$hmenu?></label><br>
              <label for="exampleInputEmail1">Harga Paket </label><label for="exampleInputEmail1"><?=": ".$kmenu?></label><br>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                <div class="form-group">
                    <label for="inputDescription">Gambar Paket Sebelumnya</label><br>
                    <?php echo "<img src='$gbr' width='200' height='200'"; ?>
                </div>
                <form role="form" action = "#" method ="post" enctype="multipart/form-data">
                    Pilih Gambar :
                    <input type="file" name="gambar" id="gambar">
                    <input type="submit" value="Upload" name="upload"><br>
                    <?php
                    if(isset($_REQUEST['upload'])){
                        $target_dir = "Image/"; //<- ini folder tujuannya
                        $target_file = $target_dir. basename($_FILES["gambar"]["name"]); //murni mendapatkan namanya saja tanpa path nya 
                        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        if($file_type !="jpg" && $file_type !="png"){
                            echo "Tipe file hanya jpg dan png saja";
                        } else if($_FILES["gambar"]["size"] > 500000){
                            echo "File size terlalu besar";
                        } else if(file_exists($target_file)){
                            echo "File sudah ada";
                        }
                        else{
                            $kembar = false;
                            if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)){
                              echo "File ".basename($_FILES["gambar"]["name"])." terupload<br>";
                              echo "<img src='$target_file' width='200' height='200'";
                            }          
                            $query3 = "SELECT * FROM PAKET";
                            $list2 = $conn->query($query3);
                            foreach($list2 as $key=>$data){
                                $tmpnama = $data['gambar'];
                                if($target_file == $tmpnama){
                                    $kembar = true;
                                }
                            }
                            if($kembar){
                                echo "<script>alert('Path Kembar!');</script>";
                            }else{
                                $query = "UPDATE PAKET SET GAMBAR='$target_file' WHERE ID_PAKET='$id'";
                                if($conn->query($query) == true){
                                    echo "<br><script>alert('Berhasil Meng-update Gambar');</script>";
                                }else{
                                    echo "<br><script>alert('Gagal Meng-update Gambar');</script";
                                } 
                            }
                        }
                      }
                ?>
                </form>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit" id="Submit">Submit </button>
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
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE-master/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $('#Submit').click(function () {
    alert("Selesai");
    document.location.href = '../Paket.php';
  });
</script>
</body>
</html>
