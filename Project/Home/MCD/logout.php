<?php
    session_start();
    require_once("../../config.php");
    unset($_SESSION['login']);
    unset($_SESSION['pelanggan']);
    unset($_SESSION['pegawai']);
?>