<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $namkupon = $_POST['namkupon'];
    $awalp = $_POST['awalp'];
    $akhirp = $_POST['akhirp'];
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $banyak = $_POST["banyak"];

    $awalP  = strtotime($awalp);
    $akhirP  = strtotime($akhirp);
    $nawal = date('Y-m-d',$awalP);
    $nakhir = date('Y-m-d',$akhirP);

    $query3 = "SELECT * FROM KUPON where status_kupon = 1 ";
    $list = $conn->query($query3);
    $kembar = false;
    foreach($list as $key=>$data){
       if($id != $data['id_kupon']){
            $tmpnama = $data['nama_kupon'];
            if($namkupon == $tmpnama ){
                $kembar = true;
            }
            if($menu == $data['id_menu']){
                $kembar = true;

            }
            
        }
    }
    if($kembar){
        echo "Data Kembar!";
    }else{
        $query = "UPDATE kupon SET nama_kupon ='$namkupon',periode_awal_kupon= '$nawal', periode_akhir_kupon = '$nakhir', id_menu = '$menu', harga_kupon = $harga, sisa_kupon =$banyak WHERE id_kupon = '$id'";
        if(mysqli_query($conn,$query) == true){
            echo $id." -- Berhasil Meng-update Data";
        } else {
            echo "Tidak Berhasil Meng-update Data";
        }   
            
    }
    
?>