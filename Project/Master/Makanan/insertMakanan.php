<?php
    require_once("../../config.php");
    
    $nmakanan = $_POST["nmakanan"];
    $hmakanan = $_POST["hmakanan"];
    $kembar = false;
    $tmpnama = '';
    $string = '';
    $ctr2 = '';$ctr = 0;
    $query = "SELECT count(id_menu) + 1 jml FROM menu";
    $rs =  mysqli_query($conn,$query);
    foreach($rs as $key=>$data) {
        $ctr = $data['jml'];
    }
    if($ctr < 10){
        $ctr2 = strval($ctr);
        $string = 'MEN00'.$ctr2;
    }else if($ctr < 100){
        $ctr2 = strval($ctr);
        $string = 'MEN0'.$ctr2;
    }else{
        $ctr2 = strval($ctr);
        $string = 'MEN'.$ctr2;
    }

    $query3 = "SELECT * FROM MENU";
    $list = $conn->query($query3);
    foreach($list as $key=>$data){
        $tmpnama = $data['nama_menu'];
        if($nmakanan == $tmpnama){
            $kembar = true;
        }
    }
    if($kembar){
        echo "Data Kembar";
    }else{
        echo $string;
        $query2 = "INSERT INTO MENU VALUES('$string','$nmakanan',$hmakanan,'','',1)";
        if($conn->query($query2) == true){
            echo "Berhasil Menambahkan Data";
        }else{
            echo "Tidak Berhasil Menambahkan Data";
        } 
    }
    
    
?>