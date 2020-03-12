<?php
    require_once("../../config.php");
    $user=$_POST["user"];
    $password=$_POST["password"];

    $query="SELECT username,no_hp,email,password,status from member where username='$user' or email='$user' or no_hp = '$user'";
    $query=mysqli_query($conn,$query);
    $jumlah=mysqli_num_rows($query);
    if($jumlah>0){
        $query=mysqli_fetch_assoc($query);
        if($query["status"]==1){
            if($query["password"]==$password){
                echo "behasil login";
            }else{
                echo "password salah";
            }
        }else{
            echo "akun anda telah di banned";
        }
    }else{
        echo "Email atau Nohp atau Username salah";
    }
?>