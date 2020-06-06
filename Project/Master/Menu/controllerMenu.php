<?php
    require_once('../../config.php');
   if($_POST["action"]=="recover")
    {
     //delete kategori
     $id  = $_POST["id"];
     $query = "UPDATE MENU SET STATUS = 1 WHERE ID_MENU = '$id'";
     mysqli_query($conn,$query) ;
    } else
    if($_POST["action"]=="showdata"){
        $isi = $_POST["source"];
        $filter = $_POST["fillter"];
        $pb ='';
        if($filter == 1){
            $pb = "nama_menu";
            $query="SELECT * FROM MENU WHERE $pb LIKE '$isi%' AND STATUS = 1";
        }else{
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "harga_menu";
            $query="SELECT * FROM MENU WHERE $pb >= $min AND $pb <= $max AND STATUS = 1";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='showurut'>
        <thead>
        <tr>
        <th>Nama Menu</th>
        <th>Harga Menu</th>
        <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_menu"];
                $angka = $row["harga_menu"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            echo" <tr>
            <td>
            <form action='Menu/openDetail.php' method='post' target='_blank'>
            <button type='submit' name='detail' value=\'$row[id_menu]\' style='  background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            color: blue;
            cursor:pointer;
            overflow: hidden;
            outline:none;'>".$row["nama_menu"]."</button>
             </form> </td>
                <td>".$hasil_rupiah."</td>
                <td>";
                $query = "SELECT * FROM PROMO_PAKET WHERE ID_PAKET = '$row[id_menu]' AND STATUS = 1";
                $list = mysqli_query($conn,$query);
                $row2 = mysqli_num_rows($list);
                if($row2 > 0){
                    echo "<button onclick='edit(\"$row[id_menu]\")' class='btn btn-primary' disabled>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>";
                }else{
                    echo "<button onclick='edit(\"$row[id_menu]\")' class='btn btn-primary'>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>";
                }
            echo "</td>
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
        $isi = $_POST["source"];
        $filter = $_POST["fillter"];
        $pb ='';
        if($filter == 1){
            $pb = "nama_menu";
            $query="SELECT * FROM MENU WHERE $pb LIKE '$isi%' AND STATUS = 0";
        }else{
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "harga_menu";
            $query="SELECT * FROM MENU WHERE $pb >= $min AND $pb <= $max AND STATUS = 0";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='purgatoryurut'>
        <thead>
        <tr>
        <th>Nama Menu</th>
        <th>Harga Menu</th>
        <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_menu"];
                $angka = $row["harga_menu"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            echo" <tr>
            <td>
            <form action='Menu/openDetail.php' method='post' target='_blank'>
            <button type='submit' name='detail' value=\'$row[id_menu]\' style='  background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            color: blue;
            cursor:pointer;
            overflow: hidden;
            outline:none;'>".$row["nama_menu"]."</button>
             </form> </td>
                <td>".$hasil_rupiah."</td>
                <td>";
                echo "<button onclick='pulihkan(\"$row[id_menu]\")' class='btn btn-primary'>Pulihkan</button>";
            echo "</td>
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