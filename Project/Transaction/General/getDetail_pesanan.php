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
            $query="select * from menu where nama_menu='$value'";
            $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
            $total="Rp " . number_format($query["harga_menu"],2,',','.');
            $grandtotal="Rp " . number_format($query["harga_menu"]*$jumlah,2,',','.');
            $gt+=$query["harga_menu"]*$jumlah;
              echo"<tr>
            ";echo"    <td><img width='100' src='../master/menu/$query[gambar]' alt=''></td>
            ";echo"    <td>$query[nama_menu] <br>$query[deskripsi]</td>
            ";echo"    <td>$total</td>
            ";echo"    <td>
            ";echo"        <input class='span1' onkeypress='NumberOnly(event)' onchange='qtyMenu(\"$query[nama_menu]\",4,this.value)' style='max-width:34px' placeholder='1' value='$jumlah' size='16' type='text'>
            ";echo"        <div class='input-append'>
            ";echo"            <button class='btn btn-mini' onclick='qtyMenu(\"$query[nama_menu]\",2)' type='button'>-</button>
            ";echo"            <button class='btn btn-mini' onclick='qtyMenu(\"$query[nama_menu]\",1)' type='button'>+</button>
            ";echo"            <button class='btn btn-mini btn-danger'onclick='qtyMenu(\"$query[nama_menu]\",3)' type='button'>
            ";echo"            <span class='icon-remove'></span></button>
            ";echo"        </div>
            ";echo"        </td>
            ";echo"    <td>$grandtotal</td>
            ";echo"</tr>";
        }
        $ctr++;
    }
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

