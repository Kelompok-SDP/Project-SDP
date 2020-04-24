<?php
    include("../../../config.php");
    $date=$_POST["date"];
    $query = "SELECT * FROM HJUAL WHERE TANGGAL_TRANSAKSI = '$date'";
    $htrans= mysqli_query($conn,$query);
    $row = mysqli_num_rows($htrans);
    if($row > 0){
        foreach ($htrans as $key => $value) {
            $id = $value["id_hjual"];
            $query2 = "SELECT SUM(jumlah) as jumlahmenu, COUNT(ID_MENU) as jumlah2, id_menu as id FROM DJUAL WHERE ID_HJUAL = '$id'";
            $dtrans= mysqli_query($conn,$query2);
            foreach ($dtrans as $key => $value2) {
                $tmp[] = $value2["jumlahmenu"];
                $tmp2[] = $value2["id"];       
                $tmp3[] = $value2["jumlah2"];       
            }      
        }
        $mak = max($tmp);
        $idx = 0;
        for ($i=0; $i < count($tmp); $i++) { 
            if($tmp[$i] == $mak){
                $idx = $i;
            }
        }
        $nomor = 0;
        $idm = $tmp2[$idx];
        $query3 = "SELECT * FROM MENU WHERE ID_MENU = '$idm'";
        $menu = mysqli_query($conn,$query3);
        echo "<table class='table table-bordered text-nowrap' style='margin-top:5vh;'>";
            echo "<thead>";
                echo "<th>No.</th>";
                echo "<th>Gambar</th>";
                echo "<th>Nama Menu</th>";
                echo "<th>Jumlah Dipesan</th>";
                echo "<th>Total Pesanan</th>";
            echo "</thead>";
            foreach ($menu as $key => $value3) {
                $nomor = $nomor + 1;
                echo "<tr>";
                    echo "<td>$nomor</td>";
                    echo "<td><img src='Menu/$value3[gambar]' alt='' style='max-width:100px;max-height:100px'></td>";
                    echo "<td>$value3[nama_menu]</td>";
                    echo "<td>$tmp3[$idx]</td>";
                    echo "<td>$tmp[$idx]</td>";
                echo "</tr>";
            }
        echo "</table>";
    }else{
        echo "<p style='margin-left:25vw;color:grey; font-style:italic;'>Tidak ada hasil record</p>";
    }
?>
