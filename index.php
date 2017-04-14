<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sonngsbro Homepage - Listen to latest bollywood songs, hindi music  &amp; Download mp3s online including Punjabi, Tamil, Telugu, Kannada, International at Songsbro for FREE and watch video songs and hindi movies online" />
<meta name="keywords" content="Homepage,songsbro, Download MP3 Songs | Latest Bollywood Songs | Free Music Online | Watch Movies, Music Videos Online | Latest MP3 Songs   - Songsbro" />
<meta name="author" content="Songsbro">
<link rel="icon" href="favicon.ico">
<title>Songsbro Homepage - Latest Bollywood Songs Online, Download Hindi Mp3 songs, Free Music, Videos & Movies Online</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body><?php require_once('functions.php');?>
 <div class="container-fluid">
     <div class="row text-center">
<?php printmast('home'); ?>
        <div class="col-md-3 col-xs-12">
		<h3>Editor's Choice</h3>
		<?php
		echo "<a href='$urlhead"."album/15465835' title='Superhits of Sonu Nigam' target=_blank>Superhits of Sonu Nigam</a><br>
		<a href='$urlhead"."playlist/3762' title='100 ki Ladi' target=_blank>100 ki Ladi</a><br>
		<a href='$urlhead"."playlist/3934' title='Birthday Boys John n Riteish' target=_blank>Birthday Boys John & Riteishs</a><br>
		<a href='$urlhead"."playlist/4002' title='A Year In Music- Bollywood' target=_blank>A Year In Music- Bollywood</a><br>
		<a href='$urlhead"."playlist/4120' title='Triple Dhamaka Arijit, Ankit & Armaan' target=_blank>Triple Dhamaka Arijit, Ankit & Armaan</a><br>
		<a href='$urlhead"."playlist/2204' title='Pehla Pyaar, 2015' target=_blank>Pehla Pyaar, 2015</a><br>
		<a href='$urlhead"."playlist/70' title='Top Hits of the Year' target=_blank>Top 10 Hits</a><br>
		<a href='$urlhead"."album/16959790' title='Bollywood - Top Hits of Decade' target=_blank>Bollywood - Top Hits of Decade</a><br>
		<a href='$urlhead"."playlist/165' title='Hollywood Top 40' target=_blank>Hollywood Top 40</a><br>
		<a href='$urlhead"."playlist/4254' title='Dance With SRK' target=_blank>Dance With SRK</a><br>
		<a href='$urlhead"."playlist/60' title='Bollywood Flashback' target=_blank>Bollywood Flashback</a><br>
		<a href='$urlhead"."playlist/4106' title='Nachle With Akshay' target=_blank>Nachle With Akshay</a><br>";
		?>
		
		
		</div>
        <div class="col-md-6 col-xs-12">
		<p class="lead">Search for your favorite tracks</p>
		<div class="row">
		<form action="search.php" method="get">
  <div class="form-group">
    <div class="col-md-10 col-xs-9"><input type="search" name="keyword" class="input-lg form-control" placeholder="song,artist,album,anything" id="searchbox" autocomplete="off">
	<div id="search"></div>
	</div><div class="col-md-2 col-xs-3">
    <input class="btn btn-lg btn-info" type="submit" value="&#128269;" />
  </div>
</div></form>
<br><?php 
	$latest_timestamp=file_get_contents("update_latest.txt");
	if(($latest_timestamp+86400)<time()){include('latest.php'); //echo 'updated';
	} 
	else {include('latest.txt');// echo 'cached';
		}
		?></div>
		</div>
        <div class="col-md-3 col-xs-12" id="sidebar"><h3>Hollywood Top 40</h3>
		<?php include("hb40.txt"); ?>
		</div>
	</div> 
	</div><!-- /container -->
	<?php include ("js.php"); ?>
  </body>
</html>