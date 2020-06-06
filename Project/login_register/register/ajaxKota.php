<?php
    require_once("../../config.php");
    $kodeDaerah=$_POST["daerah"];
    $query=mysqli_query($conn_detail,"SELECT * from kota ");
$query_first=mysqli_fetch_assoc(mysqli_query($conn_detail,"SELECT * from kota where kode_daerah =(select kode_daerah from daerah where nama_daerah ='$kodeDaerah')"));
    echo "<button type='button' id='kota_value' value='Surabaya' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
        echo $query_first['nama_kota'];
    echo"</button>";
    echo "<div class='dropdown-menu'>";
    $query_kota=mysqli_query($conn_detail,"SELECT * from daerah");
    $kota='';
    foreach ($query_kota as $key => $value) {
        if($value['nama_daerah']==$kodeDaerah){
            $kota=$value['kode_daerah'];
        }
    }
    
    foreach ($query as $key => $value) {
        
        if($kota==$value['kode_daerah']){
            echo "<button class='dropdown-item' onclick='ganti2(\"".$value['nama_kota']."\")'>$value[nama_kota]</button>";
        }
    }
    echo "</div>"
?>
<script>
    function ganti2(nama){
        $('#kota_value').val(nama);
        $('#kota_value').html(nama);
    }
</script>