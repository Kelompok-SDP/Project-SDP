<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $nampromo = $_POST['nampromo'];
    $awalp = $_POST['awalp'];
    $akhirp = $_POST['akhirp'];
    $jenisp = $_POST['jenisp'];
    $detp = $_POST['detp'];
    $awalP  = strtotime($awalp);
    $akhirP  = strtotime($akhirp);
    $nawal = date('Y-m-d',$awalP);
    $nakhir = date('Y-m-d',$akhirP);
    $query = "UPDATE promo SET nama_promo ='$nampromo',periode_awal = '$nawal', periode_akhir = '$nakhir', detail_promo = '$detp', jenis_promo = '$jenisp' WHERE id_promo = '$id'";
    if(mysqli_query($conn,$query) == true){
        echo $id." -- Berhasil Meng-update Data";
    } else {
        echo "Tidak Berhasil Meng-update Data";
    }   
?>