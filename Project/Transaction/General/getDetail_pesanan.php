<?php
    include_once("../../config.php");    
    session_start();
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    $ctr=0;
    $total=0;
    $gt=0;
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
            $grandtotal="Rp " . number_format($harga*$jumlah,2,',','.');
            $gt+=$harga*$jumlah;
              echo"<tr>
            ";echo"    <td><img width='100' src='$gambar' alt=''></td>
            ";echo"    <td>$nama <br>$deskripsi</td>
            ";echo"    <td>$total</td>
            ";echo"    <td>
            ";echo"        <input class='span1' onkeypress='NumberOnly(event)' onchange='qtyMenu(\"$nama\",4,this.value)' style='max-width:34px' placeholder='1' value='$jumlah' size='16' type='text'>
            ";echo"        <div class='input-append'>
            ";echo"            <button class='btn btn-mini' onclick='qtyMenu(\"$nama\",2)' type='button'>-</button>
            ";echo"            <button class='btn btn-mini' onclick='qtyMenu(\"$nama\",1)' type='button'>+</button>
            ";echo"            <button class='btn btn-mini btn-danger'onclick='qtyMenu(\"$nama\",3)' type='button'>
            ";echo"            <span class='icon-remove'></span></button>
            ";echo"        </div>
            ";echo"        </td>
            ";echo"    <td>$grandtotal</td>
            ";echo"</tr>";
        }
        $ctr++;
    }
    echo"<tr style='visibility:hidden'>";
    echo"<td id='total-harga'>$gt</td>";
    echo"</tr>";
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

