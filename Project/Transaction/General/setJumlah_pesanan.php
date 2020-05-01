<?php
    include_once("../../config.php");    
    session_start();
    $nama=$_POST["nama"];
    $jumlah=$_POST["jumlah"];
    if($jumlah<1){
        $_SESSION["nama_menu"]=str_replace($nama." ,","",$_SESSION["nama_menu"]);
        unset($_SESSION["pilih_menu"][$nama]);
    }else{
        $_SESSION["pilih_menu"][$nama]=$jumlah;
    }
?>


