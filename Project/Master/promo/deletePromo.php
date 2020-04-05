<?php
    require_once("../../config.php");
    $id = $_POST["id"];
    $query3 = "UPDATE promo SET status_promo = 0 WHERE ID_promo = '$id'";
    if($conn->query($query3) == true){
        echo "Berhasil Menonaktifkan Data";
    }else{
        echo "Tidak Berhasil Menonaktifkan Data";
    }
?>