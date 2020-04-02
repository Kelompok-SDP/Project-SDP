<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    Kepada:  <input type="text" id="kepada">
    Pesan :   <input type="text" id="pesan">
    <input type="button" value="Kirim" onclick='kirim()' name="kirim">
    
</body>
</html>
<script src="jquery.min.js"></script>
<script>
    function kirim(){
        var kepada=$("#kepada").val();
        var pesan=$("#pesan").val();
        console.log(kepada);
        console.log(pesan);
        
        $.ajax({
        method: "post",
        url: "kirim.php",
        data:{
            kepada:kepada,
            pesan:pesan
        },
        success: function (response) {
            
        }
    });
    }

</script>