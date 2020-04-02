<?php
     require_once("../config.php");
     $id = '';
     $tmpid  = $_GET['id'];
     $id = $tmpid;
     $query  = "SELECT * FROM MENU WHERE id_menu = '$id'";
     $res = mysqli_query($conn,$query);
     $nama = "";
     $jenis = "";
     $harga = "";
     $des = "";
     $idk = "";
     $idp = "";
     $nkat = "";
     $npro = "";
     foreach ($res as $key=>$data){
        $nama  = $data['nama_menu'];
        $harga = $data['harga_menu'];
        $des = $data['deskripsi'];
        $idk = $data['id_kategori'];
        $idp = $data['id_promo'];
        $query2 = "SELECT * FROM KATEGORI WHERE id_kategori = '$idk'";
        $res2 = mysqli_query($conn,$query2);
        foreach ($res2 as $key => $value) {
            $nkat = $value['nama_kategori'];
        }
        $query2 = "SELECT * FROM PROMO WHERE id_promo = '$idp'";
        $res2 = mysqli_query($conn,$query2);
        foreach ($res2 as $key => $value) {
            $npro = $value['nama_promo'];
        }
     }

     if(isset($_POST['submit'])){
        
     } 
      else if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $query = "UPDATE `kategori` SET `status_kategori`='NA' WHERE id_kategori = '$id'";
        if(mysqli_query($conn,$query) == true){
           header("location:kategori.php");
        }
      }

?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Menu</title>
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Menu.php">Back</a></li>
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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <input type="text" class="form-control" id="Nmenu" placeholder="Nama Menu" name ="nmenu" value="<?=$nama?>">
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Harga Menu</label>
                        <input type="number" id="Hmenu" class="form-control" placeholder="Harga Menu" name="hmenu" value="<?=$harga?>">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Kategori Menu Sebelumnya </label><label for="inputStatus"><?=": ".$nkat?></label>
                        <select class="form-control custom-select" id="Kmenu" name="kmenu">
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
                        <label for="inputStatus">Promo Menu Sebelumnya</label><label for="inputStatus"><?=": ".$npro?></label>
                        <select class="form-control custom-select" id="Pmenu" name="pmenu">
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
                    <div class="form-group">
                        <label for="inputDescription">Deskripsi Menu</label>
                        <textarea id="Dmenu" class="form-control" rows="4" name="dmenu" value=""><?=$des?></textarea>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="btnEdit" name="submit" value="<?= $tmpid ?>">Save</button>
                  <button type="submit" class="btn btn-primary" id="btnDelete" name="delete" value="<?= $tmpid ?>" style="background-color:red;">Delete <i class="fas fa-trash" style="left-padding:12px;"></i></button></button>
                </div>
                </div>
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
        let nmenu = $('#Nmenu').val();
        let hmenu = $('#Hmenu').val();
        let kmenu = $('#Kmenu').val();
        let pmenu = $('#Pmenu').val();
        let dmenu = $('#Dmenu').val();
        if(nmenu != "" && hmenu != "" && kmenu != null && pmenu != null && dmenu != ""){
            $.ajax({
                url: "Menu/updateDatabase.php",
                method: 'post',
                data: {
                    id : id,
                    nmenu : nmenu,
                    hmenu : hmenu,
                    kmenu : kmenu,
                    pmenu : pmenu,
                    dmenu : dmenu
                },
                success: function(result){   
                    alert(result);
                    document.location.href = "../Menu.php";
                }
            });
        }else{
            alert("Terdapat isian yang kosong!");
        }
    });

    $('#btnDelete').click(function () {
        var r = confirm("Anda yakin?");
        if (r == true) {
            let id = $(this).val();
            $.ajax({
                url: "Menu/deletePaket.php",
                method: 'post',
                data: {
                    id : id
                },
                success: function(result){   
                    alert(result);
                    document.location.href = "../Menu.php";
                }
            });
        } 
    });
</script>
</body>
</html>