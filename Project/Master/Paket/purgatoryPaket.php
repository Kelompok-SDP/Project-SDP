<?php 

require_once("../../config.php");
$query="SELECT * from paket where status = 0";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                <th>Id Paket</th>
                <th>Nama Paket</th>
                <th>Harga Paket</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            

    <?php
    $tmp ='';
    foreach ($hasil as $key=>$row){
        $tmp = $row["id_paket"];
        ?>
        <tr>
            <td><?=$row["id_paket"]?></td>
            <td><?=$row["nama_paket"]?></td>
            <td><?=$row["jenis_paket"]?></td>
            <td>
                <button onclick="pulihkan('<?=$row['id_paket']?>')" class="btn btn-primary">Pulihkan</button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    
</script>
