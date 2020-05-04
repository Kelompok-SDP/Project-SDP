<?php 
    require_once("../../config.php");
    $id= $_POST['id'];
    $nama= $_POST['nama'];
    $alamat= $_POST['alamat'];
    $kota= $_POST['kota'];
    $pos= $_POST['pos'];
    $email= $_POST['email'];
    $telp= $_POST['telp'];
    $query = "UPDATE `member` SET `fullname`='$nama',`email`='$email',`alamat`='$alamat',`no_hp`='$telp',`kota`='$kota',`kode_pos`='$pos' WHERE id_member= '$id' ";
    mysqli_query($conn,$query);
    echo "data berhasil di update"



?>