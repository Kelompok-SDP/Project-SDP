<?php
    require_once("../../config.php");
    // $captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    // $captcha_num = substr(str_shuffle($captcha_num), 0, 6);
    $email=$_POST["kepada"];
    $password  = $_POST['password'];
    $result = mysqli_query($conn,"SELECT * FROM member where email='$email'");
    $row_cnt = $result->num_rows;
    if($row_cnt>0){
        mysqli_query($conn,"UPDATE member set password='$password' where email='$email'");
        echo "Berhasil Mengganti password";
    }else{
        echo "Gagal";
    }
?>