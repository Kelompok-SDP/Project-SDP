<?php
    include_once("../../config.php");    
    session_start();
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    foreach ($arrMenu as $key => $value) {
        if($ctr<count($arrMenu)-1){
            $jumlah=$_SESSION["pilih_menu"][$value];
            $query=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from menu where nama_menu='$value'"));
            $total+=$query["harga_menu"]*$jumlah;
            $ctr++;
        }
        
    }

    if(count($arrMenu)>1){
        $total="Rp " . number_format($total,2,',','.');;
        echo"<p>Total : ".$total."</p>";
        echo "<button onclick='pesanMakanan()'>Pesan Menu</button>";
    }
?>
