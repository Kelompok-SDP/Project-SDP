<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jQuery/jQuery.js"></script>
    <title>Kategori</title>
    
</head>
</head>
<body>
    <h1>Input Kategori</h1>
    
        Item name: <input type="text" name="namKat" id="namKat"> <br>
        Jenis Kategori: <input type="text" name="jenisKat" id="jenisKat"> <br>
        <div id="divKat">Id Kategori : <input type="text" name="id" id="idKat" value="" disabled> </div>
        <button onclick="insertItem()" id="btInsert" >Insert</button>
        <button onclick="updateItem()" id="btUpdate" >Update</button> 
      
    

   <div id="tablecontainer"> </div>
</body>
</html>
<script>
     var btnup = document.getElementById("btUpdate");
     var btin = document.getElementById("btInsert");
     var x = document.getElementById("divKat");
     var ids = document.getElementById("id");
     var tb = document.getElementById("tablecontainer");
     function insertItem(){
            $.post("controllerKategori.php",
            {
                "action":"insert",
                "namKat":$("#namKat").val(),
                "jenisKat" : $("#jenisKat").val()
            },function(data){
                alert(data);
                loadTable();
            });
        }
   

     function loadTable(){
            $("#tablecontainer").load("showtableKategori.php");
        }

        function deleteItem(id){
            $.post("controllerKategori.php",{
                "action":"delete",
                "id": id
                
            },function(data){
                loadTable();
            });
        }
        
        function updateItem(){
            $.post("controllerKategori.php",{
                "action":"update",
                "id": $("#idKat").val(),
                "namKat":$("#namKat").val(),
                "jenisKat" : $("#jenisKat").val()
            },function(data){
                alert(data);
                loadTable();
                x.style.display = "none";
                btin.style.display = "block";
                btnup.style.display = "none";
                tb.style.display = "block";
            });
        }


        function showId(id, isi, jenis){
           tb.style.display = "none";
            x.style.display = "block";
            btin.style.display = "none";
            btnup.style.display = "block";
            $("#idKat").val(id);
            $("#namKat").val(isi);
            $("#jenisKat").val(jenis);
        }
    $(document).ready(function(){
            //setelah document terload semua, langsung load table    
            loadTable();
            var x = document.getElementById("divKat");
            x.style.display = "none";
            tb.style.display = "block";
            btnup.style.display = "none";
            btin.style.display = "block";
        });
</script>