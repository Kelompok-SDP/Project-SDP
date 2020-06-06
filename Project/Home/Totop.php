<style>
#keatas img{
    position: fixed;
    top: 85vh;
    right: 2vw;
    cursor: pointer;
}
</style>

<div id="keatas"><img src="totop.gif" alt="" width="50px" height="50px"></div>
<script>
$("#keatas").fadeOut();
$(window).scroll(function () {
    if($(window).scrollTop() > 500){
        $("#keatas").fadeIn();
    }else{
        $("#keatas").fadeOut();
    }
});

$("#keatas").click(function () {
    $("html, body").animate({ scrollTop: 0 }, "slow");
});
</script>