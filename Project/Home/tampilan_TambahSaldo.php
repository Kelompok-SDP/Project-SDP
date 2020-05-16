<?php
    include("../config.php");
    $id_login=$_SESSION["pelanggan"];
    $query= "SELECT * from member where id_member='$id_login'";
    $value=mysqli_fetch_assoc(mysqli_query($conn,$query));
    $id=$value["id_member"];
    $nama=$value["fullname"];
    $email=$value["email"];
    $saldo=$value["saldo_member"];
    echo $id."<br>";
    echo $nama."<br>";
    echo $email."<br>";
    echo $saldo."<br>";
    echo "Masukkan Nominal : ";
    echo "<input type='text' onkeydown='NumberOnly(event)' id='saldo'>";
?>
<button onclick="tambah_Saldo()">Tambah</button>


<script src="assets/js/jquery.js"></script>
<script>
    function tambah_Saldo(){
        $.ajax({
            type: "post",
            url: "ajaxFile/tambah_Saldo.php",
            data: {
                nominal: $("#saldo").val()
            },
            success: function (response) {
                // if(response=="berhasil"){
                //     window.location.href="cart.php";
                // }else{
                //     alert(response);
                // }
            }
        });
    }
function NumberOnly(evt){
    var input= String.fromCharCode(evt.which);
    if(!(/[0-9]/.test(input))){
        evt.preventDefault();
    }
}
</script>