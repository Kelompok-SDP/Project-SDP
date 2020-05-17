<?php
    $isi = $_POST['sebelum'];
    $id = $_POST['id'];

    require_once("../../config.php");
    $query1 = "select * from kupon where id_kupon = '$id'";
    $rsc = mysqli_query($conn,$query1);
    $id_menu = "";
    foreach($rsc as $key=>$data){
        $id_menu = $data['id_menu'];
    }

    $query1 = "select * from menu ";
    $rsc = mysqli_query($conn,$query1);
   
    foreach($rsc as $key=>$data){
        if($id_menu == $data['id_menu']){
            echo "<option value='".$data['id_menu']."' selected>".$data["nama_menu"]."</option>";
        }else{
            echo "<option value='".$data['id_menu']."' >".$data["nama_menu"]."</option>";

        }
        
        
    }
   



?>