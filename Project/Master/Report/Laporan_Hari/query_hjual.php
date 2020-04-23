<?php
    include("../../../config.php");
    $date=$_POST["date"];
    $total = 0;
    $totalangka = 0;
    $query = "SELECT * FROM HJUAL where tanggal_transaksi='$date'";
    $htrans= mysqli_query($conn,$query);
    $row = mysqli_num_rows($htrans);
    echo "<br>";
    echo "<br>";
    if($row > 0){
        foreach ($htrans as $key => $value3) {
            $total = $total + $value3["total"];
        }
        $totalangka = $total;
        $hasil_rupiah2 = "Rp " . number_format($totalangka,2,',','.');
        echo "<h4>Total Pendapatan : $hasil_rupiah2</h4>";
        
    echo "<table class='table table-bordered text-nowrap' style='margin-top:5vh;'>";
            echo "<thead>";
                echo "<th>Tanggal Transaksi</th>";
                echo "<th>Total Penjualan</th>";
                echo "<th>Jenis Pemesanan</th>";
                echo "<th>Nama Pegawai</th>";
                echo "<th>Lihat Detail</th>";
            echo "</thead>";
        foreach ($htrans as $key => $value) {
            $id = $value["id_pegawai"];
            echo "<tr>";
            echo "<td>$value[tanggal_transaksi]</td>";
            $angka = $value["total"];
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            echo "<td>$hasil_rupiah</td>";
            echo "<td>$value[jenis_pemesanan]</td>";
            $query2 = "SELECT * FROM PEGAWAI WHERE ID_PEGAWAI = '$id'";
            $hasil = mysqli_query($conn,$query2);
            $row2 = mysqli_num_rows($hasil);
            if($row2 > 0){
                foreach ($hasil as $key => $value2) {
                    echo "<td>$value2[nama]</td>";
                }
            }
            echo "<td><button onclick='detail(\"$value[id_hjual]\")'class='btn btn-primary'>Lihat Detail <i class='fas fa-angle-right' style='padding-left:12px;color:white;'></i></button></td>";
            echo "</tr>";
        }
    echo "</table>";
    }else{
        echo "<p style='margin-left:25vw;color:grey; font-style:italic;'>Tidak ada hasil record</p>";
        echo "<h4>Total Pendapatan : -</h4>";
    }
    
?>
<script>
    function detail(id){
        $.ajax({
            method: "post",
            url: "Report/Laporan_Hari/query_djual.php",
            data: {
                id:id
            },
            success: function (response) {
                $("#tampung2").html(response);
            }
        });
    }
</script>