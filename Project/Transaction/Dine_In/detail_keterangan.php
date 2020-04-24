<?php
    require_once("../../config.php");
    session_start();
    echo "Jumlah Kursi Yang Dipesan : ".$_SESSION["ctr"]."<br>";
    echo "Kursi Nomor : ".$_SESSION["isi_kursi"];
?>