
<?php
    require_once("../../config.php");
    $id=$_POST["id"];
    $query="SELECT * from pegawai where id_pegawai='$id'";
    $query=mysqli_query($conn,$query);
    $query=mysqli_fetch_assoc($query);
    echo "<div class='form-group'>";
    echo     "<label for='exampleInputEmail1'>Nama :</label>";
    echo     "<input type='text' class='form-control' id='nama2' placeholder='Enter Nama' value='$query[nama]'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo     "<label for='exampleInputEmail1'>Email</label>";
    echo     "<input type='email' class='form-control' id='email2'value='$query[email]' placeholder='Enter Email'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo     "<label for='exampleInputEmail1'>Password</label>";
    echo     "<input type='text' class='form-control' id='pass2'value='$query[password]' placeholder='Enter Password'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo     "<label for='exampleInputEmail1'>Jabatan</label><br>";
    echo     "<select id='jabatan2' style='width:50%'>";
    echo     "</select>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo     "<label for='exampleInputEmail1'>No Telpon</label>";
    echo     "<input type='text' maxlength='13' onkeypress='NumberOnly(event)' value='$query[nohp]' class='form-control' id='nohp2' placeholder='Enter No Telepon'>";
    echo "</div>";
    echo "<div class='card-footer'>";
    echo     "<button onclick='ubah(\"$query[id_pegawai]\")' class='btn btn-primary'>Update</button>";
    echo "</div>";
?>
<script>
    function ubah(id){
        var nama=$("#nama2").val();
        var email=$("#email2").val();
        var jabatan=$("#jabatan2").val();
        var nohp=$("#nohp2").val();
        var pass=$("#pass2").val();
        $.ajax({
            method: "post",
            url: "pegawai/updatePegawai.php",
            data: {
                nama:nama,
                email:email,
                jabatan:jabatan,
                nohp:nohp,
                id:id,
                pass:pass
            },
            success: function (response) {
                getAkun();
            }
        });
    
    }
</script>