<?php
include("../../config.php");
            $query = "SELECT * FROM KUPON WHERE STATUS_KUPON = 1";
            $list = mysqli_query($conn,$query);
            foreach ($list as $key => $value) {
                $idm = $value["id_menu"];
                $idk = $value["id_kupon"];
                $harga = $value['harga_kupon'];
                $sisa = $value['sisa_kupon'];
                $hasil_rupiah = "Rp " . number_format($harga,2,',','.');
                $query2 = "SELECT * FROM MENU WHERE ID_MENU = '$idm'";
                $list2 = mysqli_query($conn,$query2);
                $value2=mysqli_fetch_assoc($list2);
                // foreach ($list2 as $key => $value2) {
                    $nmenu = $value2["nama_menu"];
                    $gbr = $value2["gambar"];

                $counter=0;
                if($_SESSION["login"]=="pelanggan"){
                    $id_member=$_SESSION["pelanggan"];
                    $query_search="SELECT * from kupon_member where id_kupon='$idk' and id_member='$id_member'";
                    $value_search=mysqli_query($conn,$query_search);
                    $row = mysqli_num_rows($value_search);
                    if($row>0){
                        $counter=1;
                    }
                }
        ?>
                    <div class="col-2 col-lg-4 filter-element" data-filter="category-1">
                        <a href="" data-id="134" class="card card-general">
                            <div class="img-container">
                                <img src="<?="../Master/Menu/".$gbr?>" class="img-fluid" style="background-size: cover;width:335px;height:180px">
                            </div>
                            <div class="card-body">
                                <h5><?= $value["nama_kupon"] ?></h5>
                                <p class="text-truncate-multiline">Potongan <?= $nmenu?> sebesar <?= $hasil_rupiah?></p>
                                                                <p class="exp-date">
                                    <img src="MCD/Promo _ McDonald&#39;s Indonesia_files/ic_calendar_red.svg" class="img-fluid"> Berlaku
                                    hingga 
                                    <?php
                                        $tmp = $value["periode_akhir_kupon"];
                                        $tanggal = date("d F Y", strtotime($tmp));
                                        echo $tanggal;
                                        ?>
                                </p>
                                <br>
                            </div>
                        </a>
                        <?php
                       
                        if($counter==0){
                            echo "<p data-id='20' data-name='Big Mac' data-category='Daging Sapi' class='btn btn-primary btn-w-img animated fadeInUp delayp4 ordernow' style='color: white; cursor: pointer; margin-left: 5vw;' onclick='Claim_cupon(\"$idk\")'><img src='../Master/Menu/Image/diskon.png'\>Claim Sekarang <br> Tersedia: $sisa</p> ";
                        }else{
                            echo "<p data-id='20' data-name='Big Mac' data-category='Daging Sapi' class='btn btn-primary btn-w-img animated fadeInUp delayp4 ordernow' style='color: white; cursor: pointer; margin-left: 5vw; background-color:grey;border-color: grey'><img src='../Master/Menu/Image/diskon.png'\>Claim Sekarang</p> ";
                        }
                        ?>
                    </div>
            <?php
                // }
            }
            ?>
