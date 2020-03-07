<?php
    require_once("../../../config.php");

    if(isset($_POST['test'])){
        echo $_POST['inpdate'];
    }
?>

<form action="#" method="post">
    <input type="date" name="inpdate" id="">
    <input type="submit" value="test" name="test">
</form>

