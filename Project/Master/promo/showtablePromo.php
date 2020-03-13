<?php 

require_once("../../config.php");
$query="SELECT * from promo";
$hasil = mysqli_query($conn,$query);
?>

<table border="1">
    <thead>
        <th>id</th>
        <th>nama</th>
        <th>harga</th>
        <th>Awal Periode</th>
        <th>AKhir Periode</th>
        <th colspan=2>action</th>
    </thead>
    <?php
    $tmp ='';
    foreach ($hasil as $key=>$row){
        $tmp = $row["id_promo"];
        ?>
        <tr>
        <td><?=$row["id_promo"]?></td>
        <td><?=$row["nama_promo"]?></td>
        <td><?=$row["harga_promo"]?></td>
        <td><?=$row["periode_awal"]?></td>
        <td><?=$row["periode_akhir"]?></td>
        <td>
        <button onclick="showId('<?=$row['id_promo']?>','<?=$row['nama_promo']?>','<?=$row['harga_promo']?>','<?=$row['periode_awal']?>','<?=$row['periode_akhir']?>')" name='btnUp' id="uP">Update</button></td>
        <td>
            <button onclick="deleteItem('<?=$row['id_promo']?>')" name='btnDel' value='Delete'>Delete</button></td>
        </tr>
    <?php } ?>
</table>
<script>
    
</script>
