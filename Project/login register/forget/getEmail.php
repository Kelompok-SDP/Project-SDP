<?php
    require_once("../../config.php");
    $captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
    $captcha_num = substr(str_shuffle($captcha_num), 0, 6);
    $email=$_POST["kepada"];
    $result = mysqli_query($conn,"SELECT * FROM member where email='$email'");
    $row_cnt = $result->num_rows;
    if($row_cnt>0){
        mysqli_query($conn,"UPDATE member set password='$captcha_num' where email='$email'");
        echo "Password Anda Sudah Kamu Ubah Tolong Check Email Anda";
    }else{
        echo "Email Anda Tidak Di Temukan";
    }
?>