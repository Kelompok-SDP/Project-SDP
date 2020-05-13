<?php
     require_once("../config.php");
     $id = '';
     $tmpid  = $_GET['id'];
     $id = $tmpid;
     $query  = "SELECT * FROM PAKET WHERE id_paket = '$id'";
     $res = mysqli_query($conn,$query);
     $npaket = "";
     $hpaket = "";
     $kpaket = "";
     $ppaket = "";
     $nkat = "";
     $npro = "";
     $stmp = "";
     $stmp2 = "";
     foreach ($res as $key=>$data){
         $npaket  = $data['nama_paket'];
         $hpaket = $data['harga_paket'];
         $kpaket = $data['id_kategori'];
         $query2 = "SELECT * FROM KATEGORI WHERE id_kategori = '$kpaket'";
          $res2 = mysqli_query($conn,$query2);
          foreach ($res2 as $key => $value) {
              $nkat = $value['nama_kategori'];
          }
          $query3 = "SELECT * FROM PROMO_PAKET WHERE id_paket = '$id'";
          $res3 = mysqli_query($conn,$query3);
          foreach ($res3 as $key => $value) {
              $npro = $value['id_promo'];
          }
     }
    $query2 = "SELECT * FROM PAKET_MENU WHERE ID_PAKET = '$id'";
    $res2 = mysqli_query($conn,$query2);
    foreach ($res2 as $key => $value) {
      $stmp = $value['id_menu'];
      $query3 = "SELECT * FROM MENU WHERE ID_MENU = '$stmp'";
      $res3 = mysqli_query($conn,$query3);
      foreach ($res3 as $key => $value) {
        $stmp2 .= $value['nama_menu'] . ".";
      }
    }
    $stmenu = explode(".", $stmp2);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Paket</title>
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
            <h1>Edit Paket</h1>
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
              <!-- <form role="form" action = "" method ="post"> -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Paket</label>
                    <input type="text" class="form-control" id="Npaket" placeholder="Masukan Nama Paket" name ="npaket" value=<?=$npaket?>>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Paket</label>
                    <input type="number" class="form-control" id="Hpaket" placeholder="Masukan Harga Paket" name = "hpaket" value=<?=$hpaket?>>
                    <input type="hidden" class="form-control" id="jenisKat" name = "id" value=<?=$id?>>
                  </div>
                  <div class="form-group">
                  <label for="inputStatus">Kategori Paket</label><br>
                        <i><label for="inputStatus">Kategori Paket Sebelumnya </label><label for="inputStatus"><?=": ".$nkat?></label></i>
                        <select class="form-control custom-select" id="Kpaket" name="kpaket">
                        <option selected disabled>Pilih satu</option>
                        <?php  
                            $query3 = "SELECT * FROM KATEGORI WHERE STATUS_KATEGORI = 1";
                            $list3 = $conn->query($query3);
                            foreach ($list3 as $key => $value) {
                                $kat = $value['nama_kategori'];
                                ?>        
                            <option value="<?= $value['id_kategori']?>"><?= $value['nama_kategori']?></option>
                        <?php } ?> 
                        </select>
                    </div>
                    <div id="Menupaket">
                    <div class="form-group">
                    <label for="inputStatus">Menu 1</label><br>
                        <i><label for="inputStatus">Menu 1 Sebelumnya </label><label for="inputStatus"><?=": ".$stmenu[0]?></label></i>
                        <select class="form-control custom-select" id="Mpaket" name="mpaket">
                        <option selected disabled>Pilih satu</option>
                        <?php  
                            $query3 = "SELECT * FROM MENU WHERE STATUS = 1";
                            $list3 = $conn->query($query3);
                            foreach ($list3 as $key => $value) {
                                $kat = $value['nama_menu'];
                                ?>        
                            <option value="<?= $value['id_menu']?>"><?= $value['nama_menu']?></option>
                        <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="inputStatus">Menu 2</label><br>
                        <i><label for="inputStatus">Menu 2 Sebelumnya </label><label for="inputStatus"><?=": ".$stmenu[1]?></label></i>
                        <select class="form-control custom-select" id="Mpaket2" name="mpaket2">
                        <option selected disabled>Pilih satu</option>
                        <?php  
                            $query3 = "SELECT * FROM MENU WHERE STATUS = 1";
                            $list3 = $conn->query($query3);
                            foreach ($list3 as $key => $value) {
                                $kat = $value['nama_menu'];
                                ?>        
                            <option value="<?= $value['id_menu']?>"><?= $value['nama_menu']?></option>
                        <?php } ?> 
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="inputStatus">Promo Menu</label><br>
                    <?php 
                      if($npro != ""){
                    ?>
                      <label for="inputStatus">Ada Promo Berlangsung di Paket Ini</label><br>
                      <input type="hidden" name="" id="promo" value="<?= $npro ?>">
                      <input type="hidden" name="" id="Ppaket" value="">
                    <?php
                      }else{
                    ?>
                      <input type="hidden" name="" id="promo" value="<?= $npro ?>">
                      <select class="form-control custom-select" id="Ppaket" name="ppaket">
                      <option selected disabled>Pilih satu</option>
                      <?php  
                          $query3 = "SELECT * FROM PROMO WHERE STATUS_PROMO = 1";
                          $list3 = $conn->query($query3);
                          foreach ($list3 as $key => $value) {
                              $kat = $value['nama_promo'];
                              ?>        
                          <option value="<?= $value['id_promo']?>"><?= $value['nama_promo']?></option>
                      <?php } ?> 
                      </select>
                    <?php
                      } 
                    ?>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="btnEdit" name="submit" value="<?= $tmpid ?>">Save <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                  <button type="submit" class="btn btn-danger" id="btnDelete" name="delete" value="<?= $tmpid ?>" style="float:right;">Delete <i class="fas fa-trash" style="margin-left:12px;"></i></button>
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
        let npaket = $('#Npaket').val();
        let hpaket = $('#Hpaket').val();
        let kpaket = $('#Kpaket').val();
        let mpaket = $('#Mpaket').val();
        let mpaket2 = $('#Mpaket2').val();
        let prepromo = $("#promo").val();
        let ppaket = $('#Ppaket').val();
        if(npaket != "" && hpaket != "" && kpaket != null){
          if(mpaket != null && mpaket2 != null){
            if(mpaket != mpaket2){
              $.ajax({
                  url: "Paket/updateDatabase.php",
                  method: 'post',
                  data: {
                      id : id,
                      npaket : npaket,
                      hpaket : hpaket,
                      kpaket : kpaket,
                      mpaket : mpaket,
                      mpaket2 : mpaket2,
                      ppaket : ppaket,
                      prepromo : prepromo
                  },
                  success: function(result){   
                    alert(result);
                    if(result.includes("PK")){
                      let a = "Paket/editGambar.php?id=";
                      let a2 = result.split(" ",1);
                      let a3 = a.concat(a2);
                      document.location.href = a3;
                    }
                  }
              });
            }else{
              alert("Menu Kembar!");
            }
          }else{
            alert("Menu Kurang!");
          }
        }else{
            alert("Terdapat isian yang kosong!");
        }
    });

    $('#btnDelete').click(function () {
        var r = confirm("Anda yakin?");
        if (r == true) {
            let id = $(this).val();
            $.ajax({
                url: "Paket/deletePaket.php",
                method: 'post',
                data: {
                    id : id
                },
                success: function(result){   
                    alert(result);
                    document.location.href = "Paket.php";
                }
            });
        } 
    });
    // $("#Kpaket").change(function () {
    //     let a = $('#Kpaket').val();
    //     $.ajax({
    //         url: "Paket/Load_menu.php",
    //         method: 'post',
    //         data: {
    //             a : a
    //         },
    //         success: function(result){   
    //           if(result.includes("alert")){
    //             $("#Menupaket").html(result);
    //             $("#Menupaket").css("display","none");
    //           }else{
    //             $("#Menupaket").css("display","inline");
    //             $("#Menupaket").html(result);
    //           }
    //         }
    //     });
    // });
</script>
</body>
</html>