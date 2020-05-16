<?php
    include("../../config.php");
    $nominal=$_POST["nominal"];

    $id_login=$_SESSION["pelanggan"];
    $query= "SELECT * from member where id_member='$id_login'";
    $value=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $saldo=$value["saldo_member"];
    $nominal_saldo=$saldo+$nominal;

    $query="UPDATE member set saldo_member=$nominal_saldo where id_member='$id_login'";
    mysqli_query($conn,$query);
?>