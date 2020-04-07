<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $nmenu  = $_POST['nmenu'];
    $hmenu  = $_POST['hmenu'];
    $kmenu  = $_POST['kmenu'];
    $dmenu  = $_POST['dmenu'];
    $query = "UPDATE MENU SET NAMA_MENU ='$nmenu', HARGA_MENU ='$hmenu', DESKRIPSI = '$dmenu', ID_KATEGORI = '$kmenu' WHERE id_menu = '$id'";
    if(mysqli_query($conn,$query) == true){
        echo $id." -- Berhasil Meng-update Data";
    } else {
        echo "Tidak Berhasil Meng-update Data";
    }   
?>