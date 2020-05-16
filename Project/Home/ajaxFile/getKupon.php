<?php
    include("../../config.php");
    session_start();
    $id_member=$_SESSION["pelanggan"];
    $query="SELECT * from kupon_member where id_member='$id_member' and status=1";

    echo "<select name='' id='id_kupon'>";
     echo"<option value='kosong'>tidak pakai</option>";
    $query=mysqli_query($conn,$query);
    foreach ($query as $key => $value) {
        $query_kupon="SELECT * from kupon where id_kupon='$value[id_kupon]'";
        $values=mysqli_fetch_assoc(mysqli_query($conn,$query_kupon));
        echo"<option value='$values[id_kupon]'>$values[nama_kupon]</option>";
    }
    echo"</select>";
?>
