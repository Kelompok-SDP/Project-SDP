<?php 

require_once("../../config.php");
$query="SELECT * from promo where status_promo = 1";
$hasil = mysqli_query($conn,$query);
?>
<link rel="stylesheet" type="text/css" href="ini.css">
    <table class="table table-bordered text-nowrap" id = "tpromo">
            <thead>
                <tr>
                <th>Id Promo</th>
                <th>Nama Promo</th>
                <th>Harga Promo</th>
                <th>Awal Periode Promo</th>
                <th>Akhir Periode Promo</th>
                <th>Gambar</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            

    <?php
    foreach ($hasil as $key=>$row){
        ?>
        <tr>
            <td><?=$row["id_promo"]?></td>
            <td><?=$row["nama_promo"]?></td>
            <td><?='Rp.'.$row["harga_promo"]?></td>
            <td><?=$row["periode_awal"]?></td>
            <td><?=$row["periode_akhir"]?></td>
            <?php ?>
            <td>
         <form action="promo/openImage.php" method="post" target="_blank">
                <button type="submit" name="gambar" value="<?=$row['gambar_promo']?>"style="  background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                color: blue;
                cursor:pointer;
                overflow: hidden;
                outline:none;"><?=$row['gambar_promo']?></button>
            </form>

             
            </td>
            <td>
                <button onclick="edit('<?=$row['id_promo']?>')" class="btn btn-primary">Edit <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function(){
        $('#tpromo').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    });
    
    
</script>
