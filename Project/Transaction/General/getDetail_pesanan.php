<?php
    include_once("../../config.php");    
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    $gt=0;
    $dc=0;
    $hargapromo = 0;
    $discount = 0;
    $discounts = 0;
?>
    <div class="row">
            <div class="col-8">
<?php
if($nama!=""){
    foreach ($arrMenu as $key => $value) {

        if($ctr<count($arrMenu)-1){
            $jumlah=$_SESSION["pilih_menu"][$value];
            $nama = "";
            $deskripsi = "";
            $gambar = "";
            if(substr($value,0,2)=="ME"){
                $query = "select *  from menu where id_menu = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $id = $value;
                $nama = $menu["nama_menu"];
                $deskripsi = $menu["deskripsi"];
                $gambar = $menu['gambar'];
                $harga = $menu['harga_menu'];
                $gambar = "../Master/Menu/".$gambar;

                $query2 = "SELECT * FROM PROMO_PAKET WHERE ID_PAKET = '$value'";
                $menu2 = mysqli_query($conn,$query2);
                $row = mysqli_num_rows($menu2);
                if($row > 0){
                    foreach ($menu2 as $key => $value) {
                        $tmpharga = $value["harga_promo_paket"];
                        $hargapromo = $harga - $tmpharga;
                        $discount = $discount + $hargapromo;
                    }
                }
            } else if(substr($value,0,2)=="PK"){
                $query = "select *  from paket where id_paket = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $nama = $menu["nama_paket"];
                $id = $value;
                $gambar = $menu['gambar'];
                $harga = $menu['harga_paket'];
                $gambar = "../Master/Menu/".$gambar;
                $query2 = "SELECT * FROM PROMO_PAKET WHERE ID_PAKET = '$value'";
                $menu2 = mysqli_query($conn,$query2);
                $row = mysqli_num_rows($menu2);
                if($row > 0){
                    foreach ($menu2 as $key => $value) {
                        $tmpharga = $value["harga_promo_paket"];
                        $hargapromo = $harga - $tmpharga;
                        $discount = $discount + $hargapromo;
                    }
                }
            }
            
            $total="Rp " . number_format($harga,2,',','.');
            $hargas="Rp " . number_format($harga,2,',','.');
            $grandtotal="Rp " . number_format($harga*$jumlah,2,',','.');
            $discounts="Rp " . number_format($discount*$jumlah,2,',','.');
            $gt+=$harga*$jumlah;    
            $dc = $discount*$jumlah;  
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
                    <div class ="col-1" style="margin-left:150px; margin-top:10px;">
                <?php 
                echo"            <button class='btn btn-mini btn-kcl btn-secondary' style='background-color:white; color:green; font-weight:bold;' onclick='qtyMenu(\"$id\",1,0)' type='button'>+</button>
                ";echo "<input class='span1' onkeypress='NumberOnly(event)' onchange='qtyMenu(\"$id\",4,this.value)' style='max-width:34px; border:1px solid white; margin-left:1.2vw;' placeholder='1' value='$jumlah' size='16' type='text'>
                ";echo"            <button class='btn btn-mini btn-kcl btn-secondary' style='background-color:white; color:green; font-weight:bold;' onclick='qtyMenu(\"$id\",2,0)' type='button'>-</button>
                ";
                
                ?>
                    </div>
                    <div style="margin-left:20px;margin-top:37px;float:left; width:200px;" class="input-group append">
                    <h4 style="font-size:15pt; width: 110px;"><?= $grandtotal?></h4>
                <?php
                echo"            <div style='margin-left: 60px; margin-top: -3px;'><button class='btn btn-danger' style='width:30px; height:35px;' onclick='qtyMenu(\"$id\",3,0)' type='button'><i class='fas fa-trash' style='color: white; margin-left:-5px;'></i></button></div>
                ";
                ?>
                    </div>
                </div>
            </div>    
<?php   } 
        $ctr++;
    }
}
    $promo=$_SESSION["promo"];
    $Tampgt=$gt;
    $_SESSION["disc"]=$dc;
    $ongkir=$_SESSION["ongkir"];
    $_SESSION["harga_akhir_Pesanan"]=$gt-$promo+$ongkir-$dc;
    $gt="Rp " . number_format($gt,2,',','.');
    $gtt="Rp " . number_format($Tampgt,2,',','.');
    $ongkirTampil="Rp " . number_format($ongkir,2,',','.');
    $promoTampil="Rp " . number_format($promo,2,',','.');
    $discounttampil="Rp " . number_format($dc,2,',','.');
   
    if($Tampgt-$promo+$ongkir-$dc<=0){
        $_SESSION["harga_akhir_Pesanan"]=0;
        $gt="Rp " . number_format(0,2,',','.');
    }else{
        $_SESSION["harga_akhir_Pesanan"]=$Tampgt+$ongkir-$promo-$dc;
        $gt="Rp " . number_format($Tampgt-$promo-$dc+$ongkir,2,',','.');
    }

?>
            </div>
            <input type="hidden" name="" id="dd" value="<?= $dc?>">
            <input type="hidden" name="" id="pp" value="<?= $promo?>">
            <input type="hidden" name="" id="oo" value="<?= $ongkir?>">
            <div class="col-4 elevation-2" style="background-color: #E8ECEE">
            <div class="row" style="padding:15px;">
                <div class="col-8">
                    <p> Subtotal products: </p>
                    <p> Discount products: </p> 
                    <p> Promo products:	</p>
                    <p> Shipping cost: </p>
                </div>  
                <div class="col-4">
                    <p><?= $gtt ?></p>
                    <p id="d" style="color: black;"><?= $discounttampil?></p>
                    <p id="p" style="color: black;"><?= $promoTampil ?></p>
                    <p ><?=$ongkirTampil ?></p>
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
                <select class="form-control select2" name="" id="jenis_pembayaran" style="width: 100%;">
                    <option value="cash">Payment</option>
                    <option value="poin">Poin Member</option>
                </select><br><br>
                <button type="submit" class="btn btn-block btn-primary" id="Submit" name="submit" onclick="Pay()">Pay! <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                
            </div>
            </div>
        
    </div>
<script>
    $(document).ready(function () {
        var a = $("#dd").val();
        var b = $("#pp").val();
        var c = $("#oo").val();

        if(a != 0){
            $("#d").css("color","red");
        }
        if(b != 0){
            $("#p").css("color","red");
        }
    });


</script>

