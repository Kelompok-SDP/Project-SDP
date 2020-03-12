<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/Project-SDP/Project/jQuery/jQuery.js"></script>
    <title>Kategori</title>
    
</head>
</head>
<body>
    <h1>Input Promo</h1>
    
       Nama Promo: <input type="text" name="namPromo" id="namPromo"> <br>
        <div id="divKat">Id Kategori : <input type="text" name="id" id="idPromo" value="" disabled> </div> 
        Harga Promo: <input type ="number" name= "hargaPromo" id="hargaPromo" value=0/> <br>
        Awal Periode: <input type="date" name="daterange"   id="Pawal"/> <br>
        Akhir Periode: <input type="date" name="daterange"   id="Pakhir"/> <br>
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
            $.post("controllerPromo.php",
            {
                "action":"insert",
                "namPromo":$("#namPromo").val(),
                "hargaPromo" : $("#hargaPromo").val(),
                "pAwal": $("#Pawal").val(),
                "pAkhir": $("#Pakhir").val(),
                "jenisPromo" : $("#jenisPromo").val()
            },function(data){
                alert(data);
                loadTable();
            });
        }
   

     function loadTable(){
            $("#tablecontainer").load("showtablePromo.php");
        }

        function deleteItem(id){
            $.post("controllerPromo.php",{
                "action":"delete",
                "id": id
                
            },function(data){
                loadTable();
            });
        }
        
        function updateItem(){
            $.post("controllerPromo.php",{
                "action":"update",
                "id": $("#idPromo").val(),
                "namPromo":$("#namPromo").val(),
                "hargaPromo" : $("#hargaPromo").val(),
                "pAwal": $("#Pawal").val(),
                "pAkhir": $("#Pakhir").val()
            },function(data){
                alert(data);
                loadTable();
                x.style.display = "none";
                btin.style.display = "block";
                btnup.style.display = "none";
                tb.style.display = "block";
            });
        }


        function showId(id, isi, jenis,pa,pk){
           tb.style.display = "none";
            x.style.display = "block";
            btin.style.display = "none";
            btnup.style.display = "block";
            $("#idPromo").val(id);
            $("#namPromo").val(isi);
            $("#hargaPromo").val(jenis);
            $("#Pawal").val(pa);
            $("#Pakhir").val(pk);
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