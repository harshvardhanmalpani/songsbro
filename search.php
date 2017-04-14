<?php
$keyword="";
if(isset($_GET['keyword']))
	$keyword=filter_var($_GET['keyword'], FILTER_SANITIZE_ENCODED);
if(isset($_GET['url']) &&  !empty($_GET['url']))
{
	$url=$_GET['url'];
}
?>
<?php 
	include_once('functions.php');
	include_once('inc.php');
	global $sample_headers;
	ob_start();
	header("Content-Type: text/html; charset=UTF-8");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Listen to latest bollywood songs, hindi music  &amp; Download mp3s online including Punjabi, Tamil, Telugu, Kannada, International at Songsbro for FREE and watch video songs and hindi movies online" />
<meta name="keywords" content=" Download MP3 Songs | Latest Bollywood Songs | Free Music Online | Watch Movies, Music Videos Online | Latest MP3 Songs   - Songsbro" />
<meta name="author" content="Songsbro">
<link rel="icon" href="favicon.ico">
<title>Songsbro - Search Page</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <div class="container-fluid" style="margin-bottom:80px">
     <div class="row text-center">
	 
<?php printmast(); ?>
        <div class="col-md-9 col-xs-12">
		<p class="lead">Search for your favorite tracks</p>
		
		<form action="search.php" method="get">
  <div class="form-group">
    <div class="col-md-10 col-xs-9"><input type="search" name="keyword" class="input-lg form-control" placeholder="song,artist,album,anything" id="searchbox" autocomplete="off" value="<?php if(isset($keyword)) echo urldecode($keyword); ?>" autofocus >
	<div id="search"></div></div><div class="col-md-2 col-xs-3">
    <input class="btn btn-lg btn-info" type="submit" value="&#128269;" />
  </div>
</div></form><div class="col-md-12"><p></p><p></p></div>
<?php
if($keyword)
{
	$searchur='http://api.hungama.com/webservice/hungama/content/search/all?keyword='. $keyword.'&start=1&length=60&user_id=65641701&hardware_id=867512028232920&images=100x100';
	$head="API-KEY: d4f35790ded4d881db6909f54adece6e\r\nCONSUMER-ID: 50850040\r\nDEVICE-OS: ANDROID\r\nAPP-VERSION: 4.6.5\r\nDEVICE-MODEL: Xiaomi 2014818\r\ncharset: UTF-8\r\n\r\n";
	$options = array(
    'http' => array(

        'header'  => $head,
        'method'  => 'GET',
		
    ),
);

//file_get_contents($searchur);
//print_r( get_headers($searchur));
//var_export($options);
$context  = stream_context_create($options);
$result = file_get_contents($searchur, false, $context);	
	$racount=1;
	$arr=json_decode($result,true,12);
	//var_export($arr);
	if($arr['response']==null)
	{
		echo 'No search results. Please enter correct/modified search phrase';
	}
	else{
	foreach($arr['response']['content'] as $info)
	{
	//var_dump($info);
		if($info['type']!="album" && $info['type']!="playlist"){
		$info['title']=sanitize($info['title']);
		$album_name=sanitize($info['album_name']);
		if($info['image']=='')	$info['image']='img/play.png';
		$song_det=substr($info['title'],0,20).' - '.substr($info['album_name'],0,20);
	$onestring= '<div class="col-md-6 col-xs-12">';
	$onestring.='<div class="panel panel-default">
  <div class="panel-body">
	<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object img-rounded" src="'.$info['images']['image_100x100'][0].'" width="100" height="100">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">'. substr($info['title'],0,30) .'</h4><p>Album: <a href=album/'.$info['album_id'].' title="'.$album_name. '">'. substr($info['album_name'],0,25).'</a>
    </p><button class="btn btn-success" id='. $info['content_id']. ' value="Download" onClick=download(this.id)>Download</button> <button class="btn btn-info" id='. $info['content_id']. ' value="Download" onClick=downloadHD(this.id)>Download in HD</button>
  </div>
</div></div></div></div>';
	echo $onestring;
	$racount++;
	}
	else if ($info['type']=="album") {
		$info['title']=sanitize($info['title']);
		$track_count=$info['music_tracks_count'];
		if($info['image']=='')	$info['image']='img/album.png';
		$song_det=substr($info['title'],0,20).' - '.substr($info['album_name'],0,20);
	$onestring= '<div class="col-md-6 col-xs-12">';
	$onestring.='<div class="panel panel-default">
  <div class="panel-body">
	<div class="media">
  <div class="media-left">
    <a href="album/'.$info['content_id'].'">
      <img class="media-object img-rounded" src="'.$info['images']['image_100x100'][0].'" width="100" height="100">
    </a>
  </div>
  <div class="media-body">
    <h3 class="media-heading"><a href="album/'.$info['content_id'].'" title="'. $info['title'] .'">'. $info['title'] .'</a></h3><h4>Tracks: '.$track_count.'
    </h4> 
  </div>
</div></div></div></div>';
	echo $onestring;
	$racount++;}
	else {
		$info['title']=sanitize($info['title']);
		$track_count=$info['music_tracks_count'];
		if($info['image']=='')	$info['image']='img/album.png';
		$song_det=substr($info['title'],0,20).' - '.substr($info['album_name'],0,20);
	$onestring= '<div class="col-md-6 col-xs-12">';
	$onestring.='<div class="panel panel-default">
  <div class="panel-body">
	<div class="media">
  <div class="media-left">
    <a href="playlist/'.$info['content_id'].'">
      <img class="media-object img-rounded" src="'.$info['images']['image_100x100'][0].'" width="100" height="100">
    </a>
  </div>
  <div class="media-body">
    <h3 class="media-heading"><a href="playlist/'.$info['content_id'].'" title="'. $info['title'] .'">'. $info['title'] .'</a></h3><h4>Tracks: '.$track_count.'
    </h4> <h4>Type: '.ucwords($info['type']).'
    </h4> 
  </div>
</div></div></div></div>';
	echo $onestring;
	$racount++;}
	}}
}
ob_flush();
?></div>

        <div class="col-md-3 col-xs-12" id="sidebar"><h3>Hollywood Top 40</h3>
		<?php include("hb40.txt"); ?>
		</div>
	</div>
	<?php include("js.php"); ?>
  </body>
</html>