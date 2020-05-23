<?php
    require_once("../../config.php");
    $tipe = $_GET["tipe"];
    $user=$_POST["user"];
    $password=$_POST["password"];

    if($tipe === "1"){
        $query="SELECT id_member, username,no_hp,email,password,status from member where username='$user' or email='$user' or no_hp = '$user'";
        $query=mysqli_query($conn,$query);
        $jumlah=mysqli_num_rows($query);
        if($jumlah>0){
            $query=mysqli_fetch_assoc($query);
            if($query["status"]==1){
                if($query["password"]==$password){
                    $_SESSION['pelanggan'] = $query['id_member'];
                    $_SESSION["login"]="pelanggan";
                    echo "Berhasil login";
                }else{
                    echo "Password salah";
                }
            }else if ($query["status"]==2){
                if($query["password"]==$password){
                    $_SESSION['pelanggan'] = $query['id_member'];
                    $_SESSION["login"]="pelanggan";
                    echo "Berhasil login v2";

                }else{
                    echo "Password salah";
                }
            }
            else{
                echo "Akun anda telah di banned";
            }
        }else{
            echo "Email atau Nohp atau Username salah";
        }
    } else{
        $query="SELECT id_pegawai, nama,nohp,email,password,status from pegawai where email='$user' or nohp = '$user'";
        $query=mysqli_query($conn,$query);
        $jumlah=mysqli_num_rows($query);
        if($jumlah>0){
            $query=mysqli_fetch_assoc($query);
            if($query["status"]==1){
                if($query["password"]==$password){
                    $_SESSION["pegawai"] = $query['id_pegawai'];
                    $_SESSION["login"]="pegawai";
                    echo "Berhasil login";
                }else{
                    echo "Password salah";
                }
            }else{
                echo "Akun anda telah di banned";
            }
        }else{
            echo "Email salah";
        }
    }
?>