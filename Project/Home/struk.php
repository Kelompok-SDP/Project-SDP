<?php
    include("../config.php");
    $tanggal=date("d-M-Y");

    $id_htrans= $_GET["htrans"];
    $query="SELECT * from hjual where id_hjual='$id_htrans'";
    $cmd=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $jenis_pemesanan=$cmd["jenis_pemesanan"];
    $ongkir=0;
    if($jenis_pemesanan=="Delivery"){
        $ongkir=15000;
    }
    $namakupon = "Kupon : -";
    $keterangan=explode("||",$cmd["keterangan"]);
    
    $alamat=          explode(":",$keterangan[0]);
    $waktu=           explode(":",$keterangan[1]);
    $hari=            explode(":",$keterangan[2]);
    $keterangan_meja= explode(":",$keterangan[3]);
    $detail_meja=     explode(":",$keterangan[4]);
    $discount=        explode(":",$keterangan[5]);
    $jenis=           explode(":",$keterangan[6]);
    $hargadiscarr = explode(":",$keterangan[8]);
    $idmenuarr = $keterangan[9];
    $ketkupon = explode(":",$keterangan[10]);
    
    $hargakupon = $keterangan[11];
    $banyak_orang = explode(":",$keterangan[12]);

    
    //$idkupon = explode(",",$ketkupon[1]);
    $idmenupromo =  explode(",",$idmenuarr);
    $hargapromo =  explode(",",$hargadiscarr[1]);

        
        $query = "select nama_kupon as nama from kupon where id_kupon = '$ketkupon[1]' ";
        $rs = mysqli_query($conn,$query);
        foreach($rs as $key=>$data){
            $namakupon = "Kupon : ".   $data['nama'];    
         }
    
    // echo $alamat[1]."<br>".$waktu[1]."<br>".$hari[1]."<br>".$keterangan_meja[1]."<br>".$detail_meja[1]."<br>".$discount[1]."<br>".$promo[1]."<br>".$jenis[1];

    echo "<div style='width:40% ; height:100%; border:1px solid black; padding:10px;'>";
    echo "<img src='MCD/logo.png' style='width:6%;height:8%;position: absolute;
    top: 20px;
    left: 20px;'>";
    echo "<div style='width:94%;text-align:center; font-weight:bold;float:left;font-size:14pt;'>Uwenak Resto </div>
    ";
    echo "<div style='width:94%;text-align:center; font-weight:bold;float:left;font-size:10pt;'>Surabaya</div>";
    echo "<div style='width:94%;text-align:center; font-weight:bold;float:left;font-size:10pt;'>No-Tlp: 081111111111  Alamat : Jl Hayam Wuruk</div>";
    echo "<hr style='border-top: 1px dashed black;margin-top:80px; margin-bottom:20px;'>";
    echo "<hr style='border-top: 1px dashed black;margin-top:10px; margin-bottom:10px;'>";

    echo"No Transaksi: $id_htrans<br>";
    echo"Tanggal Pembelian : $tanggal<br>";
    echo $namakupon;
    if($keterangan_meja[1]=="ada"){
        echo"Jumlah Meja : $jumlah_meja<br>";
        $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
        echo "Banyak Orang : ".$banyak_orang."<br>";

    }
    echo "<hr style='border-top: 1px dashed black;margin-top:20px; margin-bottom:20px;'>";

    echo "<div style='width:5%;font-weight:bold; font-size:12pt;float:left'>No</div>";
    echo "<div style='width:35%;font-weight:bold; font-size:12pt;float:left'>Nama Menu</div>";
    echo "<div style='width:10%;font-weight:bold; font-size:12pt;float:left'>Qty</div>";
    echo "<div style='width:25%;font-weight:bold; font-size:12pt;float:left;'>Harga</div>";
    echo "<div style='width:25%;font-weight:bold; font-size:12pt;float:left'>Total</div>";

    $djual=mysqli_query($conn,"SELECT * from djual where id_hjual='$id_htrans'");

    $grandtotal=0;
    $ctr=0;
   // $ada =false;
    $hargabarupromo ="";
    $hagrapromoint =0;

    foreach ($djual as $key => $value) {
        $ada = false;
        $jumlah=$value["jumlah"];
        $tmtampung =0;

        if(substr($value["id_menu"],0,2)=="ME"){
            $query = "select *  from menu where id_menu = '$value[id_menu]'";
            $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
            $nama = $menu["nama_menu"];
            $harga = $menu['harga_menu'];
           

            if(count($hargapromo) >0){
                for ($i=0; $i < count($hargapromo); $i++) { 
                    if($menu["id_menu"] == $idmenupromo[$i]){
                        $ada = true;
                        $tmtampung = $i;
                    }

                }
                if($hargapromo[$tmtampung] != ''){
                    $hargabarupromo = "Rp " . number_format($hargapromo[$tmtampung],2,',','.');
                            $hagrapromoint = $hargapromo[$tmtampung];
                    }
            }

        } else{
           $query = "select *  from paket where id_paket = '$value[id_menu]'";
            $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
            $nama = $menu["nama_paket"];
            $harga = $menu['harga_paket'];
            if(count($hargapromo) >0){
                for ($i=0; $i < count($hargapromo); $i++) { 
                    if($menu["id_paket"] == $idmenupromo[$i]){
                        $ada = true;
                        $tmtampung = $i;
                        
                    }
                }

                if($hargapromo[$tmtampung] != ''){
                    $hargabarupromo = "Rp " . number_format($hargapromo[$tmtampung],2,',','.');
                            $hagrapromoint = $hargapromo[$tmtampung];
                    }
            }
           
        }
        $total_string="Rp " . number_format($harga,2,',','.');
        $harga_string="Rp " . number_format($harga,2,',','.');
        if($ada == true ){
            $grandtotal_string="Rp " . number_format($hagrapromoint*$jumlah,2,',','.');

            $grandtotal +=$hagrapromoint*$jumlah;
        }else{
            $grandtotal_string="Rp " . number_format($harga*$jumlah,2,',','.');

            $grandtotal+=$harga*$jumlah;

        }   
       
       
        $ctr++;
       
        // echo"<tbody>";
        //     echo"<tr>
        //     ";echo"    <td>$ctr</td>
        //     ";echo"    <td style='text-align:center;'>$nama</td>
        //     ";echo"    <td style='padding-left:12px;'>$jumlah</td>
        //     ";echo"    <td>$harga_string</td>
        //     ";echo"    <td>$grandtotal_string</td>
        //     ";echo"</tr>";
        // echo"</tbody>";

      
         if($ada == true ){

            echo "<div style='width:100%; float:left;'>";
            echo "<div style='width:5%; font-size:12pt;float:left'>$ctr</div>";
            echo "<div style='width:35%; font-size:12pt;float:left'>$nama</div>";
            echo "<div style='width:10%; font-size:12pt;float:left'>$jumlah</div>";
            echo "<div style='width:25%; font-size:12pt;float:left; text-decoration:line-through; '>$harga_string</div>";
            echo "<div style='width:25%; font-size:12pt;float:left; '></div>";

            echo "</div>";
            echo "<div style='width:100%; float:left;'><div style='width:50%; font-size:12pt;float:left;'></div>";
           
            echo "<div style='width:25%; font-size:12pt;float:right'>$grandtotal_string</div>";
            echo "<div style='width:25%; font-size:12pt;float:right'>$hargabarupromo</div></div>";


        }else{
            echo "<div style='width:5%; font-size:12pt;float:left'>$ctr</div>";
            echo "<div style='width:35%; font-size:12pt;float:left'>$nama</div>";
            echo "<div style='width:10%; font-size:12pt;float:left'>$jumlah</div>";
            echo "<div style='width:25%; font-size:12pt;float:left'>$harga_string</div>";
            echo "<div style='width:25%; font-size:12pt;float:left;'>$grandtotal_string</div>";
        
        }

            
        
       
    }
    // echo"</table>";
    echo "<div style='float:right;width:100%;'>----------------------------------------------------------------------------------------------------------------</div>";
   
            $grandtotal_string= number_format($grandtotal,2,',','.');
            $ongkir_string=number_format($ongkir,2,',','.');
            $discount_string= number_format($discount[1],2,',','.');
            $promo_string= number_format($hargakupon,2,',','.');
            $total_string= number_format($grandtotal-$hargakupon+$ongkir-$discount[1],2,',','.');
            
            echo"   <div style='width:100%; '> <div style='float:left;width:75%;;font-weight:bold'>Total Bayar</div>";
            echo"    <div style='float:left;width:5%'>Rp </div>";
            echo"    <div style='float:left;width:20%'>$grandtotal_string</div></div>";


            echo"   <div style='width:100%; margin-top:30px;'> <div style='float:left;width:70%;;font-weight:bold'> Discount Menu</div>";
            echo"    <div style='float:left;width:5%;text-align:right;'>- </div>";

            echo"    <div style='float:left;width:5%'>Rp </div>";
            echo"    <div style='float:left;width:20%'> $discount_string </div></div>
            ";


            echo"   <div style='width:100%; margin-top:30px;'> <div style='float:left;width:70%;;font-weight:bold'> Promo Menu</div>";
            echo"    <div style='float:left;width:5%;text-align:right;'>- </div>";

            echo"    <div style='float:left;width:5%'>Rp </div>";
            echo"    <div style='float:left;width:20%'>  $promo_string </div></div>
            ";


            echo"   <div style='width:100%; margin-top:30px;'> <div style='float:left;width:75%;;font-weight:bold'>Ongkir Menu</div>";

            echo"    <div style='float:left;width:5%'>Rp </div>";
            echo"    <div style='float:left;width:20%'>  $ongkir_string </div></div>
            ";

            echo "<div style='width:100%'>";
            echo "<br>";
            echo "<div style='float:left;width:100%;'>----------------------------------------------------------------------------------------------------------------</div>";
            
    
            echo"   <div style='width:100%; margin-top:30px;'> <div style='float:left;width:75%;;font-weight:bold'>Grandtotal</div>";

            echo"    <div style='float:left;width:5%'>Rp </div>";
            echo"    <div style='float:left;width:20%'>  $total_string </div></div>
            ";
            echo "<div style='float:right;width:100%;'>----------------------------------------------------------------------------------------------------------------</div>";
            echo "<div style='width:100%; font-weight:bold; font-size:16pt;text-align:center'>-- SUWUN --</div>";
            echo "<div style='float:right;width:100%;'>----------------------------------------------------------------------------------------------------------------</div>";

    echo "</div>";
?>
