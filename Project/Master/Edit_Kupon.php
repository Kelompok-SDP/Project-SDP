<?php
     require_once("../config.php");
     $id = '';
     $id  = $_GET['id'];
     $query  = "SELECT * FROM kupon WHERE id_kupon = '$id'";
     $res = mysqli_query($conn,$query);
     $nama = "";
     $harga = 0;
     $awp = '';
     $akp = '';
   //  $gbr = '';
    $sisa = 0;
     $idmenu = "";
     foreach ($res as $key=>$data){
        $nama  = $data['nama_kupon'];
        $awp = $data['periode_awal_kupon'];
        $akp = $data['periode_akhir_kupon'];
        $idmenu = $data["id_menu"];
        $harga = $data["harga_kupon"];
        $sisa  = $data['sisa_kupon'];
     }
     $awp = strtotime($awp);
     $akp = strtotime($akp);
     $np = date('Y-m-d',$awp);
     $nkp = date('Y-m-d',$akp);


     
     
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Kupon</title>
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
<input type="hidden" id = "jenissebelum"value="<?=$idmenu?>" >
<input type="hidden" id = "id"value="<?=$id?>" >

  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Kupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="kupon.php">Back</a></li>
              <li class="breadcrumb-item active">Table Kupon</li>
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
                    <label for="exampleInputEmail1">Nama Kupon</label>
                    <input type="text" class="form-control" id="namkupon" placeholder="Masukan Nama Promo" name ="nama" value="<?=$nama?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Harga Kupon</label>
                    <input type="number" class="form-control" id="hargakupon" placeholder="Masukan Harga Promo" name = "harga" value="<?=$harga?>">
                  </div>

                  <div class="form-group">
                        <label>Menu </label>
                        <select class="form-control" id="jeniskupon">
                       
                        </select>
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
                          <input type="date" class="form-control float-right" name="awalP" value="<?=$np?>" id="awalP">
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
                          <input type="date" class="form-control float-right" name="akhirP"  value="<?=$nkp?>" id="akhirP">
                      </div>
                      <!-- /.input group -->
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Banyak Kupon</label>
                        <input type="number" class="form-control" id="banyakkupon" placeholder="Masukan banyak kupon" name = "banyak" value="<?=$sisa?>">
                    </div>
                </div>
              
                <!-- /.card-body -->
                
                <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="btnEdit" name="submit" value="<?= $id ?>">Save <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                  <button type="submit" class="btn btn-danger" id="btnDelete" name="delete" value="<?= $id ?>" style="float:right;">Delete <i class="fas fa-trash" style="margin-left:12px;"></i></button></div>
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
  $(document).ready(function(){
      ubahselect();
  });
  function ubahselect(){
    let sebelum = $("#jenissebelum").val();
    let  id = $("#id").val();
    $.ajax({
      url : "Kupon/ubahselect.php",
      method: "post",
      data:{
        sebelum :sebelum,
        id : id
      },
      success: function(result){  
         // alert(result); 
         $("#jeniskupon").html(result);
      }
    });
  }
$('#btnEdit').click(function () {
        let id = $(this).val();
        let namkupon = $('#namkupon').val();
        let awalp = $('#awalP').val();
        let akhirp = $('#akhirP').val();
        let harga = $("#hargakupon").val();
        let menu = $('#jeniskupon').val();
        let banyak = $('#banyakkupon').val();
        //alert(menu);
        if(namkupon != "" && awalp < akhirp && menu != null && harga!= "" && banyak != ""){
            $.ajax({
                url: "Kupon/updateDatabase.php",
                method: 'post',
                data: {
                    id : id,
                    namkupon : namkupon,
                    awalp : awalp,
                    akhirp : akhirp,
                    menu : menu,
                    banyak : banyak,
                    harga : harga
                },
                success: function(result){   
                    alert(result);
                    // if(result.includes("PR")){
                    //   let a = "promo/Uploadgambar.php?id=";
                    //   let a2 = result.split(" ",1);
                    //   let a3 = a.concat(a2);
                    //   document.location.href = a3;
                    // }
                    document.location.href = "kupon.php";
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
                url: "Kupon/deleteKupon.php",
                method: 'post',
                data: {
                    id : id
                },
                success: function(result){   
                    alert(result);
                    document.location.href = "kupon.php";
                }
            });
        } 
    });
</script>
</body>
</html>

