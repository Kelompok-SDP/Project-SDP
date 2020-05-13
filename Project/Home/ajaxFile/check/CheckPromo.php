<?php
    // session_start();
    include("../../../config.php");
    $getNama=$_POST["nama"];
    $date_now= date("Y-m-d");
    $query="SELECT * from promo where nama_promo='$getNama'";
    $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $date_promo=$query["periode_akhir"];
    if($date_now<=$date_promo){
        $_SESSION["promo"]=$query["harga_promo"];
    }else{
        echo"Promo Tidak Valid";
    }
?>