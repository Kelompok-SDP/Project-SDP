<?php
    require_once("../../config.php");
    $id = $_POST["id"];
    $query3 = "UPDATE kupon SET status_kupon = 0 WHERE id_kupon = '$id'";
    $query4 = "delete kupon_member where id_kupon = '$id'";
    if($conn->query($query3) == true){
        mysqli_query($conn,$query4);
        echo $query3;
    }else{
        echo "Tidak Berhasil Menonaktifkan Data";
    }
?>