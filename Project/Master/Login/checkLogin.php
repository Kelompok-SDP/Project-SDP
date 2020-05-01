<?php
	session_start();
    require_once("../../config.php");
    if(isset($_POST['btnLogin'])){
        if($_POST['username'] == 'admin' && $_POST['pass'] == 'admin'){
            $_SESSION['isLogin'] = 'admin';
            header("location: ../Menu.php");
        }
        else{
            header("location: index.php");
        }
    }
?>