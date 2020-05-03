<?php 
include('Mcd/title.php');
include("../config.php");
include('Mcd/header.php');
	if(!isset($_SESSION["nama_menu"])){
		$_SESSION["isi_kursi"]="";
		$_SESSION["nama_menu"]="";
		$_SESSION["pilih_menu"]= array();
	}
	// session_destroy();
?>

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
						<form class="form-inline">
							<label style="min-width:159px"> VOUCHERS Code: </label> 
							<input type="text" class="input-medium" placeholder="CODE">
							<button type="submit" class="shopBtn"> ADD</button>
						</form>
					</td>
				</tr>
			</tbody>
		</table>	

	<a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<button class="shopBtn btn-large pull-right" id="pay-button">Pay! <span class="icon-arrow-right"></span></button>
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
	getDetailPesanan();
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
</script>
<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-X8sfx9fsFwJfRQOp"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
    // This is minimal request body as example.
    // Please refer to docs for all available options: https://snap-docs.midtrans.com/#json-parameter-request-body
    // TODO: you should change this gross_amount and order_id to your desire. 
	var harga= $("#total-harga").html();
	alert(harga);
    var requestBody = 
    {
      transaction_details: {
        gross_amount: harga,
        // as example we use timestamp as order ID
        order_id: 'T-'+Math.round((new Date()).getTime() / 1000) 
      }
    }
    
    getSnapToken(requestBody, function(response){
      var response = JSON.parse(response);
      console.log("new token response", response);
      // Open SNAP payment popup, please refer to docs for all available options: https://snap-docs.midtrans.com/#snap-js
      snap.pay(response.token);
    })
  };
  /**
  * Send AJAX POST request to checkout.php, then call callback with the API response
  * @param {object} requestBody: request body to be sent to SNAP API
  * @param {function} callback: callback function to pass the response
  */
  function getSnapToken(requestBody, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
      if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        callback(xmlHttp.responseText);
      }
    }
    xmlHttp.open("post", "http://localhost/Project-SDP/Project/Iplaymu/Ipay/checkout.php");
    xmlHttp.send(JSON.stringify(requestBody));
  }
</script>