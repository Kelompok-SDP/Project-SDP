<?php
    $isi = $_POST['sebelum'];
    if($isi == "H"){
        echo "<option value='H' selected>Promo Hemat</option>
        <option value='HR'selected>Promo Hari Raya</option>
        <option value='X'>Promo Buy 1 Get 1 Free</option>";

    }else if($isi == "HR"){
        echo "<option value='H'>Promo Hemat</option>
        <option value='HR' selected>Promo Hari Raya</option>
        <option value='X'>Promo Buy 1 Get 1 Free</option>";
    }else{
        echo "<option value='H'>Promo Hemat</option>
        <option value='HR'>Promo Hari Raya</option>
        <option value='X' selected>Promo Buy 1 Get 1 Free</option>";
    }




?>