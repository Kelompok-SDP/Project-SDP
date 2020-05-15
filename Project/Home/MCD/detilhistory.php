<style>
    h2{
        font-size: 18pt;
    }
    h3{
        font-size: 14pt;
        font-weight:0.4px;
    }
</style>
<?php 
    require_once("../../config.php");
    $id = $_GET["id"];
   
   

   
    
    $query = "SELECT * FROM HJUAL WHERE ID_HJUAL= '$id' ";
    $mys = mysqli_query($conn, $query);
   ?>
    <div class="container">
   <?php
    $hargas = 0;
   
        foreach ( $mys as $data=>$key){
            $hargas="Rp " . number_format($key["total"],2,',','.');
            $ket = explode("||",$key["keterangan"]);
            $kode_promo = explode(":",$ket[9]);
            $hrpdisc = explode(",",$ket[10]);
            $prmdisc = explode(",",$ket[11]);
            $hrpdiscctr = count($hrpdisc);
            $prmdiscctr = count($prmdisc);
           ?>

                <div class="row">
                    <div class="col-12">
                       <h2>Tanggal Pemesanan : <?php echo $key["tanggal_transaksi"];?> </h2>
                       <br>
                       <h2> kode promo  : <?=$kode_promo[1]?></h2>

                       <h2> Jenis Pemesanan : <?php echo $key["jenis_pemesanan"]; ?> </h2>
                       <h2> Items : </h2>
                     </div>
                </div>
           <?php

            
        }    
        
        $banyak = 0;
        $nama= "";
        $harga1 = 0;
        $subtotal = 0;
        $qwery = "select * from djual where id_hjual ='$id'";
        $mys = mysqli_query($conn,$qwery);
        foreach($mys as $data=>$row){
            $banyak = $row['jumlah'];
            $subtotal = $row["subtotal"];
            $harga1 = "Rp " . number_format($row["harga"],2,',','.');
            $idmenu = $row['id_menu'];
            $tmp = explode('0',$idmenu,2);
            if($tmp[0]=="MEN"){
                $qw = "select * from menu where id_menu = '$idmenu'";
                $res=  mysqli_query($conn,$qw);
                foreach ($res as $data=>$row){
                    $nama = $row["nama_menu"];
                }
            }else{
                $query = "select * from paket where id_paket = '$idmenu'";
                $menu = mysqli_query($conn,$query);
                $idpaket  = "";
                foreach($menu as $data=>$row){
                    $nama = $row["nama_paket"];

                }
            }
            $harga_promo_paket ="";
            $hgnum = 0;
            $yg = false;
            for($i=0;$i<$hrpdiscctr; $i++){
                $QUE  = "select * from promo_paket where id_paket= '$idmenu' and id_promo = '$prmdisc[0]' ";
                $cb = mysqli_query($conn,$QUE);
                $jb = mysqli_num_rows($cb);
            
                if($jb>0){
                    $ques=mysqli_fetch_assoc(mysqli_query($conn,$QUE));
                    $harga_promo_paket="Rp  ".  number_format($ques["harga_promo_paket"],2,',','.');
                    $hgnum = $ques["harga_promo_paket"];
                    $yg  = true;
                }

            }

            $subtotal = $subtotal-($banyak*$hgnum) ;
            $subtotal =  "Rp " . number_format($subtotal,2,',','.');

                if($yg==true){
            ?>
                
                <div class="row">
                    <div class="col-8">
                        <h3 style="margin-left:30px;"><span><?=$nama?></span><span style="padding-left:250px;"><?="         ".$banyak." x "?><label style="text-decoration: line-through;"><?=$harga1?></label><label style="margin-left:20px;"><?=$harga_promo_paket?></label></span></h3>
                  </div>   
                  <div class="col-4">
                        <h3><?="   ".$subtotal?></h3>
                  </div> 
                </div>

            <?php
                }else{
            ?>
                 <div class="row">
                    <div class="col-8">
                        <h3 style="margin-left:30px;"><span><?=$nama?></span><span style="padding-left:250px;"><?="         ".$banyak." x ".$harga1?></span></h3>
                  </div>   
                  <div class="col-4">
                        <h3><?="   ".$subtotal?></h3>
                  </div> 
                </div>
            <?php


                }
        }
    

?>  
    <hr style="border:2px solid gray;">
    <div class="row">
        <div class="col-8"><h3 style="float: right; margin-right:100px;">Total:</h3></div>
        <div class="col-4"><h3><?=$hargas?></h3></div>
    </div>
</div>