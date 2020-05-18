<?php
    require_once("../config.php");
    require_once("MCD/title.php");
    require_once("MCD/header.php");

    $datenow = date('Y-m-d');
    $query7 = "SELECT * FROM KUPON";
    $list = mysqli_query($conn, $query7);
    foreach ($list as $key => $value) {
        $idp = $value["id_kupon"];
        $pawal = $value["periode_awal_kupon"];
        $pakhir = $value["periode_akhir_kupon"];
        $stat = $value["status_kupon"];
        $stok = $value["sisa_kupon"];
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
        <h1 class="cover-title animated fadeInUp delayp1"><center>Nikmati menu-menu pilihan terbaik kami<br>Hanya di <br>"Uwenak Resto"</center></h1>
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
                <input type="text" class="form-control" placeholder="Masukkan nama menu" name="nmenu" id="Nmenu">
            </div>
            <br>
        </div>
        <p class="form-status status-footer"></p>
</div>
<div id="search">
<?php
    $query = "SELECT * FROM KATEGORI WHERE STATUS_KATEGORI = 1 ORDER BY 1 ASC";
    $ctr = 0;
    $ctr2 = 0;
    $list = mysqli_query($conn,$query);
    foreach ($list as $key => $value) {
        $idk = $value["id_kategori"];
        $namkat = $value["nama_kategori"];
        
?>
<section class="py-main section-menu-list" id="<?=$idk?>" style="width: 80vw;"><!-- for i-->

    <div class="container">
        <div class="heading text-center animated fadeInUp delayp2">
            <h2 class="title"><?=$namkat?></h2>
        </div>
        <!-- for j-->
        <div class="row animated fadeInUp delayp3">
        <?php 
        $query2 = "SELECT * FROM MENU WHERE ID_KATEGORI ='$idk' AND STATUS = 1";
        $list2 = mysqli_query($conn,$query2);
        $ctr = mysqli_num_rows($list2);
        foreach ($list2 as $key => $value) {
            $nmenu = $value["nama_menu"];
            $gambar = $value["gambar"];
        ?>
            <div class="col-6 col-md-3">
                <a href="<?="detail_menu.php?id=".$value["id_menu"]?>" data-id="9" data-name="Egg and Cheese Muffin" data-category="Sarapan Pagi" data-position="1" class="card card-menu">
                    <img src="<?="../Master/Menu/".$gambar?>" class="img-fluid" style='background-size: cover;width:255px;height:180px'>
                    <p><?=$nmenu?></p>
                </a>
            </div>
    <?php } ?>
    <?php 
        $query3 = "SELECT * FROM PAKET WHERE ID_KATEGORI ='$idk' AND STATUS = 1";
        $list3 = mysqli_query($conn,$query3);
        $ctr2 = mysqli_num_rows($list3);
        foreach ($list3 as $key => $value) {
            $npaket = $value["nama_paket"];
            $gpaket = $value["gambar"];
        ?>
            <div class="col-6 col-md-3">
                <a href="<?="detail_menu.php?id=".$value["id_paket"]?>" data-id="9" data-name="Egg and Cheese Muffin" data-category="Sarapan Pagi" data-position="1" class="card card-menu">
                    <img src="<?="../Master/Menu/".$gpaket?>" class="img-fluid" style='background-size: cover;width:255px;height:180px'>
                    <p><?=$npaket?></p>
                </a>
            </div>
    <?php } ?><!-- for j tutup-->
        </div>
    </div>

</section>
<?php 
    if($ctr == 0 && $ctr2 == 0){
        echo "<script>
        $('#".$idk."').css('display','none');
        </script>";
    }
    ?>
<?php } ?><!-- for i tutup-->
</div>
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
        
        $("#Nmenu").keyup(function () {
            var a = $(this).val();
            $.ajax({
                url: "Homemenu_cari.php",
                method: 'post',
                data: {
                    a : a
                },
                success: function(result){   
                  $("#search").html(result);
                }
            });
        })

        // $("#nmenu").focus(function () {
        //     $("#err").css("display","none");
        // })

        // $("#button-addon-footer").click(function () {
        //     var nmenu = $("#nmenu").val();
        //     if(nmenu != ""){
        //         document.location.href = "Homemenu_cari.php?nmenu=" + nmenu;
        //     }else{
        //         $("#err").css("display","inline");
        //     }
        // })
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