<?php
    session_start();
    $email = "";
    if(isset($_SESSION['email'])){
        $email = $_SESSION["email"];
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uwenak Restoran | Change Password</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  
<div class="login-logo">
   <b>Change Password</b>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Change Password</p>

       
        
        
        <div class="input-group mb-3">
          <input type="password" id='password' class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye" onmousedown="showpassword('password')" onmouseup="hidepassword('password')"></span>
            </div>
          </div>
        </div>
        <input type= "hidden" id="email" value="<?php echo $email;?>">
        <div class="input-group mb-3">
          <input type="password" id='conpassword' class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye"  onmousedown="showpassword('conpassword')" onmouseup="hidepassword('conpassword')"></span>
            </div>
          </div>
        </div>
       
        <div style='clear:both;margin-top:10px' class="row">
          <!-- /.col -->
          <div class="col-12">
            <button onclick='checkValid()' class="btn btn-primary btn-block">Confirm</button>
          </div>
          <!-- /.col -->
        </div>
        

    
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-master/dist/js/adminlte.min.js"></script>
</body>
</html>
<script>



    function showpassword(id){
        document.getElementById(id).type='text';
    }

    function hidepassword(id){
        document.getElementById(id).type='password';
    }


    
   



    
    function checkValid(){
      
      
        var password=$("#password").val();
        var conpassword=$("#conpassword").val();
       
        
        if(password!=''&&conpassword!=''){
          
            if(ValidatePass(password,conpassword)){
                updateemail();
            }
          
        }else{
            alert('Password dan Konfirm Password tidak sama');
        }
    }
    
    function updateemail(){
        var kepada=$("#email").val();
        var password=$("#password").val();
      $.ajax({
        method: "post",
        url: "forget/updateEmail.php",
        data:{
            kepada:kepada,
            password:password
        },
        success: function (response) {
          if(response=='Gagal'){
            alert(response);
          }else if (response=='Berhasil Mengganti password'){
            alert(response);
            //kirim();
            setTimeout(
              window.location.href = "login.php"
              , 5000);
          }
        }
      });
    }


    function ValidatePass(pass,conpass) 
    {
        if (pass==conpass)
        {
            return true;
        }
        alert("Password Dan Confirmasi Password Berbeda");
        return false;
    }

    
</script>
