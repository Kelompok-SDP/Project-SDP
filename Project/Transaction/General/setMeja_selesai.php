<?php
    include_once("../../config.php");
    $meja=$_POST["nomor"];
    mysqli_query($conn_detail,"UPDATE meja set status='1' where id_meja=$meja");
?>