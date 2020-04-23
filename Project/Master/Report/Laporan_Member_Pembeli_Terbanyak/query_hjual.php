<?php
    include("../../../config.php");
    $month=$_POST["month"];
    // $jenis=$_POST["jenis"];

    // $query2="SELECT m.fullname, nvl(sum(total),0) as \"total\" 
    // from hjual h right join member m on m.id_member=h.id_member
    // where month(tanggal_transaksi)=month('$month')
    // group by m.fullname 
    // order by 1 desc";
    $query = "SELECT MAX(sum(total))";
    

    $htrans= mysqli_query($conn,$query);
    echo "<table border='1'>";
            echo "<thead>";
                echo "<th>Nama Member</th>";
                echo "<th>Total</th>";
            echo "</thead>";
        foreach ($htrans as $key => $value) {
            echo "<tr>";
                echo "<td>$value[fullname]</td>";
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
