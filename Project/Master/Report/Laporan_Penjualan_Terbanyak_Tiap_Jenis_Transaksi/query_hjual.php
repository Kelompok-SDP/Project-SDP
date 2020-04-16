<?php
    include("../../../config.php");
    $date=$_POST["date"];
    // $jenis=$_POST["jenis"];

    $query="SELECT jenis_pemesanan, sum(total) as \"total\" 
    from hjual
    where month(tanggal_transaksi)=month('$date')
    group by jenis_pemesanan 
    order by 1 desc";

    

    $htrans= mysqli_query($conn,$query);
    echo "<table border='1'>";
            echo "<thead>";
                echo "<th>Jenis Pemesanan</th>";
                echo "<th>Total</th>";
            echo "</thead>";
        foreach ($htrans as $key => $value) {
            echo "<tr>";
                echo "<td>$value[jenis_pemesanan]</td>";
                echo "<td>$value[total]</td>";
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
