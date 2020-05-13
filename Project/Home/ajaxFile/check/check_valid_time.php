<?php
    $getTime=$_POST["time"];
    $selectedTime = date("H:i:s");
    $endTime = strtotime("+7 hours", strtotime($selectedTime));
    $endtime=date('H:i', $endTime);
    if($endtime<=$getTime){
        echo"berhasil";
    }else{
        echo "Waktu Pemesanan Harus +2 Jam dari sekarang";
    }
?>