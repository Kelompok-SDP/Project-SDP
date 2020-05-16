<?php
    require_once("../../config.php");
    $id = $_POST["id"];
    $query3 = "UPDATE promo SET status_promo = 0 WHERE ID_promo = '$id'";
    $query4 = "Update promo_paket set status = 0 where id_promo = '$id'";
    if($conn->query($query3) == true){
        mysqli_query($conn,$query4);
        echo "Berhasil Menonaktifkan Data";
    }else{
        echo "Tidak Berhasil Menonaktifkan Data";
    }
?>