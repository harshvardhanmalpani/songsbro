<script src="js/fun.js"></script><script src='https://www.google.com/recaptcha/api.js'></script>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create','UA-70444992-3','auto');ga('send','pageview');</script>
<script>
 function search(){
 var title=$("#searchbox").val();
 if(title!=""){
 $("#search").html('<img alt="ajax search" src="499.gif" />');
  $.ajax({
 type:"GET",
 url:"livesearch.php",
 data:"key="+title,
 async: true,
 success:function(data){
 $("#search").html(data);
 }
 });
 }
 }
$( document ).ready(function() {
$("#seoblock").addClass("white");
var heights = $(".panel").map(function() {
  return $(this).height();
}).get(),
maxHeight = Math.max.apply(null, heights);
$(".panel").height(maxHeight);
$('#searchbox').keydown(function(e) {search();});
});
</script>
<span id="download"></span>
<?php include("hits.php");?>