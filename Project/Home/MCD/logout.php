<?php
    session_start();
    require_once("../../config.php");
    unset($_SESSION['pelanggan']);
    $_SESSION["login"]="kosong";
?>