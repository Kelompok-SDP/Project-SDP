<?php
    require_once("../../config.php");
    $query="SELECT * from pegawai p ";
    $arr_query=mysqli_query($conn,$query);
    foreach ($arr_query as $key => $value) {
        echo"<tr onclick='editPegawai(\"$value[id_pegawai]\")'>";
        echo"<td>$value[id_pegawai]</td>";
        echo"<td>$value[nama]</td>";
        echo"<td>$value[jabatan]</td>";
        echo"<td>$value[nohp]</td>";
        if($value["status"]=="1"){
            echo "<td>";
            echo "<button type='button' onclick='banned(\"$value[id_pegawai]\")' class='btn btn-block btn-outline-primary'>Banned</button>";
            echo "</td>";
        }else{
            echo "<td>";
            echo "<button type='button' onclick='banned(\"$value[id_pegawai]\")' class='btn btn-block btn-outline-danger'>Unbanned</button>";
            echo "</td>";
        }
        echo"</tr>";

    }
?>
<script>
    function banned(id){
        $.ajax({
            method: "post",
            url: "pegawai/banned.php",
            data: {
                id:id
            },
            success: function (response) {
                getAkun();
            }
        });
    }
    function jabatan(){
        $.ajax({
            method0: "post",
            url: "pegawai/jabatan.php",
            success: function (response) {
                $("#jabatan2").html(response);
            }
        });
    }
    function editPegawai(id){
        $.ajax({
            method: "post",
            url: "pegawai/editPegawai.php",
            data: {
                id:id
            },
            success: function (response) {
                $("#ubah").html(response);
                jabatan();
            }
        });
    }

</script>