<?php
   session_start();
   $_SESSION["ongkir"]=0;
   $_SESSION["jenis"]="Dine-in";
   $_SESSION["status_member_code"]=false;
?>
<label style="min-width:159px" >Member Code: </label>
<input type="text" class="input-medium" placeholder="Code" id="kodemem">
<input type="checkbox" name="" id="ada_member" onchange="ubahStatus()"> Ada member ?<br><br>
<label style="min-width:159px">Tables </label><br>
<hr>
<div id='keterangan_meja'></div><br>
<button class="btn bg-gradient-primary btn-sm" onclick="tomeja()" id="orderTable2">Pesan Kursi</button>
<script>
   function ubahStatus(){
      $.ajax({
         type: "post",
         url: "ajaxFile/ubahStatus.php",
         data:{
            status: document.getElementById("ada_member").checked
         },
         success: function (response) {
            
         }
      });
   }
</script>