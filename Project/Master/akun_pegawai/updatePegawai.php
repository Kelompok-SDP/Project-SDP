<?php
    require_once("../../config.php");
    $nama=$_POST["nama"];
    $email=$_POST["email"];
    $nohp=$_POST["nohp"];
    $jabatan=$_POST["jabatan"];
    $id=$_POST["id"];
    $query="UPDATE pegawai set nama='$nama',email='$email',nohp='$nohp',jabatan='$jabatan' where id_pegawai='$id'";
    echo $query;
    mysqli_query($conn,$query);
?>