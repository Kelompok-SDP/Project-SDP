<?php
    require_once("../../config.php");
    if($_POST["action"]=="insert")
        {
        //masukan kategori baru
        $namaKat = $_POST['namKat'];
        $jeniskat = $_POST['jenisKat'];
            $jum2 =0;
       if($namaKat != ''){
        $query = "SELECT  count(id_kategori) jml FROM kategori";
        $rs=  mysqli_query($conn,$query);
        foreach($rs as $key=>$data) {
            $jum2 = $data['jml'];
        }
        $jum2 ++;
        $id_kategori = "KA".$jum2;
        $query = "INSERT INTO kategori (`id_kategori`, `nama_kategori`,`jenis_kategori`)VALUES ('$id_kategori','$namaKat','$jeniskat')";
        if(mysqli_query($conn,$query) == true){
            echo "Berhasil input data";
        } else{
            echo "Gagal Input data";
        }
       }else{
        echo "Nama tidak boleh kosong";
       }
    }
    else if($_POST["action"]=="delete")
    {
     //delete kategori
     $id  = $_POST['id'];
     $query ="DELETE FROM kategori WHERE id_kategori = '$id'";
     if(mysqli_query($conn,$query) == true){
         echo "berhasil";
     } else {
         echo "tidak Berhasil men-delete";
     }   
    }
    else if($_POST["action"]=="update"){
        $id  = $_POST['id'];
        $nama = $_POST['namKat'];
        $jenis = $_POST['jenisKat'];
        $query = "UPDATE `kategori` SET `nama_kategori`='$nama',`jenis_kategori`='$jenis' WHERE id_kategori = '$id'";
        if(mysqli_query($conn,$query) == true){
            echo "berhasil";
        } else {
            echo "tidak Berhasil men-update";
        }   
    }
     

?>