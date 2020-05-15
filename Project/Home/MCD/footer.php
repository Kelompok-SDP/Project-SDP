<style>
.input_hidden {
    position: absolute;
    left: -9999px;
}

.selected {
    background-color: orange;
    border-radius: 10%;
}

#sites label {
    display: inline-block;
    cursor: pointer;
}
.warn{
    font-size:8pt;
    color: red;
    width:200px;
    height:10px;
    font-weight: bold;
    display : none;
}
.gbr{
    width : 80px;
    height: 80px;
}
#sites label:hover {
    background-color:yellow;
    border-radius: 10%;
}

#sites label img {
    padding: 3px;
}
</style>

<?php 


?>


<footer class="">
    <div class="footer-top">
        <div class="container" >
            <div class="row footer-list">
                <div class="col-md-7 col-lg-4 col-xl-5">
                    <h5 class="footer-title" >Uwenak Restoran</h5>
                    <div class="footer-item mb-md-down-4">
                        <div class="row">
                            <div class="col-md-5">

                    <ul class="footer-links">
                                    <li><a href="Homepromo.php">Promo Terbaru</a></li>
                                    <li><a href="AboutUs.php">Tentang Kami</a></li>
                             </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-3 col-xl-3">
                    <div class="footer-item">
                    <h5 class="footer-title">`Tak Kenal maka tak sayang- Cek Our Sosmed~ Yuk!`</h5>
                    <ul class="footer-social">
                                    <li><a href="" target="_blank" class="social-fb"><img src="MCD/facebook.png" alt="facebook" srcset="" style="height:30px; width:30px;"></i></a></li>
                                    <li><a href="" target="_blank" class="social-twitter"><img src="MCD/insta.png" alt="instagram" srcset="" style="height:30px; width:30px;"></i></a></li>
                                    <li><a href="" target="_blank" class="social-instagram"><img src="MCD/twiter.png" alt="twiter" srcset="" style="height:30px; width:30px;"></i></a></li>
                      </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-3 col-xl-4">
                    <div class="footer-item footer-item-subscribe">
                    <h5 class="footer-title">Tidak Puas dengan Pelayanan Kami ? Yuk Komen di Bawah!!</h5>
                            <div class="form-group mb-2">

                          
                                <div class="input-group" style="width:30vw;">

                                <div id="sites" style="margin-right: 20px;">
                                    <input type="radio" name="site" id="so" value="puas" style="margin:12px; text-align: center;" class="warna"/><label for="so" ><img class="gbr" src="MCD/bagus.png" alt="happy"  style="width:40px;height:40px;"/></label>
                                    <input type="radio" name="site" id="sf" value="tidak puas"  style="margin:12px; text-align: center;" class="warna" /><label for="sf"  ><img  class="gbr" src="MCD/jelek.png" alt="Anger"  style="width:40px;height:40px;"/> </label>
                                </div>

                                    <input type="text" class="form-control" placeholder="Kritik dan Saran" required="" name="saran" id="subscribe-footer" >
                                    <div class="input-group-append">
                                        <button name="cools"class="btn btn-primary btn-submit btn-submit-footer sbscrb-tag" onclick="kirimsaran()" type="submit" id="cool" style="margin-top: -1px;">
                                           Kirim
                                        </button>
                                    </div>
                                    
                                </div>
                                <div class= "warn" id="x">
                                        Anda Belum Memberi feedback!
                                    </div>
                            </div>
                            <p class="form-status status-footer"></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <form action="../login_register/register.php" method="post">
                    <div class="footer-item footer-item-subscribe">
                        <h5 class="footer-title">Ingin Menjadi Member kami ?</h5>
                        <form class="validation-footer" novalidate="">
                            <div class="form-group mb-2">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Masukkan email" required="" name="emailfooter" id="subscribe-footer" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                                    <div class="input-group-append">
                                        <button name='footerregis' class="btn btn-primary btn-submit btn-submit-footer sbscrb-tag"  type="submit" id="button-addon-footer">
                                            Daftar
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <p class="form-status status-footer"></p>
                        </form>
                        <!-- <div style="width: 0;
      height: 0;
      border-top: 100px solid red;
      border-left: 100px solid transparent; width: 10vw; position: absolute; top:8.2vh;
 left:35vw; background-color:white;"></div>
                        <div style="height:100px; width: 50vw; position: absolute; top:8.2vh;
 left:45vw; background-color:red;"><h1 style="font-size:50px; padding-top:15px; margin-left:-60px;">Hope Y'ALL ENJOY Y MEAL</h1></div>
               -->     </div> 
                </div>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <ul class="text-md-right">
                         <li><a href="">+62-85-00000</a></li>
                         <li><a href="">UwenakResto@ciamik.com</a></li>
                         <li><a href="">Jl Untung Suropati no 2B</a></li>
                    </ul>
                </div>
                <div class="col-md order-md-first">
                    © 2019 PT Merugi-Bahagia
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="MCD/jquery/jquery.min.js"></script>

<script>
    $('#sites input:radio').addClass('input_hidden');
$('#sites label').click(function() {
    $(this).addClass('selected').siblings().removeClass('selected');
});

var rating= "";
function kirimsaran(){
    
    if (document.getElementById('so').checked) {
        rating = document.getElementById('so').value;
     }else if (document.getElementById('sf').checked) {
         rating = document.getElementById('sf').value;
    }
var cek = false;
   var isi = document.getElementById('subscribe-footer').value;
  if(isi != ''){
    cek = true;
  }
  if(rating != ''){
      cek = true;
  }
  var idmember = document.getElementById("custid").value;
  if(cek==true){
    document.getElementById("x").style.display = "none";
    
    $.ajax({
        method: "post",
        url: "MCD/kirimsaran.php",
        data:{
            idmember: idmember,
            isi : isi,
            rating : rating
        },
        success: function (response) {
            alert(response);
        }
        
    });
    document.getElementById('sf').checked = false;
    $('#sites label').removeClass('selected')
        document.getElementById('so').checked = false;
        document.getElementById('subscribe-footer').value = "";
  }else{
     // alert("gagal masukan saran");
    document.getElementById("x").style.display = "block";
  }

}
</script>