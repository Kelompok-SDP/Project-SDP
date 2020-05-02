<?php
    include_once("../../config.php");
    $kategori=$_POST["kategori"];
    $query="SELECT * from menu where id_kategori='$kategori'";
    $query=mysqli_query($conn,$query);
    foreach ($query as $key => $value) {
        $total="Rp " . number_format($value["harga_menu"],2,',','.');;
        echo"<div class='kotakMakanan smallbox' style='float:left; margin-left:10px; background-color:rgb(202,204,206);margin-bottom:10px;border-radius:10%'>";
            echo"<img src='../master/menu/$value[gambar]' onclick='ambilMenu(\"$value[nama_menu]\")' alt='' style='background-size: cover;width:200px;height:150px;' class='imgMakanan'>";
            echo"<p style='margin-left:5px;'>$value[nama_menu]  $total</p>";
        echo"</div>";
    }
?>
