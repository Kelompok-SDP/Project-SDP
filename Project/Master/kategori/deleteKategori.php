<?php
    require_once("../../config.php");
    $id = $_POST["id"];
    $query3 = "UPDATE kategori SET status_kategori = 0 WHERE id_kategori = '$id'";
    if($conn->query($query3) == true){
        echo "Berhasil Menonaktifkan Data";
    }else{
        echo "Tidak Berhasil Menonaktifkan Data";
    }
?>