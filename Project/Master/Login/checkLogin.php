<?php
    require_once("../../config.php");
    if(isset($_POST['btnLogin'])){
        if($_POST['user'] == 'admin' && $_POST['pass'] == 'admin'){
            $_SESSION['isLogin'] = 'admin';
            header("location: ../Menu.php");
        }
        else{
            header("location: ../Login_Master.php");
        }
    }
?>