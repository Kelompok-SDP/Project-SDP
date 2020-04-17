<div class="loader-wrapper loader-light">
    <div class="loader" style="display: none;"></div>
    </div> 
    <div class="menu-slide light" id="menu-slide-1">
        <label class="product-title-slide animated fadeInUp delayp1" id="menu-back-1"><i class="far fa-angle-left"></i>Menu</label>
        <ul class="mega-menu-down">
            <?php
                $query ="select id_kategori,nama_kategori from kategori";
                $query=mysqli_query($conn,$query);
                $ctr=1;
                foreach ($query as $key => $value) {
                    echo "<li><a href='menu/semua_menu/Homemenu.php?filter=$value[id_kategori]' class='animated menu-mobile-list fadeInUp delayp$ctr'>$value[nama_kategori]</a></li>";
                    $ctr++;
                }
               
            ?>
            
            <li><a href="https://mcdonalds.co.id/menu" class="animated fadeInUp delayp10"><strong>Lihat Semua Menu</strong></a></li>
        </ul>
    </div>

<nav class="navbar navbar-mcd navbar-expand-md fixed-top light">
    <div class="container">
        <a class="navbar-brand animated fadeInDown delayp4" href="Home.php">
            <img src="Home%20%20%20McDonald's%20Indonesia_files/logo_mcd.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown menu-large">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                    <ul class="dropdown-menu megamenu animated fadeInDown">
                        <div class="container">
                            <div class="row megamenu-links">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                        <?php
                                            $query ="select id_kategori,nama_kategori from kategori order by 1 asc limit 5";
                                            $query=mysqli_query($conn,$query);
                                            foreach ($query as $key => $value) {
                                                echo "<a href='Homemenu_kategori.php?filter=$value[id_kategori]'>$value[nama_kategori]</a>";
                                                
                                            }
                                        
                                        ?>                                  
                                        </div>
                                        <div class="col-6">             
                                        <?php
                                            $query ="select id_kategori,nama_kategori from kategori order by 1 desc limit 4";
                                            $query=mysqli_query($conn,$query);
                                            foreach ($query as $key => $value) {
                                                echo "<a href='Homemenu_kategori.php?filter=$value[id_kategori]'>$value[nama_kategori]</a>";
                                                
                                            }
                                        
                                        ?>   
                                        </div>
                                    </div>
                                    <a href="Homemenu.php" class="btn btn-link btn-subtitle">Lihat semua menu <i class="fa fa-angle-right"></i></a>
                                </div>
                                <div class="col-md-6 megamenu-cover">
                                    <div class="img-container">
                                        <img src="Home%20%20%20McDonald's%20Indonesia_files/aQB38R7W6WDUj6jYxYbP.jfif" class="img-fluid" alt="Location">
                                    </div>
                                    <div class="content">
                                        <div class="content-info">
                                            <h5>Hotcakes</h5>
                                            <p>Nikmati menu sarapan kami yang lainnya</p>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-sm" target="_blank">
                                            Pesan <span class="d-none d-xl-inline-block">Sekarang</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://mcdonalds.co.id/promo">
                        Promo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://mcdonalds.co.id/dunia-anak">
                        Dunia Anak
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://mcdonalds.co.id/whats-on">
                        Berita Terkini
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link border-left" href="https://mcdonalds.co.id/location">
                        <i class="far fa-map-marked-alt"></i>
                        Lokasi
                    </a>
                </li>
                <li class="nav-item hidden">
                    <a class="nav-link" href="#">
                        <i class="far fa-search mr-0"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="navbar-slide light">
        <!-- <a class="navbar-brand-sidebar animated fadeInDown delayp4" href="">
            <img src="https://mcdonalds.co.id/assets/img/brand/mcd.png" alt="Logo">
        </a> -->
        <!-- <a class="nav-link" href="#">
            <img src="https://mcdonalds.co.id/assets/img/icon/location.png" class="img-fluid icon-location-sidebar" alt="Location">
        </a>
        <a class="nav-link" href="#">
            <img src="https://mcdonalds.co.id/assets/img/icon/search.png" class="img-fluid icon-search-sidebar" alt="Search Bar">
        </a> -->
        <div class="navbar-slide-close">
            <span class="icon-bar icon-bar-1"></span>
            <span class="icon-bar icon-bar-2"></span>
            <span class="icon-bar icon-bar-3"></span>
        </div>
        <div class="content">
            <a href="https://www.mcdelivery.co.id/" class="btn btn-yellow mb-3 pesan-tag" target="_blank">
                <img src="Home%20%20%20McDonald's%20Indonesia_files/ic_mcdelivery.jpg" class="mcd-delivery-icon" alt="Yellow Element">
                <span>Pesan Sekarang</span>
            </a>
            <ul class="nav-slide-list">
                <li class="nav-slide-item animated fadeInUp delayp2" id="navMenuMobile">
                    <a class="nav-link">Menu</a>
                </li>
                <li class="nav-slide-item animated fadeInUp delayp3" id="navPromoMobile">
                    <a href="https://mcdonalds.co.id/promo" class="nav-link">
                        Promo
                    </a>
                </li>
                <li class="nav-slide-item animated fadeInUp delayp4" id="navDuniaAnakMobile">
                    <a href="https://mcdonalds.co.id/dunia-anak" class="nav-link">
                        Dunia Anak
                    </a>
                </li>
                <li class="nav-slide-item animated fadeInUp delayp5" id="navWhatsOnMobile">
                    <a href="https://mcdonalds.co.id/whats-on" class="nav-link">
                        Berita Terkini
                    </a>
                </li>
                <!-- <li class="nav-slide-item animated fadeInUp delayp6" id="navMakinKenalMakinSayang">
                    <a href="/makin-kenal-makin-sayang" class="nav-link">
                        Makin Kenal Makin Sayang
                    </a>
                </li> -->
                <li class="nav-slide-item animated fadeInUp delayp7" id="navLocationMobile">
                    <a href="https://mcdonalds.co.id/location" class="nav-link">
                        Lokasi
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/manifest.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/vendor.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/app.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/mapbox.js"></script>