<?php 

require_once("../../config.php");
$query="SELECT * from promo where status_promo = 1";
$hasil = mysqli_query($conn,$query);
?>
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
            <td><?=$row["gambar_promo"]?></td>
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
