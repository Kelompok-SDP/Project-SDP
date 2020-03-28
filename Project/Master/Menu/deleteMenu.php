<?php
    require_once("../../config.php");
    $id = $_POST["id"];
    $query3 = "UPDATE MENU SET STATUS = 0 WHERE ID_MENU = '$id'";
    if($conn->query($query3) == true){
        echo "Berhasil Menonaktifkan Data";
    }else{
        echo "Tidak Berhasil Menonaktifkan Data";
    }
?>