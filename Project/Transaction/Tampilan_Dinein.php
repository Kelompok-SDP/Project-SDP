<style>
    body{
        width:1000px;
        height:1000px;
    }
    .kotak{
        position: relative;
        width:50px;
        height:50px;
        float:left;
    }
    .hijau{
        background-color:green;
    }
    .merah{
        background-color:red;
    }
    .kuning{
        background-color:yellow;
    }
    .biru{
        background-color: blue;
    }
    .kategori{
        float:left;
    }
    .kategori_box{
        border-style: solid;
        height: 5%;
        padding-top:1%;
        box-sizing: border-box;
        text-align: center;
        margin-right: 20px;
    }
</style>
<?php
session_start();
if(isset($_SESSION["isi_kursi"])==false){
    $_SESSION["isi_kursi"]=" ";
    $_SESSION["ctr"]=" ";
}

?>
<body>
    <div class="tempat"></div>
    <div class="ket"style="margin-top:300px;"></div>
    <button onclick="ubahMeja()">Pesan Kursi</button>
    <div class="makanan" >
        <div class="kategori"></div>
        <div class="menu"></div>
    </div>
    <div style="float:right"class="detail">
    </div>
    <div style="clear:both;float:right" class="harga"></div>
</body>
<script src="../AdminLTE-master\plugins\jquery\jquery.min.js"></script>
<script>
    callMeja();
    callKategori();
    callDetail();
    function callMeja(){
        $.ajax({
            method: "post",
            url: "General/getMeja.php",
            success: function (response) {
                $(".tempat").html(response);
            }
        });
    }
    function callKategori(){
        $.ajax({
            method: "post",
            url: "Dine_In/getKategori.php",
            success: function (response) {
                $(".kategori").html(response);
                callMenu("KAT001");
            }
        });
    }
    function callMenu(kategori){
        $.ajax({
            method: "post",
            url: "Dine_In/getMenu.php",
            data:{
                kategori:kategori
            },
            success: function (response) {
                $(".menu").html(response);
            }
        });
    }
    function callDetail(){
        $.ajax({
            method: "post",
            url: "General/getDetail_keterangan_kursi.php",
            success: function (response) {
                $(".ket").html(response);
            }
        });
    }
    function getHarga(){
        $.ajax({
            method: "post",
            url: "General/getHarga.php",
            success: function (response) {
                $(".harga").html(response);
            }
        });
    }
    function ubahJumlah(nama,ctr){
        $.ajax({
            method: "post",
            url: "General/setJumlah_pesanan.php",
            data: {
                nama:nama,
                jumlah:$("#inp"+ctr).val()
            },
            success: function (response) {
                getHarga();
                getDetail_menu();
            }
        });
    }
    function ubahMeja(){
        $.ajax({
            method: "post",
            url: "General/setMeja_pesan.php",
            success: function (response) {
                callMeja();
                callDetail();
            }
        });
    }
    function ambilMenu(nama){
        $.ajax({
            method: "post",
            url: "General/setSession_menu.php",
            data:{
                nama_menu:nama
            },
            success: function (response) {
                getDetail_menu();
            }
        });
    }
    function pesanMakanan(){
        $.ajax({
            method: "post",
            url: "Dine_In/doTransaksi.php",
            success: function (response) {
                callMeja();
                getDetail_menu();
                callDetail();
            }
        });
    }
    function getDetail_menu(){
        $.ajax({
            method: "post",
            url: "General/getDetail_pesanan.php",
            success: function (response) {
                $(".detail").html(response);
                getHarga();
            }
        });
    }
    function pesanDinein(ke){
        if($("#meja"+ke).hasClass("biru")){
            $("#meja"+ke).addClass("hijau");
            $("#meja"+ke).removeClass("biru");
            $.ajax({
                method: "post",
                url: "General/setSession_meja.php",
                data: {
                    nomor:ke,
                    warna:"biru"
                },
                success: function (response) {

                }
            });
        }
        else if($("#meja"+ke).hasClass("hijau")){
            $("#meja"+ke).addClass("biru");
            $("#meja"+ke).removeClass("hijau");
            $.ajax({
                method: "post",
                url: "General/setSession_meja.php",
                data: {
                    nomor:ke,
                    warna:"hijau"
                },
                success: function (response) {

                }
            });
        }else if($("#meja"+ke).hasClass("merah")){
            if(confirm("Meja "+ke+" Sudah Selesai ?")){
                $.ajax({
                    method: "post",
                    url: "General/setMeja_selesai.php",
                    data: {
                        nomor:ke
                    },
                    success: function (response) {
                        callMeja();
                    }
                });
            }
        }
        callDetail();
    }
</script>
