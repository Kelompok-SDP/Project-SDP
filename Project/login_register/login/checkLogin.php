<?php
    require_once("../../config.php");
    $tipe = $_GET["tipe"];
    $user=$_POST["user"];
    $password=$_POST["password"];

    if($tipe === "1"){
        $query="SELECT username,no_hp,email,password,status from member where username='$user' or email='$user' or no_hp = '$user'";
        $query=mysqli_query($conn,$query);
        $jumlah=mysqli_num_rows($query);
        if($jumlah>0){
            $query=mysqli_fetch_assoc($query);
            if($query["status"]==1){
                if($query["password"]==$password){
                    echo "berhasil login";
                }else{
                    echo "password salah";
                }
            }else if ($query["status"]==2){
                if($query["password"]==$password){
                    echo "berhasil login v2";
                }else{
                    echo "password salah";
                }
            }
            else{
                echo "akun anda telah di banned";
            }
        }else{
            echo "Email atau Nohp atau Username salah";
        }
    } else{
        $query="SELECT nama,nohp,email,password,status from pegawai where email='$user' or nohp = '$user'";
        $query=mysqli_query($conn,$query);
        $jumlah=mysqli_num_rows($query);
        if($jumlah>0){
            $query=mysqli_fetch_assoc($query);
            if($query["status"]==1){
                if($query["password"]==$password){
                    echo "berhasil login";
                    $_SESSION["pegawai"] = "pegawai";
                }else{
                    echo "password salah";
                }
            }else{
                echo "akun anda telah di banned";
            }
        }else{
            echo "Email atau Nohp atau Username salah";
        }
    }
?>