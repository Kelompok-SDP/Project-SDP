<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $nama = $_POST['namkat'];
    $jenis  = $_POST['jeniskat'];
    $query = "UPDATE kategori SET nama_kategori ='$nama', jenis_kategori ='$jenis' WHERE id_kategori = '$id'";
    if(mysqli_query($conn,$query) == true){
        echo "Berhasil Meng-update Data";
    } else {
        echo "Tidak Berhasil Meng-update Data";
    }   
?>