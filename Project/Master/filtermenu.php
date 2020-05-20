<?php
    require_once("../config.php");
    $id = $_POST['tmp'];
?>

<div class="form-group">
    <label for="inputStatus">Pilih Menu</label>
    <select class="form-control custom-select" id="Kmenu" name="kmenu">
    <option selected disabled>Pilih satu</option>
    <?php  
        $query3 = "SELECT * FROM MENU WHERE id_kategori = '$id' AND STATUS = 1";
        $list3 = $conn->query($query3);
        foreach ($list3 as $key => $value) {
            $kat = $value['nama_menu'];
            ?>        
        <option value="<?= $value['id_menu']?>"><?= $value['nama_menu']?></option>
    <?php } ?> 
    </select>
</div>