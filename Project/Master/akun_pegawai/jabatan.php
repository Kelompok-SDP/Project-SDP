
<?php
	require_once("../../config.php");
    $query_first=mysqli_query($conn_detail,"SELECT * from jabatan");
    foreach ($query_first as $key => $value) {
        echo "<option value=$value[nama_jabatan]>$value[nama_jabatan]</option>";
    }
?>