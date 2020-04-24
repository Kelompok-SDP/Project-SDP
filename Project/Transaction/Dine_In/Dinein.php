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
</style>
<body>
    <div class="tempat"></div>
    <div class="ket"style="margin-top:300px;width:60%"></div>
    <button onclick="ubahMeja()">Pesan Kursi</button>
    <div class="makanan" style="width:60%">
        <select id="kategori" onchange="callMenu()">
        </select>
        <div class="menu"></div>
    </div>
    <div class="detail">
    </div>
    <div class="harga"></div>
</body>
<script src="../../AdminLTE-master\plugins\jquery\jquery.min.js"></script>
<script>
    callMeja();
    callKategori();
    callDetail();
    function callMeja(){
        $.ajax({
            method: "post",
            url: "getKursi.php",
            success: function (response) {
                $(".tempat").html(response);
            }
        });
    }
    function callKategori(){
        $.ajax({
            method: "post",
            url: "getKategori.php",
            success: function (response) {
                $("#kategori").html(response);
                callMenu();
            }
        });
    }
    function callMenu(){
        $.ajax({
            method: "post",
            url: "getMenu.php",
            data:{
                kategori:$("#kategori").val()
            },
            success: function (response) {
                $(".menu").html(response);
            }
        });
    }
    function callDetail(){
        $.ajax({
            method: "post",
            url: "detail_keterangan.php",
            success: function (response) {
                $(".ket").html(response);
            }
        });
    }
    function getHarga(){
        $.ajax({
            method: "post",
            url: "getHarga.php",
            success: function (response) {
                $(".harga").html(response);
            }
        });
    }
    function ubahJumlah(nama,ctr){
        $.ajax({
            method: "post",
            url: "ubahJumlah.php",
            data: {
                nama:nama,
                jumlah:$("#inp"+ctr).val()
            },
            success: function (response) {
                getHarga();
            }
        });
    }
    function ubahMeja(){
        $.ajax({
            method: "post",
            url: "statusMeja.php",
            success: function (response) {
                callMeja();
                callDetail();
            }
        });
    }
    function ambilMenu(nama){
        $.ajax({
            method: "post",
            url: "setMenu.php",
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
            url: "pesanMakanan.php",
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
            url: "getDetail_menu.php",
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
                url: "pilihMeja.php",
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
                url: "pilihMeja.php",
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
                    url: "update_meja_selesai.php",
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
