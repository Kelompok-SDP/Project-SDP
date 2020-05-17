<?php
    require_once("../config.php");
    require_once("MCD/title.php");
    require_once("MCD/header.php");
?>

<!DOCTYPE html>
<head>
</head>
<body>
<div class="section-cover-menu cover cover-general bg-cream">
    <div class="container position-relative">
        <nav aria-label="breadcrumb" class="general-breadcrumb">
            
        </nav>
        <div class="cover-content">
        <h1 class="cover-title animated fadeInUp delayp1"><center>Dapatkan segera kupon-kupon menarik kami<br>Hanya di <br>"Uwenak Resto"</center></h1>
        </div>
        <!-- <img src="Menu%20%20%20McDonald's%20Indonesia_files/img-header-menu-2.png" class="cover-img-banner img-fluid animated fadeInRight delayp4"> -->
    </div>
</div>
    <section class="py-main section-promo-list">
        
        <div class="container">
            <div class="card-general-list animated fadeInUp delayp2">
                <div class="row row-0">
        <?php
            $query = "SELECT * FROM KUPON WHERE STATUS_KUPON = 1";
            $list = mysqli_query($conn,$query);
            foreach ($list as $key => $value) {
                $idm = $value["id_menu"];
                $harga = $value['harga_kupon'];
                $hasil_rupiah = "Rp " . number_format($harga,2,',','.');
                $query2 = "SELECT * FROM MENU WHERE ID_MENU = '$idm'";
                $list2 = mysqli_query($conn,$query2);
                foreach ($list2 as $key => $value2) {
                    $nmenu = $value2["nama_menu"];
                    $gbr = $value2["gambar"];
        ?>
                    <div class="col-2 col-lg-4 filter-element" data-filter="category-1">
                        <a href="" data-id="134" class="card card-general">
                            <div class="img-container">
                                <img src="<?="../Master/Menu/".$gbr?>" class="img-fluid" style="background-size: cover;width:335px;height:180px">
                            </div>
                            <div class="card-body">
                                <h5><?= $value["nama_kupon"] ?></h5>
                                <p class="text-truncate-multiline">Potongan <?= $nmenu?> sebesar <?= $hasil_rupiah?></p>
                                                                <p class="exp-date">
                                    <img src="MCD/Promo _ McDonald&#39;s Indonesia_files/ic_calendar_red.svg" class="img-fluid"> Berlaku
                                    hingga 
                                    <?php
                                        $tmp = $value["periode_akhir_kupon"];
                                        $tanggal = date("d F Y", strtotime($tmp));
                                        echo $tanggal;
                                        ?>
                                </p>
                                <br>
                            </div>
                        </a>
                        <p data-id="20" data-name="Big Mac" data-category="Daging Sapi" class="btn btn-primary btn-w-img animated fadeInUp delayp4 ordernow" style="color: white; cursor: pointer; margin-left: 5vw;" onclick='Claim_cupon()'><img src="<?="../Master/Menu/Image/diskon.png"?>"\>Claim Sekarang</p> 
                    </div>
            <?php
                }
            }
            ?>
                </div>
            </div>
        </div>
    </section>
<div id="box" class="clearfix btn-placeholder" style="display: none; position: fixed; bottom: 0; right: 0;">
    <p data-id="20" data-name="Big Mac" data-category="Daging Sapi" class="btn btn-primary animated fadeInUp delayp4 ordernow" style="cursor: pointer;">Claim Successfull</p> 
</div>
        <!-- <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/manifest.js.download"></script> -->
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/vendor.js.download"></script>
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/app.js.download"></script>
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/mapbox.js.download"></script>

<?php
include('Mcd/footer.php');
?>
<script>
    function Claim_cupon(){
        var login="<?=$_SESSION["login"]?>";
        if(login==""){
			alert("Maaf, Anda harus Login!");
			window.location.href="../login_register/login.php";
		}else{
            $('#box').fadeIn(1500);
            $('#box').fadeOut(1000);
            // $.ajax({
            //     method: "post",
            //     url: "../Transaction/General/setSession_menu.php",
            //     data:{
            //         nama_menu:nama
            //     },
            //     success: function (response) {
            //         //alert("berhasil");
            //     }
            // });
        }
    }
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