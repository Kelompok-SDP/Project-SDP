<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Promo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  
</head>
<?php include("../sidebar.php"); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Promo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Promo.php">Home</a></li>
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
              <h3 class="card-title">Table Promo</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-header">
            <button onclick="tambah()" class="btn btn-primary">Insert New Promo <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>

                <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 450px;" >
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="Btnfilter">Filter By
                    </button>
                    <ul class="dropdown-menu" id="filtr">
                     <li class="dropdown-item" style="pointer-events:none;opacity:0.6;">Filter By</li>
                     <li class="dropdown-divider"></li>
                      <li class="dropdown-item" onclick="ubah(1)" style="cursor:pointer;">Nama Promo</li>
                      <li class="dropdown-item" onclick="ubah(2)" style="cursor:pointer;">Harga Promo</li>
                    </ul>
                  </div>
                  <div class="col-sm-8" id="harga" style="display: none; margin-left: 1vw;">
                    <input id="range_1" type="text" name="range_1" value="">
                  </div>
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search"id="src" style="display:none;">
                  <div class="input-group-append" id="search" style="display:none;">
                    <button type="submit" id="submitnmenu" onclick = "showtable(1)" class="btn btn-default" style="display:none;"><i class="fas fa-search"></i></button>
                    <button type="submit" id="submitharga" onclick = "showtable(2)" class="btn btn-default" style="display:none;"><i class="fas fa-search"></i></button>
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
                 <h3 class="card-title" >Purgatory Table Promo</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="card-header">
            <label style="font-size:20pt; font:bold;">Filter Promo :</label>

                <div class="card-tools">
                
                  <div class="input-group input-group-sm" style="width: 450px;" >
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="Btnfilter2">Filter By
                    </button>
                    <ul class="dropdown-menu" id="filtr2">
                     <li class="dropdown-item" style="pointer-events:none;opacity:0.6;" >Filter By</li>
                     <li class="dropdown-divider"></li>
                      <li class="dropdown-item" onclick="ubah2(1)" style="cursor:pointer;">Nama Promo</li>
                      <li class="dropdown-item" onclick="ubah2(2)"  style="cursor:pointer;">Harga Promo</li>
                    </ul>
                  </div>
                  <div class="col-sm-8" id="harga2" style="display: none; margin-left: 1vw;">
                    <input id="range_12" type="text" name="range_1" value="">
                  </div>
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search"id="src2" style="display:none;">
                  <div class="input-group-append" id="search2" style="display:none;">
                    <button type="submit" id="submitnmenu2" onclick = "showtable2(1)" class="btn btn-default" style="display:none;"><i class="fas fa-search"></i></button>
                    <button type="submit" id="submitharga2" onclick = "showtable2(2)" class="btn btn-default" style="display:none;"><i class="fas fa-search"></i></button>
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
<!-- Bootstrap 4 -->

<!-- page script -->
<script>
    var tp = 1;
    var tp2 = 1;
    function ubah(id){
        if (id == 1){
            let tmp = "Nama Promo";
            tp = 1;
            document.getElementById("Btnfilter").innerHTML=tmp;
            $("#harga").css("display","none");
            $("#src").css("display","inline");
            $("#range_1").val("");
            $("#search").css("display","inline");
            $("#submitnmenu").css("display","inline");
            $("#submitharga").css("display","none");
        }else{
          let tmp = "Harga Promo";
          tp = 2;
          document.getElementById("Btnfilter").innerHTML=tmp;
          $("#harga").css("display","inline");
          $("#src").css("display","none");
          $("#src").val("");
          $("#search").css("display","inline");
          $("#submitnmenu").css("display","none");
          $("#submitharga").css("display","inline");
        }
    }
    function ubah2(id){
      if (id == 1){
            let tmp = "Nama Promo";
            tp = 1;
            document.getElementById("Btnfilter2").innerHTML=tmp;
            $("#harga2").css("display","none");
            $("#src2").css("display","inline");
            $("#range_12").val("");
            $("#search2").css("display","inline");
            $("#submitnmenu2").css("display","inline");
            $("#submitharga2").css("display","none");
        }else{
          let tmp = "Harga Promo";
          tp = 2;
          document.getElementById("Btnfilter2").innerHTML=tmp;
          $("#harga2").css("display","inline");
          $("#src2").css("display","none");
          $("#src2").val("");
          $("#search2").css("display","inline");
          $("#submitnmenu2").css("display","none");
          $("#submitharga2").css("display","inline");
        }
    }

    function loadTable(){
        $("#tKat").load("promo/showtablePromo.php");
    }
    function loadpurgatory(){
        $("#tKatHap").load("promo/purgatoryPromo.php");
    }
    function tambah(){
        document.location.href = 'Insert_Promo.php';
    }

    function showtable(st){
      if(st == 1){
        let nama = $("#src").val();
        if(nama != ""){
          $.post("promo/controllerPromo.php",{
                "action" : "showdata",
                "source": nama,
                "fillter":st
            },function(data){
                $("#tKat").html(data);
          });
        }else{
          alert("Kosong");
        }
      } else{
        let harga = $("#range_1").val();
        if(harga != ""){
          $.post("promo/controllerPromo.php",{
                "action" : "showdata",
                "source": harga,
                "fillter":st
            },function(data){
                $("#tKat").html(data);
          });
        }else{
          alert("Kosong");
        }
      }
    }
    
    function edit(id){
        var url  = "Edit_Promo.php?id="+id;
        document.location.href = url;

    }

    function pulihkan(id){
        $.post("promo/controllerPromo.php",{
                    "action" : "recover",
                   "id" : id
        },function(data){
            $("#tKat").load("promo/showtablePromo.php");
            $("#tKatHap").load("promo/purgatoryPromo.php");
        });
    }

    function showtable2(st){
      if(st == 1){
        let nama = $("#src2").val();
        if(nama != ""){
          $.post("promo/controllerPromo.php",{
                "action" : "showdata2",
                "source": nama,
                "fillter":st
            },function(data){
                $("#tKatHap").html(data);
          });
        }else{
          alert("Kosong");
        }
      } else{
        let harga = $("#range_12").val();
        if(harga != ""){
          $.post("promo/controllerPromo.php",{
                "action" : "showdata2",
                "source": harga,
                "fillter":st
            },function(data){
                $("#tKatHap").html(data);
          });
        }else{
          alert("Kosong");
        }
      }
    }
    
    $(document).ready(function(){
            
        //setelah document terload semua, langsung load table    
        loadTable();
        loadpurgatory();
    });
</script>
</body>
</html>
