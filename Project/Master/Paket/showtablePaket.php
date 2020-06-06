<?php 

require_once("../../config.php");
$query="SELECT * from paket where status = 1 ORDER BY id_paket DESC";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-bordered text-nowrap" id="showurut">
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
        <td>
        <form action="Paket/openDetail.php" method="post" target="_blank">
                <button type="submit" name="detail" value="<?=$row['id_paket']?>"style="background-color: Transparent;
                background-repeat:no-repeat;
                border: none;
                color: blue;
                cursor:pointer;
                overflow: hidden;
                outline:none;"><?=$row['nama_paket']?></button>
            </form></td>
            <?php 
                $angka = $row["harga_paket"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            ?>
            <td><?=$hasil_rupiah?></td>
            <td>
            <?php 
                $query = "SELECT * FROM PROMO_PAKET WHERE ID_PAKET = '$row[id_paket]' AND STATUS = 1";
                $list = mysqli_query($conn,$query);
                $row2 = mysqli_num_rows($list);
                if($row2 > 0){
                ?>
                    <button onclick="edit('<?=$row['id_paket']?>')" class="btn btn-primary" disabled>Edit <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
                <?php
                    }else{
                ?>
                    <button onclick="edit('<?=$row['id_paket']?>')" class="btn btn-primary">Edit <i class="fas fa-pencil-alt" style="padding-left:12px;color:white;"></i></button>
                <?php
                }
                ?>
            </td>
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
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    });
</script>
