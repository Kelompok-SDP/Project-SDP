<?php
    include("../../config.php");
    session_start();
    $query="SELECT lpad(max(substr(id_hjual,-3,3))+1,3,0) as \"id\"  from hjual";
    $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $id_htrans= "H".$query["id"];
    $today= date("Y-m-d");
    $total=$_SESSION["harga_akhir_Pesanan"];
    $jenis=$_SESSION["jenis"];
    if($jenis=="Dine-in"){
        $pegawai=$_SESSION["pegawai"];
        $member="default";
    }else{
        $pegawai="";
        $member=$_SESSION["pelanggan"];
    }

    $alamat=$_POST["alamat"];
    $time=$_POST["time"];
    $date=$_POST["date"];
    $ket_meja=$_POST["keterangan_meja"];
    $keterangan="Alamat:$alamat,<br>Waktu:$time,<br>Hari:$date,<br>Keterangan Meja:$ket_meja";

    echo $id_htrans."<br>";
    echo $today."<br>";
    echo $total."<br>";
    echo $jenis."<br>";
    echo $pegawai."<br>";
    echo $member."<br>";
    echo $keterangan."<br>";

    // $query="INSERT into hjual values('$id_htrans','$today','$total','$jenis','$pegawai','$member')";
    // echo $query."<br>";
    // mysqli_query($conn,$query);
    $semua_menu=$_SESSION["nama_menu"];
    $semua_menu=explode(" ,",$semua_menu);

    $jumlah_menu=count($semua_menu);
    $ctr=0;
    foreach ($semua_menu as $key => $value) {
        if($ctr<$jumlah_menu-1){

            $query="SELECT lpad(max(substr(id_djual,-3,3))+1,3,0) as \"id\"  from djual";
            $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
            $id_dtrans= "DJ".$query["id"];

            $jumlah=$_SESSION["pilih_menu"][$value];
            if(substr($value,0,2)=="ME"){
                $query = "select *  from menu where id_menu = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $harga = $menu['harga_menu'];
    
    
            } else{
                $query = "select *  from paket where id_paket = '$value'";
                $menu = mysqli_fetch_assoc(mysqli_query($conn,$query));
                $harga = $menu['harga_paket'];
    
            }
            
            $total=$jumlah*$harga;

            // $query="INSERT into djual values('$id_dtrans','$value','$harga','$jumlah','$total','$id_htrans')";
            // mysqli_query($conn,$query);
            // echo $query."<br>";
            $ctr++;
        }
    }
?>