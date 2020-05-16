<?php
    require_once("../../config.php");  
    //session_start();
    // session_destroy();
    if(isset($_SESSION["ctr"])){
        $ctr=$_SESSION["ctr"];
        $isi_kursi=$_SESSION["isi_kursi"];
    }else{
        $_SESSION["ctr"]=0;
        $ctr=$_SESSION["ctr"];
        $_SESSION["isi_kursi"]=" ";
        $isi_kursi=$_SESSION["isi_kursi"];
    }
    $nomor=$_POST["nomor"];
    $warna=$_POST["warna"];
    if($warna=="biru"){
        $isi_kursi=str_replace($nomor.", ","",$isi_kursi);
        $_SESSION["isi_kursi"]=$isi_kursi;
        $ctr--;
        $_SESSION["ctr"]=$ctr;
    }else if($warna=="hijau"){
        $isi_kursi.=$nomor.", ";
        $_SESSION["isi_kursi"]=$isi_kursi;
        $ctr++;
        $_SESSION["ctr"]=$ctr;
    }
?>