
<?php
    include_once("../../config.php");
    $query="SELECT * from kategori";
    $query=mysqli_query($conn,$query);
    foreach ($query as $key => $value) {
        echo"
        
        
            <!-- small box -->
            <div class='small-box bg-warning haha' onclick='callMenu(\"$value[id_kategori]\")'>
              <div class='inner'>

                <p> $value[nama_kategori]</p>
              </div>
             
            </div>
          </div>
        
        
        
        ";
    }
?>