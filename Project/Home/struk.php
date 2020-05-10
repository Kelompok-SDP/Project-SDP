<?php
    include("../config.php");
    $tanggal=date("d-M-Y");
    $query="SELECT lpad(max(substr(id_hjual,-3,3))+1,3,0) as \"id\"  from hjual";
    $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $id_htrans= "H".$query["id"];
    $jumlah_meja=$_SESSION["ctr"];

    echo "<div style='width:30%'>";
    echo "Uwenak Resto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$tanggal."<br>";
    echo "Surabaya<br>";
    echo "081111111111 <br><br>";


    echo"No Transaksi: $id_htrans<br>";
    if($jumlah_meja>0){
        echo"Jumlah Meja : $jumlah_meja<br>";
        $kursi=substr($_SESSION["isi_kursi"],0,strlen($_SESSION["isi_kursi"])-2);
        echo "Nomor Meja : ".$kursi."<br>";
    }
    
    echo"<table >
    ";echo"    <thead>
    ";echo"        <th>No</th>
    ";echo"        <th>Nama Menu</th>
    ";echo"        <th>Qty</th>
    ";echo"        <th>Harga</th>
    ";echo"        <th>Total</th>
    ";echo"    </thead>";
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    $gt=0;
    $jum_qrt=0;
    foreach ($arrMenu as $key => $value) {

        if($ctr<count($arrMenu)-1){
            $jumlah=$_SESSION["pilih_menu"][$value];
            $jum_qrt+=$jumlah_meja;
            $nama = "";
            $deskripsi = "";
            if(substr($value,0,2)=="ME"){
                $query = "select *  from menu where id_menu = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $nama = $menu["nama_menu"];
                $harga = $menu['harga_menu'];

            } else{
                $query = "select *  from paket where id_paket = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $nama = $menu["nama_paket"];
                $harga = $menu['harga_paket'];

            }
            $total="Rp " . number_format($harga,2,',','.');
            $hargas="Rp " . number_format($harga,2,',','.');
            $grandtotal="Rp " . number_format($harga*$jumlah,2,',','.');
            $gt+=$harga*$jumlah;
            $ctr++;
                echo"<tbody>";
                    echo"<tr>
                    ";echo"    <td>$ctr</td>
                    ";echo"    <td>$nama</td>
                    ";echo"    <td>$jumlah</td>
                    ";echo"    <td>$hargas</td>
                    ";echo"    <td>$grandtotal</td>
                    ";echo"</tr>";
                echo"</tbody>";

            
        }

    }
    echo"</table>";
            $grandtotal="Rp " . number_format($gt,2,',','.');
            echo"    <div style='float:left'>Total Bayar</div>
            ";echo"    <div style='float:right;margin-right:20%'>$grandtotal</div>
            ";
            echo"    <div style='clear:both;float:left'>Total Menu</div>
            ";echo"    <div style='float:right;margin-right:20%'>$jum_qrt Item</div>
            ";
    echo "</div>";
?>
