<?php
    require_once("../../config.php");
    $query="SELECT * from member";
    $arr_query=mysqli_query($conn,$query);
    foreach ($arr_query as $key => $value) {
        echo"<tr>";
        echo"<td>$value[fullname]</td>";
        echo"<td>$value[username]</td>";
        echo"<td>$value[alamat]</td>";
        echo"<td>$value[kota]</td>";
        if($value["status"]=="1"){
            echo "<td>";
            echo "<button type='button' onclick='banned(\"$value[username]\")' class='btn btn-block btn-outline-primary'>Banned</button>";
            echo "</td>";
        }else{
            echo "<td>";
            echo "<button type='button' onclick='banned(\"$value[username]\")' class='btn btn-block btn-outline-danger'>Kembalikan</button>";
            echo "</td>";
        }
        echo"</tr>";

    }
?>
<script>
    function banned(id){
        $.ajax({
            method: "post",
            url: "edit_akun/banned.php",
            data: {
                id:id
            },
            success: function (response) {
                getAkun();
            }
        });
    }
</script>