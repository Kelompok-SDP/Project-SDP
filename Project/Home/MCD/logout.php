<?php
    session_start();
    require_once("../../config.php");
    $_SESSION['login'] = "";
    unset($_SESSION['pelanggan']);
    unset($_SESSION['pegawai']);
   // $_SESSION['pelanggan'] = "";
?>