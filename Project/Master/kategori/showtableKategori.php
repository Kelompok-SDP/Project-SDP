<?php 

require_once("../../config.php");
$query="SELECT * from kategori where status_kategori = 1  ORDER BY 1 DESC";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-bordered text-nowrap" id = "tkategori">
            <thead>
                <tr>
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
            <td><?=$row["nama_kategori"]?></td>
            <td><?=$row["jenis_kategori"]?></td>
            <td>
                <button onclick="edit('<?=$row['id_kategori']?>')" class="btn btn-primary">Edit <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function(){
        $('#tkategori').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    });
</script>
