<?php 

require_once("../../config.php");
$query="SELECT * from paket where status = 1";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-bordered text-nowrap" id="showurut">
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
            <td><?=$row["harga_paket"]?></td>
            <td>
                <button onclick="edit('<?=$row['id_paket']?>')" class="btn btn-primary">Edit <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function(){
        $('#showurut').DataTable({
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
