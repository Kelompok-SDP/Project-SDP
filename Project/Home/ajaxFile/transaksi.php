<?php
    include("../../config.php");
    // session_start();
    $query="SELECT lpad(nvl(max(substr(id_hjual,-3,3))+1,1),3,0) as \"id\"  from hjual";
    $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $id_htrans= "H".$query["id"];
    $_SESSION["id_hjual"]=$id_htrans;
    $today= date("Y-m-d");
    $total=$_SESSION["harga_akhir_Pesanan"];
    $jenis=$_SESSION["jenis"];
    // $nama_promo="";
    // if(isset($_SESSION["nama_promo"])){
    //     $nama_promo = $_SESSION["nama_promo"];

    // }
    $hargadiscpake = $_SESSION["hargapmenu"];
    $idpromodisc = $_SESSION["ipromomenu"];
    if($jenis=="Dine-in"){
        $pegawai=$_SESSION["pegawai"];
        if($_SESSION["pelanggan"]==""){
            $member="default";
        }else{
            $member=$_SESSION["pelanggan"];
        }
    }else{
        $pegawai="";
        $member=$_SESSION["pelanggan"];
    }

    $alamat=$_POST["alamat"];
    $time=$_POST["time"];
    $date=$_POST["date"];
    $ket_meja=$_POST["keterangan_meja"];
    $type=$_POST["method"];
    $banyak_orang=$_POST["banyak_orang"];
    $ctr=0;
    $Detail_meja="";
    if($ket_meja=="ada"){
        $Detail_meja=$_SESSION["isi_kursi"];
    }
    $disc=$_SESSION["disc"];
    // $promo=$_SESSION["promo"];
    
    $koderev = "RESVXX-".$id_htrans;

    $id_kupon=$_SESSION["kupon"];
    $harga_kupon=$_SESSION["harga_kupon"];

    $query="UPDATE kupon_member set status = 0 where id_kupon='$id_kupon' and id_member='$member'";
    mysqli_query($conn,$query);
    $keterangan="Alamat:$alamat||Waktu:$time||Hari:$date||Keterangan Meja:$ket_meja||detail_meja:$Detail_meja||total discount:$disc||jenis:$type||kode_res:$koderev||Keterangan Promo:$hargadiscpake||$idpromodisc||Keterangan Kupon:$id_kupon||$harga_kupon||banyak_orang:$banyak_orang";

    if($type=="poin"){
        $query="SELECT point from member where id_member='$member'";
        $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
        $point= $query["point"];
        if($point<$total){
            $ctr=1;
        }else{
            $query="UPDATE member set point=$point-$total where id_member='$member'";
            mysqli_query($conn,$query);
        }
    }

    if($type=="saldo"){
        $query="SELECT saldo_member from member where id_member='$member'";
        $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
        $point= $query["saldo_member"];
        if($point<$total){
            $ctr=1;
        }else{
            $query="UPDATE member set saldo_member=$point-$total where id_member='$member'";
            mysqli_query($conn,$query);
        }
    }

    if($ctr==0){
        if($_SESSION["pelanggan"]!=""){
            $dapat_poin=$total/100;
            $query="SELECT point from member where id_member='$member'";
            $query=mysqli_fetch_assoc(mysqli_query($conn,$query));
            $point= $query["point"];

            $query="UPDATE member set point=$point+$dapat_poin where id_member='$member'";
            mysqli_query($conn,$query);
            
        }
        $query="INSERT into hjual values('$id_htrans','$today','$total','$jenis','$pegawai','$member','$keterangan',0)";
        echo $query."<br>";
        mysqli_query($conn,$query);
        $semua_menu=$_SESSION["nama_menu"];
        $semua_menu=explode(" ,",$semua_menu);

        $jumlah_menu=count($semua_menu);
        $ctr=0;
        foreach ($semua_menu as $key => $value) {
            if($ctr<$jumlah_menu-1){

                $query="SELECT lpad(nvl(max(substr(id_djual,-3,3))+1,1),3,0) as \"id\"  from djual";
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

                $query="INSERT into djual values('$id_dtrans','$value','$harga','$jumlah','$total','$id_htrans')";
                mysqli_query($conn,$query);
                echo $query."<br>";
                $ctr++;
                $_SESSION["isi_kursi"]=" ";
                $_SESSION["ctr"]=0;
                $_SESSION["nama_menu"]="";
                $_SESSION["pilih_menu"]= array();
                $_SESSION["promo"]=0;
                $_SESSION["ongkir"]=0;
                $_SESSION["kupon"]="";
                $_SESSION["harga_kupon"]=0;
                $_SESSION["jenis"]="kosong";
            }
        }
    }else{
        echo "Point / Saldo Anda Tidak Mencukupi";
    }
?>