<?php 
require_once("../../config.php");
$query="SELECT * FROM MENU WHERE STATUS = 0 ORDER BY id_menu DESC";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-bordered text-nowrap" id="purgatoryurut">
            <thead>
                <tr>
                <th>Nama Menu</th>
                <th>Harga Menu</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            

    <?php
    $tmp ='';
    foreach ($hasil as $key=>$row){
        $tmp = $row["id_menu"];
        ?>
        <tr>
            <td><?=$row["nama_menu"]?></td>
            <?php 
                $angka = $row["harga_menu"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            ?>
            <td><?=$hasil_rupiah?></td>
            <td>
                <button onclick="pulihkan('<?=$row['id_menu']?>')" class="btn btn-primary">Pulihkan</button>
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
