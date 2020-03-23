<?php
    require_once("../../config.php");
    $nama=$_POST["nama"];
    $email=$_POST["email"];
    $nohp=$_POST["nohp"];
    $jabatan=$_POST["jabatan"];
    $query=mysqli_fetch_assoc(mysqli_query($conn,"SELECT lpad(count(*)+1,5,0) as jumlah from pegawai"));
    $id=substr($jabatan,0,1).$query["jumlah"];
    $password="P".$id;
    mysqli_query($conn,"INSERT into pegawai values('$id','$nama','$jabatan','$email','$nohp','$password','1')");
?>