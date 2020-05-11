<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
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
    <a href="../AdminLTE-master/index2.html"><b>Login Master</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- <form action="../AdminLTE-master/index3.html" method="post"> -->
	  	<form class="login100-form validate-form" action="Login/checkLogin.php" method="post">
			<span class="login100-form-logo">
				<i class="zmdi zmdi-landscape"></i>
			</span>

			<div class="input-group mb-3">
			<input type="text" name='user'class="form-control" placeholder="Username">
			<div class="input-group-append">
				<div class="input-group-text">
				<span class="fas fa-envelope"></span>
				</div>
			</div>
			</div>
			<div class="input-group mb-3">
			<input type="password" name='pass'class="form-control" placeholder="Password">
			<div class="input-group-append">
				<div class="input-group-text">
				<span class="fas fa-lock"></span>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-8">
				<div class="icheck-primary">
				<input type="checkbox" id="remember">
				<label for="remember">
					Remember Me
				</label>
				</div>
			</div>
			<!-- /.col -->
			<div class="col-4">
				<button class="btn btn-primary btn-block" name="btnLogin">Sign In</button>
			</div>

			<!-- <div class="text-center p-t-90">
				<a class="txt1" href="#">
					Forgot Password?
				</a>
			</div> -->
		</form>
      <!-- </form> -->
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
