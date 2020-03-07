<?php
	require_once("../../config.php");
    $nama_depan=$_POST["nama_depan"];
    $nama_belakang=$_POST["nama_belakang"];
    $password=$_POST['pass'];
    $username=$_POST["username"];
    $alamat=$_POST["alamat"];
    $kodepos=$_POST["kodepos"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $nohp=$_POST["nohp"];
    $kabupaten=$_POST["kabupaten"];
    $kota=$_POST["kota"];

    $autogen=mysqli_query($conn,"SELECT lpad(nvl(substr(id_member,3,5))+1),5,'0') as maximum from member where id_member like '%substr($nama_depan,1,2)%'order by desc limit 1");
    foreach ($autogen as $key => $value) {
        $id=strtoupper(substr($nama_depan,0,2)).$value['maximum'];
    }
    $query="INSERT into member values('$id','$nama_depan','$password','$email','$alamat',$nohp,'$kota','$kabupaten',$kodepos,'$nama_belakang','$username')";
    mysqli_query($conn,$query);
    echo $query;
?>