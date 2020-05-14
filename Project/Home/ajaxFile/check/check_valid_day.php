<?php
    $getDate=$_POST["tanggal"];
    $date_now= date("d/m/Y");

    if($getDate>=$date_now){
        echo"berhasil";
    }else{
        echo "Tanggal Tidak Valid";
    }
?>