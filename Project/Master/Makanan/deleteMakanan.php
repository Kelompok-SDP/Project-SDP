<?php
    require_once("../../config.php");
    $id = $_POST["id"];
    $quwery = "SELECT * from menu WHERE id_menu = '$id'";
   
    $list = $conn->query($quwery);
    $tmp = '';
    foreach ($list as $key => $value) {
        $tmp = $value['id_menu'];
    }
    
    $query2 = "SELECT * FROM menu WHERE id_menu = '$tmp'";
    $list3 = $conn->query($query2);
    $rowcount2 = mysqli_num_rows($list3);
    if($rowcount2 > 0){
        $query3 = "UPDATE MENU SET STATUS = 0 WHERE ID_MENU = '$tmp'";
        if($conn->query($query3) == true){
            echo "Berhasil Menonaktifkan Data";
        }else{
            echo "Tidak Berhasil Menonaktifkan Data";
        }
    }
?>