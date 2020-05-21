<?php
    require_once("../config.php");
    $id = $_POST['tmp'];
    $pt = $_POST['pt'];

    if($pt == 1){
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

<?php }else if ($pt == 2){?>
    <div class="form-group">
    <label for="inputStatus">Menu 1</label><br>
        <select class="form-control custom-select" id="Mpaket" name="mpaket">
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
    
<?php } else{ ?>
    <div class="form-group">
    <label for="inputStatus">Menu 2</label><br>
        <select class="form-control custom-select" id="Mpaket2" name="mpaket2">
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
<?php } ?>