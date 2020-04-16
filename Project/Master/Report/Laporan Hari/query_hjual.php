<?php
    include("../../../config.php");
    $date=$_POST["date"];
    $query="SELECT h.id_hjual,h.tanggal_transaksi,h.total,h.jenis_pemesanan,p.nama from hjual h join pegawai p on h.id_pegawai=p.id_pegawai where tanggal_transaksi=date('$date')";
    $htrans= mysqli_query($conn,$query);
    echo "<table border='1'>";
            echo "<thead>";
                echo "<th>Id Hjual</th>";
                echo "<th>Tanggal Transaksi</th>";
                echo "<th>Total Penjualan</th>";
                echo "<th>Jenis Pemesanan</th>";
                echo "<th>Nama Pegawai</th>";
                echo "<th>Lihat Detail</th>";
            echo "</thead>";
        foreach ($htrans as $key => $value) {
            echo "<tr>";
                echo "<td>$value[id_hjual]</td>";
                echo "<td>$value[tanggal_transaksi]</td>";
                echo "<td>$value[total]</td>";
                echo "<td>$value[jenis_pemesanan]</td>";
                echo "<td>$value[nama]</td>";
                echo "<td><button onclick='detail(\"$value[id_hjual]\")'>Lihat Detail</button></td>";
            echo "</tr>";
        }
    echo "</table>";
?>
<script>
    function detail(id){
        $.ajax({
            method: "post",
            url: "query_djual.php",
            data: {
                id:id
            },
            success: function (response) {
                $("#tampung2").html(response);  
            }
        });
    }
</script>