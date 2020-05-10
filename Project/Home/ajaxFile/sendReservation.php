<?php 
	//session_start();
	require_once('../../email/mailer2/class.phpmailer.php');
	require_once("../../config.php");
	//-----------------EMAIL-----------------
	$captcha = "";
	if($_POST["id"] != ""){
        $id = $_POST["id"];
        $nama  = "";
        $query = "select * from member where id= '$id'";
        $email = "";
        $mys = mysqli_query($conn,$query);
        foreach($mys as $data=>$row){
            $nama = $row['fullname'];
            $email = $row['email'];
        }

        $keterangan = "";
        $koderev = "RESVXX-;";
        $query = "select * from hjual where id_member ='$id' and jenis_pemesanan ='Reservasi'  order by tanggal_transaksi desc";
        $mysqli = mysqli_query($conn,$query);
        foreach($mysqli as $data=>$row){
            $koderev = $koderev.$row['id_hjual'];
            $keterangan = $row["keterangan"];
        }





		$mail             = new PHPMailer();
		$address 		  = $email;					
		
	// $result = mysqli_fetch_assoc(mysqli_query($conn,"SELECT password FROM member where email='$address'"));
		$mail->Subject    = "Konfirmasi Email";

		$body			  = 'Dear '.$nama. ' Berikut kode untuk reservasi anda : '.$koderev.'<br><br>'.$keterangan.'<br> silahkan menujukan kode teersebut ke pegawai kami. Terima Kasih';

		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.google.com"; // SMTP server
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
												// 1 = errors and messages
												// 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "uwenakresto@gmail.com";  // GMAIL username mu
		$mail->Password   = "Duomaut123";     // GMAIL password mu

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);

		$mail->AddAddress($address, "Kepada Anda");

		//$mail->AddAttachment("result/".$file);      // attachment
		

		if($mail->Send()) {  
		// echo "[SEND TO:] " . $address . "<br>";
		echo "berhasil";
		}
	}
	//--------------END EMAIL----------------
			
	
	 
	  

?>