<?php
    include_once("../../config.php");    
   // session_start();
    $nama=$_POST["nama_menu"];
    print_r($_SESSION["nama_menu"]);
    print_r($_SESSION["pilih_menu"]);
    if(isset($_SESSION["pilih_menu"][$nama])){
        $_SESSION["pilih_menu"][$nama]++;
    }else{
        $_SESSION["pilih_menu"][$nama]=1;
        $jumlah=$_SESSION["pilih_menu"][$nama];
        $_SESSION["nama_menu"].=$nama." ,";
    }
    print_r($_SESSION["nama_menu"]);
    print_r($_SESSION["pilih_menu"]);
?>