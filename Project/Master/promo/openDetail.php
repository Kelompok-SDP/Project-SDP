<?php
require_once("../../config.php");
    $id  = $_POST['detail'];
    $query="SELECT * from promo where id_promo = '$id'";
    $hasil = mysqli_query($conn,$query);
    $gambar = "";
    $harga = "";
    $awalperiode ="";
    $akhirperiode = "";
    $nama = "";
    foreach ($hasil as $key=>$data){
        $harga = $data['harga_promo'];
        $nama = $data['nama_promo'];
        $awalperiode = $data['periode_awal'];
        $akhirperiode = $data['periode_akhir'];
        $gambar = $data['gambar_promo'];
    }
    $rest = substr($gambar ,-(strlen($gambar)-6)); 
    echo $rest;
?>

<img src = "<?=$rest?>" width="" height="" alt="image not found">