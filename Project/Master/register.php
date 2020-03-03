<?php
	require_once("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Template/Login_v3/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Template/Login_v3/css/main.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="register/tampilan-register.css">
</head>
<body>
    <!-- <h1>Login</h1>
    <form action="checkLogin.php" method="post">
        Username : <input type="text" name="username" id=""> <br>
        Password : <input type="text" name="pass" id=""> <br>
        <input type="submit" value="Login" name="btnLogin">
    </form> -->
    <div class="limiter">
		<div class="container-login100" style="background-image: url('../Template/Login_v3/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="checkLogin.php" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Register
					</span>

					<div class="wrap-input100 validate-input panjangSetengah gabung jarakKanan" data-validate = "Enter username">
						<input class="input100" type="text" name="nama_depan" placeholder="Nama Depan">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input panjangSetengah gabung"  data-validate = "Enter username">
						<input class="input100" type="text" name="nama_belakang" placeholder="Nama Belakang">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input berhentiGabung" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input"  data-validate = "Enter username">
						<input class="input100" type="text" id="nohp" maxlength="13" onkeypress="NumberOnly(event)" name="nohp" placeholder="Nomor Telepon">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Email Invalid">
						<input class="input100" type="text" id="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" id="pass" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" id="conpass" type="password" name="conpass" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                        <select id="kabupaten" onchange="gantiKota()"  style="margin-bottom:15px">
                            <?php
                                $query=mysqli_query($conn_detail,"SELECT * from daerah");
                                foreach ($query as $key => $value) {
                                    echo "<option value='$value[kode_daerah]'>$value[nama_daerah]</option>";
                                }
                            ?>
                        </select>

                        <select id="kota">
                            
                        </select>
                    
                    <div class="wrap-input100 validate-input gabung panjangTigaperempat jarakKanan" data-validate = "Enter username">
                    <input class="input100" type="text" name="alamat" placeholder="Alamat">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input gabung panjangSeperempat" data-validate = "Enter username">
                    <input class="input100" type="text" maxlength="6" onkeypress="NumberOnly(event)" name="kodepos" placeholder="Kode Pos">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn berhentiGabung">
						<button class="login100-form-btn" name="btnLogin" onclick='checkValid()'>
							Register
						</button>
					</div>
                    
				</form>
			</div>
		</div>
	</div>
	

    <div id="dropDownSelect1"></div>
    
    <!--===============================================================================================-->
	<script src="../Template/Login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Template/Login_v3/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Template/Login_v3/vendor/bootstrap/js/popper.js"></script>
	<script src="../Template/Login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Template/Login_v3/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Template/Login_v3/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Template/Login_v3/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Template/Login_v3/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="../Template/Login_v3/js/main.js"></script>
    
</body>
</html>

<script>
    gantiKota();
    function gantiKota(){
        $.ajax({
        type: "post",
        url: "register/ajaxKota.php",
        data: {
            daerah:$("#kabupaten").val()
        },
        success: function (response) {
            $("#kota").html(response);
        }
    });
    }

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

    function checkValid(){
        ValidateEmail($("#email").val());
        ValidatePass($("#pass").val(),$("#conpass").val());
        ValidateNohp($("#nohp").val()) 
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
        if (nohp.length==13)
        {
            return true;
        }
        alert("No Hp salah");
        return false;
    }
</script>