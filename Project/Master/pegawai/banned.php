<?php
    require_once("../../config.php");
    $id=$_POST["id"];
    $query="SELECT status from pegawai where id_pegawai='$id'";
    $query=mysqli_query($conn,$query);
    $query=mysqli_fetch_assoc($query);
    if($query["status"]==1){
        mysqli_query($conn,"UPDATE pegawai set status=0 where id_pegawai='$id'");
    }else{
        mysqli_query($conn,"UPDATE pegawai set status=1 where id_pegawai='$id'");
    }
?>