
<div class="section-cover-home animated fadeInUp">
    <div id="carouselCoverResponsive" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators animated fadeInUp delayp3">
            <li data-target="#carouselCoverResponsive" data-slide-to="0" class="active"></li>
            <li data-target="#carouselCoverResponsive" data-slide-to="1" class=""></li>
        </ol>
        <div class='carousel-inner'>
        <?php
        $menu=mysqli_query($conn,'SELECT * from promo where status_promo = 1 order by 1 desc limit 2');
        $ctr=0;
        foreach ($menu as $key => $value) {
            if($ctr==0){
                echo "<div class='carousel-item carousel-item-next carousel-item-left'>";
                    echo " <a href='#' target=''>";
                    echo "<img src='../master/promo/$value[gambar_promo]' style='background-size: cover;100%;height:700px' class='img-fluid w-100 d-none d-sm-block'>";
                    echo "</a>";
                echo "</div>";
                $ctr=1;
            }else{
                echo "<div class='carousel-item active carousel-item-left'>";
                    echo " <a href='#' target=''>";
                    echo "<img src='../master/promo/$value[gambar_promo]' style='background-size: cover;100%;height:700px' class='img-fluid w-100 d-none d-sm-block'>";
                    echo "</a>";
                echo "</div>";
            }
        }
        ?>
        </div>
        <a class="carousel-control-prev hidden" href="#carouselCoverResponsive" role="button" data-slide="prev">
            <i class="fal fa-angle-left" data-fa-transform="grow-20"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next hidden" href="#carouselCoverResponsive" role="button" data-slide="next">
            <i class="fal fa-angle-right" data-fa-transform="grow-20"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
