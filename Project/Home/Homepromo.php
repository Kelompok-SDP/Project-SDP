<!DOCTYPE html>

<?php 
    include("../config.php");
    include('Mcd/title.php');
    include('Mcd/header.php');
    include('Mcd/corusel.php');

    $datenow = date('Y-m-d');
    $query = "SELECT * FROM PROMO";
    $list = mysqli_query($conn, $query);
    foreach ($list as $key => $value) {
        $idp = $value["id_promo"];
        $pawal = $value["periode_awal"];
        $pakhir = $value["periode_akhir"];

        if($pawal >= $datenow){
            $query2 = "UPDATE PROMO SET STATUS_PROMO = 1 WHERE ID_PROMO = '$idp'";
            $conn->query($query2);
        }
        if($datenow > $pakhir){
            $query3 = "UPDATE PROMO SET STATUS_PROMO = 0 WHERE ID_PROMO = '$idp'";
            $query4 = "UPDATE promo_paket set status = 0  WHERE ID_PROMO = '$idp'";
            $conn->query($query3);
            $conn->query($query4);
        }
    }
?>
<body>

            <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NF7SB8" 
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
                  <div class="loader-wrapper loader-light">
      <div class="loader" style="display: none;"></div>
    </div> 
    <div class="menu-slide light" id="menu-slide-1">
    <label class="product-title-slide animated fadeInUp delayp1" id="menu-back-1"><i class="far fa-angle-left"></i>Menu</label>
</div>
    
<div class="section-cover-promo animated fadeInUp">
    <div class="container position-relative">
        <nav aria-label="breadcrumb" class="general-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://mcdonalds.co.id/" class="text-white breadcrumb-content" style="opacity: 0.85;"><i class="far fa-arrow-left"></i> Home</a></li>
            </ol>
        </nav>
    </div>
</div>

    <section class="py-main section-promo-list">
        <div class="general-tab d-block d-md-none animated fadeInUp delayp2">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="select-value" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Semua Promo
                </button>
                <div class="dropdown-menu" aria-labelledby="select-value">
                    <a class="dropdown-item selection-value active" data-filter="*" id="filter" href="https://mcdonalds.co.id/promo#">Semua Promo</a>
                                        <a class="dropdown-item selection-value" data-filter="category-1" id="filter" href="https://mcdonalds.co.id/promo#">Promo Kegiatan</a>
                                        <a class="dropdown-item selection-value" data-filter="category-2" id="filter" href="https://mcdonalds.co.id/promo#">Promo Menu</a>
                                        <a class="dropdown-item selection-value" data-filter="category-3" id="filter" href="https://mcdonalds.co.id/promo#">Promo Cashless</a>
                                    </div>
            </div>
        </div>
        <div class="general-tab d-none d-md-block animated fadeInUp delayp2">
            <ul>
                <li>
                    <a href="https://mcdonalds.co.id/promo#" class="btn btn-default active" data-filter="*" id="filter">Semua Promo</a>
                </li>
                                <li>
                    <a href="https://mcdonalds.co.id/promo#" class="btn btn-default" data-filter="category-1" id="filter">Promo Hemat</a>
                </li>
                                <li>
                    <a href="https://mcdonalds.co.id/promo#" class="btn btn-default" data-filter="category-2" id="filter">Promo Menu</a>
                </li>
                                <li>
                    <a href="https://mcdonalds.co.id/promo#" class="btn btn-default" data-filter="category-3" id="filter">Promo Hari Raya</a>
                </li>
                            </ul>
        </div>
        <div class="container">
            <div class="card-general-list animated fadeInUp delayp2">
                <div class="row row-0">
        <?php
            $query = "SELECT * FROM PROMO WHERE JENIS_PROMO LIKE 'H' AND STATUS_PROMO = 1";
            $list = mysqli_query($conn,$query);
            foreach ($list as $key => $value) {
                $href = "detail_promo.php?id=".$value["id_promo"];
        ?>
                    <div class="col-2 col-lg-4 filter-element" data-filter="category-1">
                        <a href="<?= $href ?>" data-id="134" data-name="Iced Toffee Coffee" data-slot="2" data-slug="iced-toffee-coffee" class="card card-general">
                            <div class="img-container">
                            <?php
                                $gambar = $value["gambar_promo"];
                                ?>
                                <img src="<?="../Master/promo/".$gambar?>" class="img-fluid" style="background-size: cover;width:335px;height:180px">
                            </div>
                            <div class="card-body">
                                <h5><?= $value["nama_promo"] ?></h5>
                                <p class="text-truncate-multiline">Nikmatnya Rasa Moment Bersama</p>
                                                                <p class="exp-date">
                                    <img src="MCD/Promo _ McDonald&#39;s Indonesia_files/ic_calendar_red.svg" class="img-fluid"> Berlaku
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
                <?php
                }
                ?>
                <?php
                $query2 = "SELECT * FROM PROMO WHERE JENIS_PROMO LIKE 'M' AND STATUS_PROMO = 1";
                $list2 = mysqli_query($conn,$query2);
                foreach ($list2 as $key => $value) {
                    $href = "detail_promo.php?id=".$value["id_promo"];
                ?>
                    <div class="col-2 col-lg-4 filter-element" data-filter="category-2">
                        <a href="<?= $href ?>" data-id="134" data-name="Iced Toffee Coffee" data-slot="2" data-slug="iced-toffee-coffee" class="card card-general">
                            <div class="img-container">
                            <?php
                                $gambar = $value["gambar_promo"];
                            ?>
                                <img src="<?="../Master/promo/".$gambar?>" class="img-fluid" style="background-size: cover;width:335px;height:180px">
                            </div>
                            <div class="card-body">
                                <h5><?= $value["nama_promo"] ?></h5>
                                <p class="text-truncate-multiline">Nikmatnya Rasa Moment Bersama</p>
                                                                <p class="exp-date">
                                    <img src="MCD/Promo _ McDonald&#39;s Indonesia_files/ic_calendar_red.svg" class="img-fluid"> Berlaku
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
                <?php
                }
                ?>
                <?php
                $query2 = "SELECT * FROM PROMO WHERE JENIS_PROMO LIKE 'HR' AND STATUS_PROMO = 1";
                $list2 = mysqli_query($conn,$query2);
                foreach ($list2 as $key => $value) {
                    $href = "detail_promo.php?id=".$value["id_promo"];
                ?>
                    <div class="col-2 col-lg-4 filter-element" data-filter="category-3">
                        <a href="<?= $href ?>" data-id="134" data-name="Iced Toffee Coffee" data-slot="2" data-slug="iced-toffee-coffee" class="card card-general">
                            <div class="img-container">
                            <?php
                                $gambar = $value["gambar_promo"];
                            ?>
                                <img src="<?="../Master/promo/".$gambar?>" class="img-fluid" style="background-size: cover;width:335px;height:180px">
                            </div>
                            <div class="card-body">
                                <h5><?= $value["nama_promo"] ?></h5>
                                <p class="text-truncate-multiline">Nikmatnya Rasa Moment Bersama</p>
                                                                <p class="exp-date">
                                    <img src="MCD/Promo _ McDonald&#39;s Indonesia_files/ic_calendar_red.svg" class="img-fluid"> Berlaku
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
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </section>

        <!-- <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/manifest.js.download"></script> -->
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/vendor.js.download"></script>
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/app.js.download"></script>
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/mapbox.js.download"></script>

<?php
include('Mcd/footer.php');
?>
<script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $(".loader").fadeOut('slow');
            $(".loader-wrapper").fadeOut("slow");
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
            $('a#filter').click(function () {
                $(".filter-element").addClass('filter-hide');
                $(".filter-element[data-filter='" + $(this).attr('data-filter') + "']").removeClass(
                    "filter-hide");
                $('a#filter').removeClass('active');
                $(this).addClass('active');
                return false;
            });

            $(".breadcrumb-content").css("opacity",".85");
            //show all works for "all" menu
            $('a[data-filter="*"]').click(function (event) {
                $(".filter-element").removeClass('filter-hide');
                return false;
            });

            $.get("https://mcdonalds.co.id/promo/datalayer", function (data) {
                dataLayer.push({
                    'event': 'promoImpression',
                    'ecommerce': {
                        'promoView': {
                            'promotions': data
                        }
                    }
                });

            });

            $('.card-general').click(function () {
                dataLayer.push({
                    'event': 'promotionClick',
                    'ecommerce': {
                        'promoClick': {
                            'promotions': [{
                                'id': $(this).data(
                                    "id"
                                ), // Gochujang Chicken, dll (same with promoviews)
                                'name': $(this).data("name"),
                                'creative': 'banner',
                                'position': 'promo slot' + $(this).data("slot")
                            }]
                        }
                    }
                });

            })

            $("#close-subscribe").click(function () {
                $('.newsletter-subscribe').css('bottom', '-20rem');
                setCookie('cookie_promo', 'true', 1);
            })

        });

        $(".selection-value").click(function (e) {
            var selectValue = $('#select-value');
            selectValue.html($(this).text());
            $(".dropdown-menu").removeClass("show");
        });

        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        event.preventDefault();
                        event.stopPropagation();
                        if (form.checkValidity() === true) {
                            event.preventDefault();
                            event.stopPropagation();

                            $('.btn-submit-promo').html(
                                '<i class="fa fa-circle-notch fa-spin text-white"></i>');

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                        .attr(
                                            'content')
                                }
                            });

                            $.ajax({
                                type: 'POST',
                                url: '/newsletter',
                                data: {
                                    email: $('#subscribe').val()
                                },
                                success: function (data) {
                                    if (data.error) {
                                        setTimeout(function () {
                                            $('.btn-submit-promo').html(
                                                "Daftar");
                                            $('.status-promo').html(
                                                "<p class='text-danger'>" +
                                                data.error + "</p>"
                                            );
                                        }, 1500);
                                        setCookie('cookie_promo', 'false', 1);
                                    }

                                    if (data.success) {
                                        setTimeout(function () {
                                            $('.btn-submit-promo').html(
                                                "<i class='fa fa-check'></i>"
                                            );
                                            $('.btn-submit-promo')
                                                .removeClass(
                                                    'btn-primary')
                                                .addClass(
                                                    'btn-success');
                                            $('.status-promo').html(
                                                "<p class='text-success' id='subscribe-success-promo'>" +
                                                data.success +
                                                "</p>"
                                            )
                                        }, 1500);

                                        setTimeout(function () {
                                            $('.newsletter-subscribe')
                                                .css(
                                                    'bottom', '-20rem');
                                        }, 2500);


                                        $(".btn-submit-promo").prop('disabled',
                                            true);
                                        setCookie('cookie_promo', 'true', 1);

                                    }
                                }
                            });

                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        $(document).ready(function () {
            cookie_promo = getCookie('cookie_promo');
            console.log(cookie_promo);
            if (cookie_promo != 'true') {
                if ($(window).width() > 480) {
                    setTimeout(function () {
                        $('.newsletter-subscribe').css('bottom', '20px');
                    }, 4000);
                } else if ($(window).width() <= 480) {
                    setTimeout(function () {
                        $('.newsletter-subscribe').css('bottom', '-4px');
                    }, 4000);
                }
                console.log('cookies false');
            } else {
                console.log('cookies true');
                $('.newsletter-subscribe').css('bottom', '-20rem');
            }
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


<script type="text/javascript" id="">!function(b,e,f,g,a,c,d){b.fbq||(a=b.fbq=function(){a.callMethod?a.callMethod.apply(a,arguments):a.queue.push(arguments)},b._fbq||(b._fbq=a),a.push=a,a.loaded=!0,a.version="2.0",a.queue=[],c=e.createElement(f),c.async=!0,c.src=g,d=e.getElementsByTagName(f)[0],d.parentNode.insertBefore(c,d))}(window,document,"script","https://connect.facebook.net/en_US/fbevents.js");fbq("init","723821301303563");</script>
<script type="text/javascript" id="">fbq("track","PageView");</script><script type="text/javascript" id="" src="Menu%20%20%20McDonald's%20Indonesia_files/ins.js"></script><iframe style="display: none;" id="insider-worker" src="Menu%20%20%20McDonald's%20Indonesia_files/worker-new.html"></iframe><style id="ins-free-style" innerhtml=""></style></body></html>


<!-- <script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/manifest.js"></script> -->
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/vendor.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/app.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/mapbox.js"></script>