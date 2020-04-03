<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $nmenu  = $_POST['nmenu'];
    $hmenu  = $_POST['hmenu'];
    $kmenu  = $_POST['kmenu'];
    $pmenu  = $_POST['pmenu'];
    $dmenu  = $_POST['dmenu'];
    $query = "UPDATE MENU SET NAMA_MENU ='$nmenu', HARGA_MENU ='$hmenu', DESKRIPSI = '$dmenu', ID_KATEGORI = '$kmenu', ID_PROMO = '$pmenu' WHERE id_kategori = '$id'";
    if(mysqli_query($conn,$query) == true){
        echo "Berhasil Meng-update Data";
    } else {
        echo "Tidak Berhasil Meng-update Data";
    }   
?>