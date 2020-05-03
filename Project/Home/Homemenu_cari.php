<?php
    require_once("../config.php");

    $snmenu="";
    $snmenu = $_POST["a"];
    $tctr = 0;
    if($snmenu != ""){ ?>
        <?php
    $query = "SELECT * FROM KATEGORI WHERE STATUS_KATEGORI = 1 ORDER BY 1 ASC";
    $ctr5 = 0;
    $ctr6 = 0;
    $list = mysqli_query($conn,$query);
    foreach ($list as $key => $value) {
        $idk = $value["id_kategori"];
        $namkat = $value["nama_kategori"];
        
?>
<section class="py-main section-menu-list" id="<?=$idk?>" style="width: 80vw;"><!-- for i-->
    <?php $tctr += 1; ?>
    
    <div class="container">
        <div class="heading text-center animated fadeInUp delayp2">
            <h2 class="title"><?=$namkat?></h2>
        </div>
        <!-- for j-->
        <div class="row animated fadeInUp delayp3">
        <?php 
        $query2 = "SELECT * FROM MENU WHERE NAMA_MENU LIKE '$snmenu%' AND ID_KATEGORI ='$idk' AND STATUS = 1";
        $list2 = mysqli_query($conn,$query2);
        $ctr5 = mysqli_num_rows($list2);
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
        $query3 = "SELECT * FROM PAKET WHERE NAMA_PAKET LIKE '$snmenu%' AND ID_KATEGORI ='$idk' AND STATUS = 1";
        $list3 = mysqli_query($conn,$query3);
        $ctr6 = mysqli_num_rows($list3);
        foreach ($list3 as $key => $value) {
            $npaket = $value["nama_paket"];
            $gpaket = $value["gambar"];
        ?>
            <div class="col-6 col-md-3">
                <a href="<?="detail_menu.php?id=".$value["id_paket"]?>" data-id="9" data-name="Egg and Cheese Muffin" data-category="Sarapan Pagi" data-position="1" class="card card-menu">
                    <img src="<?="../Master/Paket/".$gpaket?>" class="img-fluid" style='background-size: cover;width:255px;height:180px'>
                    <p><?=$npaket?></p>
                </a>
            </div>
    <?php } ?><!-- for j tutup-->
        </div>
    </div>

</section>
<?php 
    if($ctr5 == 0 && $ctr6 == 0){
        $tctr -= 1;
        echo "<script>
            $('#".$idk."').css('display','none');
        </script>";
    }
?>
<?php } if($tctr == 0){ ?>
    <section class="py-main section-menu-list" id="" style="width: 80vw;">
        <div class="container">
            <div class="heading text-center animated fadeInUp delayp2">
                <h2 class="title">Tidak ada hasil pencarian untuk "<?= $snmenu ?>"</h2>
            </div>        
        </div>
    </section>
    <?php }else{ ?>
        
    <?php  } ?>

<?php }else{ ?>
    <?php
    $query = "SELECT * FROM KATEGORI WHERE STATUS_KATEGORI = 1 ORDER BY 1 ASC";
    $ctr3 = 0;
    $ctr4 = 0;
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
        $ctr3 = mysqli_num_rows($list2);
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
        $ctr4 = mysqli_num_rows($list3);
        foreach ($list3 as $key => $value) {
            $npaket = $value["nama_paket"];
            $gpaket = $value["gambar"];
        ?>
            <div class="col-6 col-md-3">
                <a href="<?="detail_menu.php?id=".$value["id_paket"]?>" data-id="9" data-name="Egg and Cheese Muffin" data-category="Sarapan Pagi" data-position="1" class="card card-menu">
                    <img src="<?="../Master/Paket/".$gpaket?>" class="img-fluid" style='background-size: cover;width:255px;height:180px'>
                    <p><?=$npaket?></p>
                </a>
            </div>
    <?php } ?><!-- for j tutup-->
        </div>
    </div>

</section>
<?php 
    if($ctr3 == 0 && $ctr4 == 0){
        echo "<script>
            $('#".$idk."').css('display','none');
        </script>";
    }
?>
<?php }} ?>
    