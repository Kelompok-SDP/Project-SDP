
<?php
    include_once("../../config.php");
    $query="SELECT * from kategori";
    $query=mysqli_query($conn,$query);
    foreach ($query as $key => $value) {
        echo"<div class='kategori_box'onclick='callMenu(\"$value[id_kategori]\")'>$value[nama_kategori]</div>";
    }
?>