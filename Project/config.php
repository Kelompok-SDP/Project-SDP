<?php session_start();
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbBase = "restoran";
    $dbBase2 = "detail";
    $conn = mysqli_connect($host,$user,$password,$dbBase);
    $conn_detail = mysqli_connect($host,$user,$password,$dbBase2);
?>