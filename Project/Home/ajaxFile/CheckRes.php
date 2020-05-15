<?php
    include("../../config.php");
    $id=$_POST["id"];
    $kode=$_POST["kode"];

    $id=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from member where email='$id'"));
    $id=$id["id_member"];
    $query="SELECT * from hjual where id_member='$id' and jenis_pemesanan='Reservasi' and locate('$kode',keterangan)";
    $result=mysqli_query($conn,$query);
    $row_cnt = $result->num_rows;
    if($row_cnt>0){
        $query=mysqli_fetch_assoc($result);
        echo $query["id_hjual"];
    }
?>