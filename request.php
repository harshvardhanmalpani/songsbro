<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Request new music latest songs, albums to be added on songsbro for free" />
<meta name="keywords" content="Request new songs and albums - Songsbro" />
<meta name="author" content="Songsbro">
<link rel="icon" href="favicon.ico">
<title>Request new albums and titles, for free</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body><?php require_once('functions.php');?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1020064311384267";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <div class="container-fluid">
     <div class="row">
<?php printmast('req'); ?>
        <div class="col-xs-12">
		<h1>New Requests</h1>
		<p>Please leave your requests, those albums will be added on priority. 
		<strong>Important: This website adds the latest albums dynamically</strong><br>It means that if you search with the correct phrase, new songs will be added to our database automatically :)<br><br>
		<div class="fb-comments" data-href="http://songsbro.com/request.php" data-width="100%"></div>	
		</div>
	</div> 
	</div><!-- /container -->
	<?php include ("js.php"); ?>
  </body>
</html>