<?php 

require_once("../../config.php");
$query="SELECT * FROM MENU WHERE STATUS = 0";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                <th>Id Menu</th>
                <th>Nama Menu</th>
                <th>Harga Menu</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            

    <?php
    $tmp ='';
    foreach ($hasil as $key=>$row){
        $tmp = $row["id_menu"];
        ?>
        <tr>
            <td><?=$row["id_menu"]?></td>
            <td><?=$row["nama_menu"]?></td>
            <td><?=$row["harga_menu"]?></td>
            <td>
                <button onclick="pulihkan('<?=$row['id_menu']?>')" class="btn btn-primary">Pulihkan</button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    
</script>
