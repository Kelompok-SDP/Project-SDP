<?php
    include_once("../../config.php");
    $kategori=$_POST["kategori"];
    $query="SELECT * from menu where id_kategori='$kategori'";
    $query=mysqli_query($conn,$query);
    foreach ($query as $key => $value) {
        echo"<div class='kotakMakanan' style='float:left;margin-right:25px'>";
            echo"<img src='../../master/menu/$value[gambar]' onclick='ambilMenu(\"$value[nama_menu]\")' alt='' style='background-size: cover;width:200px;height:150px;' class='imgMakanan'>";
            echo"<p>$value[nama_menu]</p>";
        echo"</div>";
    }
?>
