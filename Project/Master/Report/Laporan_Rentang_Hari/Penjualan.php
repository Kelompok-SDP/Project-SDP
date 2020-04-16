<input type="date" id="inpdate1" id="">
<input type="date" id="inpdate2" id="">
<button onclick="cetak()">Cetak</button>
<id id="tampung"></id>
<id id="tampung2"></id>
<script src="../../../AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<script>
    function cetak(){
        $.ajax({
            method: "post",
            url: "query_hjual.php",
            data: {
                date1: $("#inpdate1").val(),
                date2: $("#inpdate2").val()
            },
            success: function (response) {
                $("#tampung").html(response);  
            }
        });
    }
</script>
