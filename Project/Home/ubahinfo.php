<style>
    .bx:hover{
        background-color:#BEBEBE;
    }

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #808080;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #808080;
  color: white;
}
</style>
<?php
   // session_start();
  
    require_once("../config.php");
   
    $id= $_GET['id'];
    if($id== "null"){
        header("location: ../login_register/login.php");
    }
    require_once("MCD/title.php");
    require_once("../Source.php");
    $nama_full = "";
    $email = "";
    $alamat = "";
    $notlp = "";
    $kota = "";
    $kodepos = "";
        $qwery = "select * from member where id_member = '$id'";
    $sql= mysqli_query($conn,$qwery);
    foreach($sql as $data=>$key){
        $nama_full = $key['fullname'];
        $email = $key['email'];
        $alamat = $key['alamat'];
        $notlp = $key["no_hp"];
        $kota = $key['kota'];
        $kodepos = $key['kode_pos'];
    }

?>
<html class="no-js" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><meta name="page" content="index" initial="index">
<meta name="csrf-token" content="Yfr9jwojX1hAPHrutx39SIDiLKvM3KRrp9aYkA1i">
<!--<![endif]-->


    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<script type="text/javascript" async="" src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/ec.js"></script><script type="text/javascript" async="" src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/conversion_async.js"></script><script type="text/javascript" async="" src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/analytics.js"></script><script src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/723821301303563.js" async=""></script><script async="" src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/fbevents.js"></script><script async="" src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/gtm.js"></script><script type="application/ld+json">{"@context":"https:\/\/schema.org","@type":"WebPage","name":"Over 9000 Thousand!","description":"For those who helped create the Genki Dama"}</script>


<link rel="stylesheet" href="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/main.css">
        <link rel="dns-prefetch" href="https://https//mcdonalds.co.id/">
            <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5NF7SB8');</script>
        <!-- End Google Tag Manager -->
    <link rel="stylesheet" type="text/css" href="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/mapbox.css"><style type="text/css">.fancybox-margin{margin-right:17px;}</style><script src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/a"></script></head>
<input type="hidden" id="ndas" value="<?=$id?>"></div>
<div id="rogue">
    <?php include('Mcd/header.php'); ?>
    </div>

<body style='margin-top:2.5%; '>
<input type="hidden" value = "<?php echo $id; ?>" id="custid">

<a href="https://www.mcdelivery.co.id/" class="btn btn-yellow btn-floating animated vp-slideinright delayp10 pesan-tag" target="_blank" style="">
    <img src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/ic_mcdelivery.png" class="mcd-delivery-icon" alt="Yellow Element">
    <span>Pesan Sekarang</span>
</a>
        <!-- Google Tag Manager (noscript) -->
    <!-- End Google Tag Manager (noscript) -->

<section class="py-main section-other-menu">
    <div class="container" style="margin-top:-5vh;">
    <h3 style="margin:30px; font-size:50pt;"> Your Personal Info </h3>
    <hr>
    <div class="row">
        <div class="col-8  " >
     
            <div class="form-group ">
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Name </h5><h1 style="margin-right:10px; font-weight:1px;">:</h1>
                    <input type="text" class="form-control" placeholder="Fullname" required="" value="<?=$nama_full?>" name="email" id= "fullname" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Alamat </h5><h1 style="margin-right:10px; font-weight:1px;">:</h1>
                    <input type="text" class="form-control" placeholder="Alamat" required=""value="<?=$alamat?>" name="email"  id="alamat" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Email </h5><h1 style="margin-right:10px; font-weight:1px;">:</h1>
                    <input type="text" class="form-control" placeholder="Email" required="" value="<?=$email?>" name="email" id="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Telp </h5><h1 style="margin-right:10px; font-weight:1px;">:</h1>
                    <input type="number" class="form-control" placeholder="Telepon" required="" value="<?=$notlp?>" name="email" id="telp" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Kota </h5><h1 style="margin-right:10px; font-weight:1px;">:</h1>
                    <input type="text" class="form-control" placeholder="Kota" required="" value="<?=$kota?>" name="email"  id = "kota" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Kode Pos </h5><h1 style="margin-right:10px; font-weight:1px;">:</h1>
                    <input type="Number" class="form-control" placeholder="Kode Pos" required="" value="<?=$kodepos?>" name="email"  id="pos" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                       
               </div>
        </div>

        <div class="col-4">
                
    
        
                    <div class="info-box elevation-2">
                        <div class="info-box-content" style="width: 150px;height:290px;">
                            <span class="info-box-text" style="font-weight:bold;"><h3>Recent History</h3></span>
                            <hr>
                                <div id="historia" style="height:350px;">
                                </div>

                        </div>
                    </div>
         
    
        
    
    
    
        </div>




    </div>

        <div class="row">
        <div class="col-8  " >
            <button class="btn btn-primary btn-submit btn-submit-footer sbscrb-tag save"  style="margin-left:20px;border-color:green;background-color:green;"onclick="kirimup()" type="submit" id="button-addon-footer">
                                            Save
            </button>
           
               
        </div>
        <div class="col-4 " >
           
        <button class="btn btn-primary btn-submit btn-submit-footer sbscrb-tag"style="float:right;margin-left:50px;" onclick="destroy()" type="submit" id="button-addon-footer">
                                            Sign Out
        </button>
               
        </div>
        </div>
       
      
    </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
           
            <h2 >Detail Transaksi</h2>
            <span class="close">&times;</span>
            </div>
            <div class="modal-body" id="detilhistory">
             
            </div>
          
        </div>

        </div>

    
</section>
<hr>
<?php require_once("MCD/footer.php") ?>
</body>
<script src="MCD/jquery/jquery.min.js"></script>
<script>
   $( document ).ready(function() {
        history();
        $("#dropmenu").html(
			"<a class='nav-link border-left' href='Homemenu.php'>Menu</a>");
    });
    function kirimup(){
        var nama = document.getElementById('fullname').value;
        var alamat= document.getElementById('alamat').value;
        var telp= document.getElementById('telp').value;
        var kota= document.getElementById('kota').value;
        var pos= document.getElementById('pos').value;
        var email= document.getElementById('email').value;
        var id = document.getElementById('custid').value;
        $.ajax({
        method: "post",
        url: "MCD/updateinfo.php",
        data:{
            id: id,
            nama:nama,
            email:email,
            alamat: alamat,
            kota:kota,
            pos:pos,
            telp:telp
        },
        success: function (response) {
            alert(response);
            setTimeout(
              window.location.href = "ubahinfo.php?id="+document.getElementById('ndas').value
             , 5000);
           // $("#rogue").load("MCD/header.php");
        }
        
    });
    }
    
    function destroy(){
        $.ajax({
        method: "post",
        url: "MCD/logout.php",
        data:{
           
        },
        success: function (response) {
            setTimeout(
              window.location.href = "Home.php"
             , 5000);
        }
        
    });
    }

    var span = document.getElementsByClassName("close")[0];
    var modal = document.getElementById("myModal");

        span.onclick = function() {
            modal.style.display = "none";
            }

// When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }

    function detailhj(iddjual){
       
        modal.style.display = "block";
        $("#detilhistory").load("MCD/detilhistory.php?id="+iddjual);
    }

    function history(){
        var id = document.getElementById('custid').value;
        $.ajax({
            method: "post",
            url: "MCD/history.php",
            data:{
            id : id 
        },
        success: function (response) {
           // alert(response);
           
            $("#historia").html(response);
        }
        
    });
    }
</script>
