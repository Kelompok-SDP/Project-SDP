<?php
    require_once("../config.php");

    $filter="";
    $nmenu = "";
    $filter = $_POST["b"];
    $nmenu = $_POST["a"];
    $query = "SELECT * FROM KATEGORI WHERE STATUS_KATEGORI = 1 and id_kategori='$filter' ORDER BY 1 ASC";
    $list = mysqli_query($conn,$query);
    foreach ($list as $key => $value) {
        $idk = $value["id_kategori"];
        $namkat = $value["nama_kategori"];
        ?>
<section id="<?=$filter?>" style="width: 80vw;"><!-- for i-->
    <p id="tmpkat" style="display:none;"><?=$filter?></p>
    <div class="container">
        <div class="heading text-center animated fadeInUp delayp2">
            <h2 class="title"><?=$namkat?></h2>
        </div>
        <!-- for j-->
        <div class="row animated fadeInUp delayp3">
        <?php 
        $query2 = "SELECT * FROM MENU WHERE ID_KATEGORI ='$idk' AND NAMA_MENU LIKE '$nmenu%' AND STATUS = 1";
        $list2 = mysqli_query($conn,$query2);
        $row = mysqli_num_rows($list2);
        if($row > 0){
            if($nmenu != ""){ ?>
                <section style="width: 80vw;">
                    <div class="container">
                        <div class="heading text-center animated fadeInUp delayp2">
                            <h2 class="title">Hasil pencarian untuk "<?= $nmenu ?>"</h2>
                        </div>        
                    </div>
                </section>
        <?php
            }
        foreach ($list2 as $key => $value) {
            $nmenu = $value["nama_menu"];
            $gambar = $value["gambar"];
        ?>
            <div class="col-6 col-md-3">
                <a href="https://mcdonalds.co.id/menu/egg-and-cheese-muffin" data-id="9" data-name="Egg and Cheese Muffin" data-category="Sarapan Pagi" data-position="1" class="card card-menu">
                    <img src="<?="../Master/Menu/".$gambar?>" class="img-fluid" style='background-size: cover;width:255px;height:180px'>
                    <p><?=$nmenu?></p>
                </a>
            </div>
    <?php }?><!-- for j tutup-->
        </div>
    <?php }else { ?>
        <section class="py-main section-menu-list" id="" style="width: 80vw;"><!-- for i-->
        <div class="container">
            <div class="heading text-center animated fadeInUp delayp2">
                <h2 class="title">Tidak ada hasil pencarian untuk "<?= $nmenu ?>"</h2>
            </div>
        </div>
        </section>
    <?php } ?>
    </div>

</section>
<?php } ?>
</div>