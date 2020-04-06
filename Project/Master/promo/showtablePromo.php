<?php 

require_once("../../config.php");
$query="SELECT * from promo where status_promo = 1 order by 1 desc";
$hasil = mysqli_query($conn,$query);
?>
<link rel="stylesheet" type="text/css" href="ini.css">
    <table class="table table-bordered text-nowrap" id = "tpromo">
            <thead>
                <tr>
                <th>Nama Promo</th>
                <th>Harga Promo</th>
                <th>Awal Periode Promo</th>
                <th>Akhir Periode Promo</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            

    <?php
    foreach ($hasil as $key=>$row){
        ?>
        <tr>
        <td>
         <form action="promo/openDetail.php" method="post" target="_blank">
                <button type="submit" name="detail" value="<?=$row['id_promo']?>"style="  background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                color: blue;
                cursor:pointer;
                overflow: hidden;
                outline:none;"><?=$row['nama_promo']?></button>
            </form>
            </td>
            <?php 
                $angka = $row["harga_promo"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            ?>
            <td><?=$hasil_rupiah?></td>
            <td><?=$row["periode_awal"]?></td>
            <td><?=$row["periode_akhir"]?></td>
            <?php ?>
           
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
      "ordering":false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    });
    
    
</script>
