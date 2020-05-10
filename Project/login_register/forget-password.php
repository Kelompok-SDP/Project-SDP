<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uwenak Restoran | Forgot Password</title>
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
    <b>Forget Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

        <div class="input-group mb-3">
          <input type="email" class="form-control" id='email' placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" onclick='CheckEmail()' class="btn btn-primary btn-block">Check</button>
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
    function CheckEmail(){
       var kepada=$("#email").val();
        alert(kepada);
      $.ajax({
        method: "post",
        url: "forget/getEmail.php",
        data:{
            kepada:kepada
        },
        success: function (response) {
          //alert(response);
          if(response=='Email Anda Tidak Di Temukan'){
            alert(response);
          }else if (response=='Password Anda Sudah Kamu Ubah Tolong Check Email Anda'){
            alert(response);
            kirim();
            setTimeout(
              window.location.href = "confirmation.php?test=0"
             , 5000);

          }
        }
      });
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
            alert(response);
        }
    });
    }

</script>