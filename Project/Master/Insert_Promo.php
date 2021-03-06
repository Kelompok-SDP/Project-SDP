<?php

require_once("../config.php");


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
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Promo</label>
                    <input type="text" class="form-control" id="nampromo" placeholder="Masukan Nama Promo" name ="nama">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Detail Promo</label>
                    <input type="text" class="form-control" id="detpromo" placeholder="Masukan Nama Promo" name ="nama">
                  </div>

                  <div class="form-group">
                        <label>Jenis Promo</label>
                        <select class="form-control" id="jenispromo">
                          <option value="H">Promo Hemat</option>
                          <option value="HR">Promo Hari Raya</option>
                          <option value="X">Buy 1 Get 1 Free</option>
                        </select>


                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Harga Promo</label>
                    <input type="number" class="form-control" id="hrgpromo" data-mask='___.___.___' placeholder="Masukan Harga Promo" name = "harga">
                  </div> -->
                         <!-- Date range -->
                    <div class="form-group">
                        <label>Awal Periode:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control float-right" name="awalP" id="awalP">
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
                            <input type="date" class="form-control float-right" name="akhirP" id= "akhirP">
                        </div>
                        <!-- /.input group -->
                     </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="Submit" name="submit">Submit <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>                </div>
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
<!-- date-range-picker -->
<script src="../AdminLTE-master/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-master/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $('#Submit').click(function () {
        let nampromo = $('#nampromo').val();
        let awalp = $('#awalP').val();
        let akhirp = $('#akhirP').val();
        let detpromo = $('#detpromo').val();
        let jenispromo = $("#jenispromo").val();
        if(nampromo != "" && awalp < akhirp && detpromo != "" && jenispromo != null){
            $.ajax({
                url: "promo/insertDatabase.php",
                method: 'post',
                data: {
                    nampromo : nampromo,
                    detpromo : detpromo,
                    jenispromo : jenispromo,
                    awalp : awalp,
                    akhirp : akhirp
                },
                success: function(result){
                  alert(result);
                  if(result.includes("PR")){
                    let a = "promo/uploadgambar.php?id=";
                    let a2 = result.split(" ",1);
                    let a3 = a.concat(a2);
                    document.location.href = a3;
                  }
                }
            });
        }else{
            alert("Terdapat isian yang kosong atau input tanggal tidak valid!");
        }
    });
</script>
</body>
</html>

