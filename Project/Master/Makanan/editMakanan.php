<?php
    require_once("../../config.php");
    $id = $_POST["id"];
    $nmakanan = $_POST["nmakanan"];
    $hmakanan = $_POST["hmakanan"];
    $smakanan = $_POST['smakanan'];
    $kembar = false;
    $query = "SELECT * FROM MENU WHERE ID_MENU = '$id'";
    $list = $conn->query($query);
    $tmp = '';
    foreach ($list as $key => $value) {
        $tmp = $value['id_menu'];
    }

    $query2 = "UPDATE MENU SET nama_menu = '$nmakanan', harga_menu ='$hmakanan', status = '$smakanan' WHERE id_menu = '$tmp'";
    if($conn->query($query2) == true){
        echo "Berhasil Mengupdate Data";
    }else{
        echo "Tidak Berhasil Mengupdate Data";
    } 
    
?>