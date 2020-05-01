<?php
    include_once("../../config.php");    
    session_start();
    $nama=$_POST["nama"];
    $mode=$_POST["mode"];
    $qty=$_POST["qty"];
    if($mode=="1"){
        $_SESSION["pilih_menu"][$nama]++;
    }else if($mode=="2"){
        $_SESSION["pilih_menu"][$nama]--;
    }else if($mode=="4"){
        if(!is_numeric($qty)){
            $qty=0;
        }
        $_SESSION["pilih_menu"][$nama]=$qty;
    }
    $jumlah=$_SESSION["pilih_menu"][$nama];
    if($jumlah<1||$mode=="3"){
        $_SESSION["nama_menu"]=str_replace($nama." ,","",$_SESSION["nama_menu"]);
        unset($_SESSION["pilih_menu"][$nama]);
    }
?>


