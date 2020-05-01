<?php 
	session_start();
    if(isset($_SESSION['isLogin'])){

        header('Location: Menu.php');

    } else{
        header('Location:Login_Master.php');

    }
?>