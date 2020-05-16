<?php
   require_once("../../config.php");
   $_SESSION["ongkir"]=0;
   $_SESSION["jenis"]="Dine-in";
?>
<label style="min-width:159px">Member Code: </label> 
<input type="text" class="input-medium" placeholder="Code" id="kodemem"><br><br>
<label style="min-width:159px">Tables </label><br>
<hr>
<div id='keterangan_meja'></div><br>
<button class="btn bg-gradient-primary btn-sm" onclick="tomeja()" id="orderTable2">Pesan Kursi</button>
