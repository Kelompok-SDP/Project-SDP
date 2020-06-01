<?php
    include("../../../config.php");
    $id = $_REQUEST["id"];
    if($id == ""){
        $id = "";
    }
    $stotal = 0;
    $query="SELECT * from djual where id_hjual='$id'";
    $htrans= mysqli_query($conn,$query);
    $row = mysqli_num_rows($htrans);
    if($row > 0){
    echo "<h3><center>Detail</center></h3>";
    echo "<table class='table table-bordered text-nowrap'>";
            echo "<thead>";
            echo "<th>Nama Menu / Paket</th>";
                echo "<th>Harga Menu/ Paket</th>";
                echo "<th>Jumlah Yang Dipesan</th>";
                echo "<th>Subtotal</th>";
            echo "</thead>";
            foreach ($htrans as $key => $value) {
                echo "<tr>";
                $query2 = "SELECT * FROM MENU WHERE ID_MENU = '$value[id_menu]'";
                $hasil = mysqli_query($conn,$query2);
                foreach ($hasil as $key => $value2) {
                    echo "<td>$value2[nama_menu]</td>";
                }
                $angka = $value["harga"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                echo "<td>$hasil_rupiah</td>";
                echo "<td>$value[jumlah]</td>";
                $hasil_rupiah2 = "Rp " . number_format($angka * $value["jumlah"],2,',','.');
                echo "<td>$hasil_rupiah2</td>";
                $sub = $angka * $value["jumlah"];
                $stotal = $stotal + $sub;
                echo "</tr>";
            }else{
                $query2 = "SELECT * FROM PAKET WHERE ID_PAKET = '$value[id_menu]'";
                $hasil = mysqli_query($conn,$query2);
                foreach ($hasil as $key => $value2) {
                    $ids = $value2["id_paket"];
                    echo "<td>$value2[nama_paket]</td>";
                    $query3 = "SELECT * FROM PROMO_PAKET WHERE ID_PAKET = '$ids'";
                    $list = mysqli_query($conn,$query3);
                    $row  = mysqli_num_rows($list);
                    if($row > 0){
                        foreach ($list as $key => $value3) {
                            $angka = $value3["harga_promo_paket"];
                        }
                    }else{
                        $angka = $value["harga"];
                    }
                    
                }
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                echo "<td>$hasil_rupiah</td>";
                echo "<td>$value[jumlah]</td>";
                $hasil_rupiah2 = "Rp " . number_format($angka * $value["jumlah"],2,',','.');
                echo "<td>$hasil_rupiah2</td>";
                $sub = $angka * $value["jumlah"];
                $stotal = $stotal + $sub;
                echo "</tr>";
            }
            echo "<tr>";
                echo "<td colspan = '3'><b>Subtotal Pendapatan</b></td>";
                $angka = $stotal;
                $hasil_rupiah3 = "Rp " . number_format($stotal,2,',','.');
                echo "<td><b>$hasil_rupiah3</b></td>";
            echo "</tr>";
    echo "</table>";
    }
?>