<?php
    require_once("../config.php");

    $snmenu="";
    $snmenu = $_POST["a"];
    $query = "SELECT M.ID_MENU AS IDMEN, K.ID_KATEGORI AS IDKAT, K.NAMA_KATEGORI AS NAMAKAT FROM MENU M, KATEGORI K WHERE M.NAMA_MENU LIKE '$snmenu%' AND M.ID_KATEGORI = K.ID_KATEGORI AND M.STATUS = 1 AND K.STATUS_KATEGORI = 1 ORDER BY 1 ASC";
    $list = mysqli_query($conn,$query);
    $row = mysqli_num_rows($list);
    if($row > 0){ 
        if($snmenu != ""){?>
        <section style="width: 80vw;">
            <div class="container">
                <div class="heading text-center animated fadeInUp delayp2">
                    <h2 class="title">Hasil pencarian untuk "<?= $snmenu ?>"</h2>
                </div>        
            </div>
        </section>
    <?php
        }
    foreach ($list as $key => $value) {
        $idm = $value["IDMEN"];
        $idk = $value["IDKAT"];
        $namkat = $value["NAMAKAT"];
        ?>
<section id="<?=$idk?>" style="width: 80vw;"><!-- for i-->

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