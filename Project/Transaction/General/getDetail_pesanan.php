<?php
    include_once("../../config.php");    
    session_start();
	// session_destroy();
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    $gt=0;
    foreach ($arrMenu as $key => $value) {

        if($ctr<count($arrMenu)-1){
            $jumlah=$_SESSION["pilih_menu"][$value];
            print_r($_SESSION["pilih_menu"]);
            echo $value;
            $nama = "";
            $deskripsi = "";
            $gambar = "";
            if(substr($value,0,2)=="ME"){
                $query = "select *  from menu where id_menu = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                echo "a";
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

                echo "b";
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
            $grandtotal="Rp " . number_format($harga*$jumlah,2,',','.');
            $gt+=$harga*$jumlah;
            echo $nama;
?>
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
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
        <?php
        }
        $ctr++;
    }
    $_SESSION["harga_akhir_Pesanan"]=$gt+15000;
    $gt="Rp " . number_format($gt,2,',','.');
      echo"<tr>
    ";echo"    <td colspan='4' class='alignR'>Total products:	</td>
    ";echo"    <td>$gt </td>
    ";echo"</tr>
    ";echo"<tr>
    ";echo"    <td colspan='4' class='alignR'>Discount products:	</td>
    ";echo"    <td> Rp 0,00</td>
    ";echo"</tr>
    ";echo"<tr>
    ";echo"    <td colspan='4' class='alignR'>Promo products:	</td>
    ";echo"    <td> Rp 0,00</td>
    ";echo"</tr>
    ";echo"<tr>
    ";echo"    <td colspan='4' class='alignR'>Total products:	</td>
    ";echo"    <td class='label label-primary' style='font-weight:bold'>$gt </td>
    ";echo"</tr>";    
    

?>

