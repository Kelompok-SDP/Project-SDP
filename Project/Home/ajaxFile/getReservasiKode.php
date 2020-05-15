<?php
session_start();
    if($_SESSION["login"]=="pegawai"){
        echo "<div class='col-12 elevation-2' style='padding: 10px;'>";
		
		
        echo"<label style='min-width:159px'> Email Member : </label> 
        ";echo"<input type='text' class='input-medium' placeholder='Email Member'  id='member_id'><br>
        ";echo"<div id='err' style='color: red; margin-left: 160px; display: none;'>Masukkan Nama Member !</div>";
        echo"<label style='min-width:159px'> Reservasi Code: </label> 
        ";echo"<input type='text' class='input-medium' placeholder='Reservasi Code'  id='reservasiKode'><br>
        ";echo"<button type='button' class='btn bg-gradient-primary btn-sm' onclick='CheckRes()' id='subvcode' onclick='CheckRes()' style='margin-top: -5px;'>Check</button>
        ";echo"<div id='err' style='color: red; margin-left: 160px; display: none;'>Masukkan Kode Reservasi !</div>";
		echo"</div>";
    }
     
?>