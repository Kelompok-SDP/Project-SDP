<?php 
	session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != "pegawai"){
            header('Location: ../Login_Register/login_pegawai.php');
        }else{
            header('Location: ../Home/Home.php');
        }
    }
?>