<?php
    require_once("../../config.php");
   // session_start();
    $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
    echo "Jumlah Kursi Yang Dipesan : ".$_SESSION["ctr"]."<br>";
    echo "Kursi Nomor : ".$kursi;
?>