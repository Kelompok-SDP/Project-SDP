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
            echo "<th>Nama Menu</th>";
                echo "<th>Harga Menu</th>";
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
                $angka = $value["subtotal"];
                $hasil_rupiah2 = "Rp " . number_format($angka,2,',','.');
                echo "<td>$hasil_rupiah2</td>";
                $stotal = $stotal + $value["subtotal"];
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
