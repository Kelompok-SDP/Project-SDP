<?php
    $gambar  = $_POST['gambar'];
    $rest = substr($gambar ,-(strlen($gambar)-6)); 
    echo $rest;
?>

<img src = "<?=$rest?>" width="" height="" alt="image not found">