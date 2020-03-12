<?php 

require_once("../../config.php");
$query="SELECT * from kategori";
$hasil = mysqli_query($conn,$query);
?>

<table border="1">
    <thead>
        <th>id</th>
        <th>nama</th>
        <th>jenis</th>
        <th colspan=2>action</th>
    </thead>
    <?php
    $tmp ='';
    foreach ($hasil as $key=>$row){
        $tmp = $row["id_kategori"];
        ?>
        <tr>
        <td><?=$row["id_kategori"]?></td>
        <td><?=$row["nama_kategori"]?></td>
        <td><?=$row["jenis_kategori"]?></td>
        <td>
        <button onclick="showId('<?=$row['id_kategori']?>','<?=$row['nama_kategori']?>','<?=$row['jenis_kategori']?>')" name='btnUp' id="uP">Update</button></td>
        <td>
            <button onclick="deleteItem('<?=$row['id_kategori']?>')" name='btnDel' value='Delete'>Delete</button></td>
        </tr>
    <?php } ?>
</table>
<script>
    
</script>
