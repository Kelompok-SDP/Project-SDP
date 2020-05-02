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
        $isi = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter == 1){
            $pb = "nama_paket";
            $query="SELECT * FROM PAKET WHERE $pb LIKE '$isi%' AND STATUS = 1";
        }else{
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "harga_paket";
            $query="SELECT * FROM PAKET WHERE $pb >= $min AND $pb <= $max AND STATUS = 1";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-head-fixed text-nowrap' id='showurut'>
        <thead>
        <tr>
        <th>Nama Paket</th>
        <th>Harga paket</th>
        <th>Action</th>
        </tr>
        </thead>
            <tbody>";
            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_paket"];
                $angka = $row["harga_paket"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            echo" <tr>
                <td>".$row['nama_paket']."</td>
                <td>".$hasil_rupiah."</td>
                <td>
                    <button onclick='edit(\"$row[id_paket]\")' class='btn btn-primary'>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>
                </tr>";
        }
        echo " </tbody>
        </table>
        <script>
            $(function(){
                $('#showurut').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            });
            });
        </script>";

    }
    else if($_POST["action"]=="showdata2"){
        $isi = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter == 1){
            $pb = "nama_paket";
            $query="SELECT * FROM PAKET WHERE $pb LIKE '$isi%' AND STATUS = 0";
        }else{
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "harga_paket";
            $query="SELECT * FROM PAKET WHERE $pb >= $min AND $pb <= $max AND STATUS = 0";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-head-fixed text-nowrap' id='purgatoryurut'>
        <thead>
        <tr>
        <th>Nama Paket</th>
        <th>Harga Paket</th>
        <th>Action</th>
        </tr>
            </thead>
            <tbody>";
            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_paket"];
                $angka = $row["harga_paket"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            echo" <tr>
                <td>".$row['nama_paket']."</td>
                <td>".$hasil_rupiah."</td>
                <td>
                    <button onclick='pulihkan(\"$row[id_paket]\")' class='btn btn-primary'>Pulihkan</button>
                </tr>";
        }
        echo " </tbody>
        </table>
        <script>
        $(function(){
            $('#purgatoryurut').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': false,
        'info': true,
        'autoWidth': false,
        'responsive': true,
        });
        });
        </script>";
    }
     

?>