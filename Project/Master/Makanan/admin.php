<?php
    require_once("config.php");
    require_once("Sumber.php");
  //  session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <style>
        .col{
            margin: 10px;
            text-align: center;
        }

        h1{
            color: white;
        }
    </style>
    <body>
        <div class="col s12 #ef5350 red lighten-1"><h1>Selamat datang</h1>
        <form action="#" method="post">
            <button class="col s3 offset-s3 waves-effect waves-light btn-large" id="btnLogout" type="submit" value="submit" name="logout">Logout <i class="material-icons right">arrow_back</i></button>  
        </form>
        </div>
        <div class="container">
        <div class="row">
            <div class="col s12">
                <button class="col s6 waves-effect waves-light btn-large" id="btnAgenda" type="submit" value="submit">Makanan <i class="material-icons right">arrow_downward</i></button>
                <div class="container">
                    <div class="row">
                    <div class="col s12">
                        <div class="middleside"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<script>
var ctr = 0;
    $(document).ready(function(){
        $("#btnAgenda").click(function (){
            ctr++;
            if(ctr % 2 == 0){
                $(".middleside").html("");
            }else{
                $(".middleside").load("Makanan.php");
            }
        });
    });
</script>