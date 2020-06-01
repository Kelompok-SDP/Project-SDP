<?php
    require_once("../config.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report | Master</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css'>
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
              <li class="breadcrumb-item"><a href="Report.php">Reset</a></li>
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
                <div>
                  <div style="margin-left:7.3vw;Text-align:center;float:left;color:green;">
                  <b>Laporan</b></div>
                  <div style="Text-align:left;margin-left:11vw;float:left;color:orange;">
                  <b>Menu Favorit</b></div>
                  <div style="Text-align:left;margin-left:11vw;float:left;color:brown;">
                  <b>Terbanyak</b></div>
                </div><br>
                  <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true" style="color: green;">Harian</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false" style="color: green;">Mingguan</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false" style="color: green;">Bulanan</a>
                    <a class="nav-item nav-link" id="product-comments-tab2" data-toggle="tab" href="#product-comments2" role="tab" aria-controls="product-comments2" aria-selected="false" style="color: orange;">Harian</a>
                    <a class="nav-item nav-link" id="product-comments-tab3" data-toggle="tab" href="#product-comments3" role="tab" aria-controls="product-comments3" aria-selected="false" style="color: orange;">Bulanan</a>
                    <a class="nav-item nav-link" id="product-comments-tab4" data-toggle="tab" href="#product-comments4" role="tab" aria-controls="product-comments4" aria-selected="false" style="color: brown;">Pembeli (Member)</a>
                    <a class="nav-item nav-link" id="product-comments-tab5" data-toggle="tab" href="#product-comments5" role="tab" aria-controls="product-comments5" aria-selected="false" style="color: brown;">Penjualan (Jenis Pemesanan)</a>
                  </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    
                  <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="form-group">
                        <label><div style="color: green;">Masukkan Tanggal:</div></label>
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
                        <label><div style="color: green;">Masukkan Tanggal:</div></label>
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
                        <label><div style="color: green;">Masukkan Bulan:</div></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="month" id="inpmonth" class="form-control float-right" name="inpmonth" id="inpmonth">
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
                        <label><div style="color: orange;">Masukkan Tanggal:</div></label>
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
                        <label><div style="color: orange;">Masukkan Bulan:</div></label>
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
                  <div class="tab-pane fade" id="product-comments4" role="tabpanel" aria-labelledby="product-comments-tab4"> 
                    <div class="form-group">
                        <label><div style="color: brown;">Masukkan Bulan:</div></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="month" class="form-control float-right" name="inpmonth3" id="inpmonth3">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <button onclick="cetak6()" class="btn btn-primary">Cetak <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                      <id id="tampung9"></id>
                      <script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                      <script>
                          function cetak6(){
                            $("#tampung9").html("");  
                            let tmp = $("#inpmonth3").val();
                            alert(tmp);
                            if(tmp == ""){
                              alert("Tidak ada bulan yang dipilih!");
                            }else{
                              $.ajax({
                                  method: "post",
                                  url: "Report/Laporan_Member_Pembeli_Terbanyak/query_hjual.php",
                                  data: {
                                      month: $("#inpmonth3").val()
                                  },
                                  success: function (response) {
                                      $("#tampung9").html(response);  
                                  }
                              });
                            }
                          }
                      </script>
                  </div>
                  <div class="tab-pane fade" id="product-comments5" role="tabpanel" aria-labelledby="product-comments-tab5"> 
                    <div class="form-group">
                        <label><div style="color: brown;">Masukkan Bulan:</div></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="month" class="form-control float-right" name="inpmonth4" id="inpmonth4">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <button onclick="cetak7()" class="btn btn-primary">Cetak <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                      <id id="tampung10"></id>
                      <script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
                      <script>
                          function cetak7(){
                            $("#tampung10").html("");  
                            let tmp = $("#inpmonth4").val();
                            alert(tmp);
                            if(tmp == ""){
                              alert("Tidak ada bulan yang dipilih!");
                            }else{
                              $.ajax({
                                  method: "post",
                                  url: "Report/Laporan_Penjualan_Terbanyak_Tiap_Jenis_Transaksi/query_hjual.php",
                                  data: {
                                      month: $("#inpmonth4").val()
                                  },
                                  success: function (response) {
                                      $("#tampung10").html(response);  
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
<script>
  $(() => {
    $('#month').datepicker();
  });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
