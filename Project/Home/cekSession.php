<?php
    require_once("../config.php");
    require_once("MCD/title.php");
    require_once("MCD/header.php");

    $id = $_GET["id"];
    $tgl = "";
    $jen = "";
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == 'pelanggan'){
            header("location: ubahinfo.php?id=".$id);
        }else if($_SESSION['login'] == 'pegawai'){
            $query = "SELECT * FROM PEGAWAI WHERE ID_PEGAWAI = '$id'";
            $list = mysqli_query($conn, $query);
            foreach ($list as $key => $value) {
                $nma = $value['nama'];
                $jab = $value['jabatan'];
            }
            require_once("../Source.php");
            
?>
<section class="py-main section-other-menu">
    <div class="container" style="margin-top:-5vh;">
    <h3 style="margin:30px; font-size:50pt;"> Your Track Info </h3>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="info-box elevation-2">
                <div class="info-box-content" style="width: 150px;height:auto;">
                    <span class="info-box-text" style="font-weight:bold;"><h3><?= $nma?></h3></span>
                    <hr>
            <div class="form-group ">
                <div class="input-group" style="margin:10px;">
                    <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Jabatan </h5><h5 style="margin-right:10px; font-size:20pt; font-weight:1px;">:</h5>
                    <h5 style="margin-right:20px; font-size:20pt;"><?= $jab?></h5>
                </div>
                <?php
                $query2 = "SELECT * FROM HJUAL WHERE ID_PEGAWAI = 'W00002' ORDER BY TANGGAL_TRANSAKSI DESC LIMIT 5";
                    $list2 = mysqli_query($conn, $query2);
                    $query3 = "SELECT * FROM HJUAL WHERE ID_PEGAWAI = 'W00002' ORDER BY TANGGAL_TRANSAKSI DESC ";
                    $list3 = mysqli_query($conn, $query3);
                    $row = mysqli_num_rows($list3);
                    ?>
                <div class="input-group" style="margin:10px;">
                    <h5 class="footer-title" style="margin-right:20px; font-size:20pt;width:200px;">Record History </h5><h5 style="margin-right:10px; font-size:20pt; font-weight:1px;">:<?="   ".$row . " record"?></h5><br>
                </div><h5 style="font-size:20pt; margin-left:10px;"> Record 5 terakhir </h5>
                <?php 
                    $ctr = 0;
                    foreach ($list2 as $key => $value) {
                        $tgl = $value['tanggal_transaksi'];
                        $jen = $value['jenis_pemesanan'];
                        $ctr++;
                        ?>
                    <div class="info-box elevation-2" style="height:1vh; padding: 25px;">
                    <h5 style="margin-left:10px; font-size:15pt;"><?=  $ctr.". ".$tgl . " : " . $jen?></h5>
                    </div>
                    <br>
                <?php    
                    }
                ?>   
                
            </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
        <div class="col-12 " >
           
        <button class="btn btn-block btn-primary btn-submit-footer sbscrb-tag elevation-2"style="background-color: red; border-color: white; height: 50px; font-size: 20pt;" onclick="destroy()" type="submit" id="button-addon-footer">
                                            Sign Out
        </button>
               
        </div>
        </div>
       
      
    </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
           
            <h2 >Detail Transaksi</h2>
            <span class="close">&times;</span>
            </div>
            <div class="modal-body" id="detilhistory">
             
            </div>
          
        </div>

        </div>

    
</section>
<?php require_once("MCD/footer.php");?>
<script>
$( document).ready(function() {
    $("#dropmenu").html(
        "<a class='nav-link border-left' href='Homemenu.php'>Menu</a>");
        document.getElementById("cool").style.height = "40px";
});
function destroy(){
        $.ajax({
        method: "post",
        url: "MCD/logout.php",
        data:{
           
        },
        success: function (response) {
            setTimeout(
              window.location.href = "Home.php"
             , 5000);
        }
        
    });
    }
</script>
<?php
        }
        else{
            if($id == "null"){
                header("location: ../login_register/login.php");
            }
        
         }
    } else{
        header("location: ../login_register/login.php");

    }
?>

