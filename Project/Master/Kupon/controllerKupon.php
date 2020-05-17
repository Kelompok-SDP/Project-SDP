<?php
    require_once("../../config.php");
   if($_POST["action"]=="recover")
    {
     //delete kategori
     $id  = $_POST['id'];
     $query = "UPDATE `kupon` SET `status_kupon`= 1 WHERE id_kupon = '$id'";
     mysqli_query($conn,$query) ;
    } else
    if($_POST["action"]=="showdata"){
        $isi = $_POST['source'];
        $filter = $_POST['fillter'];
        $pb ='';
        if($filter == 1){
            $pb = "nama_kupon";
            $query="SELECT * FROM KUPON WHERE $pb LIKE '$isi%' AND STATUS_KUPON = 1";
        }else if($filter == 2){
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "harga_kupon";
            $query="SELECT * FROM KUPON WHERE $pb >= $min AND $pb <= $max AND STATUS_KUPON = 1";
        }
        else{
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "sisa_kupon";
            $query="SELECT * FROM KUPON WHERE $pb >= $min AND $pb <= $max AND STATUS_KUPON = 1";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stkat'>
        <thead>
        <tr>
                <th>Nama Kupon</th>
                <th>Harga Kupon</th>
                <th>Sisa Kupon</th>
                <th>Awal Periode Kupon</th>
                <th>Akhir Periode Kupon</th>
                <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            $angka= '';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_kupon"];
                $angka = $row["harga_kupon"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            echo" <tr>
                <td>".$row["nama_kupon"]."</td>
                <td>".$hasil_rupiah."</td>
                <td>".$row["sisa_kupon"]."</td>
                <td>".$row["periode_awal_kupon"]."</td>
                <td>".$row["periode_akhir_kupon"]."</td>
                <td>";
            echo "<button onclick='edit(\"$row[id_kupon]\")' class='btn btn-primary'>Edit <i class='fas fa-pencil-alt' style='padding-left:12px;color:white;'></i></button>";
            echo " </td> ";
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
            $pb = "nama_kupon";
            $query="SELECT * FROM KUPON WHERE $pb LIKE '$isi%' AND STATUS_KUPON = 0";
        }else if($filter == 2){
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "harga_kupon";
            $query="SELECT * FROM KUPON WHERE $pb >= $min AND $pb <= $max AND STATUS_KUPON = 0";
        }
        else{
            $tmp = explode(";", $isi);
            $min = $tmp[0];
            $max = $tmp[1];
            $pb = "sisa_kupon";
            $query="SELECT * FROM KUPON WHERE $pb >= $min AND $pb <= $max AND STATUS_KUPON = 0";
        }
        $hasil = mysqli_query($conn,$query);
        echo  "<table class='table table-bordered text-nowrap' id='stpurg'>
        <thead>
        <tr>
                <th>Nama Kupon</th>
                <th>Harga Kupon</th>
                <th>Sisa Kupon</th>
                <th>Awal Periode Promo</th>
                <th>Akhir Periode Promo</th>
                <th>Action</th>
        </tr>
            </thead>
            <tbody>";

            $tmp ='';
            $angka= '';
            foreach ($hasil as $key=>$row){
                $tmp = $row["id_kupon"];
                $angka = $row["harga_kupon"];
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            echo" <tr>
                <td>".$row["nama_kupon"]."</td>
                <td>".$hasil_rupiah."</td>
                <td>".$row["sisa_kupon"]."</td>
                <td>".$row["periode_awal_kupon"]."</td>
                <td>".$row["periode_akhir_kupon"]."</td>
                <td>";
             echo "<button onclick='pulihkan(\"$row[id_kupon]\")' class='btn btn-primary'>Pulihkan </button>";
             echo " </td> "; 
             echo " </tr> ";
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