<?php
	require_once("../../config.php");
    $query=mysqli_query($conn_detail,"SELECT * from daerah ");
    $query_first=mysqli_fetch_assoc(mysqli_query($conn_detail,"SELECT * from daerah"));
    echo "<button type='button' id='provinsi_value' value='Jawa Timur' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
        echo $query_first['nama_daerah'];
    echo"</button>";
    echo "<div class='dropdown-menu'>";
    foreach ($query as $key => $value) {
        echo "<button class='dropdown-item' onclick='ganti(\"".$value['nama_daerah']."\")'>$value[nama_daerah]</button>";
    }
    echo "</div>"

?>
<script>
    function ganti(nama){
        $('#provinsi_value').val(nama);
        $('#provinsi_value').html(nama);

      

    }
</script>