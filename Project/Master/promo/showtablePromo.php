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
            
             </td>
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
