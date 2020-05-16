<?php
    require_once("../../config.php");    
    //session_start();

    $kursi = mysqli_query($conn_detail,"SELECT * from meja order by kolom asc,baris asc");
    $cek=1;
    $cek_sebelum=1;
    $date=date("Y-m-d");
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
        
        $query="SELECT * from hjual where jenis_pemesanan='Reservasi'";
        $query=mysqli_query($conn,$query);
        $allkursi=array();
        $jam=array();
        $keterangan=array();
        $hari="";
        $ctrr=0;
        foreach ($query as $key => $value3) {
            if($value3["keterangan"]!=""){

                $keterangan=explode("||",$value3["keterangan"]);
                $jam=explode(":",$keterangan[1]);
                $hari=explode(":",$keterangan[2]);
                $check_kursi=explode(":",$keterangan[3]);
                if($check_kursi[1]=="ada"){
                    $allkursi=explode(":",$keterangan[4]);
                    $allkursi=explode(", ",$allkursi[1]);
                }
                
    
                $query2="SELECT * from hjual where jenis_pemesanan='Reservasi' and CURDATE()='$hari[1]' and DATE_ADD(CURRENT_TIME(), INTERVAL 2 HOUR)>CONVERT('$jam[1]$jam[2]',time)";
    
                // echo $query2;
                $query2=mysqli_fetch_assoc(mysqli_query($conn,$query2));
                $keterangan=explode("||",$query2["keterangan"]);
                
                if(count($keterangan)>1){
    
                    $check_kursi=explode(":",$keterangan[3]);
                    if($check_kursi[1]=="ada"){
                        $allkursi=explode(":",$keterangan[4]);
                        $allkursi=explode(", ",$allkursi[1]);
                    }
                    for ($i=0; $i < count($allkursi)-1; $i++) { 
                        if($allkursi[$i]==$value["id_meja"]){
                            $ctrr=1;
                        }
                    }
                }
            }
        }

        if($ctrr==0){
            echo "<div class='$warna kotak' id='meja$ctr' onclick='pesanDinein($ctr)' style='left:$left;top:$top'>";
        }else{
            echo "<div class='kotak' id='meja$ctr'  style=' background-color:yellow;left:$left;top:$top'>";
        }
            echo "<p style='color:white;padding-left:30%'>$value[id_meja]</p>";
        echo "</div>";
        $cek=$value["kolom"];
    }
?>