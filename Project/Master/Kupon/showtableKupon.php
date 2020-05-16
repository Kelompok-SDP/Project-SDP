<?php 

require_once("../../config.php");
$query="SELECT * from kupon where status_kupon = 1 order by 1 desc";
$hasil = mysqli_query($conn,$query);
?>
<link rel="stylesheet" type="text/css" href="ini.css">
    <table class="table table-bordered text-nowrap" id = "tpromo">
            <thead>
                <tr>
                <th>Nama Kupon</th>
                <th>Harga Kupon </th>
                <th>Sisa Kupon </th>
                <th>Awal Periode Kupon</th>
                <th>Akhir Periode Kupon</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            

    <?php
    foreach ($hasil as $key=>$row){
        $tmp = $row["id_kupon"];
        $angka = $row["harga_kupon"];
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    ?>
        <tr>
            <td><?=$row["nama_kupon"]?></td>
            <td><?=$hasil_rupiah?></td>
            <td><?=$row["sisa_kupon"]?></td>
            <td><?=$row["periode_awal_kupon"]?></td>
            <td><?=$row["periode_akhir_kupon"]?></td>
            <td>
                <button onclick="edit('<?=$row['id_kupon']?>')" class="btn btn-primary">Edit <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
            </td>
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
