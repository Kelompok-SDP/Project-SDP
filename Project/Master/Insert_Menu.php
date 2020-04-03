<?php
    require_once("../config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Insert Menu</title>
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
            <h1>Insert Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Menu.php">Back</a></li>
              <li class="breadcrumb-item active">Table Menu</li>
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
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <input type="text" class="form-control" id="Nmenu" placeholder="Nama Menu" name ="nmenu">
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Harga Menu</label>
                        <input type="number" id="Hmenu" class="form-control" placeholder="Harga Menu" name="hmenu">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Kategori Menu</label>
                        <select class="form-control custom-select" id="Kmenu" name="kmenu">
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
                    <div class="form-group">
                        <label for="inputStatus">Promo Menu</label>
                        <select class="form-control custom-select" id="Pmenu" name="pmenu">
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
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Deskripsi Menu</label>
                        <textarea id="Dmenu" class="form-control" rows="4" name="dmenu"></textarea>
                    </div>
                    
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="Submit">Submit</button>
                </div>
              </form>
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
        let nmenu = $('#Nmenu').val();
        let hmenu = $('#Hmenu').val();
        let kmenu = $('#Kmenu').val();
        let pmenu = $('#Pmenu').val();
        let dmenu = $('#Dmenu').val(); 
        if(nmenu != "" && hmenu != "" && kmenu != null && pmenu != null && dmenu != ""){
            $.ajax({
                url: "Menu/insertDatabase.php",
                method: 'post',
                data: {
                    nmenu : nmenu,
                    hmenu : hmenu,
                    kmenu : kmenu,
                    pmenu : pmenu,
                    dmenu : dmenu
                },
                success: function(result){   
                  alert(result);
                  if(result != "Data Kembar"){
                    let a = "Menu/Uploadgambar.php?id=";
                    let a2 = result.split(" ",1);
                    let a3 = a.concat(a2);
                    alert(a3);
                    document.location.href = a3;
                  }
                }
            });
        }else{
            alert("Terdapat isian yang kosong!");
        }
    });
</script>
</body>
</html>