<?php
    require_once("../../config.php");
    
    $nmenu = $_POST["nmenu"];
    $hmenu = $_POST["hmenu"];
    $kmenu = $_POST["kmenu"];
    $pmenu = $_POST["pmenu"];
    $dmenu = $_POST["dmenu"];
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
        if($nmenu == $tmpnama){
            $kembar = true;
        }
    }
    if($kembar){
        echo "Data Kembar!";
    }else{
        $query2 = "INSERT INTO MENU VALUES('$string','$nmenu',$hmenu,'','$dmenu','$kmenu',1)";
        if($pmenu != ""){
            $tharga = [10,15,20,25,40,50];
            $rand = rand(0,5);
            $persen = round($hmenu * $tharga[$rand] / 100);
            $hpromo = $hmenu - $persen;
            $query5 = "INSERT INTO PROMO_PAKET VALUES('$pmenu','$string',$hpromo)";
            if($conn->query($query2) == true && $conn->query($query5) == true){
                echo $string." -- Berhasil Menambahkan Data";
            }else{
                echo "Tidak Berhasil Menambahkan Data";
            } 
        }else{
            if($conn->query($query2) == true){
                echo $string." -- Berhasil Menambahkan Data";
            }else{
                echo "Tidak Berhasil Menambahkan Data";
                
            } 
        }
    }
?>