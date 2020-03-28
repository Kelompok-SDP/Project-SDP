<?php
    require_once("../../config.php");
   if($_POST["action"]=="recover")
    {
     //delete kategori
     $id  = $_POST['id'];
     $query = "UPDATE MENU SET STATUS = 1 WHERE ID_MENU = '$id'";
     mysqli_query($conn,$query) ;
    } else
    if($_POST["action"]=="showdata"){
        $isi  = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter ==1 ){
            $pb = "nama_menu";
        } else{
            $pb = "harga_menu";
        }
        $query="SELECT * FROM MENU WHERE $pb LIKE '%$isi%' AND STATUS = 1";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-head-fixed text-nowrap'>
        <thead>
        <tr>
        <th>Id Menu</th>
        <th>Nama Menu</th>
        <th>Harga Menu</th>
        <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_menu"];
            echo" <tr>
                <td>".$row['id_menu']."</td>
                <td>".$row['nama_menu']."</td>
                <td>".$row["harga_menu"]."</td>
                <td>
                    <button onclick='edit('".$row["id_menu"].")' class='btn btn-primary'>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>
            </tr> '";
        }
        echo " </tbody>
        </table>";

    }
    else if($_POST["action"]=="showdata2"){
        $isi  = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter ==1 ){
            $pb = "nama_menu";
        } else{
            $pb = "harga_menu";
        }
        $query="SELECT * FROM MENU WHERE $pb LIKE '%$isi%' AND STATUS = 0";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-head-fixed text-nowrap'>
        <thead>
        <tr>
        <th>Id Menu</th>
        <th>Nama Menu</th>
        <th>Harga Menu</th>
        <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_menu"];
            echo" <tr>
                <td>".$row['id_menu']."</td>
                <td>".$row['nama_menu']."</td>
                <td>".$row["jenis_menu"]."</td>
                <td>
                <button onclick='pulihkan('".$row["id_menu"].")' class='btn btn-primary'>Pulihkan</button>
            </tr> '";
        }
        echo " </tbody>
        </table>";
    }
     

?>