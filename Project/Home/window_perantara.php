<?php $yoi = $_GET['ctr']; ?>
<input type="hidden" value =<?php echo $yoi?> id= "wp"> 
<script>
    var hoi = document.getElementById("wp").value;
    if(hoi == "0"){
        window.open("../iplaymu/ipay/index.php");
        
    }else{  
        var boi = "struk.php?htrans="+hoi;
        window.open(boi);
    }
    document.location.href = "cart.php"; 
    
      
    
    
</script>