<?php
    include("../../../config.php");
    $id=$_POST["id"];
    $query="SELECT d.id_djual,m.nama_menu,d.harga,d.jumlah,d.subtotal from djual d join menu m on m.id_menu = d.id_menu where id_hjual='$id' ";

    $htrans= mysqli_query($conn,$query);
    echo "<table border='1'>";
            echo "<thead>";
                echo "<th>Id Djual</th>";
                echo "<th>Nama Menu</th>";
                echo "<th>Harga Menu</th>";
                echo "<th>Jumlah Yang Dipesan</th>";
                echo "<th>Subtotal</th>";
            echo "</thead>";
        foreach ($htrans as $key => $value) {
            echo "<tr>";
                echo "<td>$value[id_djual]</td>";
                echo "<td>$value[nama_menu]</td>";
                echo "<td>$value[harga]</td>";
                echo "<td>$value[jumlah]</td>";
                echo "<td>$value[subtotal]</td>";
            echo "</tr>";
        }
    echo "</table>";
?>