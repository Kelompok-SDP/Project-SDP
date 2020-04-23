<?php
	require_once("../../config.php");
    $fullname=$_POST["fullname"];
    $password=$_POST['pass'];
    $username=$_POST["username"];
    $alamat=$_POST["alamat"];
    $kodepos=$_POST["kodepos"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $nohp=$_POST["nohp"];
    $kabupaten=$_POST["kabupaten"];
    $kota=$_POST["kota"];
    $que="SELECT lpad(nvl(substr(id_member,3,5)+1,0),5,'0') as maximum from member where id_member like '%".strtoupper(substr($fullname,0,2))."%'order by 1 desc limit 1";
    $id='';
    $autogen=mysqli_query($conn,$que);
    foreach ($autogen as $key => $value) {
        $id=strtoupper(substr($fullname,0,2)).$value['maximum'];
    }
    if($id==''){
        $id=strtoupper(substr($fullname,0,2)).'00001';
    }
    $query="INSERT into member values('$id','$fullname','$password','$email','$alamat',$nohp,'$kota','$kabupaten',$kodepos,'$username',2)";
    mysqli_query($conn,$query);
    echo $query;
?>