
<input type="date" id="inpdate" id="">
<button onclick="cetak()">Cetak</button>
<!-- <select name="" id="jenis_pemesanan">
    <option value="Dine-in">Dine In</option>
    <option value="Take-away">Take Away</option>
    <option value="Delivery">Delivery</option>
</select> -->
<id id="tampung"></id>
<script src="../../../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<script>
    function cetak(){
        $.ajax({
            method: "post",
            url: "query_hjual.php",
            data: {
                date: $("#inpdate").val()
                // jenis: $("#jenis_pemesanan").val()
            },
            success: function (response) {
                $("#tampung").html(response);  
            }
        });
    }
</script>
