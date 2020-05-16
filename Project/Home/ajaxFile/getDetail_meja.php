<?php
    require_once("../../config.php");
    require_once("../../Source.php");
    $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
    if($kursi != ""){
        echo "Jumlah Meja Yang Dipesan <span style='margin-left: 5px;margin-right: 5px;'>:</span>".$_SESSION["ctr"]."<br>";
        echo "Meja Nomor <span style='margin-left: 100px;margin-right: 5px;'>:</span> ".$kursi;
        
    }
?>
