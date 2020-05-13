<label style="min-width:159px; color: red;">Our Restaurant open at 10 AM until 8 PM</label><br>
<label style="min-width:159px">Take Away At: </label> 
<input type="time" id="time_res" name="appt" min="10:00" max="20:00" required><br>
<?php
session_start();
    $_SESSION["ongkir"]=0;
    $_SESSION["jenis"]="Take-away"
?>