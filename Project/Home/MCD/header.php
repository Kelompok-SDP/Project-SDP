<?php
    require_once("../config.php");
    if(isset($_SESSION["nama_menu"])==false){
        $_SESSION["isi_kursi"]=" ";
        $_SESSION["ctr"]=0;
        $_SESSION["nama_menu"]="";
        $_SESSION["pilih_menu"]= array();
        $_SESSION["promo"]=0;
        $_SESSION["login"]="";
        $_SESSION["ongkir"]=0;
        $_SESSION["jenis"]="kosong";
        $_SESSION["kupon"]="";
    }
    $nama = "Login";
    $id = "null";
    $tl = "";
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == 'pelanggan'){
            if(isset($_SESSION['pelanggan'])){
                $id= $_SESSION['pelanggan'];

                $query = "select * from member where id_member= '$id'";
                $data = mysqli_query($conn,$query);
                $nama = "Hello, ";
                foreach($data as $key=>$row){
                    $nama = $nama.$row['fullname'];
                }
            }
            $tl = "ubahinfo.php?id=".$id;
        }else if($_SESSION['login'] == 'pegawai'){
            $id= $_SESSION['pegawai'];

            $query = "select * from pegawai where id_pegawai= '$id'";
            $data = mysqli_query($conn,$query);
            $nama = "Pegawai, ";
            foreach($data as $key=>$row){
                $nama = $nama.$row['nama'];
            }
            $tl = "cekSession.php?id=".$id;
        }else{
            $tl = "../login_register/login.php";
        }
    }

   $hr = $tl;
?>
<input type="hidden" id="custid" value="<?=$id?>">
<nav class="navbar navbar-mcd navbar-expand-md fixed-top light">
    <div class="container">
        <a class="navbar-brand animated fadeInDown delayp4" href="Home.php">
            <img src="MCD/logo.png" style="width:100px;height:60px;" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown menu-large" id="dropmenu">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
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
                                                echo "<a href='Homemenu.php#$value[id_kategori]'>$value[nama_kategori]</a>";
                                                
                                            }
                                        
                                        ?>                                  
                                        </div>
                                        <div class="col-6">             
                                        <?php
                                            $query ="select id_kategori,nama_kategori from kategori order by 1 desc limit 4";
                                            $query=mysqli_query($conn,$query);
                                            foreach ($query as $key => $value) {
                                                echo "<a href='Homemenu.php?#$value[id_kategori]'>$value[nama_kategori]</a>";
                                                
                                            }
                                        
                                        ?>   
                                        </div>
                                    </div>
                                    <a href="Homemenu.php" class="btn btn-link btn-subtitle">Lihat semua menu</a>
                                </div>
                                <?php 
                                    $query = "SELECT * FROM MENU ORDER BY RAND() LIMIT 1";
                                    $list = mysqli_query($conn,$query);
                                    foreach ($list as $key => $value) {
                                        $gambar = "../Master/Menu/". $value["gambar"];
                                ?>
                                <div class="col-md-6 megamenu-cover">
                                    <div class="img-container">
                                        <img src="<?=$gambar?>" style="background-size: cover;width:540px;height:339px" class="img-fluid animated vp-slideinleft delayp3 visible slideInLeft full-visible">
                                    </div>
                                    <div class="content">
                                        <div class="content-info">
                                            <h5><?= $value["nama_menu"]?></h5>
                                            <p><?= $value["deskripsi"]?></p>
                                        </div>
                                        <a href="<?="detail_menu.php?id=".$value["id_menu"]?>" class="btn btn-primary btn-sm">
                                            Pesan <span class="d-none d-xl-inline-block">Sekarang</span>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Homepromo.php">
                        Promo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $hr; ?>" id="tagnamaatas">
                        <?php echo $nama; ?>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link border-left" href="cart.php">
                        <i class=""></i>
                        Cart
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
</nav>

<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/manifest.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/vendor.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/app.js"></script>
<script src="Mcd/Home%20%20%20McDonald's%20Indonesia_files/mapbox.js"></script>

<script>
    
    
</script>