<?php
    include("../../config.php");
    $id=$_POST["id"];
    $query="SELECT * from kupon where id_kupon='$id'";
    $value_kupon=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $ctr=0;
    $nama=$_SESSION["nama_menu"];
    $arrMenu=explode(" ,",$nama);
    foreach ($arrMenu as $key => $value) {
        if($value==$value_kupon["id_menu"]){
            $ctr=1;
        }
    }
    if($ctr==1){
        $_SESSION["kupon"]=$id;
        echo "berhasil tambah";
    }else{
        $_SESSION["kupon"]="";
        echo "makanan tidak ada dalam cart";
    }
?>