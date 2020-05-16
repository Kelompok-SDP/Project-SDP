<?php
    require_once("../../config.php");
    $awalP =''; $akhirP =''; $nawal = ''; $nakhir = '';
    $nampromo = $_POST["nampromo"];
    $awalp = $_POST["awalp"];
    $jenispromo = $_POST["jenispromo"];
    $detpromo = $_POST["detpromo"];
    $akhirp = $_POST["akhirp"];
    $awalP  = strtotime($awalp);
    $akhirP  = strtotime($akhirp);
    $nawal = date('Y-m-d',$awalP);
    $nakhir = date('Y-m-d',$akhirP);
    $kembar = false;
    $tmpnama = '';
    $string = '';
    $ctr2 = '';$ctr = 0;
    $query = "SELECT count(id_promo) + 1 jml FROM promo";
    $rs =  mysqli_query($conn,$query);
    foreach($rs as $key=>$data) {
        $ctr = $data['jml'];
    }
    if($ctr < 10){
        $ctr2 = strval($ctr);
        $string = 'PR00'.$ctr2;
    }else if($ctr < 100){
        $ctr2 = strval($ctr);
        $string = 'PR0'.$ctr2;
    }else{
        $ctr2 = strval($ctr);
        $string = 'PR'.$ctr2;
    }

    $query3 = "SELECT * FROM promo";
    $list = $conn->query($query3);
    foreach($list as $key=>$data){
        $tmpnama = $data['nama_promo'];
        if($nampromo == $tmpnama){
            $kembar = true;
        }
    }
    if($kembar){
        echo "Data Kembar!";
    }else{
        $query2 = "INSERT INTO promo VALUES('$string','$nampromo','$nawal','$nakhir','','$detpromo','$jenispromo',1)";
        if($conn->query($query2) == true){
            echo $string." -- Berhasil Menambahkan Data";
        }else{
            echo "Tidak Berhasil Menambahkan Data";
        } 
    }
?>