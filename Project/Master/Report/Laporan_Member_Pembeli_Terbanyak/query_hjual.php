<?php
    include("../../../config.php");
    $month=$_POST["month"];
    $query = "SELECT SUM(TOTAL) AS TOTAL, COUNT(ID_MEMBER) AS JUMLAH, ID_MEMBER AS ID FROM HJUAL WHERE TANGGAL_TRANSAKSI like '%$month%' GROUP BY ID_MEMBER";
    $htrans= mysqli_query($conn,$query);
    $row = mysqli_num_rows($htrans);
    if($row > 0){
        foreach ($htrans as $key => $value) {
            $tmp[$value["ID"]] = $value["JUMLAH"];   
            $tmp2[$value["ID"]] = $value["TOTAL"]; 
            
        }   
        echo "<table class='table table-bordered text-nowrap' style='margin-top:5vh;'>";
                echo "<thead>";
                    echo "<th>No.</th>";
                    echo "<th>Nama Member</th>";
                    echo "<th>Total</th>";
                echo "</thead>";
        $nomor = 0;
        $ctr = 0;
        $batas = floor(count($tmp) / 2);
        arsort($tmp);
        foreach ($tmp as $key => $value5) {
            foreach ($tmp2 as $key2 => $value6) {
                if($ctr < $batas){
                    if($key2 == $key){
                        $tmp3[$key2] = $value6;
                            $ctr = $ctr + 1;
                            $query3 = "SELECT * FROM MEMBER WHERE ID_MEMBER = '$key2'";
                            $member = mysqli_query($conn,$query3);
                            foreach ($member as $key => $value) {
                                $nomor = $nomor + 1;
                                echo "<tr>";
                                    echo "<td>$nomor</td>";
                                    echo "<td>$value[fullname]</td>";
                                    $angka = $value6;
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    echo "<td>$hasil_rupiah</td>";
                                echo "</tr>";
                            }
                        
                    }
                }
            }
        }
        echo "</table>";
    }else{
        echo "<p style='margin-left:25vw;color:grey; font-style:italic;'>Tidak ada hasil record</p>";
    }
?>
