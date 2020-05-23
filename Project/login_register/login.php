<!DOCTYPE html>
<title>Log In | Uwenak Restoran</title>
<?php 
  require_once("../Home/MCD/title.php");
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <b>Login</b></a><br>
    <a href="../Home/Home.php"><b style="font-size:15pt; color:blue;">Back to Home</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- <form action="../AdminLTE-master/index3.html" method="post"> -->
        <div class="input-group mb-3">
          <input type="email" id='username'class="form-control" placeholder="Username/Email/Nohp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id='password'class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button onclick="checkLogin()" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->
      <p class="mb-0">
        <a href="forget-password.php" class="text-center">Forget Password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
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
  function checkLogin(){
    user=$("#username").val();
    password=$("#password").val();
    $.ajax({
      method: "post",
      url: "login/checkLogin.php?tipe=1",
      data: {
        user:user,
        password:password
      },
      success: function (response) {
        if(response == "Berhasil login"){
          alert(response);
          setTimeout(
              window.location.href = "../Home/Home.php"
             , 5000);
        }else if(response == "Berhasil login v2"){
          alert("Berhasil Login Silahkan konfirmasi email terlebih dahulu");
          setTimeout(
              window.location.href = "confirm-passw2.php"
             , 5000);
        }else {
          alert(response);
        }
      }
    });
  }
</script>