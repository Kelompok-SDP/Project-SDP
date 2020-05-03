<!DOCTYPE html>
<?php 
include("../config.php");
$ids = $_GET["id"];
$tmp = [];
$tmp = explode('0',$ids,2);
$harga = 0;
$nama = "";
$tdeskripsi = "";
$deskripsi = "";
$gambar = "";
if($tmp[0]== "MEN"){
    $query = "select * from menu where id_menu = '$ids'";
    $menu = mysqli_query($conn,$query);

    foreach($menu as $data=>$row){
        $nama = $row["nama_menu"];
        $deskripsi = $row["deskripsi"];
        $gambar = $row['gambar'];
        $harga = $row['harga_menu'];
        $hasil_rupiah = "Rp " . number_format($harga,2,',','.');

    }
    $gambar = "../Master/Menu/".$gambar;

} else{
    $query = "select * from paket where id_paket = '$ids'";
    $menu = mysqli_query($conn,$query);
    $idpaket  = "";
    foreach($menu as $data=>$row){
        $nama = $row["nama_paket"];
        $gambar = $row['gambar'];
        $harga = $row['harga_paket'];
        $hasil_rupiah = "Rp " . number_format($harga,2,',','.');
  
    }
    $query = "select * from paket_menu where id_paket = '$ids'";
    $menu = mysqli_query($conn,$query);
    foreach($menu as $data=>$row){
        $id_menu = $row['id_menu'];
        $query = "select *  from  menu where id_menu = '$id_menu'";
        $isimenu = mysqli_query($conn,$query);
        foreach($isimenu as $data=>$key){
            $tdeskripsi = $tdeskripsi. $key['nama_menu'].".";
        }
    }
    $gambar = "../Master/Menu/".$gambar;
    $deskripsi = explode(".", $tdeskripsi);
}




?>
<!--[if gt IE 8]><!-->
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
<body style='margin-top:5.5%'>
<a href="https://www.mcdelivery.co.id/" class="btn btn-yellow btn-floating animated vp-slideinright delayp10 pesan-tag" target="_blank" style="">
    <img src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/ic_mcdelivery.png" class="mcd-delivery-icon" alt="Yellow Element">
    <span>Pesan Sekarang</span>
</a>
        <!-- Google Tag Manager (noscript) -->
    <!-- End Google Tag Manager (noscript) -->
    <div class="loader-wrapper loader-light">
        <div class="loader" style="display: none;"></div>
    </div> 
    
    <section class="section-menu-detail-cover bg-cream">
    <div class="container position-relative py-main">

    <nav aria-label="breadcrumb" class="general-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="Homemenu.php"><i class="fa fa-arrow-left"></i> Menu</a></li>
            <!-- <li class="breadcrumb-item"><a href="/">Menu</a></li> -->
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-5">
            <img src="<?=$gambar?>" style="background-size: cover;width:445px;height:339px" class="img-fluid animated vp-slideinleft delayp3 visible slideInLeft full-visible">
        </div>
        <div class="col-md-7 content-center">
            <div class="heading">
                <h2 class="title animated fadeInUp delayp2"><?=$nama?></h2>
                <h2 class="title animated fadeInUp delayp2" style= "font-size:20pt;"><?=$hasil_rupiah?></h2>

                <p class="subtitle animated fadeInUp delayp3 mb-0">Menu: </p>
                <p class="subtitle animated fadeInUp delayp3 mb-0"><?=$deskripsi[0] . "<br> " . $deskripsi[1]?></p>
            </div>
            <div class="clearfix btn-placeholder animated fadeInUp delayp4">
                <p data-id="20" data-name="Big Mac" data-category="Daging Sapi" class="btn btn-primary btn-w-img animated fadeInUp delayp4 ordernow" onclick='Add_To_Cart("<?=$ids?>")'><img src="<?=$gambar?>"\>Pesan Sekarang</p> 
            </div>
        </div>
    </div>
</section>
<!-- <section class="d-none"> -->
    <!-- <div class="container">
        <div class="row">
            <div class=" col-md-7 order-md-last "></div>

                <div class="col-md-5 order-md-first">
                <div class="menu-detail-package">
                    <h5 class="animated animated fadeInUp delayp4">Lebih hemat dengan paket</h5>
                    <div class="card-package-list animated fadeInUp delayp5">
                        <div class="card-package">
                            <img src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/french-froes.png" class="img-fluid">
                            <span>Fries</span>
                        </div>
                        <div class="card-package-plus">
                            +
                        </div>
                        <div class="card-package">
                            <img src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/coca-cola.png" class="img-fluid">
                            <span>Cola</span>
                        </div>
                    </div>
                    <p class="package-info animated fadeInUp delayp6">Tersedia dalam <a href="https://mcdonalds.co.id/paket-hemat"><strong>Paket Hemat <i class="far fa-angle-right"></i></strong></a></p>

                </div>
            </div>
            

        </div>
    </div> -->
</section>

<section class="py-main section-other-menu">
    <div class="container">
        <div class="heading text-center">
            <h2 class="title animated vp-fadeinup visible fadeInUp full-visible">Menu Rekomendasi Lainnya</h2>
        </div>
        <div class="owl-carousel owl-theme owl-top-menu-home-carousel content owl-loaded owl-drag">
        <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1140px;">
            <?php 
                $query = "select id_menu from menu where status = 1";
                $rek = mysqli_query($conn,$query);
                $tmpid =[];
                $ctr = 0;
                    foreach($rek as $data=>$row){
                        $tmpid[$ctr] = $row['id_menu'];
                        $ctr++;
                    }    
                $tm = [];
                for($i=0; $i<4; $i++) {
                    $rand = rand(0,Count($tmpid)-1);
                    $tm[$i] = $rand; 
                    if($tmpid[$tm[$i]] == $ids ){
                        $rand = rand(0,Count($tmpid)-1); 
                    }
                        for($j=0;$j<$i;$j++){
                            if($tm[$j]== $tm[$i]){
                                $rand = rand(0,Count($tmpid)-1);
                            }
                             if($tmpid[$tm[$j]]== $ids ){
                                $rand = rand(0,Count($tmpid)-1); 
                            }
                           
                        }
                        $tm[$i] = $rand; 
                } 


                for($i=0;$i<4;$i++){
                    $id =$tmpid[$tm[$i]];
                    $query = "select * from menu where id_menu = '$id'";
                    $m= mysqli_query($conn,$query);
                    $gambar ="";
                    $nama = "";
                    foreach($m as $data=>$row){
                        $gambar = $row['gambar'];
                        $gambar = "../Master/Menu/".$gambar;
            ?>            
            
                    <div class="owl-item active" style="width: 255px; margin-right: 30px;">
                        <div class="item animated vp-fadeinup delayp1 visible fadeInUp">
                            <a href="" data-id="24" data-name="Double Cheeseburger" data-category="Daging Sapi" data-position="1" class="card card-menu">
                                <img src="<?=$gambar?>"style='max-width:300px;max-height:150px' class="img-fluid">
                                <p><?=$row['nama_menu']?></p>
                            </a>
                        </div>
                    </div>
                    <?php }} ?>
                    
                </div>
            </div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
        <div class="clearfix mt-3 text-center animated vp-fadeinup visible fadeInUp full-visible">
            <a href="Homemenu.php" class="btn btn-primary">Lihat Semua Menu</a>
        </div>
    </div>
</section>

<?php include('Mcd/footer.php'); ?>
    <script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(".loader").fadeOut('slow');
        $(".loader-wrapper").fadeOut("slow");
    });

    $('#informationDetailCollapse').hide();
    $('.read-more').click(function (e) {
        $('#informationDetailCollapse').show();
        $('.read-more').hide();
        e.preventDefault();
    });
    $('.table').removeClass('table-bordered');

    $('.owl-top-menu-home-carousel').owlCarousel({
        loop: false,
        margin: 30,
        dots: true,
        responsive: {
            0: {
                items: 2.5,
                loop: true,
                dots: true,
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });

    $(document).ready(function(){
        $.get("https://mcdonalds.co.id/menu/recomendation/datalayer", function (data) {
            dataLayer.push({
                'event': 'productImpression',
                'ecommerce': {
                    'impressions': data
                }
            });
        });

        $('.card-menu').click(function () {
            dataLayer.push({
                'event': 'productClick',
                'ecommerce': {
                    'click': {
                        "actionField": {
                            "list": "recommendation"
                        },
                        'products': [{
                            'id': $(this).data("id"), // Gochujang Chicken, dll (same with promoviews)
                            'name': $(this).data("name"),
                            'category': $(this).data("category"),
                            'position': $(this).data("position"),
                            'list': "recommendation"
                        }]
                    }
                }
            });
        });

        $('.ordernow').click(function () {
            dataLayer.push({
                'event': 'addToCart',
                'ecommerce': {
                    'add': {
                        'products': [{
                            'id': $(this).data("id"), // Gochujang Chicken, dll (same with promoviews)
                            'name': $(this).data("name"),
                            'category': $(this).data("category"),
                            'position': 0,
                            'quantity': 1
                        }]
                    }
                }
            });
        })
    })

</script>
    <script>
      (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the formsFooter we want to apply custom Bootstrap validation styles to
            var formsFooter = document.getElementsByClassName('validation-footer');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(formsFooter, function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    if (form.checkValidity() === true) {
                        event.preventDefault();
                        event.stopPropagation();

                        $('.btn-submit-footer').html('<i class="fa fa-circle-notch fa-spin text-white"></i>');

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
                        $.ajax({
                            type:'POST',
                            url:'/newsletter',
                            data:{email: $('#subscribe-footer').val()},
                            success:function(data){
                                if(data.error){
                                    setTimeout(function () {
                                        $('.btn-submit-footer').html("Daftar");
                                        $('.status-footer').html(
                                            "<p class='text-danger'>"+data.error+"</p>"
                                        );
                                    }, 1500);
                                }

                                if(data.success){
                                    setTimeout(function () {
                                        $('.btn-submit-footer').html(
                                            "<i class='fa fa-check'></i>");
                                        $('.btn-submit-footer').removeClass('btn-primary').addClass('btn-success');
                                        $('.status-footer').html(
                                            "<p class='text-success' id='subscribe-success-newsletter'>"+data.success+"</p>"
                                        )
                                    }, 1500);

                                    $(".btn-submit-footer").prop('disabled', true);
                                }
                            }
                        });
                        
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>


<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","723821301303563");</script>
<script type="text/javascript" id="">fbq("track","PageView");</script><script type="text/javascript" id="" src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/ins.js"></script><iframe style="display: none;" id="insider-worker" src="Menu/Detail_Menu/Big%20Mac%20%20%20McDonald's%20Indonesia_files/worker-new.html"></iframe><style id="ins-free-style" innerhtml=""></style></body></html>

<script>
    function Add_To_Cart(nama){
        $.ajax({
            method: "post",
            url: "../Transaction/General/setSession_menu.php",
            data:{
                nama_menu:nama
            },
            success: function (response) {
                alert("berhasil");
            }
        });
    }
</script>