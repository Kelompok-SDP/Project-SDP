<?php
    require_once("../../config.php");
    require_once("../../Source.php");
    $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
    if($kursi != ""){
        echo "Jumlah Kursi Yang Dipesan : ".$_SESSION["ctr"]."<br>";
        echo "Kursi Nomor : ".$kursi;
        echo "<script>document.getElementById('radioPrimary1').checked = true;</script>";
    } else{
        echo "<script>document.getElementById('radioPrimary1').checked = false;</script>";
    }
?>
