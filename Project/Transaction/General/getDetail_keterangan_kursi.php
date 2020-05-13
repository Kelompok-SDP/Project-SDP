<?php
    require_once("../../config.php");
   // session_start();
    $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
    echo "Jumlah Meja Yang Dipesan : ".$_SESSION["ctr"]."<br>";
    echo "Meja Nomor : ".$kursi;
?>