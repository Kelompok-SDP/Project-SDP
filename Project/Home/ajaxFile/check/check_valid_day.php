<?php
    $getDate=$_POST["tanggal"];
    $date_pass= new datetime($getDate);
    $date_now= new datetime(date("d/m/Y"));
    if($date_pass>=$date_now){
        echo"berhasil";
    }else{
        echo "Tanggal Tidak Valid";
    }
?>