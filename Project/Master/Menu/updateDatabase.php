<?php
    require_once("../../config.php");
    
    $prepromo = "";
    $id = $_POST['id'];
    $nmenu  = $_POST['nmenu'];
    $hmenu  = $_POST['hmenu'];
    $kmenu  = $_POST['kmenu'];
    $pmenu  = $_POST['pmenu'];
    $dmenu  = $_POST['dmenu'];
    $prepromo = $_POST['prepromo'];
    $kembar2 = false;
    
    if($prepromo != ""){
        echo "Tidak dapat Meng-update Harga karena Promo Sedang Berlangsung";
    }else{
        if($pmenu != ""){
            $query = "SELECT * FROM PROMO WHERE ID_PROMO = '$pmenu'";
            $list = mysqli_query($conn,$query);
            foreach ($list as $key => $value) {
                $stat = $value["status_promo"];
            }
            $query3 = "SELECT * FROM PROMO_PAKET";
            $list = $conn->query($query3);
            foreach($list as $key=>$data){
                $tmpnama = $data['id_paket'];
                if($id == $tmpnama){
                    $kembar2 = true;
                }
            }
            if(!$kembar2){
                if($stat == 0 || ($stat == 1 && $prepromo == "")){
                    $query = "UPDATE MENU SET NAMA_MENU ='$nmenu', HARGA_MENU ='$hmenu', DESKRIPSI = '$dmenu', ID_KATEGORI = '$kmenu' WHERE id_menu = '$id'";
                    $tharga = [10,15,20,25,40,50];
                    $rand = rand(0,5);
                    $persen = round($hmenu * $tharga[$rand] / 100);
                    $hpromo = $hmenu - $persen;
                    $query5 = "DELETE FROM PROMO_PAKET WHERE ID_PROMO = '$pmenu' AND ID_PAKET = '$id'";
                    $conn->query($query5);
                    $query6 = "INSERT INTO PROMO_PAKET VALUES('$pmenu','$id',$hpromo)";
                    $conn->query($query6);
                    if(mysqli_query($conn,$query) == true){
                        echo $id." -- Berhasil Meng-update Data";
                    } else {
                        echo "Tidak Berhasil Meng-update Data";
                    }   
                }
            }else{
                echo "Menu Kembar, Tidak Berhasil Meng-update Data";
            }

        }else{
            $query = "UPDATE MENU SET NAMA_MENU ='$nmenu', HARGA_MENU ='$hmenu', DESKRIPSI = '$dmenu', ID_KATEGORI = '$kmenu' WHERE id_menu = '$id'";
            if(mysqli_query($conn,$query) == true){
                echo $id." -- Berhasil Meng-update Data";
            } else {
                echo "Tidak Berhasil Meng-update Data";
            }   
        }
    }
    
?>