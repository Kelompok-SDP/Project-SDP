<?php 
    require_once("../../config.php");
    $idk = $_POST["a"];
?>
<div class="form-group">
    <label for="inputStatus">Menu 1</label>
    <select class="form-control custom-select" id="Mpaket" name="mpaket">
    <option selected disabled>Pilih satu</option>
    <?php  
        $idk = $_POST["a"];
        $query3 = "SELECT * FROM MENU WHERE STATUS = 1";
        $list3 = $conn->query($query3);
        foreach ($list3 as $key => $value) {
            $kat = $value['nama_menu'];
            ?>        
        <option value="<?= $value['id_menu']?>"><?= $value['nama_menu']?></option>
    <?php } ?> 
    </select>
</div>
<div class="form-group">
    <label for="inputStatus">Menu 2</label>
    <select class="form-control custom-select" id="Mpaket2" name="mpaket">
    <option selected disabled>Pilih satu</option>
    <?php  
        $idk = $_POST["a"];
        $query3 = "SELECT * FROM MENU WHERE STATUS = 1";
        $list3 = $conn->query($query3);
        foreach ($list3 as $key => $value) {
            $kat = $value['nama_menu'];
            ?>        
        <option value="<?= $value['id_menu']?>"><?= $value['nama_menu']?></option>
    <?php } ?> 
    </select>
</div>
