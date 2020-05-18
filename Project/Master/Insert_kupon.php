<?php
    require_once("../config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Insert Kupon</title>
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

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Insert Kupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Kupon.php">Back</a></li>
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
                        <input type="text" class="form-control" id="Nkupon" placeholder="Nama Menu" name ="nkupon">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Pilih Kategori</label>
                        <select class="form-control custom-select" id="kat" name="kat">
                        <option selected disabled>Pilih satu</option>
                        <?php  
                            $query3 = "SELECT * FROM KATEGORI WHERE STATUS_KATEGORI = 1";
                            $list3 = $conn->query($query3);
                            foreach ($list3 as $key => $value) {
                                $nkat = $value['nama_kategori'];
                                ?>        
                            <option value="<?= $value['id_kategori']?>"><?= $value['nama_kategori']?></option>
                        <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group" id="fmenu">
                        
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Harga Kupon</label>
                        <input type="number" id="Hkupon" class="form-control" placeholder="Harga Menu" name="hkupon">
                    </div>
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
                    <div class="form-group">
                        <label for="inputSpentBudget">Stok Kupon</label>
                        <input type="number" id="Skupon" class="form-control" placeholder="Harga Menu" name="skupon">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="Submit" name="submit">Submit <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
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
    $('#Submit').click(function () {
        let nkupon = $('#Nkupon').val();
        let hkupon = $('#Hkupon').val();
        let kmenu = $('#Kmenu').val();
        let awalp = $('#awalP').val();
        let akhirp = $('#akhirP').val();
        let skupon = $('#Skupon').val(); 
        if(nkupon != "" && hkupon != "" && kmenu != null && awalp < akhirp && skupon != ""){
            $.ajax({
                url: "Kupon/insertDatabase.php",
                method: 'post',
                data: {
                    nkupon : nkupon,
                    hkupon : hkupon,
                    kmenu : kmenu,
                    awalp : awalp,
                    akhirp : akhirp,
                    skupon : skupon
                },
                success: function(result){   
                  alert(result);
                  if(result.includes("KUP")){
                    document.location.href = "Kupon.php";
                  }
                }
            });
        }else{
            alert("Terdapat isian yang kosong!");
        }
    });

    $('#kat').change(function () {
      var tmp = $(this).val();
      if(tmp != null){
        $.ajax({
            url: "filtermenu.php",
            method: 'post',
            data: {
                tmp : tmp
            },
            success: function(result){   
              $('#fmenu').html(result);
            }
        });
      }
    });
</script>
</body>
</html>