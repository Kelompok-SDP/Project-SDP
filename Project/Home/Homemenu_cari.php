<?php
    require_once("../config.php");
    require_once("mcd/title.php");
    require_once("mcd/header.php");
?>

<!DOCTYPE html>

<link rel="stylesheet" href="menu/semua_menu/Menu%20%20%20McDonald's%20Indonesia_files/main.css">
        <link rel="dns-prefetch" href="https://https//mcdonalds.co.id/">
            <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5NF7SB8');</script>
        <!-- End Google Tag Manager -->
    <link rel="stylesheet" type="text/css" href="menu/semua_menu/Menu%20%20%20McDonald's%20Indonesia_files/mapbox.css"><style type="text/css">.fancybox-margin{margin-right:17px;}</style><script src="Menu%20%20%20McDonald's%20Indonesia_files/a"></script></head>
<head>
</head>
<body>
            <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NF7SB8" 
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
                  <div class="loader-wrapper loader-light">
      <div class="loader" style="display: none;"></div>
    </div> 
    

<div class="section-cover-menu cover cover-general bg-cream">
    <div class="container position-relative">
        <nav aria-label="breadcrumb" class="general-breadcrumb">
            
        </nav>
        <div class="cover-content">
        <h1 class="cover-title animated fadeInUp delayp1"><center>Nikmati menu-menu pilihan terbaik<br>Hanya di <br>"Uwenak Resto"</center></h1>
        </div>
        <!-- <img src="Menu%20%20%20McDonald's%20Indonesia_files/img-header-menu-2.png" class="cover-img-banner img-fluid animated fadeInRight delayp4"> -->
    </div>
</div>
<!-- id ne iku  kategori ne-->
<br>
<div class="footer-item footer-item-subscribe" style="float: right;width: 20vw;margin-right:2vw;">
        <div class="form-group mb-2">
            <h5 class="footer-title">Cari Menu</h5>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Masukkan nama menu" required="" name="nmenu" id="nmenu">
            </div>
            <div id="err" style="display:none; color: red">Masukkan nama menu</div>
            <br>
        </div>
        <button class="btn btn-primary btn-submit btn-submit-footer sbscrb-tag" type="submit" id="button-addon-footer">
            Cari
        </button>
        <p class="form-status status-footer"></p>
</div>
<?php
    $nmenu="";
    $snmenu = $_GET["nmenu"];
    $query = "SELECT M.ID_MENU AS IDMEN, K.ID_KATEGORI AS IDKAT, K.NAMA_KATEGORI AS NAMAKAT FROM MENU M, KATEGORI K WHERE M.NAMA_MENU LIKE '$snmenu%' AND M.ID_KATEGORI = K.ID_KATEGORI AND M.STATUS = 1 AND K.STATUS_KATEGORI = 1 ORDER BY 1 ASC";
    $list = mysqli_query($conn,$query);
    $row = mysqli_num_rows($list);
    if($row > 0){ ?>
        <section class="py-main section-menu-list" id="" style="width: 80vw;">
            <div class="container">
                <div class="heading text-center animated fadeInUp delayp2">
                    <h2 class="title">Hasil pencarian untuk "<?= $snmenu ?>"</h2>
                </div>        
            </div>
        </section>
    <?php
    foreach ($list as $key => $value) {
        $idm = $value["IDMEN"];
        $idk = $value["IDKAT"];
        $namkat = $value["NAMAKAT"];
        ?>
<section class="py-main section-menu-list" id="<?=$idk?>" style="width: 80vw;"><!-- for i-->

<div class="container">
    <div class="heading text-center animated fadeInUp delayp2">
            <h2 class="title"><?=$namkat?></h2>
        </div>
        <!-- for j-->
        <?php
            $query2 = "SELECT * FROM MENU WHERE ID_MENU = '$idm'";
            $list2 = mysqli_query($conn,$query2);
            foreach ($list2 as $key => $value) {
                $nmenu = $value["nama_menu"];
                $gambar = $value["gambar"];
        ?>
        <div class="row animated fadeInUp delayp3">
            <div class="col-6 col-md-3">
                <a href="<?="detail_menu.php?id=".$value["id_menu"]?>" data-id="9" data-name="Egg and Cheese Muffin" data-category="Sarapan Pagi" data-position="1" class="card card-menu">
                    <img src="<?="../Master/Menu/".$gambar?>" class="img-fluid" style='background-size: cover;width:255px;height:180px'>
                    <p><?=$nmenu?></p>
                </a>
            </div>
    <?php } ?><!-- for j tutup-->
        </div>
    </div>

</section>
<?php }} else{ ?><!-- for i tutup-->
<section class="py-main section-menu-list" id="" style="width: 80vw;">
    <div class="container">
        <div class="heading text-center animated fadeInUp delayp2">
            <h2 class="title">Tidak ada hasil pencarian untuk "<?= $snmenu ?>"</h2>
        </div>        
    </div>
</section>
<?php } ?>
<?php 
    include('Mcd/footer.php');
?>
    <div id="app"></div>
    <script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(".loader").fadeOut('slow');
        $(".loader-wrapper").fadeOut("slow");
    });

    $(document).ready(function(){
        $.get("https://mcdonalds.co.id/menu/datalayer", function (data) {
            if(data.length > 0){
                var maxProducts = 35;
                while(data.length){
                    var menu = data.splice(0, maxProducts);
                    dataLayer.push({
                        'event': 'productImpression',
                        'ecommerce': {
                            'impressions': menu
                        }
                    });
                }
            }
            
        });

        $('.card-menu').click(function () {
            dataLayer.push({
                'event': 'productClick',
                'ecommerce': {
                    'click': {
                        "actionField": {
                            "list": "menu page"
                        },
                        'products': [{
                            'id': $(this).data("id"), // Gochujang Chicken, dll (same with promoviews)
                            'name': $(this).data("name"),
                            'category': $(this).data("category"),
                            'position': $(this).data("position"),
                            'list': "menu page"
                        }]
                    }
                }
            });
        })

        $(".menu-mobile-list").click(function () {
            $("#menu-slide-1").css("display","none");
            $(".navbar-slide").removeClass("is-open");
        })

        $("#button-addon-footer").click(function () {
            var nmenu = $("#nmenu").val();
            if(nmenu != ""){
                document.location.href = "Homemenu_cari.php?nmenu=" + nmenu;
            }else{
                $("#err").css("display","inline");
            }
        })
    });
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
    
<!-- jQuery -->
<script src="../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-master/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-master/dist/js/demo.js"></script>

<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","723821301303563");</script>
<script type="text/javascript" id="">fbq("track","PageView");</script><script type="text/javascript" id="" src="Menu%20%20%20McDonald's%20Indonesia_files/ins.js"></script><iframe style="display: none;" id="insider-worker" src="Menu%20%20%20McDonald's%20Indonesia_files/worker-new.html"></iframe><style id="ins-free-style" innerhtml=""></style></body></html>


<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/manifest.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/vendor.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/app.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/mapbox.js"></script>