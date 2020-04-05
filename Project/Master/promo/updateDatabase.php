<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
   $nampromo = $_POST['nampromo'];
   $hrgpromo = $_POST['hrgpromo'];
   $awalp = $_POST['awalp'];
   $akhirp = $_POST['akhirp'];
   $awalP  = strtotime($awalp);
   $akhirP  = strtotime($akhirp);
   $nawal = date('Y-m-d',$awalP);
   $nakhir = date('Y-m-d',$akhirP);
    $query = "UPDATE promo SET nama_promo ='$nampromo', harga_promo ='$hrgpromo',periode_awal = '$nawal', periode_akhir = '$nakhir' WHERE id_promo = '$id'";
    if(mysqli_query($conn,$query) == true){
        echo "Berhasil Meng-update Data";
    } else {
        echo "Tidak Berhasil Meng-update Data";
    }   
?>