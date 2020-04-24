<?php
    include_once("../../config.php");    
    session_start();
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    echo "<table>";
    echo "<tbody>";
    foreach ($arrMenu as $key => $value) {
        if($ctr<count($arrMenu)-1){
            $jumlah=$_SESSION["pilih_menu"][$value];
            echo"<tr>";
                echo "<td><label style='width:200px' style='clear: both;float:left;text-align: right;'>$value </label></td>";
                echo "<td><input type='number' onchange='ubahJumlah(\"$value\",$ctr)'id='inp$ctr' value='$jumlah' style='width:50px' ></td>";
            echo"</tr>";
        }
        $ctr++;
    }
    echo "</tbody>";
    echo "</table>";
?>
