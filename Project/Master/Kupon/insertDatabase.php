<?php
    require_once("../../config.php");
    
    $nkupon = $_POST["nkupon"];
    $hkupon = $_POST["hkupon"];
    $kmenu = $_POST["kmenu"];
    $awalp = $_POST["awalp"];
    $akhirp = $_POST["akhirp"];
    $skupon = $_POST["skupon"];
    $awalP  = strtotime($awalp);
    $akhirP  = strtotime($akhirp);
    $nawal = date('Y-m-d',$awalP);
    $nakhir = date('Y-m-d',$akhirP);

    $kembar = false;
    $tmpnama = '';
    $kode = '';
    $string = '';
    $ctr2 = '';$ctr = 0;
    $query = "SELECT count(id_kupon) + 1 jml FROM kupon";
    $rs =  mysqli_query($conn,$query);
    foreach($rs as $key=>$data) {
        $ctr = $data['jml'];
    }
    if($ctr < 10){
        $ctr2 = strval($ctr);
        $string = 'KUP00'.$ctr2;
    }else if($ctr < 100){
        $ctr2 = strval($ctr);
        $string = 'KUP0'.$ctr2;
    }else{
        $ctr2 = strval($ctr);
        $string = 'KUP'.$ctr2;
    }

    $query3 = "SELECT * FROM KUPON where status_kupon = 1";
    $list = $conn->query($query3);
    foreach($list as $key=>$data){
        $tmpnama = $data['nama_kupon'];
        if($nkupon == $tmpnama){
            $kembar = true;
        }

        if($kmenu == $data['id_menu']){
            $kembar = true;
        }
    }
    if($kembar){
        echo "Data Kembar!";
    }else{
        $tmp1 = strtoupper(substr($string, 0, 3));
        $tmp2 = strtoupper(substr($nkupon, 0, 2));
        $tmp3 = substr($string, 3, 3);
        $kode = $tmp1.$tmp2.$tmp3;
        $query2 = "INSERT INTO KUPON VALUES('$string','$nkupon','$kmenu',$hkupon,'$nawal','$nakhir',$skupon,1)";
        if($conn->query($query2) == true){
            echo $string." -- Berhasil Menambahkan Data";
        }else{
            echo "Tidak Berhasil Menambahkan Data";
        } 
        
    }
?>