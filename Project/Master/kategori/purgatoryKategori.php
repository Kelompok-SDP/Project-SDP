<?php 

require_once("../../config.php");
$query="SELECT * from kategori where status_kategori = 0";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-bordered text-nowrap" id="purgaKategori">
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
                <button onclick="pulihkan('<?=$row['id_kategori']?>')" class="btn btn-primary">Pulihkan</button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
      $(function(){
        $('#purgaKategori').DataTable({
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
