<?php
    require_once("../../config.php");
    
    $id = $_POST['id'];
    $npaket = $_POST['npaket'];
    $hpaket = $_POST['hpaket'];
    $kpaket = $_POST['kpaket'];
    $mpaket = $_POST['mpaket'];
    $mpaket2 = $_POST['mpaket2'];
    $ppaket = $_POST['ppaket'];
    $prepromo = $_POST['prepromo'];
    $kembar2 = false;

    if($prepromo != ""){
        echo "Tidak dapat Meng-update Harga karena Promo Sedang Berlangsung";
    }else{
        if($ppaket != ""){
            $query = "SELECT * FROM PROMO WHERE ID_PROMO = '$ppaket'";
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
                    $query = "UPDATE PAKET SET NAMA_paket ='$npaket', HARGA_paket ='$hpaket', ID_KATEGORI = '$kpaket', ID_PROMO = '$ppaket' WHERE id_paket = '$id'";
                    $query2 = "DELETE FROM PAKET_MENU WHERE ID_PAKET = '$id'"; 
                    $query3 = "INSERT INTO PAKET_MENU VALUES('$id','$mpaket')";
                    $query4 = "INSERT INTO PAKET_MENU VALUES('$id','$mpaket2')";

                    $tharga = [10,15,20,25,40,50];
                    $rand = rand(0,5);
                    $persen = round($hpaket * $tharga[$rand] / 100);
                    $hpromo = $hpaket - $persen;
                    $query5 = "DELETE FROM PROMO_PAKET WHERE ID_PROMO = '$ppaket' AND ID_PAKET = '$id'";
                    $conn->query($query5);
                    $query5 = "INSERT INTO PROMO_PAKET VALUES('$ppaket','$id',$hpromo)";
                    $conn->query($query6);

                    if(mysqli_query($conn,$query) == true && mysqli_query($conn,$query2) == true && mysqli_query($conn,$query3) == true && mysqli_query($conn,$query4) == true){
                        echo $id." -- Berhasil Meng-update Data";
                    } else {
                        echo "Tidak Berhasil Meng-update Data";
                    }   
                }
            }else{
                echo "Menu Kembar, Tidak Berhasil Meng-update Data";
            }
        }else{
            $query = "UPDATE PAKET SET NAMA_paket ='$npaket', HARGA_paket ='$hpaket', ID_KATEGORI = '$kpaket', ID_PROMO = '$ppaket' WHERE id_paket = '$id'";
            $query2 = "DELETE FROM PAKET_MENU WHERE ID_PAKET = '$id'"; 
            $query3 = "INSERT INTO PAKET_MENU VALUES('$id','$mpaket')";
            $query4 = "INSERT INTO PAKET_MENU VALUES('$id','$mpaket2')";

            if(mysqli_query($conn,$query) == true && mysqli_query($conn,$query2) == true && mysqli_query($conn,$query3) == true && mysqli_query($conn,$query4) == true){
                echo $id." -- Berhasil Meng-update Data";
            } else {
                echo "Tidak Berhasil Meng-update Data";
            }   
        }
    }
?>