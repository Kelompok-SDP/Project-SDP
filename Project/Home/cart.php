<!DOCTYPE html>
<title>Cart | Uwenak Restoran</title>
<?php
    include("../config.php");
	include("Mcd/title.php");
	if($_SESSION["login"]==""){
		header("location: ../login_register/login.php");
	}
	include("../Source.php");
	include("Mcd/header.php");
	$isPel = "";
	if(isset($_SESSION['pelanggan'])){
		$isPel = $_SESSION['pelanggan'];
	}
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
	<!-- <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
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


<div class="container" style="padding-top:80px">

<!--
Body Section
-->
	<div class="row">
	<div class="col-12">
	<div class="span12">
	<div class="well well-small">
		<h1>Check Out <small class="pull-right" id="displayQTY" style="float:right;">  </small></h1>
	<hr class="soften"/>
	<div id="tempat_reservasiKode">

	</div>
	<?php
	
	if($_SESSION["login"]=="pelanggan"){
		?>
	<div class="col-12 elevation-2" style="padding: 10px;">
	
		<label style="min-width:159px"> Kupon: </label>

		<?php

		
			$id_member=$_SESSION["pelanggan"];


			$query="SELECT * from kupon_member where id_member='$id_member' and status=1";
			$query=mysqli_query($conn,$query);
			foreach ($query as $key => $value) {
				$query_kupon="SELECT * from kupon where id_kupon='$value[id_kupon]'";
				$date=date("Y-m-d");
				$value_kuponnya=mysqli_fetch_assoc(mysqli_query($conn,$query_kupon));
				if($value_kuponnya["periode_akhir_kupon"]<$date){
					$query="UPDATE kupon_member set status = 0 where id_kupon='$value[id_kupon]'";
					mysqli_query($conn,$query);
				}
			}

			$query="SELECT * from kupon_member where id_member='$id_member' and status=1";

			echo "<select name='' id='id_kupon'>";
			echo"<option value='kosong'>Tidak pakai</option>";
			$query=mysqli_query($conn,$query);
			foreach ($query as $key => $value) {
				$query_kupon="SELECT * from kupon where id_kupon='$value[id_kupon]'";
				$values=mysqli_fetch_assoc(mysqli_query($conn,$query_kupon));
				echo"<option value='$values[id_kupon]'>$values[nama_kupon]</option>";
			}
			echo"</select>";
		
		?>
		<button type="button" class="btn bg-gradient-primary btn-sm" id="subvcode" onclick="check_kupon()" style="margin-top: -5px;">ADD</button><br>
		
	</div>
	<?php
	}
	?>
<?php
	
	if($_SESSION["login"]=="pegawai"){
		?>
	<div class="col-12 elevation-2" style="padding: 10px;">
	
		<label style="min-width:159px"> Check Struk : </label>
		<?php
			$query="SELECT hj.id_hjual,hj.jenis_pemesanan,m.fullname from hjual hj join member m on hj.id_member=m.id_member where hj.tanggal_transaksi=CURDATE() order by 1 desc";
			$query=mysqli_query($conn,$query);
			echo "<select id='id_struk'>";
			foreach ($query as $key => $value) {
				echo"<option value='$value[id_hjual]'>$value[jenis_pemesanan] - $value[fullname]</option>";
			}
			echo"</select>";
		?>
		<br>
		<button type="button" class="btn bg-gradient-primary btn-sm" onclick="gotoStruk()" style="margin-top: -5px;">Check Struk</button><br>
		<div id="keterangan_member"></div>
	</div>
	<div class="col-12 elevation-2" style="padding: 10px;">
	
		<label style="min-width:159px"> Email Member : </label>
		<input type="text" id="member_pilihan">
		<button type="button" class="btn bg-gradient-primary btn-sm" onclick="set_pegawai_member()" style="margin-top: -5px;">Pilih Member</button><br>
		<div id="keterangan_member"></div>
	</div>
	<?php
	}
	?>

	<br>
	<div class="col-12 elevation-2" style="padding: 10px;">
		<div class='icheck-primary d-inline'>
			<input type='radio' id='radioPrimary1' name='r1'>
			<label for='radioPrimary1'>Reservasi
			</label>
		</div>
		<div class='icheck-primary d-inline' style='margin-left: 100px;'>
			<input type='radio' id='radioPrimary2' name='r1'>
			<label for='radioPrimary2'>Take Away
			</label>
		</div>
		<div class='icheck-primary d-inline' style='margin-left: 100px;'>
			<input type='radio' id='radioPrimary3' name='r1'>
			<label for='radioPrimary3'>Delivery
			</label>
		</div>
	<?php 
		if($_SESSION["login"]=="pegawai"){
	?>
        <div class='icheck-primary d-inline'style='margin-left: 100px;'>
            <input type='radio' id='radioPrimary4' name='r1'>
            <label for='radioPrimary4'>Dine In
            </label>
        </div>
	<?php  
		}
	?>
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
	$(document).ready(function () {
		$("#dropmenu").html(
			"<a class='nav-link border-left' href='Homemenu.php'>Menu</a>"
		);
		document.getElementById("cool").style.height = "40px";
		start();
		
	});

	function start(){
		getDetailPesanan();
		var login="<?=$_SESSION["login"]?>";
		var kursi="<?=$_SESSION["isi_kursi"]?>";
		var jenis="<?=$_SESSION["jenis"]?>";

		if(login==""){
			alert("Maaf, Anda harus Login!");
			window.location.href="../login_register/login.php";
		}
		if(kursi != ""){
			if(jenis == "Reservasi"){
				document.getElementById('radioPrimary1').checked = true;
			}
			else{
				document.getElementById('radioPrimary4').checked = true;
			}
		}
	}

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

	var span = document.getElementsByClassName("close")[0];
	var ctr=0;
	var pilihan = 0;

	function open(pilihan) {
		if(pilihan == 1){
			modal.style.display = "block";
			inisialisasi();
		}
	};

	span.onclick = function() {
	modal.style.display = "none";
	}

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
	$("#subvcode").click(function () {
		var vkode = $("#kode").val();
		if(vkode == ""){
			$("#err").fadeIn();
    		$("#err").fadeIn("slow");
			$("#err").fadeIn(5000);
		}
	});

	$("#kode").focus(function () {
		$("#err").fadeOut();
		$("#err").fadeOut("slow");
		$("#err").fadeOut(3000);
	});

	function inisialisasi(){
		if(document.getElementById("radioPrimary1").checked ){
			$.ajax({
				method: "post",
				url: "ajaxFile/getReservasi.php",
				success: function (response) {
					$("#header").html("Reservasi");
					$("#footer").html("Reservasi");
					$("#tempat").html(response);
					getDateNow();
					getTimeNow();
					getDetailPesanan();
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
					getDetailPesanan();
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
					getDetailPesanan();
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
					getDetailPesanan();
				}
			});
		}
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
				check_kupon();
				getDetailPesanan();
				
			}
		});
	}
	function gotoStruk(){
		var id_hjual=$("#id_struk").val();
		alert(id_hjual);
		document.location.href="window_perantara.php?ctr="+id_hjual;
		
	}
	function set_pegawai_member(){
		$.ajax({
			type: "post",
			url: "ajaxFile/set_pegawai_member.php",
			data:{
				email:$("#member_pilihan").val()
			},
			success: function (response) {
				$("#keterangan_member").html(response);
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
		menit=date.getMinutes();
		jam=date.getHours()+2;
		if(date.getMinutes()<10){
			menit="0"+date.getMinutes();
		}
		if(date.getHours()+2<10){
			jam="0"+(date.getHours()+2);
		}
		var currentTime = jam + ':' + menit;
		document.getElementById('time_res').value = currentTime;
	}
	function Pay(){
		var banyak_pesanan="<?= $_SESSION["nama_menu"]?>";
		ctr=0;
		var jenis_pembayaran=$("#jenis_pembayaran").val();
		var jumlah_meja="<?= $_SESSION["ctr"]?>";
		if(banyak_pesanan!=""){
			
			if(document.getElementById("radioPrimary1").checked ){
				open(2);
				var date = new Date($('#date_res').val());
				day = date.getDate();
				month = date.getMonth()+1;
				year = date.getFullYear();
				date=[day, month, year].join('/');
				time=$("#time_res").val();
				if(date!="NaN/NaN/NaN"){
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
										var banyak_orang=$("#banyak_orang").val();
											if(banyak_orang>0){
												bayar();
												kirimemail();
												if(jenis_pembayaran=="cash"){
													document.location.href="window_perantara.php?ctr=0";
												}
											}else{
												alert("Jumlah Orang Harus Lebih Dari 0");
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
						alert(response);
						if(response=="berhasil"){
							bayar();
							if(jenis_pembayaran=="cash"){
								document.location.href="window_perantara.php?ctr=0";
							}
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
								bayar();
								if(jenis_pembayaran=="cash"){
									document.location.href="window_perantara.php?ctr=0";
								}
							}
						}else{
							alert(response);
						}
					}
				});
			}else if(document.getElementById("radioPrimary4").checked){
				open(2);
				if(jumlah_meja>0){
					bayar();
					if(jenis_pembayaran=="cash"){
						window.location.href="window_perantara.php?ctr=0";
					}
				}else{
					alert("Pilih Meja ");
				}
			}
		}

	}
	function bayar(){
		var jenis_pembayaran=$("#jenis_pembayaran").val();
		if(document.getElementById("radioPrimary1").checked ){
			var alamat="";
			var time=$("#time_res").val();
			var keterangan_meja="ada";
			var date=$("#date_res").val();
			var member="";
			var banyak_orang=$("#banyak_orang").val();
		}else if(document.getElementById("radioPrimary2").checked ){
			var alamat="";
			var time=$("#time_res").val();
			var keterangan_meja="";
			var date="";
			var member="";
			var banyak_orang="";
		}else if(document.getElementById("radioPrimary3").checked ){
			var alamat=$("#alamat").val();
			var time=$("#time_res").val();
			var keterangan_meja="";
			var date="";
			var member="";
			var banyak_orang="";
		}else if(document.getElementById("radioPrimary4").checked ){
			var alamat="";
			var time="";
			var keterangan_meja="ada";
			var date="";
			var member=$("#kodemem").val();;
			var banyak_orang="";
		}
		$.ajax({
			type: "post",
			url: "ajaxFile/transaksi.php",
			data:{
				alamat:alamat,
				time:time,
				keterangan_meja:keterangan_meja,
				date:date,
				method:jenis_pembayaran,
				member_id:member,
				banyak_orang:banyak_orang
			},
			success: function (response) {
				if(response == "Point Tidak Cukup"){
					alert(response);
				}
			}
		});
	}
	// function CheckPromo(){
	// 	var kode=$("#kode").val();
	// 	$.ajax({
	// 		type: "post",
	// 		url: "ajaxFile/check/CheckPromo.php",
	// 		data: {
	// 			nama:kode
	// 		},
	// 		success: function (response) {
	// 			alert(response);
	// 		}
	// 	});
	// }
	//getRadio();
	getRervasiKode();
	// function getRadio(){
	// 	$.ajax({
	// 		type: "post",
	// 		url: "ajaxFile/getRadioButton.php",
	// 		success: function (response) {
	// 			$("#place_radio").html(response);
	// 		}
	// 	});
	// }
	function CheckRes(){
		var id=$("#member_id").val();
		var kode=$("#reservasiKode").val();

		$.ajax({
			type: "post",
			url: "ajaxFile/CheckRes.php",
			data:{
				id:id,
				kode:kode
			},
			success: function (response) {
				window.location.href="struk.php?htrans="+response+"";
			}
		});
	}
	function getRervasiKode(){
		$.ajax({
			method: "post",
			url: "ajaxFile/getReservasiKode.php",
			success: function (response) {
				$("#tempat_reservasiKode").html(response);
			}
		});
	}
	function kirimemail(){
		var isPelanggan="<?=$isPel?>";
		if(isPelanggan!=""){
			var id =isPelanggan;
			$.ajax({
				async :false,
				type: "post",
				url : "ajaxFile/sendReservation.php",
				data:{
					id : id
				},
				success : function(response){
					alert(response);
				}
			});
		}else{
			alert("Harus ada Member");
		}
	}
	function check_kupon(){
		var id =$("#id_kupon").val();
		$.ajax({
			async :false,
			type: "post",
			url : "ajaxFile/check_kupon.php",
			data:{
				id : id
			},
			success : function(response){
				getDetailPesanan();
			}
		});
	}
</script>