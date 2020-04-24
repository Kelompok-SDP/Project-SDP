<?php
    include_once("../../config.php");    
    session_start();
    // $warna=$_POST["warna"];
    // if($warna=="merah"){
    //     mysqli_query($conn_detail,"UPDATE meja set status='2' where id_meja=$nomor");
    // }else{
    $kursi = mysqli_query($conn_detail,"SELECT * from meja order by kolom asc,baris asc");
    foreach ($kursi as $key => $value) {
        if(strstr( $_SESSION["isi_kursi"]," ".$value["id_meja"]."," )){
            mysqli_query($conn_detail,"UPDATE meja set status='2' where id_meja=$value[id_meja]");
        }
    }
    // }
    
?>