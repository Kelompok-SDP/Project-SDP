<?php
    require_once("../../config.php");
    $nama=$_POST["nama"];
    $email=$_POST["email"];
    $nohp=$_POST["nohp"];
    $jabatan=$_POST["jabatan"];
    $id=$_POST["id"];
    $pass=$_POST["pass"];
    $query="UPDATE pegawai set nama='$nama',email='$email',nohp='$nohp',jabatan='$jabatan',password='$pass' where id_pegawai='$id'";
    echo $query;
    mysqli_query($conn,$query);
?>