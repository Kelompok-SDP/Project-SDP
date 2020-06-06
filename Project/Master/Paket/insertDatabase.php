<?php
    require_once("../../config.php");
    
    $npaket = $_POST["npaket"];
    $hpaket = $_POST["hpaket"];
    $kpaket = $_POST["kpaket"];
    $ppaket = $_POST["ppaket"];
    $mpaket = $_POST["mpaket"];
    $mpaket2 = $_POST["mpaket2"];
    $kembar = false;
    $tmpnama = '';
    $string = '';
    $ctr2 = '';$ctr = 0;
    $query = "SELECT count(id_paket) + 1 jml FROM paket";
    $rs =  mysqli_query($conn,$query);
    foreach($rs as $key=>$data) {
        $ctr = $data['jml'];
    }
    if($ctr < 10){
        $ctr2 = strval($ctr);
        $string = 'PK00'.$ctr2;
    }else if($ctr < 100){
        $ctr2 = strval($ctr);
        $string = 'PK0'.$ctr2;
    }else{
        $ctr2 = strval($ctr);
        $string = 'PK'.$ctr2;
    }

    $query3 = "SELECT * FROM PAKET";
    $list = $conn->query($query3);
    foreach($list as $key=>$data){
        $tmpnama = $data['nama_paket'];
        if($npaket == $tmpnama){
            $kembar = true;
        }
    }
    if($kembar){
        echo "Data Kembar";
    }else{
        $query2 = "INSERT INTO PAKET VALUES('$string','$npaket',$hpaket,'','$kpaket',1)";
        $query3 = "INSERT INTO PAKET_MENU VALUES('$string','$mpaket')";
        $query4 = "INSERT INTO PAKET_MENU VALUES('$string','$mpaket2')";
        if($ppaket != ""){
            $tharga = [10,15,20,25,40,50];
            $rand = rand(0,5);
            $persen = round($hpaket * $tharga[$rand] / 100);
            $hpromo = $hpaket - $persen;
            $query5 = "INSERT INTO PROMO_PAKET VALUES('$ppaket','$string',$hpromo,1)";
            if($conn->query($query2) == true && $conn->query($query3) == true && $conn->query($query4) == true && $conn->query($query5) == true){
                echo $string." -- Berhasil Menambahkan Data";
            }else{
                echo "Tidak Berhasil Menambahkan Data";
            } 
        }else{
            if($conn->query($query2) == true && $conn->query($query3) == true && $conn->query($query4) == true){
                echo $string." -- Berhasil Menambahkan Data";
            }else{
                echo "Tidak Berhasil Menambahkan Data";
            } 
        }
    }
?>