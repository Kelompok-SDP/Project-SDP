<?php
    require_once("../../config.php");    
    // $warna=$_POST["warna"];
    // if($warna=="merah"){
    //     mysqli_query($conn_detail,"UPDATE meja set status='2' where id_meja=$nomor");
    // }else{
            $set=2;
        if($_SESSION["jenis"]=="Reservasi"){
            $set=1;
        }
    $kursi = mysqli_query($conn_detail,"SELECT * from meja order by kolom asc,baris asc");
    foreach ($kursi as $key => $value) {
        if(strstr($_SESSION["isi_kursi"]," ".$value["id_meja"]."," )){
            mysqli_query($conn_detail,"UPDATE meja set status='$set' where id_meja=$value[id_meja]");
        }
    }
    // }
    
?>