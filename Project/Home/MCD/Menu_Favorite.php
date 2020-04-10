<section class="py-main section-other-menu bg-gray-20">
    <div class="container">
        <div class="heading text-center">
            <h2 class="title animated vp-fadeinup visible fadeInUp full-visible">Menu Favorit</h2>
        </div>
        <div class="owl-carousel owl-theme owl-top-menu-home-carousel content owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.25s ease 0s; width: 1425px;">
                    
                    <?php
                        
                        $menu=mysqli_query($conn,'SELECT * from menu where status = 1 order by 1 desc limit 5');
                        foreach ($menu as $key => $value) {
                            echo "<div class='owl-item active' style='width: 255px; margin-right: 30px;'>";
                                echo "<div class='item animated vp-fadeinup delayp1 visible fadeInUp'>";
                                    echo "<a href='Menu/Detail_Menu/detail_menu.php?id=$value[id_menu]' data-id='20' data-name='$value[nama_menu]' data-category='$value[id_kategori]' data-slot='1' class='card card-menu'>";
                                        echo "<img src='../Master/Menu/$value[gambar]' style='background-size: cover;width:255px;height:180px' class='img-fluid'>";
                                        echo "<p>$value[nama_menu]</p>";
                                    echo " </a>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    
                </div>
            </div>
        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
        </div>
    </div>
</section>