<?php 

require_once("../../config.php");
$query="SELECT * from kategori where status_kategori = 1";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                <th>Id Kategori</th>
                <th>Nama Kategori</th>
                <th>jenis Kategori</th>
                <th>action</th>
                </tr>
            </thead>
            <tbody>
            

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
                <button onclick="edit('<?=$row['id_kategori']?>')" class="btn btn-primary">Edit <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    
</script>
