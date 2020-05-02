<?php
    include_once("../../config.php");    
    session_start();
    $nama=$_POST["nama_menu"];
    if(isset($_SESSION["nama_menu"])){
        $nama_menu=$_SESSION["nama_menu"];
    }
    if(isset($_SESSION["pilih_menu"][$nama])){
        $_SESSION["pilih_menu"][$nama]++;
        echo $_SESSION["pilih_menu"][$nama];
    }else{
        $_SESSION["pilih_menu"][$nama]=1;
        $jumlah=$_SESSION["pilih_menu"][$nama];
        $_SESSION["nama_menu"].=$nama." ,";
    }
?>