<style>
    body{
        width:1000px;
        height:1000px;
    }
    .kotak{
        position: relative;
        width:50px;
        height:50px;
        float:left;
        border-radius:20%;
    }
    .hijau{
        background-color:green;
    }
    .merah{
        background-color:red;
    }
    .kuning{
        background-color:yellow;
    }
    .biru{
        background-color: blue;
    }
    .small-box {
        cursor:pointer;
    }
    
</style>
<?php
session_start();
if(isset($_SESSION["isi_kursi"])==false){
    $_SESSION["isi_kursi"]="";
    $_SESSION["ctr"]="";
}

?>
<link rel="stylesheet" href="../AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-master/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<body style="width:100%;">
    <section class="wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-6">
            <h1 class="m-0 " style="color:rgb(98, 0, 234);;">Uwenak Resotran</h1>
          </div><!-- /.col -->
          <div class="col-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    <div class="container-fluid">
        <div class= "wrapper">
    <!-- Main content -->
        <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                       Meja
                        </h3>
                        <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            
                            <li class="nav-item">
                                <button type="button"
                                    class="btn btn-primary btn-sm"
                                    data-card-widget="collapse"
                                    data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </li>
                        </ul>
                        </div>
                    </div><!-- /.card-header -->
                    <button onclick="ubahMeja()" class="btn btn-primary btn-sm">Pesan Kursi</button>
                    <div class="card-body" style="height:75vh;">
                        <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        
                        <div class="tempat"></div>

                        </div>
                    </div><!-- /.card-body -->

                </section>

                <section class="col-lg-6 connectedSortable">
                <div class="ket"style="float:left;" ></div>
                    <!-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-chart-spoon mr-1"></i>
                        Menu
                        </h3>
                        <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <button type="button"
                                    class="btn btn-primary btn-sm"
                                    data-card-widget="collapse"
                                    data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </li>
                           
                        </ul>
                        </div>
                    </div>
                    <div class="card-body" style="height:auto;">
                        <div class="tab-content p-0">
                        
                            <div class="row" >
                                
                            <div class="kategori col-3" style="width:auto"></div>
                            
                                <div class="menu" style="margin-left:10px;"></div>
                            </div>
                        
                        </div>
                    </div> -->
                </section>

             </div>
        </div>
    </div>
   
</section>
    
   

    <div style="float:right"class="detail">
    </div>
    <div style="clear:both;float:right" class="harga"></div>
</body>
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
    callMeja();
    // callKategori();
    // callDetail();
    function callMeja(){
        $.ajax({
            method: "post",
            url: "General/getMeja.php",
            success: function (response) {
                $(".tempat").html(response);
            }
        });
    }
    // function callKategori(){
    //     $.ajax({
    //         method: "post",
    //         url: "Dine_In/getKategori.php",
    //         success: function (response) {
    //             $(".kategori").html(response);
    //             callMenu("KAT001");
    //         }
    //     });
    // }
    // function callMenu(kategori){
    //     $.ajax({
    //         method: "post",
    //         url: "Dine_In/getMenu.php",
    //         data:{
    //             kategori:kategori
    //         },
    //         success: function (response) {
    //             $(".menu").html(response);
    //         }
    //     });
    // }
    function callDetail(){
        $.ajax({
            method: "post",
            url: "General/getDetail_keterangan_kursi.php",
            success: function (response) {
                $(".ket").html(response);
            }
        });
    }
    // function getHarga(){
    //     $.ajax({
    //         method: "post",
    //         url: "General/getHarga.php",
    //         success: function (response) {
    //             $(".harga").html(response);
    //         }
    //     });
    // }
    // function ubahJumlah(nama,ctr){
    //     $.ajax({
    //         method: "post",
    //         url: "General/setJumlah_pesanan.php",
    //         data: {
    //             nama:nama,
    //             jumlah:$("#inp"+ctr).val()
    //         },
    //         success: function (response) {
    //             getHarga();
    //             getDetail_menu();
    //         }
    //     });
    // }
    function ubahMeja(){
        $.ajax({
            method: "post",
            url: "General/setMeja_pesan.php",
            success: function (response) {
                callMeja();
                callDetail();
                window.location.assign("../home/cart.php");
            }
        });
    }
    // function ambilMenu(nama){
    //     $.ajax({
    //         method: "post",
    //         url: "General/setSession_menu.php",
    //         data:{
    //             nama_menu:nama
    //         },
    //         success: function (response) {
    //             getDetail_menu();
    //         }
    //     });
    // }
    // function pesanMakanan(){
    //     $.ajax({
    //         method: "post",
    //         url: "Dine_In/doTransaksi.php",
    //         success: function (response) {
    //             callMeja();
    //             getDetail_menu();
    //             callDetail();
    //         }
    //     });
    // }
    // function getDetail_menu(){
    //     $.ajax({
    //         method: "post",
    //         url: "General/getDetail_pesanan.php",
    //         success: function (response) {
    //             $(".detail").html(response);
    //             getHarga();
    //         }
    //     });
    // }
    function pesanDinein(ke){
        if($("#meja"+ke).hasClass("biru")){
            $("#meja"+ke).addClass("hijau");
            $("#meja"+ke).removeClass("biru");
            $.ajax({
                method: "post",
                url: "General/setSession_meja.php",
                data: {
                    nomor:ke,
                    warna:"biru"
                },
                success: function (response) {

                }
            });
        }
        else if($("#meja"+ke).hasClass("hijau")){
            $("#meja"+ke).addClass("biru");
            $("#meja"+ke).removeClass("hijau");
            $.ajax({
                method: "post",
                url: "General/setSession_meja.php",
                data: {
                    nomor:ke,
                    warna:"hijau"
                },
                success: function (response) {

                }
            });
        }else if($("#meja"+ke).hasClass("merah")){
            if(confirm("Meja "+ke+" Sudah Selesai ?")){
                $.ajax({
                    method: "post",
                    url: "General/setMeja_selesai.php",
                    data: {
                        nomor:ke
                    },
                    success: function (response) {
                        callMeja();
                    }
                });
            }
        }
        callDetail();
    }
</script>
