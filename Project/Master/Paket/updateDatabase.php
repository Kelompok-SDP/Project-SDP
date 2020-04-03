<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $npaket = $_POST['npaket'];
    $hpaket = $_POST['hpaket'];
    $kpaket = $_POST['kpaket'];
    $ppaket = $_POST['ppaket'];
    $query = "UPDATE PAKET SET NAMA_paket ='$npaket', HARGA_paket ='$hpaket', ID_KATEGORI = '$kpaket', ID_PROMO = '$ppaket' WHERE id_paket = '$id'";
    if(mysqli_query($conn,$query) == true){
        echo "Berhasil Meng-update Data";
    } else {
        echo "Tidak Berhasil Meng-update Data";
    }   
?>