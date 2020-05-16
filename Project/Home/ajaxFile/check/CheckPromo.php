<?php
    // session_start();
    include("../../../config.php");
    $cek = false;
    $getNama=$_POST["nama"];
    $date_now= date("Y-m-d");
    $query="SELECT * from promo where nama_promo='$getNama' and status_promo = 1";
    $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $date_promo=$query["periode_akhir"];


    $query2 = "SELECT * from promo_paket where id_promo='$query[id_promo]' and status = 1 ";
    $query2 = mysqli_query($conn,$query2);
    $jumlah = mysqli_num_rows($query2);
    if($jumlah<=0){
        $cek = true;
    }
    if($date_now<=$date_promo && $cek == true){
        $_SESSION["promo"]=$query["harga_promo"];
        $_SESSION["nama_promo"] = $query["nama_promo"];
    }else{
        echo"Promo Tidak Bisa digunakan";
    }
?>