<?php 

require_once("../../config.php");
$query="SELECT * from paket where status = 0 ORDER BY id_paket DESC";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-bordered text-nowrap" id="purgatoryurut">
            <thead>
                <tr>
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
            <td><?=$row["nama_paket"]?></td>
            <?php 
                $angka = $row["harga_paket"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            ?>
            <td><?=$hasil_rupiah?></td>
            <td>
                <button onclick="pulihkan('<?=$row['id_paket']?>')" class="btn btn-primary">Pulihkan</button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function(){
        $('#purgatoryurut').DataTable({
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
