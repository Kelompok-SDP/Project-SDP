<?php
    include("../../../config.php");
    $date=$_POST["date"];
    $query = "SELECT * FROM HJUAL where tanggal_transaksi='$date'";
    $htrans= mysqli_query($conn,$query);
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
            echo "<td>$value[total]</td>";
            echo "<td>$value[jenis_pemesanan]</td>";
            $query2 = "SELECT * FROM PEGAWAI WHERE ID_PEGAWAI = '$id'";
            $hasil = mysqli_query($conn,$query2);
            foreach ($hasil as $key => $value2) {
                echo "<td>$value2[nama]</td>";
            }
            echo "<td><button onclick='detail(\"$value[id_hjual]\")'class='btn btn-primary'>Lihat Detail <i class='fas fa-angle-right' style='padding-left:12px;color:white;'></i></button></td>";
                 
            echo "</tr>";
        }
    echo "</table>";
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