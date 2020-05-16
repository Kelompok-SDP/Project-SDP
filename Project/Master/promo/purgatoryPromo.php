<?php 

require_once("../../config.php");
$query="SELECT * from promo where status_promo = 0 order by 1 desc";
$hasil = mysqli_query($conn,$query);
?>
    <table class="table table-bordered text-nowrap" id = "purgapromo">
            <thead>
                <tr>
                <th>Nama Promo</th>
                <th>Detail Promo </th>
                <th>Jenis Promo </th>
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
            <td><?=$row["detail_promo"]?></td>
            <td>
                <?php
                    if($row["jenis_promo"]=="H"){
                        echo "Promo Hemat";
                    }else if($row["jenis_promo"]== "HR"){
                        echo "Promo Hari Raya";
                    }else {
                        echo "Promo Buy 1 Get 1 Free";
                    }
                
                
                
                ?>
            <td><?=$row["periode_awal"]?></td>
            <td><?=$row["periode_akhir"]?></td>
            <?php ?>
            <td>
            <button onclick="pulihkan('<?=$row['id_promo']?>')" class="btn btn-primary">Pulihkan</button>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function(){
        $('#purgapromo').DataTable({
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
