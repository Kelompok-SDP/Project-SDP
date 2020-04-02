<?php 
	require_once('mailer2/class.phpmailer.php');
		
	//-----------------EMAIL-----------------
	
	$mail             = new PHPMailer();
	$address 		  = $_POST["kepada"];					
	
	$mail->Subject    = "Subject Emailnya";

	$body			  = $_POST["pesan"];

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

	$mail->AddAddress($address, "Kepasa Siapa");

	//$mail->AddAttachment("result/".$file);      // attachment
	

	if($mail->Send()) {  
	  echo "[SEND TO:] " . $address . "<br>";
	}

	//--------------END EMAIL----------------
			
	
	 
	  

?>