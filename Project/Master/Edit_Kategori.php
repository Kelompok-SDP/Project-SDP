<?php
     require_once("../config.php");
     $id = '';
     $id  = $_GET['id'];
     $query  = "SELECT * FROM KATEGORI WHERE id_kategori = '$id'";
     $res = mysqli_query($conn,$query);
     $nama = "";
     $jenis = "";
     foreach ($res as $key=>$data){
         $nama  = $data['nama_kategori'];
         $jenis = $data['jenis_kategori'];
     }


?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Kategori.php</title>
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
            <h1>Edit Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="kategori.php">Back</a></li>
              <li class="breadcrumb-item active">Table Kategori</li>
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
              <form role="form" action = "" method ="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input type="text" class="form-control" id="namKat" placeholder="Masukan Nama Kategori" name ="nama" value=<?=$nama?>>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kategori</label>
                    <input type="text" class="form-control" id="jenisKat" placeholder="Masukan Jenis Kategori" name = "jenis" value=<?=$jenis?>>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 <button type="submit" class="btn btn-primary" id="btnEdit" name="submit" value="<?= $id ?>">Save <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                  <button type="submit" class="btn btn-danger" id="btnDelete" name="delete" value="<?= $id ?>" style="float:right;">Delete <i class="fas fa-trash" style="margin-left:12px;"></i></button>
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
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-master/dist/js/demo.js"></script>
<!-- page script -->
<script>
 $('#btnEdit').click(function () {
        let id = $(this).val();
        let namkat = $('#namKat').val();
        let jeniskat = $("#jenisKat").val();
        if(namkat != "" && jeniskat != "" ){
            $.ajax({
                url: "kategori/updateDatabase.php",
                method: 'post',
                data: {
                    id : id,
                    namkat : namkat,
                    jeniskat : jeniskat
                },
                success: function(result){   
                    alert(result);
                    document.location.href ="kategori.php";
                }
            });
        }else{
            alert("Terdapat Isian yang kosong!");
        }
    });

    $('#btnDelete').click(function () {
        var r = confirm("Anda yakin?");
        if (r == true) {
            let id = $(this).val();
            $.ajax({
                url: "kategori/deleteKategori.php",
                method: 'post',
                data: {
                    id : id
                },
                success: function(result){   
                    alert(result);
                    document.location.href = "kategori.php";
                }
            });
        } 
    });
</script>
</body>
</html>