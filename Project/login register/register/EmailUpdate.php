<?php
    require_once("../../config.php");
 
    $email=$_POST["kepada"];
    $result = mysqli_query($conn,"SELECT * FROM member where email='$email'");
    $row_cnt = $result->num_rows;
    if($row_cnt>0){
        mysqli_query($conn,"UPDATE member set status=1 where email='$email'");
        echo "Berhasil Register";
    }else{
        echo "Gagal register";
    }
?>