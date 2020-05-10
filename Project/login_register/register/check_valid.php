<?php
	require_once("../../config.php");
    $data=$_POST["data"];
    $jenis=$_POST["jenis"];
    $kembali=0;
    if($jenis=='email'){
        $query=mysqli_query($conn,"SELECT * from member where email=$data");
        $row_cnt =0;
        if (is_array($query) || is_object($query))
        {
            foreach ($query as $key => $value) {
                $row_cnt=$row_cnt+1;
            }
        }
        if($row_cnt>0){
            echo "Email Sudah Terdaftar";
        }else{
            $kembali=1;
            echo json_encode($kembali);
        }
    }
    $row_cnt =0;
    if($jenis=='nohp'){
        $query=mysqli_query($conn,"SELECT * from member where no_hp=$data");
        if (is_array($query) || is_object($query))
        {
            foreach ($query as $key => $value) {
                $row_cnt=$row_cnt+1;
            }
        }
        if($row_cnt>0){
            echo "Email Sudah Terdaftar";
        }else{
            echo "1";
        }
    }
    $row_cnt =0;
    if($jenis=='username'){
        $query=mysqli_query($conn,"SELECT * from member where username=$data");
        if (is_array($query) || is_object($query))
        {
            foreach ($query as $key => $value) {
                $row_cnt=$row_cnt+1;
            }
        }
        if($row_cnt>0){
            echo "Email Sudah Terdaftar";
        }else{
            echo "1";
        }
    }
    
?>