<?php
	require_once("../../config.php");
    $kodeDaerah=$_POST["daerah"];
    $query=mysqli_query($conn_detail,"SELECT * from kota ");
    
    foreach ($query as $key => $value) {
        if($value["kode_daerah"]==$kodeDaerah)
        echo "<option value='$value[kode_daerah]'>$value[nama_kota]</option>";
    }
    
?>