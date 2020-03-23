<?php
    require_once("../../config.php");
    if($_POST["action"]=="insert")
        {
        //masukan kategori baru
        $namaPromo = $_POST['namPromo'];
        $harga = $_POST['hargaPromo'];
        $pawal = $_POST['pAwal'];
        $pakhir = $_POST['pAkhir'];
            $jum2 =0;
        
       if($namaPromo != ''&& $harga !=0 && $pawal !='' && $pakhir !='' && $pakhir>$pawal ){
        $query = "SELECT  count(id_promo) jml FROM promo";
        $rs=  mysqli_query($conn,$query);
        foreach($rs as $key=>$data) {
            $jum2 = $data['jml'];
        }
        $jum2 ++;
        $id_promo = "PR".$jum2;
        $query = "INSERT INTO promo (`id_promo`, `nama_promo`,`harga_promo`,`periode_awal`,`periode_akhir` )VALUES ('$id_promo','$namaPromo',$harga,'$pawal','$pakhir')";
        if(mysqli_query($conn,$query) == true){
            echo "Berhasil input data";
        } else{
            echo "Gagal Input data";
        }
       }else{
        echo "Data ada yang salah atau masih ";
       }
    }
    else if($_POST["action"]=="delete")
    {
     //delete kategori
     $id  = $_POST['id'];
     $query ="DELETE FROM promo WHERE id_kategori = '$id'";
     if(mysqli_query($conn,$query) == true){
         echo "berhasil";
     } else {
         echo "tidak Berhasil men-delete";
     }   
    }
    else if($_POST["action"]=="update"){
        $id  = $_POST['id'];
        $nama = $_POST['namPromo'];
        $harga = $_POST['hargaPromo'];
        $pawal = $_POST['pAwal'];
        $pakhir = $_POST['pAkhir'];
        $query = "UPDATE `promo` SET `nama_promo`='$nama',`harga_promo`='$harga', `periode_awal`='$pawal', `periode_akhir`='$pakhir'  WHERE id_promo = '$id'";
        if(mysqli_query($conn,$query) == true){
            echo "berhasil";
        } else {
            echo "tidak Berhasil men-update";
        }   
    }
     

?>