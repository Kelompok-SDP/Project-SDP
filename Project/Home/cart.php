<!DOCTYPE html>
<?php 
    include("../config.php");
    include("Mcd/title.php");
	include("../Source.php");
	include("Mcd/header.php");
	// session_destroy();
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"/> -->
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
	<!-- <link rel="shortcut icon" href="assets/ico/favicon.ico"> -->
</head>
<style>
	.btn-kcl{
		width:40px;
		height:25px;
		padding:0px;
	}
</style>
<body>
<?php  ?>
<div class="container" style="padding-top:80px">

<!-- 
Body Section 
-->
	<div class="row">
	<div class="col-12">
	<div class="span12">
	<div class="well well-small">
		<h1>Check Out <small class="pull-right" id="displayQTY">  </small></h1>
	<hr class="soften"/>	
	<div class="col-12 elevation-2" style="padding: 10px;">
			<label style="min-width:159px"> VOUCHER Code: </label> 
			<input type="text" class="input-medium" placeholder="Code" id="vcode">
			<button type="button" class="btn bg-gradient-primary btn-sm" id="subvcode" style="margin-top: -5px;">ADD</button><br>
			<div id="err" style="color: red; margin-left: 160px; display: none;">Masukkan Kode Voucher!</div>
	</div>
	<br>
	<div class="col-12 elevation-2" style="padding: 10px;">
		<div class="icheck-primary d-inline">
			<input type="radio" id="radioPrimary1" name="r1">
			<label for="radioPrimary1">Reservasi
			</label>
		</div>
		<div class="icheck-primary d-inline" style="margin-left: 100px;">
			<input type="radio" id="radioPrimary2" name="r1">
			<label for="radioPrimary2">Take Away
			</label>
		</div>
		<div class="icheck-primary d-inline" style="margin-left: 100px;">
			<input type="radio" id="radioPrimary3" name="r1">
			<label for="radioPrimary3">Delivery
			</label>
		</div>
		<div class="icheck-primary d-inline"style="margin-left: 100px;">
			<input type="radio" id="radioPrimary4" name="r1">
			<label for="radioPrimary4">Dine In
			</label>
		</div>
	</div>
	<br>
	<div id="detailTable"></div>
	<br/>
		<!-- The Modal -->
		<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
			<h2 id="header"></h2>
			<span class="close">&times;</span>
			</div>
			<div class="modal-body" id="tempat">
			
			</div>
			<div class="modal-footer">
			<h3 id="footer"></h3>
			</div>
		</div>

		</div>
	<!-- <a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<button class="shopBtn btn-large pull-right" onclick="Pay()"id="pay-button">Pay! <span class="icon-arrow-right"></span></button> -->
	</div>
	</div>
	</div>
	</div>

</div><!-- /container -->
<hr>
<?php include('Mcd/footer.php'); ?>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
  </body>
</html>
<script>
	// Get the modal
	$(document).ready(function () {
		$("#dropmenu").html(
			"<a class='nav-link border-left' href='Homemenu.php'>Menu</a>");
	});
	var modal = document.getElementById("myModal");

	$('input[type="radio"]').click(function(){
		if ($("#radioPrimary1").is(':checked'))
		{
			open(1);
		}
		else if ($("#radioPrimary2").is(':checked'))
		{
			open(1);
		}
		else if ($("#radioPrimary3").is(':checked'))
		{
			open(1);
		}
		else if ($("#radioPrimary4").is(':checked'))
		{
			open(1);
		}
	});

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	function open(pilihan) {
		if(pilihan == 1){
			modal.style.display = "block";
			inisialisasi();
		}
	};

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	modal.style.display = "none";
	}

	//When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	var ctr=0;
	var pilihan = 0;
	start();
	ubahradio(0);
	$("#subvcode").click(function () {
		var vkode = $("#vcode").val();
		if(vkode == ""){
			$("#err").fadeIn();
    		$("#err").fadeIn("slow");
			$("#err").fadeIn(5000);
		}
	});

	$("#vcode").focus(function () {
		$("#err").fadeOut();
		$("#err").fadeOut("slow");
		$("#err").fadeOut(3000);
	});
	function start(){
		getDetailPesanan();
		$("#Reservasi").prop("checked",true);
		$.ajax({
			method: "post",
			url: "ajaxFile/getReservasi.php",
			success: function (response) {
				$(".tempat").html(response);
				getDetail_kursi();
				getDateNow();
				getTimeNow();
			}
		});
		var login="<?=$_SESSION["login"]?>";
		// alert(login);
		if(login=="kosong"){
			window.location.href="Home.php";
		}
	}

	function ubahradio(berubah){
        $.ajax({
            url: "ajaxFile/radio_jpemesanan.php?id="+berubah,
            method: "post",
			data : {
				berubah : berubah
			},
            success: function (response) {
                if(response == "Berhasil"){
                    document.getElementById('radioPrimary1').checked = true;
                }else if(response == "Gagal"){
                	document.getElementById('radioPrimary1').checked = false;
                }else if(response == "Berhasil4"){
					document.getElementById('radioPrimary4').checked = true;
				}else if (response == "Gagal4"){
					document.getElementById('radioPrimary4').checked = false;

				}
				
            }
        });
    }
	function inisialisasi(){
		if(document.getElementById("radioPrimary1").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getReservasi.php",
				success: function (response) {
					$("#header").html("Reservasi");
					$("#footer").html("Reservasi");
						$("#tempat").html(response);
						getDetail_kursi();
						getDateNow();
						getTimeNow(); 
						ubahradio(1);
				}
			});
		}
		if(document.getElementById("radioPrimary2").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getTake.php",
				success: function (response) {
					$("#header").html("Take Away");
					$("#footer").html("Take Away");
					$("#tempat").html(response);
					getTimeNow();
				}
			});
		}
		if(document.getElementById("radioPrimary3").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getDelivery.php",
				success: function (response) {
					$("#header").html("Delivery");
					$("#footer").html("Delivery");
					$("#tempat").html(response);
					getTimeNow();
				}
			});
		}
		if(document.getElementById("radioPrimary4").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getDinein.php",
				success: function (response) {
					$("#header").html("Dine In");
					$("#footer").html("Dine In");
					$("#tempat").html(response);
					getDetail_kursi();
					ubahradio(4);
				}
			});
		}
		getDetailPesanan();
	}
	function getDetail_kursi(){
		$.ajax({
			method: "post",
			url: "ajaxFile/getDetail_meja.php",
			success: function (response) {
				$("#keterangan_meja").html(response);
			}
		});
	}
	function tomeja(){
		window.location.assign("../transaction/tampilan_dinein.php")
	}
	function getDetailPesanan(){
		$.ajax({
			type: "post",
			url: "../Transaction/General/getDetail_pesanan.php",
			success: function (response) {
				$("#detailTable").html(response);
				displayQTY();
			}
		});
	}
	function qtyMenu(nama,mode,qty){
		$.ajax({
			type: "post",
			url: "../Transaction/General/ChangeJumlah_menu.php",
			data:{
				nama:nama,
				mode:mode,
				qty:qty
			},
			success: function (response) {
				getDetailPesanan();
			}
		});
	}
	function NumberOnly(evt){
        var input= String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(input))){
            evt.preventDefault();
        }
	}
	function displayQTY(){
		$.ajax({
			type: "post",
			url: "../Transaction/General/getQty.php",
			success: function (response) {
				$("#displayQTY").html(response);
			}
		});
	}
	function getDateNow(){
		var date = new Date();
		var currentDate = date.toISOString().slice(0,10);

		document.getElementById('date_res').value = currentDate;
	}
	function getTimeNow(){
		var date = new Date();
		var currentTime = date.getHours()+2 + ':' + date.getMinutes();

		document.getElementById('time_res').value = currentTime;
	}
	function Pay(){
		ctr=0;
		var jumlah_meja="<?= $_SESSION["ctr"]?>";
		if(document.getElementById("radioPrimary1").checked ){
			open(2);
			var date = new Date($('#date_res').val());
			day = date.getDate();
			month = date.getMonth()+1;
			year = date.getFullYear();
			date=[day, month, year].join('/');
			time=$("#time_res").val();
			$.ajax({
				type: "post",
				url: "ajaxFile/check/check_valid_day.php",
				data: {
					tanggal:date
				},
				success: function (response) {
					if(response=="berhasil"){
						$.ajax({
							type: "post",
							url: "ajaxFile/check/check_valid_time.php",
							data: {
								time:time
							},
							success: function (response) {
								if(response=="berhasil" ){
									if(jumlah_meja>0){
										window.open("../iplaymu/ipay/index.php");
									}else{
										alert("Pilih Kursi");
									}
								}else{
									alert(response);
								}
							}
						});
					}else{
						alert(response);
					}
				}
			});
			if(ctr==2&&jumlah_meja>0){
				window.open("../iplaymu/ipay/index.php");
				bayar();
			}
		}else if(document.getElementById("radioPrimary2").checked ){
			time=$("#time_res").val();
			$.ajax({
				type: "post",
				url: "ajaxFile/check/check_valid_time.php",
				data: {
					time:time
				},
				success: function (response) {
					if(response=="berhasil"){
						window.open("../iplaymu/ipay/index.php");
						bayar();
					}else{
						alert(response);
					}
				}
			});
		}else if(document.getElementById("radioPrimary3").checked ){
			time=$("#time_res").val();
			alamat=$("#alamat").val();
			$.ajax({
				type: "post",
				url: "ajaxFile/check/check_valid_time.php",
				data: {
					time:time
				},
				success: function (response) {
					if(response=="berhasil"){
						if(alamat!=""){
							window.open("../iplaymu/ipay/index.php");
							bayar();
						}
					}else{
						alert(response);
					}
				}
			});
		}else if(document.getElementById("radioPrimary4").checked){
			open(2);
			if(jumlah_meja>0){
				window.open("../iplaymu/ipay/index.php");
				bayar();
			}else{
				alert("Pilih Meja ");
			}
		}
		
	}
	function bayar(){
		if(document.getElementById("radioPrimary1").checked ){
			var alamat="";
			var time=$("#time_res").val();
			var keterangan_meja="ada";
			var date=$("#date_res").val();
		}else if(document.getElementById("radioPrimary2").checked ){
			var alamat="";
			var time=$("#time_res").val();
			var keterangan_meja="";
			var date="";
		}else if(document.getElementById("radioPrimary3").checked ){
			var alamat=$("#alamat").val();
			var time=$("#time_res").val();
			var keterangan_meja="";
			var date="";
		}else if(document.getElementById("radioPrimary4").checked ){
			var alamat="";
			var time="";
			var keterangan_meja="ada";
			var date="";
		}
		// alert(alamat+ " "+ time+" "+keterangan_meja+" "+date);
		$.ajax({
			type: "post",
			url: "ajaxFile/transaksi.php",
			data:{
				alamat:alamat,
				time:time,
				keterangan_meja:keterangan_meja,
				date:date
			},
			success: function (response) {
				
			}
		});
	}
	function CheckPromo(){
		var kode=$("#kode").val();
		alert(kode);
		$.ajax({
			type: "post",
			url: "ajaxFile/check/CheckPromo.php",
			data: {
				nama:kode
			},
			success: function (response) {
				alert(response);
			}
		});
	}
</script>