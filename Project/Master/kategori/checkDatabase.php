<?php
    require_once("../../config.php");
    if(isset($_POST['btnSubmit'])){
        //masukan kategori baru
        $namaKat = $_POST['namKat'];

        $query = "SELECT * FROM kategori";
        $jum = $conn->query($query);
        $jum2 =  $jum->num_rows;
        $jum2++;

        $id_kategori = "kate".$jum2;
        $query = "INSERT INTO kategori VALUES ('$id_kategori','$namaKat')";
        $conn->query($query);
        header("location: input.php");
    }
?>