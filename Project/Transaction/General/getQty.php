<?php
session_start();
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $jumlah=count($arrMenu)-1;
    echo $jumlah." Items are in the cart";
?>