<?php
    require_once("../config.php");

    if(!isset($_SESSION['isLogin'])){
		header("location: index.php");
	}

    if(isset($_POST['masKat'])){
        header("location: kategori/input.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <form action="#" method="post">
        <table>
            <tr>
                <tr>
                    <td>Master Kategori</td>
                    <td><input type="submit" value="Kategori" name="masKat"></td>
                </tr>
                <tr>    
                    <td>Master Makanan</td>
                    <td><input type="submit" value="Makanan" name="makanan"></td>
                </tr>
                
                <td>Master Paket</td>
                <td>Master Event</td>
                <td>Master Promo</td>
                <td>Master Akun</td>
            </tr>
        </table>
    </form>
    
</body>
</html>