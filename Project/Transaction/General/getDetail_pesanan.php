<?php
    include_once("../../config.php");    
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    $gt=0;
    $dc=0;
    $ipromo = "";
    $hargp = "";
    $hargapromo = 0;
    $discount = 0;
    $discounts = 0;
    $kupon=$_SESSION["kupon"];
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
            $tmpharga = 0;

            if(substr($value,0,2)=="ME"){
                $query = "select *  from menu where id_menu = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $id = $value;
                $nama = $menu["nama_menu"];
                $deskripsi = $menu["deskripsi"];
                $gambar = $menu['gambar'];
                $harga = $menu['harga_menu'];
                $gambar = "../Master/Menu/".$gambar;

                $tmpharga=$harga;
                $query2 = "SELECT * FROM PROMO_PAKET WHERE ID_PAKET = '$value' and status = 1";
                $menu2 = mysqli_query($conn,$query2);
                $row = mysqli_num_rows($menu2);
                if($row > 0){
                    foreach ($menu2 as $key => $value) {
                        $tmpharga = $value["harga_promo_paket"];
                        $hargapromo = $harga - $tmpharga;
                        $discount = $discount + $hargapromo;
                        $discount=$discount*$jumlah;
                        $hargp = $hargp.$tmpharga.",";
                        $ipromo = $ipromo.$id.",";
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
                $tmpharga=$harga;
                $query2 = "SELECT * FROM PROMO_PAKET WHERE ID_PAKET = '$value'";
                $menu2 = mysqli_query($conn,$query2);
                $row = mysqli_num_rows($menu2);
                if($row > 0){
                    foreach ($menu2 as $key => $value) {
                        $tmpharga = $value["harga_promo_paket"];
                        $hargapromo = $harga - $tmpharga;
                        $discount = $discount + $hargapromo;
                        $hargp = $hargp.$tmpharga.",";
                        $ipromo = $ipromo.$id.",";
                        
                    }
                }
            }
            
            $total="Rp " . number_format($harga,2,',','.');
            $hargas="Rp " . number_format($harga,2,',','.');
            $tmpharga_number=$tmpharga;
            if($tmpharga !=0){
                 $tmpharga = "Rp " . number_format($tmpharga,2,',','.');
            }
            $grandtotal="Rp " . number_format($harga*$jumlah,2,',','.');
            $discounts="Rp " . number_format($discount*$jumlah,2,',','.');
            $gt+=$harga*$jumlah;    
            $dc = $discount;  

?>
           
            <div class="info-box elevation-2">
                <span class="info-box-icon" style="width:150px; height:100px;"><img src="<?= $gambar?>" alt="" width="150px" height="100px"></span>
                <div class="row">
                    <div class="col-6">
                        <div class="info-box-content" style="width: 150px;">
                            <span class="info-box-text" style="font-weight:bold;"><?= $nama?></span>
                          
                                <span class="">
                                <?php 
                                if($tmpharga!=$hargas){
                                    echo "<span style='text-decoration: line-through;'>$hargas</span>";
                                }else{
                                    echo "<span>$hargas</span>";
                                }
                                ?><br> 
                                <?php
                                if($tmpharga!=$hargas){
                                    echo $tmpharga;
                                    $grandtotal="Rp " . number_format($tmpharga_number*$jumlah,2,',','.');
                                }
                                ?><br> 
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
    // $promo=$_SESSION["promo"];
    $id_kupon=$_SESSION["kupon"];
    if($id_kupon!=""){
        $query="SELECT * from kupon where id_kupon='$id_kupon'";
        $value_kupon=mysqli_fetch_assoc(mysqli_query($conn,$query));
        $jumlah=$_SESSION["pilih_menu"][$value_kupon["id_menu"]];
        $potongan_kupon=$value_kupon["harga_kupon"]*$jumlah;
    }else{
        $potongan_kupon=0;
    }
    $_SESSION["harga_kupon"]=$potongan_kupon;
    $potongan_kupon_string="Rp " . number_format($potongan_kupon,2,',','.');
    $Tampgt=$gt;
    $_SESSION["disc"]=$dc;
    $_SESSION["hargapmenu"] = $hargp;
    $_SESSION["ipromomenu"] = $ipromo;
    $ongkir = 0;
    if(isset($_SESSION["ongkir"])){
        $ongkir=$_SESSION["ongkir"];
    }
    $_SESSION["harga_akhir_Pesanan"]=$gt+$ongkir-$dc-$potongan_kupon;
    $gt="Rp " . number_format($gt,2,',','.');
    $gtt="Rp " . number_format($Tampgt,2,',','.');
    $ongkirTampil="Rp " . number_format($ongkir,2,',','.');
    $discounttampil="Rp " . number_format($dc,2,',','.');
   
    if($Tampgt+$ongkir-$dc-$potongan_kupon<=0){
        $_SESSION["harga_akhir_Pesanan"]=0;
        $gt="Rp " . number_format(0,2,',','.');
    }else{
        $_SESSION["harga_akhir_Pesanan"]=$Tampgt+$ongkir-$dc-$potongan_kupon;
        $gt="Rp " . number_format($Tampgt-$dc+$ongkir-$potongan_kupon,2,',','.');
    }

?>
            </div>
            <input type="hidden" name="" id="dd" value="<?= $dc?>">
            <input type="hidden" name="" id="pp" value="<?= $potongan_kupon?>">
            <input type="hidden" name="" id="oo" value="<?= $ongkir?>">
            <div class="col-4 elevation-2" style="background-color: #E8ECEE">
            <div class="row" style="padding:15px;">
                <div class="col-8">
                    <p> Subtotal products: </p>
                    <p> Discount products: </p> 
                    <p> Kupon products: </p> 
                    <p> Shipping cost: </p>
                </div>  
                <div class="col-4">
                    <p><?= $gtt ?></p>
                    <p id="d" style="color: black;"><?= $discounttampil?></p>
                    <p id="p" style="color: black;"><?= $potongan_kupon_string?></p>
                    <p id="o" style="color: black;"><?=$ongkirTampil ?></p>
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
                    <option value="saldo">Saldo Member</option>
                </select><br><br>
                <button class="btn btn-block btn-primary" id="Submit" name="submit" onclick="Pay()">Pay! <i class="fas fa-angle-right" style="margin-left:12px;"></i></button>
                
            </div>
            </div>
        
    </div>
<script>
        var a = $("#dd").val();
        var b = $("#pp").val();
        var c = $("#oo").val();
        if(a != 0){
            $("#d").css("color","red");
        }
        if(b != 0){
            $("#p").css("color","red");
        }
        if(c != 0){
            $("#o").css("color","red");
        }


</script>

