<?php 
	session_start();
    if(isset($_SESSION['isLogin'])){

        header('Location: Tampilan_Menu.php');

    } else{
        header('Location:../Login_Register/login_pegawai.php');

    }
?>