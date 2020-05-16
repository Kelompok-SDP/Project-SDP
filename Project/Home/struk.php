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
    $keterangan=explode("||",$cmd["keterangan"]);
    
    $alamat=          explode(":",$keterangan[0]);
    $waktu=           explode(":",$keterangan[1]);
    $hari=            explode(":",$keterangan[2]);
    $keterangan_meja= explode(":",$keterangan[3]);
    $detail_meja=     explode(":",$keterangan[4]);
    $discount=        explode(":",$keterangan[5]);
    $promo=           explode(":",$keterangan[6]);
    $jenis=           explode(":",$keterangan[7]);

    // echo $alamat[1]."<br>".$waktu[1]."<br>".$hari[1]."<br>".$keterangan_meja[1]."<br>".$detail_meja[1]."<br>".$discount[1]."<br>".$promo[1]."<br>".$jenis[1];

    echo "<div style='width:30% ; height:100%; border:1px solid black; padding:10px;'>";
    echo "<img src='MCD/logo.png' style='width:4%;height:4%;position: absolute;
    top: 20px;
    left: 20px;'>";
    echo "<div style='width:96%;text-align:center; font-weight:bold;float:left;font-size:14pt;'>Uwenak Resto </div>
    ";
    echo "<div style='width:96%;text-align:center; font-weight:bold;float:left;font-size:10pt;'>Surabaya</div>";
    echo "<div style='width:96%;text-align:center; font-weight:bold;float:left;font-size:10pt;'>No-Tlp: 081111111111  Alamat : Jl Hayam Wuruk</div>";
    echo "<hr style='border-top: 1px dashed black;margin-top:60px; margin-bottom:20px;'>";
    echo "<hr style='border-top: 1px dashed black;margin-top:10px; margin-bottom:10px;'>";

    echo"No Transaksi: $id_htrans<br>";
    echo"Tanggal Pembelian : $tanggal";

    if($keterangan_meja=="ada"){
        echo"Jumlah Meja : $jumlah_meja<br>";
        $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
        echo "Nomor Meja : ".$kursi."<br>";
    }
    echo "<hr style='border-top: 1px dashed black;margin-top:20px; margin-bottom:20px;'>";

    echo"<table style='width:100%;' >
    ";echo"    <thead>
    ";echo"        <th>No</th>
    ";echo"        <th>Nama Menu</th>
    ";echo"        <th>Qty</th>
    ";echo"        <th>Harga</th>
    ";echo"        <th>Total</th>
    ";echo"    </thead>";

    $djual=mysqli_query($conn,"SELECT * from djual where id_hjual='$id_htrans'");

    $grandtotal=0;
    $ctr=0;
    foreach ($djual as $key => $value) {

        $jumlah=$value["jumlah"];

        if(substr($value["id_menu"],0,2)=="ME"){
            $query = "select *  from menu where id_menu = '$value[id_menu]'";
            $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
            $nama = $menu["nama_menu"];
            $harga = $menu['harga_menu'];

        } else{
            $query = "select *  from paket where id_paket = '$value[id_menu]'";
            $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
            $nama = $menu["nama_paket"];
            $harga = $menu['harga_paket'];
        }
        $total_string="Rp " . number_format($harga,2,',','.');
        $harga_string="Rp " . number_format($harga,2,',','.');
        $grandtotal_string="Rp " . number_format($harga*$jumlah,2,',','.');

        $grandtotal+=$harga*$jumlah;
        
        $ctr++;

        echo"<tbody>";
            echo"<tr>
            ";echo"    <td>$ctr</td>
            ";echo"    <td style='text-align:center;'>$nama</td>
            ";echo"    <td style='padding-left:12px;'>$jumlah</td>
            ";echo"    <td>$harga_string</td>
            ";echo"    <td>$grandtotal_string</td>
            ";echo"</tr>";
        echo"</tbody>";
      

            
        

    }
    echo"</table>";
    echo "<br>";
            $grandtotal_string="Rp " . number_format($grandtotal,2,',','.');
            $ongkir_string="Rp " . number_format($ongkir,2,',','.');
            $discount_string="Rp " . number_format($discount[1],2,',','.');
            $promo_string="Rp " . number_format($promo[1],2,',','.');
            $total_string="Rp " . number_format($grandtotal-$promo[1]+$ongkir-$discount[1],2,',','.');
            
            echo"   <div > <div style='float:left;width:60%;'>Total Bayar</div>
            ";echo"    <div style='float:right;margin-right:9%'>$grandtotal_string</div></div>
            ";
            echo"   <div> <div style='width:60%;float:left'>Discount Menu</div>
            ";echo"    <div style='float:right;margin-right:9%'>$discount_string </div></div>
            ";
            echo"    <div><div style='width:60%;float:left'>Ongkir Menu</div>
            ";echo"    <div style='float:right;margin-right:9%'>$ongkir_string </div></div>
            ";
            echo "<div style='width:100%'>";
            echo "<br>";
            echo "<div style='float:left;width:100%;'>-----------------------------------------------------------------------------</div>";
            
    
            echo"   <div> <div style='width:60%;float:left'>Grandtotal Menu</div>
            ";echo"    <div style='float:right;margin-right:9%'>$total_string </div></div>
            ";
    echo "</div>";
?>
