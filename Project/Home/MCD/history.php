<?php 
    require_once("../../config.php");
    $id = $_POST["id"];
   
   
    $query = "SELECT * FROM HJUAL WHERE ID_MEMBER= '$id' order by tanggal_transaksi desc limit 5";
    $mys = mysqli_query($conn, $query);
   
        foreach ( $mys as $data=>$key){
            $hargas="Rp " . number_format($key["total"],2,',','.');
            echo "<button class='bx' style='height:25px; margin-bottom:5px;padding:2px; border:0px solid white;border-radius:5%;'  onclick='detailhj(\"$key[id_hjual]\")'  >";
            echo "<h1 style='font-size:10pt;'>".$key["tanggal_transaksi"]." / ".$key["jenis_pemesanan"]."         Total: ".$hargas." </h1>";
            echo "<hr style='margin-top:-2px; border-weight:0.6px;'>";
            echo "</button>";
        }    
        
         

?>