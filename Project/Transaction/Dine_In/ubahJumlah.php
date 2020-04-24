<?php
    include_once("../../config.php");    
    session_start();
    $nama=$_POST["nama"];
    $jumlah=$_POST["jumlah"];
    $_SESSION["pilih_menu"][$nama]=$jumlah;
?>