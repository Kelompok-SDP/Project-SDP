<?php
  require_once("../Source.php");
  $emails ="";
  if(isset($_POST['footerregis'])){
    $emails = $_POST["emailfooter"];
  }



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
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
  <div class="register-logo">
    <a href="../AdminLTE-master/index2.html"><b>Register</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

        <div class="input-group mb-3">
          <input type="text" id='fullname' class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fas fa-pen"></i>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" id='username' class="form-control" placeholder="Username ">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fas fa-pen"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id='nohp'  data-mask  maxlength="13" class="form-control" onkeypress="NumberOnly(event)" placeholder="No.Telepon" >
          <div class="input-group-append">
            <div class="input-group-text" >
            <i class="fas fa-phone"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id='email' value="<?=$emails?>"  class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fas fa-envelope"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id='password' class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye" onmousedown="showpassword('password')" onmouseup="hidepassword('password')"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id='conpassword' class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye"  onmousedown="showpassword('conpassword')" onmouseup="hidepassword('conpassword')"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id='alamat'  class="form-control" placeholder="Alamat">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fas fa-map-marker"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id='kode'   maxlength="6" onkeypress="NumberOnly(event)" class="form-control" placeholder="Kode Pos">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fas fa-map-marker"></i>
            </div>
          </div>
        </div>
        <div style='float:left;margin-left:30px;margin-right:30px'id='provinsi' onclick='gantiKota()' class="input-group-prepend">

        </div>
        <div id='kota' class="input-group-prepend">

        </div>
        <div style='clear:both;margin-top:10px' class="row">
          <!-- /.col -->
          <div class="col-12">
            <button onclick='checkValid()' class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>


      <a href="login.php" class="text-center">I already have a membership</a>
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

var balik=-1;
    function NumberOnly(evt){
        var input= String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(input))){
            evt.preventDefault();
        }
    }

    function showpassword(id){
        document.getElementById(id).type='text';
    }

    function hidepassword(id){
        document.getElementById(id).type='password';
    }


    function gantiProvinsi(){
        $.ajax({ 
          type: "post",
          url: "register/ajaxProvinsi.php",
          success: function (response) {
              $("#provinsi").html(response);
          }
        });
    }
    function ganti(nama){
        $('#provinsi_value').val(name);
    }

    gantiProvinsi();

    function gantiKotaAwal(){
        $.ajax({
            type: "post",
            url: "register/ajaxKota.php",
            data: {
                daerah:'Jawa Timur'
            },
            success: function (response) {
                $("#kota").html(response);
            }
        });
    }

    function gantiKota(){
        $.ajax({
       
            type: "post",
            url: "register/ajaxKota.php",
            data: {
                daerah:$("#provinsi_value").val()
            },
            success: function (response) {
                alert(response);
                $("#kota").html(response);
            }
        });
    }
    gantiKotaAwal();




    function checkValid(){

        var fullname=$("#fullname").val();
        var username=$("#username").val();
        var password=$("#password").val();
        var conpassword=$("#conpassword").val();
        var alamat=$("#alamat").val();
        var kodepos=$("#kode").val();
        var email=$("#email").val()
        var nohp=$("#nohp").val();
        var kabupaten=$("#provinsi").val();
        var kota=$("#kota").val();
     

        if(fullname!=''&&username!=''&&alamat!=''&&kodepos!=''&&email!=''&&password!=''&&conpassword!=''&&nohp!=''){
          if(ValidateEmail(email)){
            if(ValidatePass(password,conpassword)){
              if(ValidateNohp(nohp)){
                $.ajax({
                    method: "post",
                    url: "register/check_valid.php",
                    data: {
                        data:email,
                        jenis:"email"
                    },
                    success: function (data) {
                      if(data=="1"){
                        $.ajax({
                            method: "post",
                            url: "register/check_valid.php",
                            data: {
                                data:nohp,
                                jenis:"nohp"
                            },
                            success: function (data) {
                              if(data=="1"){
                                $.ajax({
                                    method: "post",
                                    url: "register/check_valid.php",
                                    data: {
                                        data:username,
                                        jenis:"username"
                                    },
                                    success: function (data) {
                                      if(data=="1"){
                                        insertUser();
                                        Konfirm();
                                        setTimeout(
                                        window.location.href = "confirmation.php?test=1"
                                        , 5000);
                                      }else{
                                        
                                        alert(data);
                                      }
                                    }
                                });
                              }else{
                                
                        alert(data);
                              }
                            }
                        });
                      }else{
                        alert(data);
                      }
                    }
                });
           
              }
            }
          }
        }else{
            alert('Ada field yang kosong');
        }
    }

    function Konfirm(){
        var kepada=$("#email").val();
      $.ajax({
        method: "post",
        url: "register/Emailregister.php",
        data:{
            kepada:kepada
        },
        success: function (response) {
          if(response == "Berhasil"){

          }
        }
      });
    }

    function insertUser(){
        var fullname=$("#fullname").val();
        var username=$("#username").val();
        var pass=$("#password").val();
        var conpass=$("#conpassword").val();
        var alamat=$("#alamat").val();
        var kodepos=$("#kode").val();
        var email=$("#email").val();
        var nohp=$("#nohp").val();
        var kabupaten=$("#provinsi_value").val();
        var kota=$("#kota_value").val();
        $.ajax({
            method: "post",
            url: "register/insertUser.php",
            data: {
              fullname:fullname,
              username:username,
              alamat:alamat,
              pass:pass,
              kodepos:kodepos,
              email:email,
              pass:pass,
              nohp:nohp,
              kabupaten:kabupaten,
              kota:kota
            },
            success: function (response) {
               alert(response);
            }
        });
    }

    function check(check,jenis){

        $.ajax({
            async:false,
            method: "post",
            url: "register/check_valid.php",
            data: {
                data:check,
                jenis:jenis
            },dataType: "json",
            success: function (data) {
               balik=$.parseJSON(data);
                console.log(balik);
                
            }
        });
    }

    function ValidateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(String(email).toLowerCase());
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

    function ValidateNohp(nohp)
    {
        if (nohp.length<=13)
        {
            return true;
        }
        alert("No Hp salah");
        return false;
    }
</script>
