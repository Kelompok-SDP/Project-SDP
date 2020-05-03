<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $npaket = $_POST['npaket'];
    $hpaket = $_POST['hpaket'];
    $kpaket = $_POST['kpaket'];
    $mpaket = $_POST['mpaket'];
    $mpaket2 = $_POST['mpaket2'];
    $ppaket = $_POST['ppaket'];
    $query = "UPDATE PAKET SET NAMA_paket ='$npaket', HARGA_paket ='$hpaket', ID_KATEGORI = '$kpaket', ID_PROMO = '$ppaket' WHERE id_paket = '$id'";
    $query2 = "DELETE FROM PAKET_MENU WHERE ID_PAKET = '$id'"; 
    $query3 = "INSERT INTO PAKET_MENU VALUES('$id','$mpaket')";
    $query4 = "INSERT INTO PAKET_MENU VALUES('$id','$mpaket2')";
    if(mysqli_query($conn,$query) == true && mysqli_query($conn,$query2) == true && mysqli_query($conn,$query3) == true && mysqli_query($conn,$query4) == true){
        echo $id." -- Berhasil Meng-update Data";
    } else {
        echo "Tidak Berhasil Meng-update Data";
    }   
?>