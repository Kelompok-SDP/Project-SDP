<?php
    include("../../config.php");
    echo"<div class='icheck-primary d-inline'>
    ";echo"    <input type='radio' id='radioPrimary1' name='r1'>
    ";echo"    <label for='radioPrimary1'>Reservasi
    ";echo"    </label>
    ";echo"</div>
    ";echo"<div class='icheck-primary d-inline' style='margin-left: 100px;'>
    ";echo"    <input type='radio' id='radioPrimary2' name='r1'>
    ";echo"    <label for='radioPrimary2'>Take Away
    ";echo"    </label>
    ";echo"</div>
    ";echo"<div class='icheck-primary d-inline' style='margin-left: 100px;'>
    ";echo"    <input type='radio' id='radioPrimary3' name='r1'>
    ";echo"    <label for='radioPrimary3'>Delivery
    ";echo"    </label>
    ";echo"</div>
    ";
    if($_SESSION["login"]=="pegawai"){
        echo"<div class='icheck-primary d-inline'style='margin-left: 100px;'>
        ";echo"    <input type='radio' id='radioPrimary4' name='r1'>
        ";echo"    <label for='radioPrimary4'>Dine In
        ";echo"    </label>
        ";echo"</div>";
    }

?>

<script>
	// Get the modal
	// $(document).ready(function () {
	// 	$("#dropmenu").html(
	// 		"<a class='nav-link border-left' href='Homemenu.php'>Menu</a>");
	// });
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
	//start();
	ubahradio(0);
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
    </script>