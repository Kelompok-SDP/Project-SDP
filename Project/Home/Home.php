<!DOCTYPE html>
<?php 
    include('Mcd/title.php');
    include("../config.php");
    include('Mcd/header.php');
    include('Mcd/corusel.php');

    $datenow = date('Y-m-d');
    $query = "SELECT * FROM PROMO";
    $list = mysqli_query($conn, $query);
    foreach ($list as $key => $value) {
        $idp = $value["id_promo"];
        $pawal = $value["periode_awal"];
        $pakhir = $value["periode_akhir"];
        $stat = $value["status_promo"];
        if($datenow < $pawal){
            $query5 = "UPDATE PROMO SET STATUS_PROMO = 0 WHERE ID_PROMO = '$idp'";
            $conn->query($query5);
        }
        else if ($pawal >= $datenow && $stat == 0){
            $query6 = "UPDATE PROMO SET STATUS_PROMO = 0 WHERE ID_PROMO = '$idp'";
            $conn->query($query6);
        }
        else if($pawal >= $datenow){
            $query2 = "UPDATE PROMO SET STATUS_PROMO = 1 WHERE ID_PROMO = '$idp'";
            $conn->query($query2);
        }
        if($datenow > $pakhir){
            $query3 = "UPDATE PROMO SET STATUS_PROMO = 0 WHERE ID_PROMO = '$idp'";
            $query4 = "UPDATE  PROMO_PAKET  set status = 0 WHERE ID_PROMO = '$idp'";
            $conn->query($query3);
            $conn->query($query4);
        }
    }
?>
<body>
    <!-- Google Tag Manager (noscript) -->
    
    <!-- End Google Tag Manager (noscript) -->
    
<section class="py-main section-other-promo">
    <div class="container">
        <div class="heading text-center">
            <h2 class="title animated fadeInUp delayp2">Promo Menarik Bulan Ini</h2>
        </div>
        <div class="owl-carousel owl-theme owl-other-promo card-general-list content animated fadeInUp delayp3 owl-loaded owl-drag">  
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1110px;">
                    <?php
                        $query = "SELECT * from promo where periode_akhir >= '$datenow' AND periode_akhir like '%$monthnow%' AND status_promo = 1 LIMIT 3";
                        $promo = mysqli_query($conn,$query);
                        foreach ($promo as $key => $value) {
                            $href = "detail_promo.php?id=".$value["id_promo"];
                    ?>
                    <div class="owl-item active" style="width: 370px;">
                        <div id="rekomendasi-promo" class="item">
                            <a href="<?= $href ?>" data-id="118" data-name="Paket Hemat Banget" data-slot="1" data-slug="paket-hemat-banget" class="card card-general">
                                <div class="img-container">
                                <?php
                                    $gambar = $value["gambar_promo"];
                                ?>
                                    <img src="<?="../Master/promo/".$gambar?>" class="img-fluid" style="background-size: cover;width:335px;height:180px">
                                </div>
                                <div class="card-body">
                                    <h5><?=$value["nama_promo"]?></h5>
                                    <p class="text-truncate-multiline"><?= $value["detail_promo"] ?></p>
                                    <p class="exp-date">
                                        <img src="MCD/Detail_Promo McDonald&#39;s Indonesia __files/ic_calendar_red.svg" class="img-fluid"> Berlaku
                                            hingga 
                                        <?php
                                            $tmp = $value["periode_akhir"];
                                            $tanggal = date("d F Y", strtotime($tmp));
                                            echo $tanggal;
                                        ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center animated fadeInUp delayp4">
            <a href="Homepromo.php" class="btn btn-primary">Lihat Semua Promo</a>
        </div>
    </div>
</section>

<?php
    include('MCD/Menu_favorite.php');
?>

<section class="section-celebrate-birthday">
    <img src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/graphic-melt.png" class="graphic-melt vp-slideindown delayp7 visible animated slideInDown full-visible">
    <div class="owl-carousel owl-theme owl-home-carousel content owl-loaded owl-drag">
        
    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1429px;"><div class="owl-item active" style="width: 1349px; margin-right: 80px;"><div class="item py-main">
        <div class="container">
            <div class="row row-4">
                <div class="col-lg-6 order-lg-first position-relative animated vp-fadeinup visible fadeInUp">
                    <img src="img/delivery.jpg" class="img-cover vp-fadeinleft visible animated fadeInLeft">
                </div>
                <div class="col-lg-6 order-lg-last content-center">
                    <div class="cover-content">
                        <h2 class="title animated vp-fadeinup delayp1 visible fadeInUp full-visible">Mager Di Rumah?</h2>
                        <p class="subtitle dark animated vp-fadeinup delayp2 visible fadeInUp full-visible">
                            Pesan Antar Saja Tinggal Klik Klik Bayar pesanan akan di antar
                        </p>
                        <div class="btn-placeholder mt-4 animated vp-fadeinup delayp3 visible fadeInUp full-visible">
                            <a href="#" class="btn btn-primary">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
    <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div></div>
</section>

<a href="https://www.mcdelivery.co.id/" class="btn btn-yellow btn-floating animated vp-slideinright delayp10 pesan-tag" target="_blank" style="">
    <img src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/ic_mcdelivery.png" class="mcd-delivery-icon" alt="Yellow Element">
    <span>Pesan Sekarang</span>
</a>
<?php 
    include('Mcd/footer.php');
    include('ChatTawkTo.php');
?>
    
<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","723821301303563");</script>
<script type="text/javascript" id="">fbq("track","PageView");</script><script type="text/javascript" id="" src="Menu%20%20%20McDonald's%20Indonesia_files/ins.js"></script><iframe style="display: none;" id="insider-worker" src="Menu%20%20%20McDonald's%20Indonesia_files/worker-new.html"></iframe><style id="ins-free-style" innerhtml=""></style></body></html>


<!-- <script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/manifest.js"></script> -->
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/vendor.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/app.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/mapbox.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        $(".loader").fadeOut('slow');
        $(".loader-wrapper").fadeOut("slow");
    });

    $(document).ready(function () {
        $('.btn-floating').addClass("start");
        setTimeout(function () {
            $('.btn-floating').removeClass('start');
        }, 5000);

 
       

        $('.card-general').click(function () {
            dataLayer.push({
                'event': 'promotionClick',
                'ecommerce': {
                    'promoClick': {
                        'promotions': [{
                            'id': $(this).data(
                            "id"), // Gochujang Chicken, dll (same with promoviews)
                            'name': $(this).data("name"),
                            'creative': 'banner',
                            'position': 'featured slot' + $(this).data("slot")
                        }]
                    }
                }
            });
        });

        $('.card-menu').click(function () {
            dataLayer.push({
                'event': 'productClick',
                'ecommerce': {
                    'click': {
                        'actionField': {
                            'list': 'featured menu'
                        },
                        'products': [{
                            'id': $(this).data(
                            "id"), // Gochujang Chicken, dll (same with promoviews)
                            'name': $(this).data("name"),
                            'category': $(this).data("category"),
                            'position': $(this).data("slot"),
                            'list': 'featured menu'
                        }]
                    }
                }
            });
        });
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        console.log(cname, cvalue, expires);
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    $(document).ready(function () {
        cookie_agreement = getCookie('cookie_agreement');
        console.log(cookie_agreement);
        if (cookie_agreement != 'true') {
            if ($(window).width() > 480) {
                setTimeout(function () {
                    $('.cookie-agreement').css('bottom', '20px');
                }, 5000);
            } else if ($(window).width() <= 480) {
                setTimeout(function () {
                    $('.cookie-agreement').css('bottom', '-4px');
                }, 5000);
            }
        } else {
            $('.cookie-agreement').css('bottom', '-100rem');
        }
    });

    $('#btnAgreeCookie').click(function () {
        $('.cookie-agreement').removeClass('vp-slideinup delayp2 visible animated slideInUp full-visible');
        $('.cookie-agreement').addClass('animated fadeOutDown');
        setCookie('cookie_agreement', 'true', 1);
    });

    $('.scroll-arrow').click(function (e) {
        $(this).hide();
    })

    $('.owl-other-promo').owlCarousel({
        loop: false,
        margin: 15,
        dots: true,
        responsive: {
            0: {
                items: 1,
                loop: false,
                dots: true,
            },
            576: {
                items: 1.25
            },
            768: {
                items: 2,
                margin: 15
            },
            992: {
                items: 3,
                dots: false,
                margin: 0
            }
        }
    });

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

    // If need Use API 

    // var token = '659776185.6668c7b.a1dae863a57b4c3c8b89ce09cc099100',
    //     num_photos = 10;

    // $.ajax({
    //     url: 'https://api.instagram.com/v1/users/self/media/recent',
    //     dataType: 'jsonp',
    //     type: 'GET',
    //     data: {
    //         access_token: token,
    //         count: num_photos
    //     },
    //     success: function (data) {
    //         console.log(data);
    //         for (x in data.data) {
    //             $('#rudr_instafeed').append(`<div class="item">
    //                                             <div class="card card-instagram">
    //                                                 <img src="` + data.data[x].images.low_resolution.url + `">
    //                                             </div>
    //                                         </div>
    //                                             `);
    //         }
    //         $("#rudr_instafeed").load('url', function () {
    //             $('#rudr_instafeed').trigger('destroy.owl.carousel');
    //             $("#rudr_instafeed").owlCarousel({
    //                 dots: false,
    //                 loop: true,
    //                 margin: 30,
    //                 autoplay: true,
    //                 autoplayTimeout: 3000,
    //                 responsive: {
    //                     0: {
    //                         loop: true,
    //                         items: 3,
    //                         margin: 0,
    //                     },
    //                     600: {
    //                         loop: true,
    //                         items: 4,
    //                         margin: 0,
    //                     },
    //                     1000: {
    //                         loop: true,
    //                         items: 5,
    //                         margin: 0,
    //                     }
    //                 }
    //             });
    //             return false;
    //         });
    //     },
    //     error: function (data) {
    //         console.log(data);
    //     }
    // });

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

