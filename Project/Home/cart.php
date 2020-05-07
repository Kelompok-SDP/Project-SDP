<?php 
include('Mcd/title.php');
include("../config.php");
include('Mcd/header.php');
	// session_destroy();
?>
<style>
	.btn-kcl{
		width:40px;
		height:25px;
		padding:0px;
	}
</style>
<!DOCTYPE html>
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
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>


<div class="container" style="padding-top:80px">

<!-- 
Body Section 
-->
	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Check Out</li>
    </ul>
	<div class="well well-small">
		<h1>Check Out <small class="pull-right" id="displayQTY">  </small></h1>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
			<thead>
			<tr>
				<th>Product</th>
				<th>Description</th>
				<th>Unit price</th>
				<th>Qty </th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody id="detailTable">
			
				
			</tbody>
		</table>
		<br/>
	
	
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td> 
						<label style="min-width:159px"> VOUCHERS Code: </label> 
						<input type="text" class="input-medium" id="kode"placeholder="CODE">
						<button class="shopBtn" onclick="CheckPromo()"> ADD</button>
					</td>
				</tr>
			</tbody>
		</table>	

		<table class="table table-bordered">
			<tbody>
				<tr>
					<td> 
						<input type="radio" name="radioButton"id="Reservasi" onchange="inisialisasi()"> Reservasi
					</td>
					<td> 
						<input type="radio" name="radioButton"id="Take" onchange="inisialisasi()"> Take Away
					</td>
					<td> 
						<input type="radio" name="radioButton"id="Delivery" onchange="inisialisasi()"> Delivery
					</td>
					<td> 
						<input type="radio" name="radioButton"id="Dine" onchange="inisialisasi()"> Dine In
					</td>
				</tr>
				<tr>
					<td class="tempat" colspan="4"></td>
				</tr>
			</tbody>
		</table>	

	<a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<button class="shopBtn btn-large pull-right" onclick="Pay()"id="pay-button">Pay! <span class="icon-arrow-right"></span></button>
</div>
</div>
</div>

</div><!-- /container -->

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
	var ctr=0;
	start();
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
		alert(login);
		if(login=="kosong"){
			window.location.href="Home.php";
		}
	}
	function inisialisasi(){
		if(document.getElementById("Reservasi").checked ){
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
		}
		if(document.getElementById("Take").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getTake.php",
				success: function (response) {
					$(".tempat").html(response);
					getTimeNow();
				}
			});
		}
		if(document.getElementById("Delivery").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getDelivery.php",
				success: function (response) {
					$(".tempat").html(response);
					getTimeNow();
				}
			});
		}
		if(document.getElementById("Dine").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getDinein.php",
				success: function (response) {
					$(".tempat").html(response);
					getDetail_kursi();
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
		if(document.getElementById("Reservasi").checked ){
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
		}else if(document.getElementById("Take").checked ){
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
		}else if(document.getElementById("Delivery").checked ){
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
		}else if(document.getElementById("Dine").checked ){
			if(jumlah_meja>0){
				window.open("../iplaymu/ipay/index.php");
				bayar();
			}else{
				alert("Pilih Meja ");
			}
		}
	}
	function bayar(){
		if(document.getElementById("Reservasi").checked ){
			var alamat="";
			var time=$("#time_res").val();
			var keterangan_meja="ada";
			var date=$("#date_res").val();
		}else if(document.getElementById("Take").checked ){
			var alamat="";
			var time=$("#time_res").val();
			var keterangan_meja="";
			var date="";
		}else if(document.getElementById("Delivery").checked ){
			var alamat=$("#alamat").val();
			var time=$("#time_res").val();
			var keterangan_meja="";
			var date="";
		}else if(document.getElementById("Dine").checked ){
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