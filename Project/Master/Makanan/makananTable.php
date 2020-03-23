<?php
    require_once("../../config.php");
    require_once('Sumber.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    thead tr th{
        padding: 10px;
        font-size: 16pt;
        color: black;
    }
    tbody tr td {
        padding: 15px;
        color: black;
    }
</style>
<body>
    <div class="row tabel">
        <div class="col s12">
            <table class="centered highlight">
            <h1>Makanan Aktif</h1>
                <thead>
                    <tr>
                        <th>ID Makanan</th>
                        <th>Nama Makanan</th>
                        <th>Harga Makanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query=mysqli_query($conn,"SELECT * from menu");
                        while($row = mysqli_fetch_assoc($query)){ ?>
                        <tr>
                            <?php if($row['status'] == 1){?>
                            <td><?= $row['id_menu']?></td>
                            <td><?= $row['nama_menu']?></td>
                            <td><?= $row['harga_menu']?></td>
                            <td><form action="Makanan.php" method="post"><button class="waves-effect waves-light btn-small" name="btnEdit" type="submit" value="<?= $row['id_menu']?>"><i class="material-icons">edit</i></button></form></td>
                            <td><form action="Makanan.php" method="post"><button class="waves-effect waves-light btn-small" name="btnDelete" type="submit" value="<?= $row['id_menu']?>"><i class="material-icons">delete</i></button></form></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row tabel">
        <div class="col s12">
            <table class="centered highlight">
            <h1>Makanan Tidak Aktif</h1>
                <thead>
                    <tr>
                        <th>ID Makanan</th>
                        <th>Nama Makanan</th>
                        <th>Harga Makanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query=mysqli_query($conn,"SELECT * from menu");
                        while($row = mysqli_fetch_assoc($query)){ ?>
                        <tr>
                            <?php if($row['status'] == 0){?>
                            <td><?= $row['id_menu']?></td>
                            <td><?= $row['nama_menu']?></td>
                            <td><?= $row['harga_menu']?></td>
                            <td><form action="Makanan.php" method="post"><button class="waves-effect waves-light btn-small" name="btnEdit" type="submit" value="<?= $row['id_menu']?>"><i class="material-icons">edit</i></button></form></td>
                            <td><form action="Makanan.php" method="post"><button class="waves-effect waves-light btn-small" name="btnDelete" type="submit" value="<?= $row['id_menu']?>"><i class="material-icons">delete</i></button></form></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script>
    // $(document).ready(function () {
    //     $(".btnEdit").click(function () {
    //         var dataid = $(this).val();
    //         $.ajax({
    //             url: "Agenda.php",
    //             method: 'post',
    //             data: {
    //                 dataid : dataid  
    //             },
    //             success: function(result){
    //                 alert(result);
    //             }
    //         });

    //     });

    //     $(".btn").click(function () {
    //         var dataid = $(this).val();
    //         var konfirm = confirm("Apakah anda yakin untuk menghapus data?");
    //         if (konfirm == true) {
                
    //         }
    //     });
    // });

</script>