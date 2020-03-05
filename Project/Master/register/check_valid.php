<?php
	require_once("../../config.php");
    $data=$_POST["data"];
    $jenis=$_POST["jenis"];

    if($jenis=='email'){
        $query=mysqli_query($conn,"SELECT * from member where email=$data");
        $row_cnt = $query->num_rows;
        if()
    }

    
?>