<small>Office hours are 10am to 8pm</small>
<input type="date" name="" id="date_res" value="5/5/2020">
<input type="time" id="time_res" name="appt" min="10:00" max="20:00" required><br>
<div id='keterangan_meja'></div><br>
<?php
    session_start();
    $_SESSION["ongkir"]=0;
    $_SESSION["jenis"]="Reservasi"
?>
<button class="btn bg-gradient-primary btn-sm" onclick="tomeja()" id="orderTable">Pesan Kursi</button>
