<?php
    session_start();
    $email = "";
    $captcha = "";
    if(isset($_SESSION['email'])){
        $email = $_SESSION["email"];
    }

    if(isset($_SESSION['captcha'])){
        $captcha = $_SESSION['captcha'];
    }
    $ts = $_GET['test'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uwenak Resotran | Konfirmasi EMail</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-master/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b>Confirm Email</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Please Confirm Your Email. Check Your Email</p>

        <div class="input-group mb-3">
          <input type="text" class="form-control" id='conn' placeholder="Masukan Captcha pada Email">
          <div class="input-group-append">
            <div class="input-group-text">

            </div>
          </div>
        </div>
        <input type= "hidden" id = "email" value = "<?php echo $email; ?>" >
        <input type= "hidden" id = "captcha" value = "<?php echo $captcha; ?>" >
        <input type= "hidden" id = "ts" value = "<?php echo $ts; ?>" >
        <div class="row">
          <div class="col-12">
            <button type="button" onclick='Checkkonfirm()' class="btn btn-primary btn-block">Konfirm</button>
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-12">
            <a href= "" style = "font-size:10pt" onclick= 'return Kirimulang();' id="tagb">Tidak dapat email? Klik disini</a>
            <div id="timer"></div>
          </div>

          <!-- /.col -->
        </div>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-master/dist/js/adminlte.min.js"></script>

</body>
</html>

<script>
    function Kirimulang(){
        kirim();
    }


    function Checkkonfirm(){
        var kepada=$("#email").val();
        var con = $('#conn').val();

        if(con == $("#captcha").val()){
           if($("#ts").val()== "0"){
            setTimeout(
              window.location.href = "Makenewpass.php"
              , 5000);
           } else if($("#ts").val()== "1"){
            var kepada=$("#email").val();
            $.ajax({
                method: "post",
                url: "register/EmailUpdate.php",
                data:{
                    kepada:kepada
                },
                success: function (response) {
                    if(response == "Berhasil Register"){
                        alert(response);
                        setTimeout(
                              window.location.href = "login.php"
                              , 5000);
                    }else{
                        alert(response); 
                    }
                }
            });
           } else if($("#ts").val()== "2"){
            var kepada=$("#email").val();
            $.ajax({
                method: "post",
                url: "register/EmailUpdate.php",
                data:{
                    kepada:kepada
                },
                success: function (response) {
                    if(response == "Berhasil Register"){
                        alert(response);
                        setTimeout(
                              window.location.href = "../Home/Home.php"
                              , 5000);
                    }else{
                        alert(response); 
                    }
                }
            });
           }
        } else {
            alert("Captcha Salah");
        }
    }

    function kirim(){
        var kepada=$("#email").val();

        $.ajax({
        method: "post",
        url: "forget/EmailForgetPassword.php",
        data:{
            kepada:kepada
        },
        success: function (response) {
           // alert(response);
        }
    });
    }

</script>