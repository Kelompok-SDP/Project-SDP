<?php
    require_once("../../config.php");
   if($_POST["action"]=="recover")
    {
     //delete kategori
     $id  = $_POST['id'];
     $query = "UPDATE `promo` SET `status_promo`=1 WHERE id_promo = '$id'";
     mysqli_query($conn,$query) ;
    } else
    if($_POST["action"]=="showdata"){
        $isi  = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter ==1 ){
            $pb = "nama_promo";
        } else{
            $pb = "harga_promo";
        }
        $query="SELECT * from promo where $pb like '%$isi%' and status_promo = 1";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stkat'>
        <thead>
        <tr>
                 <th>Id Promo</th>
                <th>Nama Promo</th>
                <th>Harga Promo</th>
                <th>Awal Periode Promo</th>
                <th>Akhir Periode Promo</th>
                <th>Gambar</th>
                <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                //$tmp = $row["id_promo"];
            echo" <tr>
                <td>".$row['id_promo']."</td>
                <td>".$row['nama_promo']."</td>
                <td>".$row["harga_promo"]."</td>
                <td>".$row["periode_awal"]."</td>
                <td>".$row["periode_akhir"]."</td>
                <td>".$row["gambar_promo"]."</td>
                <td>";
             echo "<button onclick='edit(\"$row[id_promo]\")' class='btn btn-primary'>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>";
               echo " </tr> ";
        }
        echo " </tbody>
        </table>
        <script>
            $(function(){
                $('#stkat').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            });
            });
        </script>
        
        
        
        ";

    }
    else if($_POST["action"]=="showdata2"){
        $isi  = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter ==1 ){
            $pb = "nama_promo";
        } else{
            $pb = "harga_promo";
        }
        $query="SELECT * from promo where $pb like '%$isi%' and status_promo = 0";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stpurg'>
        <thead>
        <tr>
            <th>Id Promo</th>
            <th>Nama Promo</th>
            <th>Harga Promo</th>
            <th>Awal Periode Promo</th>
            <th>Akhir Periode Promo</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
               // $tmp = $row["id_kategori"];
            echo" <tr>
                <td>".$row['id_promo']."</td>
                <td>".$row['nama_promo']."</td>
                <td>".$row["harga_promo"]."</td>
                <td>".$row["periode_awal"]."</td>
                <td>".$row["periode_akhir"]."</td>
                <td>".$row["gambar_promo"]."</td>
                    <td>
                <button onclick='pulihkan(\"$row[id_promo]\")' class='btn btn-primary'>Pulihkan</button>
            </tr> '";
        }
        echo " </tbody>
        </table>
        <script>
            $(function(){
                $('#stpurg').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            });
            });
        </script>
        ";
    }
     

?>