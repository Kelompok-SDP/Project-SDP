<?php
    require_once("../../config.php");
    require_once('Sumber.php');
    $action = 0;
    if(isset($_REQUEST['btnEdit'])){
        $dataid = $_POST['btnEdit'];
        $action = 1;
        $query2 = "SELECT * FROM MENU WHERE ID_MENU = '$dataid'";
        $list = $conn->query($query2);
    }

    if(isset($_REQUEST['btnDelete'])){
        $dataid = $_POST['btnDelete'];
        $action = 2;

        $query2 = "SELECT * FROM MENU WHERE ID_MENU ='$dataid'"; 
        $list = $conn->query($query2);
    }

    if(isset($_REQUEST['up'])){
        $target_dir = "Image/"; //<- ini folder tujuannya
        $target_file = $target_dir. basename($_FILES["gambar"]["name"]); //murni mendapatkan namanya saja tanpa path nya 
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($file_type !="jpg" && $file_type !="png"){
            echo "tipe file hanya jpg dan png saja";
        } else if($_FILES["gambar"]["size"] > 500000){
            echo "file size terlalu besar";
        } else if(file_exists($target_file)){
            echo "file sudah ada";
        }
        else{
            if(move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)){
                echo "file ".basename($_FILES["gambar"]["name"])." terupload";
            }
        }     
    }

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
    .agenda label{
        position: absolute;
        top: -10px;
        font-size: 20px;
    }

    .agenda button:hover{
        padding: 0px 50px;
    }

    .judul{
        text-align: left;
        font-size: 18px;
        color: grey;
        font-weight: bold;
    }
    .preview{
        width: 100px;
        height: 100px;
        border: 1px solid black;
        margin: 0 auto;
        background: white;
    }

    .preview img{
        display: none;
    }

</style>
<body>
<?php if($action == 0){ ?>
    <div class="row agenda">
        <div class="col s12">
            <div class="card">
                <div class="card-action red white-text">
                    <h2>Makanan --- INSERT</h2>
                </div>
                <div class="card-content">
                    <div class="input-field">
                    <div class="judul">Nama Makanan <i class="material-icons left" style="color: black;">title</i></div>
                        <input type="text" name="nmakanan" id="Nmakanan">
                    </div><br>
                    <div class="input-field">
                    <div class="judul">Harga Makanan <i class="material-icons left" style="color: black;">title</i></div>
                        <input type="text" name="hmakanan" id="Hmakanan">
                    </div><br> 
                    <button class="waves-effect waves-light btn-large" type="submit" value="submit" id="btnInsert">Submit <i class="material-icons right">send</i></button>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div style="overflow: auto;width: 100vw;height: 100vh;" class="table"></div>
<?php 
} 
else if($action == 1){ 
    foreach ($list as $key => $value) {
?>
    <div class="row agenda">
        <div class="col s12">
            <div class="card">
                <div class="card-action red white-text">
                <h2>CRUD Agenda --- UBAH</h2>
            </div>
            <div class="card-content">
                <div class="input-field">
                <div class="judul">Nama Makanan <i class="material-icons left" style="color: black;">title</i></div>
                    <input type="text" name="nmakanan" id="Nmakanan" value="<?= $value['nama_menu']?>">
                </div><br>
                <div class="input-field">
                <div class="judul">Harga Makanan <i class="material-icons left" style="color: black;">title</i></div>
                    <input type="text" name="hmakanan" id="Hmakanan" value="<?= $value['harga_menu']?>">
                </div><br>
                <div class="input-field">
                <div class="judul">Status Makanan <i class="material-icons left" style="color: black;">title</i></div>
                    <input type="text" name="smakanan" id="Smakanan" value="<?= $value['status']?>">
                </div><br>
                <button class="waves-effect waves-light btn-large" type="submit" value="<?= $dataid ?>" id="btnUpdate">Update <i class="material-icons right">send</i></button>
                <button class="waves-effect waves-light btn-large" type="submit" id="btnCancel"><a class="nounderline" href="admin.php">Cancel <i class="material-icons right">send</i></a></button>
                <input type="file" id="upload" style="display:none" value="<?php echo $var ?>">
            </div>
        </div>
    </div>
<?php }}
else{ 
    foreach ($list as $key => $value) {       
?>
<div class="row agenda">
    <div class="col s12">
        <div class="card">
            <div class="card-action red white-text">
                <h2>CRUD Agenda --- HAPUS</h2>
            </div>
            <div class="card-content">
                <div class="judul">Apakah Anda yakin Menghapus Data dengan: <i class="material-icons left" style="color: black;">title</i></div>
                <div class="judul">Nama Makanan <i class="material-icons left" style="color: black;">title</i></div>
                <input disabled type="text" name="judulTxt" id="JudulTxt" value="<?= $value['nama_menu']?>">
                <button class="waves-effect waves-light btn-large" type="submit" value="<?= $dataid ?>" id="btnDelete">Delete <i class="material-icons right">send</i></button>
                <button class="waves-effect waves-light btn-large" type="submit" id="btnCancel"><a class="nounderline" href="admin.php">Cancel <i class="material-icons right">send</i></a></button>
            </div><br>
            <br>
        </div>
    </div>
</div>
<?php }}?>
</body>
</html>
<script>
    $('.table').load('makananTable.php');
    $(document).ready(function(){
        $("#btnInsert").click(function (){
            let nmakanan = $('#Nmakanan').val();
            let hmakanan = $('#Hmakanan').val();
            if(nmakanan != "" && hmakanan != ""){
                    $.ajax({
                        url: "insertMakanan.php",
                        method: 'post',
                        data: {
                            nmakanan : nmakanan,
                            hmakanan : hmakanan
                        },
                        success: function(result){
                            $('.table').load('makananTable.php');   
                            window.location.pathname ="coba/Project-SDP/Project/Master/Makanan/makanan.php"; 
                            alert(result);
                        }
                    });
            }else{
                alert("Judul dan deskripsi nya harus terisi!");
            }
        });

        $("#btnUpdate").click(function (){
            let id = $(this).val();
            let nmakanan = $('#Nmakanan').val();
            let hmakanan = $('#Hmakanan').val();
            let smakanan = $('#Smakanan').val();
            if(nmakanan != "" && hmakanan != ""){
                    $.ajax({
                        url: "editMakanan.php",
                        method: 'post',
                        data: {
                            id : id,
                            nmakanan : nmakanan,
                            hmakanan : hmakanan,
                            smakanan : smakanan
                        },
                        success: function(result){
                            $('.table').load('makananTable.php');   
                            window.location.pathname ="coba/Project-SDP/Project/Master/Makanan/makanan.php"; 
                            alert(result);
                        }
                    });
            }else{
                alert("Judul dan deskripsi nya harus terisi!");
            }
        });

        $("#btnDelete").click(function (){
            let id = $(this).val();
            $.ajax({
                url: "deleteMakanan.php",
                method: 'post',
                data: {
                    id : id  
                },
                success: function(result){
                    window.location.pathname ="coba/Project-SDP/Project/Master/Makanan/makanan.php";
                    alert(result);
                }
            });
        });
    });
</script>
