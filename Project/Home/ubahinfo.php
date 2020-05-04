<style>
    .save:hover{
        background-color: blue;
    }
</style>
<?php
    require_once("../config.php");
    session_start();
    $id= $_GET['id'];
    if($id== "null"){
        header("location: ../login_register/login.php");
    }
    require_once("MCD/header.php"); 
    require_once("MCD/title.php"); 
    $nama = "";
    $email = "";
    $alamat = "";
    $notlp = "";
    $kota = "";
    $kodepos = "";
        $qwery = "select * from member where id_member = '$id'";
    $sql= mysqli_query($conn,$qwery);
    foreach($sql as $data=>$key){
        $nama = $key['fullname'];
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

    <?php include('Mcd/header.php'); ?>
<body style='margin-top:5.5%;'>
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
    <div class="col-md-8  " >
            <div class="form-group ">
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:80px;">Name: </h5>
                    <input type="text" class="form-control" placeholder="Fullname" required="" value="<?=$nama?>" name="email" id= "fullname" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:80px;">Alamat: </h5>
                    <input type="text" class="form-control" placeholder="Alamat" required=""value="<?=$alamat?>" name="email"  id="alamat" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:80px;">Email: </h5>
                    <input type="text" class="form-control" placeholder="Email" required="" value="<?=$email?>" name="email" id="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:80px;">Telp: </h5>
                    <input type="number" class="form-control" placeholder="Telepon" required="" value="<?=$notlp?>" name="email" id="telp" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:80px;">Kota: </h5>
                    <input type="text" class="form-control" placeholder="Kota" required="" value="<?=$kota?>" name="email"  id = "kota" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                <div class="input-group" style="margin:10px;">
                <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:80px;">Kode Pos: </h5>
                    <input type="Number" class="form-control" placeholder="Kode Pos" required="" value="<?=$kodepos?>" name="email"  id="pos" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                
                </div>
                       
               </div>
        </div>


        <div class="col-md-8 col-lg-6 col-xl-4 " >
            <button class="btn btn-primary btn-submit btn-submit-footer sbscrb-tag save"  style="border-color:green;background-color:green;"onclick="kirimup()" type="submit" id="button-addon-footer">
                                            Save
            </button>
            <button class="btn btn-primary btn-submit btn-submit-footer sbscrb-tag"style="margin-left:50px;" onclick="destroy()" type="submit" id="button-addon-footer">
                                            Sign Out
            </button>
               
        </div>
      
    </div>
</section>
<footer class="light">
<div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <ul class="text-md-right">
                         <li><a href="">+62-85-00000</a></li>
                         <li><a href="">UwenakResto@ciamik.com</a></li>
                         <li><a href="">Jl Untung Suropati no 2B</a></li>
                    </ul>
                </div>
                <div class="col-md order-md-first">
                    © 2019 PT Merugi-Bahagia
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="MCD/jquery/jquery.min.js"></script>
<script>
    function kirimup(){
        var nama = document.getElementById('fullname').value;
        var alamat= document.getElementById('alamat').value;
        var telp= document.getElementById('telp').value;
        var kota= document.getElementById('kota').value;
        var pos= document.getElementById('pos').value;
        var email= document.getElementById('email').value;
        var id = document.getElementById('custid').value
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

</script>
