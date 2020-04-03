<?php
    require_once("../../config.php");
    
    $namkat = $_POST['namkat'];
    $jeniskat = $_POST['jeniskat'];
    $kembar = false;
    $tmpnama = '';
    $string = '';
    $ctr2 = '';$ctr = 0;
    $query = "SELECT count(id_kategori) + 1 jml FROM kategori";
    $rs =  mysqli_query($conn,$query);
    foreach($rs as $key=>$data) {
        $ctr = $data['jml'];
    }
    if($ctr < 10){
        $ctr2 = strval($ctr);
        $string = 'KAT00'.$ctr2;
    }else if($ctr < 100){
        $ctr2 = strval($ctr);
        $string = 'KAT0'.$ctr2;
    }else{
        $ctr2 = strval($ctr);
        $string = 'KAT'.$ctr2;
    }

    $query3 = "SELECT * FROM kategori";
    $list = $conn->query($query3);
    foreach($list as $key=>$data){
        $tmpnama = $data['nama_kategori'];
        if($namkat == $tmpnama){
            $kembar = true;
        }
    }
    if($kembar){
        echo "Data Kembar";
    }else{       
        $query2 = "INSERT INTO kategori VALUES('$string','$namkat','$jeniskat',1)";
        if($conn->query($query2) == true){
            echo "Berhasil Menambahkan Data";
        }else{
            echo "Tidak Berhasil Menambahkan Data";
        } 
    }
?>