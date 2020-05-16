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
        $isi = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter == 1){
            $pb = "nama_promo";
            $query="SELECT * FROM PROMO WHERE $pb LIKE '$isi%' AND STATUS_PROMO = 1";
        }else{
            $pb = "jenis_promo";
            $query="SELECT * FROM PROMO WHERE $pb = '$isi' AND STATUS_PROMO = 1";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stkat'>
        <thead>
        <tr>
                <th>Nama Promo</th>
                <th>Detail Promo</th>
                <th>Jenis Promo</th>
                <th>Awal Periode Promo</th>
                <th>Akhir Periode Promo</th>
                <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            $jpro= '';
            foreach ($hasil as $key=>$row){
                if($row['jenis_promo']=="M") $jpro= "Promo Menu";
                else if($row['jenis_promo']=="HR") $jpro = "Promo Hari Raya";
                else $jpro= "Promo Buy 1 Get 1 Free";
            echo" <tr>
            <td>
            <form action='promo/openDetail.php' method='post' target='_blank'>
                   <button type='submit' name='detail' value=\"$row[id_promo]\" style='  background-color: Transparent;
                   background-repeat:no-repeat;
                   border: none;
                   color: blue;
                   cursor:pointer;
                   overflow: hidden;
                   outline:none;'>".$row['nama_promo']."</button>
               </form>
               </td>
               <td>".$row["detail_promo"]."</td>
                <td>".$jpro."</td>
                <td>".$row["periode_awal"]."</td>
                <td>".$row["periode_akhir"]."</td>
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
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            });
            });
        </script>
        
        
        
        ";

    }
    else if($_POST["action"]=="showdata2"){
        $isi = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter == 1){
            $pb = "nama_promo";
            $query="SELECT * FROM PROMO WHERE $pb LIKE '$isi%' AND STATUS_PROMO = 0";
        } else{
            $pb = "jenis_promo";
            $query="SELECT * FROM PROMO WHERE $pb = '$isi' AND STATUS_PROMO = 0";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stpurg'>
        <thead>
        <tr>
            <th>Nama Promo</th>
            <th>Detail Promo </th>
            <th>Jenis Promo</th>
            <th>Awal Periode Promo</th>
            <th>Akhir Periode Promo</th>
            <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            $jpro= '';
            foreach ($hasil as $key=>$row){
                if($row['jenis_promo']=="M") $jpro= "Promo Menu";
                else if($row['jenis_promo']=="HR") $jpro = "Promo Hari Raya";
                else $jpro= "Promo Buy 1 Get 1 Free";
            echo" <tr>
            <td>
            <form action='promo/openDetail.php' method='post' target='_blank'>
                   <button type='submit' name='detail' value=\"$row[id_promo]\" style='  background-color: Transparent;
                   background-repeat:no-repeat;
                   border: none;
                   color: blue;
                   cursor:pointer;
                   overflow: hidden;
                   outline:none;'>".$row['nama_promo']."</button>
               </form>
   
                
               </td>
                <td>".$row["detail_promo"]."</td>
                <td>".$jpro."</td>
                <td>".$row["periode_awal"]."</td>
                <td>".$row["periode_akhir"]."</td>
              
                    <td>
                <button onclick='pulihkan(\"$row[id_promo]\")' class='btn btn-primary'>Pulihkan</button>
            </tr>";
        }
        echo " </tbody>
        </table>
        <script>
            $(function(){
                $('#stpurg').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            });
            });
        </script>
        ";
    }
     

?>