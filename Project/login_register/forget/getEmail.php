<?php
    //session_start();
    require_once("../../config.php");
   
    $email=$_POST["kepada"];
    $result = mysqli_query($conn,"SELECT * FROM member where email='$email'");
    $row_cnt = $result->num_rows;
    if($row_cnt>0){
        //mysqli_query($conn,"UPDATE member set password='$captcha_num' where email='$email'");
       
        echo "Tolong Check Email Anda";
    }else{
        echo "Email Anda Tidak Di Temukan";
    }
?>