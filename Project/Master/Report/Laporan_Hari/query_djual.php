<?php
    include("../../../config.php");
    $id=$_REQUEST["id"];
    $query="SELECT * from djual where id_hjual='$id'";
    $htrans= mysqli_query($conn,$query);
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
                echo "<td>$value[harga]</td>";
                echo "<td>$value[jumlah]</td>";
                echo "<td>$value[subtotal]</td>";
            echo "</tr>";
        }
    echo "</table>";
?>