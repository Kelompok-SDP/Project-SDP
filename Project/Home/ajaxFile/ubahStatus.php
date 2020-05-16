<?php
    session_start();
    $status=$_POST["status"];
    $_SESSION["status_member_code"]=$status;
?>