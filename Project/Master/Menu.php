<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu</title>
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
            <h1>Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
              <h3 class="card-title">Table Menu</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-header">
            <label style="font-size:20pt; font:bold;">Filter Menu :</label>

                <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 350px;" >
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="Btnfilter">Filter By
                    </button>
                    <ul class="dropdown-menu" id="filtr">
                     <li class="dropdown-item" style="pointer-events:none;opacity:0.6;" >Filter By</li>
                     <li class="dropdown-divider"></li>
                      <li class="dropdown-item" onclick="ubah(1)" style="cursor:pointer;">Nama Menu</li>
                      <!-- <li class="dropdown-item" onclick="ubah(2)"  style="cursor:pointer;">Jenis Menu</li> -->
                    </ul>
                  </div>
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search"id="src" >
                    <div class="input-group-append">
                      <button type="submit" onclick = "showtable()" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                  <button onclick="tambah()" class="btn btn-primary">Insert New Menu <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
                </div>
          </div>

          <div class="card card-primary">
              <div class="card-header" style="color:white; background-color:red;">
                 <h3 class="card-title" >Purgatory Table Menu</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-header">
            <label style="font-size:20pt; font:bold;">Filter Menu :</label>

                <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 350px;" >
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="Btnfilter2">Filter By
                    </button>
                    <ul class="dropdown-menu" id="filtr2">
                     <li class="dropdown-item" style="pointer-events:none;opacity:0.6;" >Filter By</li>
                     <li class="dropdown-divider"></li>
                      <li class="dropdown-item" onclick="ubah2(1)" style="cursor:pointer;">Nama Menu</li>
                      <!-- <li class="dropdown-item" onclick="ubah2(2)"  style="cursor:pointer;">Jenis Menu</li> -->
                    </ul>
                  </div>
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search"id="src2" >

                    <div class="input-group-append">
                      <button type="submit" onclick = "showtable2()" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>

           <!--table-->
                <div class="card-body table-responsive p-0" style="height: 100%;" id="tKatHap">
                        
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
    var tp = 1;
    var tp2 = 1;
    function ubah(id){
        if (id==1){
            let tmp = "Nama Menu";
            tp = 1;
            document.getElementById("Btnfilter").innerHTML=tmp;
        }
    }
    function ubah2(id){
        if (id==1){
            let tmp = "Nama Menu";
            tp2 = 1;
            document.getElementById("Btnfilter2").innerHTML=tmp;
        }
    }
    function loadTable(){
        $("#tKat").load("Menu/showtableMenu.php");
    }
    function loadpurgatory(){
        $("#tKatHap").load("Menu/purgatoryMenu.php");
    }
    function tambah(){
        document.location.href = 'Insert_Menu.php';
    }
    function showtable(){
            if($("#src").val()!= ''){
                $.post("Menu/controllerMenu.php",{
                    "action" : "showdata",
                    "source": $("#src").val(),
                    "fillter":tp
                },function(data){
                        $("#tKat").html(data);
                });
            } else{
                $("#tKat").load("Menu/showtableMenu.php");
            }
        }
    
    function edit(id){
        var url  = "Edit_Menu.php?id="+id;
        document.location.href = url;

    }

    function pulihkan(id){
        $.post("Menu/controllerMenu.php",{
                    "action" : "recover",
                   "id" : id
        },function(data){
            $("#tKat").load("Menu/showtableMenu.php");
            $("#tKatHap").load("Menu/purgatoryMenu.php");
        });
    }


    function showtable2(){
            if($("#src2").val()!= ''){
                $.post("Menu/controllerMenu.php",{
                    "action" : "showdata2",
                    "source": $("#src2").val(),
                    "fillter":tp2
                },function(data){
                        $("#tKatHap").html(data);
                });
            } else{
                $("#tKatHap").load("Menu/purgatoryMenu.php");
            }
        }
    
    $(document).ready(function(){
        loadTable();
        loadpurgatory();
    });
</script>
</body>
</html>











<!-- <?php
    require_once("../config.php");
    require_once('Sumber.php');
    $action = 0;
    if(isset($_REQUEST['btnEdit'])){
        $dataid = $_POST['btnEdit'];
        $action = 1;
        $query2 = "SELECT * FROM MENU WHERE ID_MENU = '$dataid'";
        $list = $conn->query($query2);
    }

    if(isset($_REQUEST['btnDelete'])){
        $dataid = $_POST['btnDelete'];
        $action = 2;

        $query2 = "SELECT * FROM MENU WHERE ID_MENU ='$dataid'"; 
        $list = $conn->query($query2);
    }

    if(isset($_REQUEST['up'])){
        $target_dir = "Image/"; //<- ini folder tujuannya
        $target_file = $target_dir. basename($_FILES["gambar"]["name"]); //murni mendapatkan namanya saja tanpa path nya 
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($file_type !="jpg" && $file_type !="png"){
            echo "tipe file hanya jpg dan png saja";
        } else if($_FILES["gambar"]["size"] > 500000){
            echo "file size terlalu besar";
        } else if(file_exists($target_file)){
            echo "file sudah ada";
        }
        else{
            if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)){
                echo "file ".basename($_FILES["gambar"]["name"])." terupload";
            }
        }     
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .agenda label{
        position: absolute;
        top: -10px;
        font-size: 20px;
    }

    .agenda button:hover{
        padding: 0px 50px;
    }

    .judul{
        text-align: left;
        font-size: 18px;
        color: grey;
        font-weight: bold;
    }
    .preview{
        width: 100px;
        height: 100px;
        border: 1px solid black;
        margin: 0 auto;
        background: white;
    }

    .preview img{
        display: none;
    }

</style>
<body>
<?php if($action == 0){ ?>
    <div class="row agenda">
        <div class="col s12">
            <div class="card">
                <div class="card-action red white-text">
                    <h2>Makanan --- INSERT</h2>
                </div>
                <div class="card-content">
                    <div class="input-field">
                    <div class="judul">Nama Makanan <i class="material-icons left" style="color: black;">title</i></div>
                        <input type="text" name="nmakanan" id="Nmakanan">
                    </div><br>
                    <div class="input-field">
                    <div class="judul">Harga Makanan <i class="material-icons left" style="color: black;">title</i></div>
                        <input type="text" name="hmakanan" id="Hmakanan">
                    </div><br> 
                    <button class="waves-effect waves-light btn-large" type="submit" value="submit" id="btnInsert">Submit <i class="material-icons right">send</i></button>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div style="overflow: auto;width: 100vw;height: 100vh;" class="table"></div>
<?php 
} 
else if($action == 1){ 
    foreach ($list as $key => $value) {
?>
    <div class="row agenda">
        <div class="col s12">
            <div class="card">
                <div class="card-action red white-text">
                <h2>CRUD Agenda --- UBAH</h2>
            </div>
            <div class="card-content">
                <div class="input-field">
                <div class="judul">Nama Makanan <i class="material-icons left" style="color: black;">title</i></div>
                    <input type="text" name="nmakanan" id="Nmakanan" value="<?= $value['nama_menu']?>">
                </div><br>
                <div class="input-field">
                <div class="judul">Harga Makanan <i class="material-icons left" style="color: black;">title</i></div>
                    <input type="text" name="hmakanan" id="Hmakanan" value="<?= $value['harga_menu']?>">
                </div><br>
                <div class="input-field">
                <div class="judul">Status Makanan <i class="material-icons left" style="color: black;">title</i></div>
                    <input type="text" name="smakanan" id="Smakanan" value="<?= $value['status']?>">
                </div><br>
                <button class="waves-effect waves-light btn-large" type="submit" value="<?= $dataid ?>" id="btnUpdate">Update <i class="material-icons right">send</i></button>
                <button class="waves-effect waves-light btn-large" type="submit" id="btnCancel"><a class="nounderline" href="admin.php">Cancel <i class="material-icons right">send</i></a></button>
                <input type="file" id="upload" style="display:none" value="<?php echo $var ?>">
            </div>
        </div>
    </div>
<?php }}
else{ 
    foreach ($list as $key => $value) {       
?>
<div class="row agenda">
    <div class="col s12">
        <div class="card">
            <div class="card-action red white-text">
                <h2>CRUD Agenda --- HAPUS</h2>
            </div>
            <div class="card-content">
                <div class="judul">Apakah Anda yakin Menghapus Data dengan: <i class="material-icons left" style="color: black;">title</i></div>
                <div class="judul">Nama Makanan <i class="material-icons left" style="color: black;">title</i></div>
                <input disabled type="text" name="judulTxt" id="JudulTxt" value="<?= $value['nama_menu']?>">
                <button class="waves-effect waves-light btn-large" type="submit" value="<?= $dataid ?>" id="btnDelete">Delete <i class="material-icons right">send</i></button>
                <button class="waves-effect waves-light btn-large" type="submit" id="btnCancel"><a class="nounderline" href="admin.php">Cancel <i class="material-icons right">send</i></a></button>
            </div><br>
            <br>
        </div>
    </div>
</div>
<?php }}?>
</body>
</html>
<script>
    $('.table').load('makananTable.php');
    $(document).ready(function(){
        $("#btnInsert").click(function (){
            let nmakanan = $('#Nmakanan').val();
            let hmakanan = $('#Hmakanan').val();
            if(nmakanan != "" && hmakanan != ""){
                    $.ajax({
                        url: "insertMakanan.php",
                        method: 'post',
                        data: {
                            nmakanan : nmakanan,
                            hmakanan : hmakanan
                        },
                        success: function(result){
                            $('.table').load('makananTable.php');   
                            window.location.pathname ="coba/Project-SDP/Project/Master/Makanan/makanan.php"; 
                            alert(result);
                        }
                    });
            }else{
                alert("Judul dan deskripsi nya harus terisi!");
            }
        });

        $("#btnUpdate").click(function (){
            let id = $(this).val();
            let nmakanan = $('#Nmakanan').val();
            let hmakanan = $('#Hmakanan').val();
            let smakanan = $('#Smakanan').val();
            if(nmakanan != "" && hmakanan != ""){
                    $.ajax({
                        url: "editMakanan.php",
                        method: 'post',
                        data: {
                            id : id,
                            nmakanan : nmakanan,
                            hmakanan : hmakanan,
                            smakanan : smakanan
                        },
                        success: function(result){
                            $('.table').load('makananTable.php');   
                            window.location.pathname ="coba/Project-SDP/Project/Master/Makanan/makanan.php"; 
                            alert(result);
                        }
                    });
            }else{
                alert("Judul dan deskripsi nya harus terisi!");
            }
        });

        $("#btnDelete").click(function (){
            let id = $(this).val();
            $.ajax({
                url: "deleteMakanan.php",
                method: 'post',
                data: {
                    id : id  
                },
                success: function(result){
                    window.location.pathname ="coba/Project-SDP/Project/Master/Makanan/makanan.php";
                    alert(result);
                }
            });
        });
    });
</script> -->
