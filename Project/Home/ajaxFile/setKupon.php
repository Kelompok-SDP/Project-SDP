<?php
    include("../../config.php");
    $id_kupon=$_POST["id_kupon"];
    $id_member=$_SESSION["pelanggan"];
    $query="SELECT * from kupon where id_kupon='$id_kupon'";
    $value=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $sisa_kupon=$value["sisa_kupon"]-1;
    echo $sisa_kupon;
    $query="INSERT INTO kupon_member values('$id_kupon','$id_member',1)";
    mysqli_query($conn,$query);

    $stat=1;
    if($sisa_kupon==0){
        $stat=0;
    }
    $query="UPDATE kupon set sisa_kupon=$sisa_kupon , status_kupon=$stat  where id_kupon='$id_kupon'";
    mysqli_query($conn,$query);
?>