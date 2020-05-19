<?php
    require_once("../../config.php");
    $_SESSION["ongkir"]=0;
    $_SESSION["jenis"]="Reservasi";
?>
<label style="min-width:159px; color: red;">Our Restaurant open at 10 AM until 8 PM</label><br>
<label style="min-width:159px;">Date    : </label><input type="date" name="" id="date_res" value="5/5/2020"><br>
<label style="min-width:159px;">Time    :</label><input type="time" id="time_res" name="appt" min="10:00" max="20:00" required><br>
<label style="min-width:159px">Banyak Orang : </label> <Input id="banyak_orang"></Input>
