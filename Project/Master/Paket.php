<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Paket</title>
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
            <h1>Paket</h1>
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
              <h3 class="card-title">Table Paket</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-header">
            <button onclick="tambah()" class="btn btn-primary">Insert New Menu <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
                <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 350px;" >
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="Btnfilter">Filter By
                    </button>
                    <ul class="dropdown-menu" id="filtr">
                     <li class="dropdown-item" style="pointer-events:none;opacity:0.6;" >Filter By</li>
                     <li class="dropdown-divider"></li>
                      <li class="dropdown-item" onclick="ubah(1)" style="cursor:pointer;">Nama Paket</li>
                     
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
                  
                </div>
          </div>

          <div class="card card-primary">
              <div class="card-header" style="color:white; background-color:red;">
                 <h3 class="card-title" >Purgatory Table Paket</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-header">
            <label style="font-size:20pt; font:bold;">Filter Paket :</label>

                <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 350px;" >
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="Btnfilter2">Filter By
                    </button>
                    <ul class="dropdown-menu" id="filtr2">
                     <li class="dropdown-item" style="pointer-events:none;opacity:0.6;" >Filter By</li>
                     <li class="dropdown-divider"></li>
                      <li class="dropdown-item" onclick="ubah2(1)" style="cursor:pointer;">Nama Paket</li>
                  
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
            let tmp = "Nama Paket";
            tp = 1;
            document.getElementById("Btnfilter").innerHTML=tmp;
        }
    }
    function ubah2(id){
      if (id==1){
            let tmp = "Nama Paket";
            tp = 1;
            document.getElementById("Btnfilter2").innerHTML=tmp;
        }
    }
    function loadTable(){
        $("#tKat").load("Paket/showtablePaket.php");
    }
    function loadpurgatory(){
        $("#tKatHap").load("Paket/purgatoryPaket.php");
    }
    function tambah(){
        document.location.href = 'Insert_Paket.php';
    }
    function showtable(){
            if($("#src").val()!= ''){
                $.post("Paket/controllerPaket.php",{
                    "action" : "showdata",
                    "source": $("#src").val(),
                    "fillter":tp
                },function(data){
                        $("#tKat").html(data);
                });
            } else{
                $("#tKat").load("Paket/showtablePaket.php");
            }
        }
    
    function edit(id){
      //  alert("hoi");
        var url  = "Edit_Paket.php?id="+id;
        document.location.href = url;

    }

    function pulihkan(id){
        $.post("Paket/controllerPaket.php",{
                    "action" : "recover",
                   "id" : id
        },function(data){
            $("#tKat").load("Paket/showtablePaket.php");
            $("#tKatHap").load("Paket/purgatoryPaket.php");
        });
    }
    
    function showtable2(){
            if($("#src2").val()!= ''){
                $.post("Paket/controllerPaket.php",{
                    "action" : "showdata2",
                    "source": $("#src2").val(),
                    "fillter":tp2
                },function(data){
                        $("#tKatHap").html(data);
                });
            } else{
                $("#tKatHap").load("Paket/purgatoryPaket.php");
            }
        }
    
    $(document).ready(function(){    
        loadTable();
        loadpurgatory();
    });
</script>
</body>
</html>
