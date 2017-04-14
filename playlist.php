<?php
$keyword="";
if(isset($_GET['id']) && !empty($_GET['id']))
$id=filter_var($_GET['id'], FILTER_SANITIZE_ENCODED);
else header("Location: index.php");
?>
<?php include_once('functions.php');?>
<?php include_once('inc.php');?>
<!DOCTYPE html>
<html lang="en">
<head prefix="og: http://ogp.me/ns# music: http://ogp.me/ns/music#">
<base href="<?php echo $urlhead; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta name="author" content="Songsbro">
<link rel="icon" href="favicon.ico">
<?php
	$songinfo=getplaylist($id);
	if(!$songinfo){$songinfo=addplaylist($id);}
list ($pid, $albumtitlem, $albumyear, $albumimg, $pcount, $albumlist) = $songinfo;
	?>
<meta name="description" content="Free Playlist titled - <?php echo $albumtitlem.' Year '.$albumyear;?>" />
<meta property="fb:app_id" content="1020064311384267" /> 
<meta property="og:title" content="Download MP3 Songs of <?php echo $albumtitlem; ?>" />
<meta property="og:type" content="music.album" />
<meta property="og:url" content="<?php echo $urlhead.'playlist/'.$id; ?>" />
<meta property="og:image" content="<?php echo $urlhead.$albumimg[0]; ?>" />
<meta property="og:description" content="Listen to <?php echo $albumtitlem.' songs'. $albumlabel.' music  &amp; Download mp3s online of '.$albumtitlem .$albumyear; ?>" />
<title>Play and Download <?php echo $albumtitlem .' songs free playlist - Songsbro'; ?></title>
</head>
<body>
<div class="container-fluid" style="margin-bottom:80px">
<div class="row text-center">
<?php printmast(); ?>

<div class="col-md-3 col-xs-12" id="sidebar">
	<?php
	$albuminfo=array($pid, $albumtitlem, $albumyear,$albumimg,$pcount);
$albumcontents=explode(',',$albumlist);
include('preset/head.txt');
$counter=0;$fstring='
	<div class="plylst content" id="content-8">
	<ul>';
	foreach($albumcontents as $single)
{
	issong($single);
	$songinfo = getsong($single);
	//var_dump($songinfo);
	if($songinfo[2]){
	$xmlsong[]=array("SONG_ID"=>$songinfo[0],"album_id"=>$songinfo[1],"url"=>$urlhead.'song/'.$songinfo[0],"SONG_NAME"=>$songinfo[2],"album_name"=>$songinfo[3],"FILE_PATH"=>$songinfo[4]);
	$fstring.='<li id="active_'.$counter.'"><div class="fl pic"><div class="pic"><div id="toltpl_'.$counter.'" class="toltp1" title="Play Song"><a  id=\'song_'.$counter.'\' class="play"><img src="'.$urlhead.$songinfo[4].'" width="46" height="46" alt=""><span></span></a></div></div></div><div class="fl picdesc"><strong id="sd_'.$counter.'" class="sd_'.$counter.'" >'.$songinfo[2].'</strong>'.$songinfo[3].'</div><div class="fr pt10">
<a href="'.$urlhead.'song/'.$songinfo[0].'" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" alt="Download"></a></div><div class="cl"></div></li>';
	$counter++;
	$seoblock.= "free download ".sanitize($songinfo[2]).", play and stream ".sanitize($songinfo[2]).", download album ".sanitize($songinfo[3])." and listen to ".sanitize($songinfo[2])." whose singers are ".sanitize($songinfo[6])." and language is ".sanitize($songinfo[5]).". primary language of the song ".sanitize($songinfo[2])." is ".sanitize($songinfo[5])." and the song is sung by ".sanitize($songinfo[6])." in album ".sanitize($songinfo[3]).". Download and stream for free all songs from album ".sanitize($songinfo[3])." and save in HD 320kbps all the songs.
128kbps download and 320kbps HD download and play available only at songsbro.com
All free music available in 128kbps and 320kbps superfast downloads from amazon cloud only at songsbro. download music in just 2 clicks. your all in one music content at songsbro. songsbro serving free downloads since 2015. Play and download for free ".sanitize($songinfo[2])." from ".sanitize($songinfo[3]).". Download and stream more songs from ".sanitize($songinfo[3])." only at songsbro.<br>
";
	}
}
	echo "<script type=\"text/javascript\">
//<![CDATA[
var arr = eval('".json_encode($xmlsong)."');
//]]>
</script>";
	?>
<?php include('preset/mid.txt');
	
echo '<div id="main_song" class="song">'.$albumtitlem.'</div><div class="movie">Count of Songs : '.$pcount.'</div>';
include('preset/mid2.txt');
	$fstring.='</ul><input type="hidden" id="main_song_id" name="main_song_id" value="" />
</div>';
	echo $fstring;
	
	include('preset/foot.txt');

	printwidget($albumlist);
	?>


</div>
<div class="col-md-9 col-xs-12"  itemscope itemtype="http://schema.org/MusicPlaylist">
<p class="lead">Search for your favorite tracks</p>
<form action="search.php" method="get">
<div class="form-group">
<div class="col-md-10 col-xs-9"><input type="search" name="keyword" class="input-lg form-control" placeholder="song,artist,album,anything" id="searchbox" autocomplete="off">
	<div id="search"></div></div><div class="col-md-2 col-xs-3">
<input class="btn btn-lg btn-info" type="submit" value="&#128269;" />
</div>
</div></form><div class="col-md-12"><p></p><p></p></div>
<?php
	echo printplaylistlabel($albuminfo);
	foreach($albumcontents as $single)
{
	issong($single);
	$songinfo = getsong($single);
	echo printasong($songinfo);
}
printuform($id,'p');
	?>

</div>
</div><!-- /container --><p id="seoblock"><?php  echo "$seoblock <br> $seoblock"; ?></p>
<?php include("js.php"); ?>
</div>
</body>
</html>