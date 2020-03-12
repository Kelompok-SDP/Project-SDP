<?php
    require_once("../../config.php");
    $id=$_POST["id"];
    ECHO $id;
    $query="SELECT status from member where username='$id'";
    $query=mysqli_query($conn,$query);
    $query=mysqli_fetch_assoc($query);
    if($query["status"]==1){
        mysqli_query($conn,"UPDATE member set status=0 where username='$id'");
    }else{
        mysqli_query($conn,"UPDATE member set status=1 where username='$id'");
    }
?>