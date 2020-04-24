<?php
    include("../../../config.php");
    $month=$_POST["month"];
    $query="SELECT jenis_pemesanan as jenis, count(jenis_pemesanan) as jumlah, sum(total) as total from hjual where tanggal_transaksi like '%$month%' group by jenis_pemesanan";
    $htrans= mysqli_query($conn,$query);
    $row = mysqli_num_rows($htrans);
    if($row > 0){
        foreach ($htrans as $key => $value) {
            $tmp[$value["jenis"]] = $value["jumlah"];   
            $tmp2[$value["jenis"]] = $value["total"]; 
        }   
        echo "<table class='table table-bordered text-nowrap' style='margin-top:5vh;'>";
                echo "<thead>";
                    echo "<th>No.</th>";
                    echo "<th>Jenis Pemesanan</th>";
                    echo "<th>Jumlah Transaksi</th>";
                    echo "<th>Total</th>";
                echo "</thead>";
        $nomor = 0;
        $ctr = 0;
        arsort($tmp);
        foreach ($tmp as $key => $value5) {
            foreach ($tmp2 as $key2 => $value6) {
                if($key2 == $key){
                    $nomor = $nomor + 1;
                    echo "<tr>";
                        echo "<td>$nomor</td>";
                        echo "<td>$key2</td>";
                        echo "<td>$value5</td>";
                        $angka = $value6;
                        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                        echo "<td>$hasil_rupiah</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    }else{
        echo "<p style='margin-left:25vw;color:grey; font-style:italic;'>Tidak ada hasil record</p>";
    }

