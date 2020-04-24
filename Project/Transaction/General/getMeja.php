<?php
    include_once("../../config.php");    
    session_start();
    $kursi = mysqli_query($conn_detail,"SELECT * from meja order by kolom asc,baris asc");
    $cek=1;
    $cek_sebelum=1;
    foreach ($kursi as $key => $value) {
        $ctr=$value["id_meja"];
        $cek_sebelum=$value["kolom"];
        $i=$value["kolom"]-1;
        $j=$value["baris"]-1;
        $left=70*$j."px";
        $top=70*$i."px";
        if($cek_sebelum!=$cek){
            echo "<div style='clear:both'></div>";
        }
        $warna="";
        if($value["status"]==1){
            $warna="hijau";
        }
        if(strstr( $_SESSION["isi_kursi"]," ".$value["id_meja"]."," )){
            $warna="biru";
        }
        if($value["status"]==2){
            $warna="merah";
        }
        
        echo "<div class='$warna kotak' id='meja$ctr' onclick='pesanDinein($ctr)' style='left:$left;top:$top'>";
            echo "<p style='color:white;padding-left:30%'>$value[id_meja]</p>";
        echo "</div>";
        $cek=$value["kolom"];
    }
?>