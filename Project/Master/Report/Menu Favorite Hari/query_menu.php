<?php
    include("../../../config.php");
    $date=$_POST["date"];
    $query="SELECT m.gambar,m.nama_menu,count(d.id_menu) as \"jumlah\" from hjual h join djual d on h.id_hjual=d.id_hjual join menu m on m.id_menu=d.id_menu where month(tanggal_transaksi)=month('$date') group by m.nama_menu,mgambar";
    echo $query;
    $htrans= mysqli_query($conn,$query);
    echo "<table border='1'>";
            echo "<thead>";
                echo "<th>Gambar</th>";
                echo "<th>Nama Menu</th>";
                echo "<th>Jumlah</th>";
            echo "</thead>";
        foreach ($htrans as $key => $value) {
            echo "<tr>";
                echo "<td><img src='../../menu/$value[gambar]' alt='' style='max-width:100px;max-height:100px'></td>";
                echo "<td>$value[nama_menu]</td>";
                echo "<td>$value[jumlah]</td>";
            echo "</tr>";
        }
    echo "</table>";
?>
