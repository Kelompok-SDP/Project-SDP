<?php
    include_once("../../config.php");    
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    $gt=0;
?>
    <div class="row">
            <div class="col-8">
<?php
    foreach ($arrMenu as $key => $value) {

        if($ctr<count($arrMenu)-1){
            $jumlah=$_SESSION["pilih_menu"][$value];
            $nama = "";
            $deskripsi = "";
            $gambar = "";
            if(substr($value,0,2)=="ME"){
                $query = "select *  from menu where id_menu = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $nama = $menu["nama_menu"];
                $deskripsi = $menu["deskripsi"];
                $gambar = $menu['gambar'];
                $harga = $menu['harga_menu'];
                $gambar = "../Master/Menu/".$gambar;

            } else{
                $query = "select *  from paket where id_paket = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $nama = $menu["nama_paket"];
                $gambar = $menu['gambar'];
                $harga = $menu['harga_paket'];
                $gambar = "../Master/Menu/".$gambar;
                $deskripsi= "paket ini memiliki menu antara lain : <br>";
                $query = "select * from paket_menu  where id_paket = '$value'";
                $menu = mysqli_query($conn,$query);
                foreach($menu as $data=>$row){
                    $id_menu = $row['id_menu'];
                    $query = "select *  from  menu  where id_menu = '$id_menu'";
                    $isimenu = mysqli_query($conn,$query);
                    foreach($isimenu as $data=>$key){
                        $deskripsi = $deskripsi. $key['nama_menu'];
                    }
                }

            }
            $total="Rp " . number_format($harga,2,',','.');
            $hargas="Rp " . number_format($harga,2,',','.');
            $grandtotal="Rp " . number_format($harga*$jumlah,2,',','.');
            $gt+=$harga*$jumlah;
?>
           
            <div class="info-box elevation-2">
                <span class="info-box-icon" style="width:150px; height:100px;"><img src="<?= $gambar?>" alt="" width="150px" height="100px"></span>
                <div class="row">
                    <div class="col-6">
                        <div class="info-box-content" style="width: 150px;">
                            <span class="info-box-text" style="font-weight:bold;"><?= $nama?></span>
                            <span class="">
                            <?= $hargas?><br>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class ="col-1" style="margin-left:150px; margin-top:12px;">
                <?php 
                echo"            <button class='btn btn-mini btn-kcl btn-secondary' style='background-color:white; color:green; font-weight:bold;' onclick='qtyMenu(\"$value\",1,0)' type='button'>+</button>
                ";echo "<input class='span1' onkeypress='NumberOnly(event)' onchange='qtyMenu(\"$value\",4,this.value)' style='max-width:34px; border:1px solid white; margin-left:1.2vw;' placeholder='1' value='$jumlah' size='16' type='text'>
                ";echo"            <button class='btn btn-mini btn-kcl btn-secondary' style='background-color:white; color:green; font-weight:bold;' onclick='qtyMenu(\"$value\",2,0)' type='button'>-</button>
                ";
                
                ?>
                    </div>
                    <div style="margin-left:20px;margin-top:37px;float:left; width:200px;" class="input-group append">
                    <h4 style="font-size:15pt;"><?= $grandtotal?></h4>
                <?php
                echo"            <div style='margin-left: 60px;'><button class='btn btn-danger' style='width:30px; height:30px;' onclick='qtyMenu(\"$value\",3,0)' type='button'><i class='fas fa-trash' style='color: white; margin-left:-5px;'></i></button></div>
                ";
                ?>
                    </div>
                </div>
            </div>    
<?php   } 
        $ctr++;
    }
    $_SESSION["harga_akhir_Pesanan"]=$gt+15000;
    $gt="Rp " . number_format($gt,2,',','.');
?>
            </div>
            <div class="col-4 elevation-2" style="background-color: #E8ECEE">
            <div class="row" style="padding:15px;">
                <div class="col-8">
                    <p> Subtotal products: </p>
                    <p> Discount products: </p> 
                    <p> Promo products:	</p>
                </div>  
                <div class="col-4">
                    <p><?= $gt ?></p>
                    <p>Rp 0,00 </p>
                    <p>Rp 0,00 </p>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-8">
                    <p style="font-weight: bold;"> Total products: </p> 
                </div>
                <div class="col-4">
                    <p style="font-weight: bold;"><?= $gt ?></p>
                </div>
                    <button type="submit" class="btn btn-block btn-primary" id="Submit" name="submit" onclick="Pay()">Pay! <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                
            </div>
            </div>
        
    </div>
            <!-- //   echo"<tr>
            // ";echo"    <td><img width='100' src='$gambar' alt=''></td>
            // ";echo"    <td>$nama <br>$deskripsi</td>
            // ";echo"    <td>$total</td>
            // ";echo"    <td>
            // ";echo"        
            // ";echo"        <div class='input-append' >
            // <input class='span1' onkeypress='NumberOnly(event)' onchange='qtyMenu(\"$value\",4,this.value)' style='max-width:34px' placeholder='1' value='$jumlah' size='16' type='text'>
            // ";echo"            <button class='btn btn-mini btn-kcl btn-secondary' onclick='qtyMenu(\"$value\",2,0)' type='button'>-</button>
            // ";echo"            <button class='btn btn-mini btn-kcl btn-secondary' onclick='qtyMenu(\"$value\",1,0)' type='button'>+</button>
            // ";echo"            <button class='btn btn-mini btn-kcl btn-danger'onclick='qtyMenu(\"$value\",3,0)' type='button'>
            // ";echo"            <span >X</span></button>
            // ";echo"        </div>
            // ";echo"        </td>
            // ";echo"    <td>$grandtotal</td>
            // ";echo"</tr>"; -->


