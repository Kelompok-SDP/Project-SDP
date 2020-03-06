<?php
	require_once("../../config.php");
    $data=$_POST["data"];
    $jenis=$_POST["jenis"];
    $nama_depan   =$_post["nama_depan "];
    $nama_belakang=$_post["nama_belakang"];
    $username     =$_post["username"];
    $alamat       =$_post["alamat"];
    $kodepos      =$_post["kodepos"];
    $email        =$_post["email"];
    $pass         =$_post["pass"];
    $nohp         =$_post["nohp"];
    $kabupaten    =$_post["kabupaten"];
    $kota         =$_post["kota "];

    $autogen=mysqli_fetch_assoc(mysqli_query($conn,"SELECT nvl(max(substr(id_member,-5,5)),0) as maximum from member where id_member like '%substr($nama_depan,1,1)%'"));
    echo $autogen;
    mysqli_query($conn,"INSERT into member values
    ('$dtNoHp','$dtUser','$dtPass','$dtNamaDepan','$dtNamaBelakang','$dtAlamat')");
?>