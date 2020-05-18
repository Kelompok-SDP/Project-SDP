<?php
    require_once("../config.php");
    require_once("MCD/title.php");
    require_once("MCD/header.php");
    $total = 0;
    $datenow = date('Y-m-d');
    $query7 = "SELECT * FROM KUPON";
    $list = mysqli_query($conn, $query7);
    foreach ($list as $key => $value) {
        $idp = $value["id_kupon"];
        $pawal = $value["periode_awal_kupon"];
        $pakhir = $value["periode_akhir_kupon"];
        $stat = $value["status_kupon"];
        $stok = $value["sisa_kupon"];
        if($stat != 0){
            $total = $total + 1;
        }
        if($stok <= 0){
            $query8 = "UPDATE KUPON SET STATUS_KUPON = 0 WHERE ID_KUPON = '$idp'";
            $query9 = "UPDATE KUPON_MEMBER SET STATUS = 0 WHERE ID_KUPON = '$idp'";
            $conn->query($query8);
            $conn->query($query9);
        }else{
            if($datenow < $pawal){
                $query5 = "UPDATE KUPON SET STATUS_KUPON = 0 WHERE ID_KUPON = '$idp'";
                $conn->query($query5);
            }
            else if ($pawal >= $datenow && $stat == 0){
                $query6 = "UPDATE KUPON SET STATUS_KUPON = 0 WHERE ID_KUPON = '$idp'";
                $conn->query($query6);
            }
            else if($pawal >= $datenow){
                $query2 = "UPDATE KUPON SET STATUS_KUPON = 1 WHERE ID_KUPON = '$idp'";
                $conn->query($query2);
            }
            if($datenow > $pakhir){
                $query3 = "UPDATE KUPON SET STATUS_KUPON = 0 WHERE ID_KUPON = '$idp'";
                $query4 = "UPDATE KUPON_MEMBER SET STATUS = 0 WHERE ID_KUPON = '$idp'";
                $conn->query($query3);
                $conn->query($query4);
            }
        }
    }
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
    <?php
        if($total > 0){
    ?>
    <section class="py-main section-promo-list">
        
        <div class="container">
            <div class="card-general-list animated fadeInUp delayp2">
                <div class="row row-0 tampilan_kupon">

                </div>
            </div>
        </div>
    </section>
    <?php 
        }else{
    ?>
    <section class="py-main section-menu-list" id="" style="width: 100vw;">
        <div class="container">
            <div class="heading text-center animated fadeInUp delayp2">
                <h2 class="title">Maaf, tidak ada kupon yang tersedia</h2>
            </div>        
        </div>
    </section>
        <?php } ?>

<div id="box2" class="clearfix btn-placeholder" style="display: none; position: fixed; bottom: 0; right: 40%;">
    <p data-id="20" data-name="Big Mac" data-category="Daging Sapi" class="btn btn-primary animated fadeInUp delayp4 ordernow" style="cursor: pointer;">Add to Cart</p> 
</div>
        <!-- <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/manifest.js.download"></script> -->
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/vendor.js.download"></script>
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/app.js.download"></script>
        <script src="MCD/Promo _ McDonald&#39;s Indonesia_files/mapbox.js.download"></script>

<?php
include('Mcd/footer.php');
?>
<script>
    function Claim_cupon(id_kupon){
        var login="<?=$_SESSION["login"]?>";
        if(login==""){
			alert("Maaf, Anda harus Login!");
			window.location.href="../login_register/login.php";
		}else{
            $('#box2').fadeIn(1500);
            $('#box2').fadeOut(1000);
            $.ajax({
                method: "post",
                url: "ajaxFile/setKupon.php",
                data:{
                    id_kupon:id_kupon
                },
                success: function (response) {
                    getKupon_tampilan();
                }
            });
        }
    }
    getKupon_tampilan();
    function getKupon_tampilan(){
        $.ajax({
            type: "post",
            url: "ajaxFile/getKupon_tampilan.php",
            success: function (response) {
                $(".tampilan_kupon").html(response);
            }
        });
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