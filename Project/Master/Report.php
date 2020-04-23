<?php
    require_once("../config.php");
?>

<!-- <a href="Hari/Penjualan.php">penjualan perhari</a> <br>

<input type="button" value="penjualan perbulan"> <br> <br>
<input type="button" value="penjualan perminggu"> <br>
<input type="button" value="penjualan terbanyak tiap jenis transaksi"> <br>
<input type="button" value="pilih rentang laporan penjualan"> <br>
<input type="button" value="menu terfavorit perhari"> <br>
<input type="button" value="menu terfavorit perminggu"> <br>
<input type="button" value="menu terfavorit perbulan"> <br>
<input type="button" value="10 member pembeli terbanyak"> <br> -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report</title>
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
<style>
.sticky{
  position: fixed;
  bottom: 0;
  right: 0;
  background-color: white; 
}
</style>
<?php
  include("../sidebar.php");
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Menu.php">Home</a></li>
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
              <h3 class="card-title"> </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-header">
              <div class="row mt-4">
                <nav class="w-100">
                <div style="margin-left: 22vw;">Menu Favorit</div>
                  <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Harian</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Mingguan</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Bulanan</a>
                    <a class="nav-item nav-link" id="product-comments-tab2" data-toggle="tab" href="#product-comments2" role="tab" aria-controls="product-comments2" aria-selected="false">Harian</a>
                    <a class="nav-item nav-link" id="product-comments-tab3" data-toggle="tab" href="#product-comments3" role="tab" aria-controls="product-comments3" aria-selected="false">Bulanan</a>
                  </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    
                  <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="form-group">
                        <label>Masukkan Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control float-right" name="inpdate" id="inpdate">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <button onclick="cetak()" class="btn btn-primary">Cetak <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                      <id id="tampung"></id>
                      <div id="tampung2" class="sticky"></div>
                      <script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                      <script>
                          function cetak(){
                            $("#tampung").html("");  
                            $("#tampung2").html("");  
                            let tmp = $("#inpdate").val();
                            if(tmp == ""){
                              alert("Tidak ada hari yang dipilih!");
                            }else{
                              $.ajax({
                                  method: "post",
                                  url: "Report/Laporan_Hari/query_hjual.php",
                                  data: {
                                      date: $("#inpdate").val()
                                  },
                                  success: function (response) {
                                      $("#tampung").html(response);  
                                  }
                              });
                            }
                          }
                      </script>
                  </div>
                  <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                    <div class="form-group">
                        <label>Masukkan Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control float-right" name="inpweek" id="inpweek">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <button onclick="cetak2()" class="btn btn-primary">Cetak <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                      <id id="tampung5"></id>
                      <div id="tampung6" class="sticky"></div>
                      <script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                      <script>
                          function cetak2(){
                            $("#tampung5").html("");  
                            $("#tampung6").html("");  
                            let tmp = $("#inpweek").val();
                            if(tmp == ""){
                              alert("Tidak ada tanggal yang dipilih!");
                            }else{
                              $.ajax({
                                  method: "post",
                                  url: "Report/Laporan_Minggu/query_hjual.php",
                                  data: {
                                      month: $("#inpweek").val()
                                  },
                                  success: function (response) {
                                      $("#tampung5").html(response);  
                                  }
                              });
                            }
                          }
                      </script>
                  </div>
                  <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> 
                    <div class="form-group">
                        <label>Masukkan Bulan:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="month" class="form-control float-right" name="inpmonth" id="inpmonth">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <button onclick="cetak3()" class="btn btn-primary">Cetak <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                      <id id="tampung3"></id>
                      <div id="tampung4" class="sticky"></div>
                      <script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                      <script>
                          function cetak3(){
                            $("#tampung3").html("");  
                            $("#tampung4").html("");  
                            let tmp = $("#inpmonth").val();
                            if(tmp == ""){
                              alert("Tidak ada bulan yang dipilih!");
                            }else{
                              $.ajax({
                                  method: "post",
                                  url: "Report/Laporan_Bulan/query_hjual.php",
                                  data: {
                                      month: $("#inpmonth").val()
                                  },
                                  success: function (response) {
                                      $("#tampung3").html(response);  
                                  }
                              });
                            }
                          }
                      </script>
                  </div>
                  <div class="tab-pane fade" id="product-comments2" role="tabpanel" aria-labelledby="product-comments-tab2"> 
                    <div class="form-group">
                        <label>Masukkan Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="date" class="form-control float-right" name="inpdate" id="inpdate2">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <button onclick="cetak4()" class="btn btn-primary">Cetak <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                      <id id="tampung7"></id>
                      <script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                      <script>
                          function cetak4(){
                            $("#tampung7").html("");  
                            $("#tampung8").html("");  
                            let tmp = $("#inpdate2").val();
                            if(tmp == ""){
                              alert("Tidak ada tanggal yang dipilih!");
                            }else{
                              $.ajax({
                                  method: "post",
                                  url: "Report/Menu_Favorite_Hari/query_menu.php",
                                  data: {
                                      date: $("#inpdate2").val()
                                  },
                                  success: function (response) {
                                      $("#tampung7").html(response);  
                                  }
                              });
                            }
                          }
                      </script>
                  </div>
                  <div class="tab-pane fade" id="product-comments3" role="tabpanel" aria-labelledby="product-comments-tab3"> 
                    <div class="form-group">
                        <label>Masukkan Bulan:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="month" class="form-control float-right" name="inpmonth2" id="inpmonth2">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <button onclick="cetak5()" class="btn btn-primary">Cetak <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                      <id id="tampung8"></id>
                      <script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                      <script>
                          function cetak5(){
                            $("#tampung8").html("");  
                            let tmp = $("#inpmonth2").val();
                            alert(tmp);
                            if(tmp == ""){
                              alert("Tidak ada bulan yang dipilih!");
                            }else{
                              $.ajax({
                                  method: "post",
                                  url: "Report/Menu_Favorite_Bulan/query_menu.php",
                                  data: {
                                      month: $("#inpmonth2").val()
                                  },
                                  success: function (response) {
                                      $("#tampung8").html(response);  
                                  }
                              });
                            }
                          }
                      </script>
                  </div>
                </div>
              </div>
            </div>
            </div>
            
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 350px;" >
                  <div class="input-group-prepend">
                  </div>
                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
              </div>

           <!--table-->
                <div class="card-body table-responsive p-0" style="height: 100%;" id="tKat">                       
                </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
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

