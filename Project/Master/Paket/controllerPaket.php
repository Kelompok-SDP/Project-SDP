<?php
    require_once("../../config.php");
   if($_POST["action"]=="recover")
    {
     //delete paket
     $id  = $_POST['id'];
     $query = "UPDATE PAKET SET STATUS = 1 WHERE id_paket = '$id'";
     mysqli_query($conn,$query) ;
    } else
    if($_POST["action"]=="showdata"){
        $isi  = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter ==1 ){
            $pb = "nama_paket";
        } else{
            $pb = "harga_paket";
        }
        $query="SELECT * from paket where $pb like '%$isi%' and status = 1";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-head-fixed text-nowrap'>
        <thead>
        <tr>
        <th>Id Paket</th>
        <th>Nama Paket</th>
        <th>Harga paket</th>
        <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_paket"];
            echo" <tr>
                <td>".$row['id_paket']."</td>
                <td>".$row['nama_paket']."</td>
                <td>".$row["harga_paket"]."</td>
                <td>
                    <button onclick='edit('".$row["id_paket"].")' class='btn btn-primary'>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>
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
            $pb = "nama_paket";
        } else{
            $pb = "harga_paket";
        }
        $query="SELECT * from paket where $pb like '%$isi%' and status = 0";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-head-fixed text-nowrap'>
        <thead>
        <tr>
        <th>Id Paket</th>
        <th>Nama Paket</th>
        <th>Harga Paket</th>
        <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_paket"];
            echo" <tr>
                <td>".$row['id_paket']."</td>
                <td>".$row['nama_paket']."</td>
                <td>".$row["harga_paket"]."</td>
                <td>
                <button onclick='pulihkan('".$row["id_paket"].")' class='btn btn-primary'>Pulihkan</button>
            </tr> '";
        }
        echo " </tbody>
        </table>";
    }
     

?>