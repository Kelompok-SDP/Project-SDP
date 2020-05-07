<?php
    $isi = $_POST['sebelum'];
    if($isi == "M"){
        echo "<option value='H'>Promo Hemat</option>
        <option value='M'selected>Promo Menu</option>
        <option value='HR' >Promo Hari Raya</option>";

    }else if($isi == "H"){
        echo "<option value='H'selected>Promo Hemat</option>
        <option value='M'>Promo Menu</option>
        <option value='HR' >Promo Hari Raya</option>";
    }else{
        echo "<option value='H'>Promo Hemat</option>
        <option value='M'>Promo Menu</option>
        <option value='HR' selected>Promo Hari Raya</option>";
    }




?>