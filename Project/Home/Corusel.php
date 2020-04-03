
<div class="section-cover-home animated fadeInUp">
    <div id="carouselCoverResponsive" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators animated fadeInUp delayp3">
            <li data-target="#carouselCoverResponsive" data-slide-to="0" class="active"></li>
            <li data-target="#carouselCoverResponsive" data-slide-to="1" class=""></li>
        </ol>
        <?php
        $menu=mysqli_query($conn,'SELECT * from promo where status_promo = 1 order by 1 desc limit 2');
        foreach ($menu as $key => $value) {
            echo "<div class='carousel-inner'>";
                echo "<div class='carousel-item carousel-item-next carousel-item-left'>";
                    echo " <a href='#' target=''>";
                        echo "<img src='../master/$value[gambar_promo]' class='img-fluid w-100 d-none d-sm-block'>";
                        echo  "<img src='../master/$value[gambar_promo]' class='img-fluid w-100 d-block d-sm-none'>";
                        echo "</a>";
                        
                echo "</div>";
            echo "</div>";
        }
        ?>
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
