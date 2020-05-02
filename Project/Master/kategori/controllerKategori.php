<?php
    require_once("../../config.php");
   if($_POST["action"]=="recover")
    {
     //delete kategori
     $id  = $_POST['id'];
     $query = "UPDATE `kategori` SET `status_kategori`=1 WHERE id_kategori = '$id' ";
     mysqli_query($conn,$query) ;
    } else
    if($_POST["action"]=="showdata"){
        $isi  = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter == 1){
            $pb = "nama_kategori";
        } else{
            $pb = "jenis_kategori";
        }
        $query="SELECT * from kategori where $pb like '$isi%' and status_kategori = 1 order by 1 desc";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stkat'>
        <thead>
        <tr>
        <th>Nama Kategori</th>
        <th>jenis Kategori</th>
        <th>action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_kategori"];
            echo" <tr>
                <td>".$row['nama_kategori']."</td>
                <td>".$row["jenis_kategori"]."</td>
                <td>";
             echo "<button onclick='edit(\"$row[id_kategori]\")' class='btn btn-primary'>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>";
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
        $isi  = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter ==1 ){
            $pb = "nama_kategori";
        } else{
            $pb = "jenis_kategori";
        }
        $query="SELECT * from kategori where $pb like '$isi%' and status_kategori = 0 order by 1 desc";
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stpurg'>
        <thead>
        <tr>
        <th>Nama Kategori</th>
        <th>jenis Kategori</th>
        <th>action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_kategori"];
            echo" <tr>
                <td>".$row['nama_kategori']."</td>
                <td>".$row["jenis_kategori"]."</td>
                <td>
                <button onclick='pulihkan(\"$row[id_kategori]\")' class='btn btn-primary'>Pulihkan</button>
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