<?php
    include("../../config.php");
    $email=$_POST["email"];
    $query="SELECT * from member where email='$email'";
    $value=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $_SESSION["pelanggan"]=$value["id_member"];
    echo "Nama Member : $value[fullname]";
?>