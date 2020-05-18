<?php
    include("../../config.php");
    $id=$_POST["id"];
    $query="SELECT * from kupon where id_kupon='$id'";
    $value_kupon=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $ctr=0;
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    for ($i=0; $i <count($arrMenu)-1 ; $i++) { 
        if($arrMenu[$i]==$value_kupon["id_menu"]){
            $ctr=1;
        }
    }
    if($ctr==1){
        $_SESSION["kupon"]=$id;
    }else{
        $_SESSION["kupon"]="";
    }
?>