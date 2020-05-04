<?php
    require_once("../../config.php");
    session_start();
    $email = "";
    $idmember = $_POST['idmember'];
    if($idmember !=""){
        
        $query = "SELECT email from member where id_member= '$idmember'";
        $query=mysqli_query($conn,$query);
        $query=mysqli_fetch_assoc($query);
        $email = $query['email'];
    }
    $dt = new DateTime();
    $waktu = $dt->format('Y-m-d H:i:s');
    $rating = $_POST['rating'];
    $isi = $_POST['isi'];

    $query=mysqli_fetch_assoc(mysqli_query($conn_detail,"SELECT lpad(count(*)+1,5,0) as jumlah from kritik"));
    $id=$query["jumlah"];
    $ids="KR".$id;
    $tx = "INSERT into kritik values('$ids','$isi','$waktu','$email','$rating')";
   $qw = mysqli_query($conn_detail,$tx);
    
       echo "Terima kasih atas saran dan kritik yang anda berikan";

  


?>
