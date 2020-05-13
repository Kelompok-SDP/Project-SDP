<?php
    require_once("../../config.php");
    $berubah = 0;
    $berubah = $_GET['id'];
    if($berubah==0){
        $berubah= $_SESSION["cekradio"];
    }
    if($berubah == 1){
        $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
        if($kursi != ""){
            echo "Berhasil";
            $_SESSION['cekradio'] = 1;
        } else{
            echo "Gagal";
        }
    }else if($berubah==4){
        $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
        if($kursi != ""){
            echo "Berhasil4";
            $_SESSION['cekradio'] = 4;
        } else{
            echo "Gagal4";
        }
    }
    
?>