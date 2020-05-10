<?php
session_start();
    if($_SESSION["login"]=="pegawai"){
        echo "<div class='col-12 elevation-2' style='padding: 10px;'>";
		
		
        echo"<label style='min-width:159px'> Reservasi Code: </label> 
        ";echo"<input type='text' class='input-medium' placeholder='Code'  id='reservasiKode'>
        ";echo"<button type='button' class='btn bg-gradient-primary btn-sm' id='subvcode' onclick='CheckPromo()' style='margin-top: -5px;'>Check</button><br>
        ";echo"<div id='err' style='color: red; margin-left: 160px; display: none;'>Masukkan Kode Voucher!</div>";
        
		echo"</div>";
    }
     
?>