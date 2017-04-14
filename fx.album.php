<?php
function updatealbum($id,$nored=0){
	global $conn;
	$songinfo=getalbum($id);
	if(!$songinfo){$songinfo=addalbum($id,$nored);}
	else {
		$outputt=$conn->query("DELETE FROM `albums` WHERE `aid`='$id'");
		addalbum($id,$nored);}
}
function addalbum($id,$nored=0)
{
	global $conn;
	$url= 'http://api.hungama.com/webservice/hungama/content/music/album_details?user_id=65641701&content_id=' .$id.'&hardware_id=867512028232920&images=100x100';
$sample_headers="API-KEY: d4f35790ded4d881db6909f54adece6e\r\nCONSUMER-ID: 50850040\r\nDEVICE-OS: ANDROID\r\nAPP-VERSION: 4.6\r\nDEVICE-MODEL: Xiaomi 2014818\r\ncharset=UTF-8\r\nHost: api.hungama.com\r\nConnection: Keep-Alive\r\nAccept-Encoding: gzip\r\nUser-Agent: okhttp/2.5.0\r\n";
$options = array(
'http' => array(
'method'  => 'GET',
'header'  => $sample_headers,
),
);
//$song_name=get_name($song_id);
$noresults=1;
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$albumd=json_decode($result,true);
$filepath='di/100/';
if(!isset($albumd) || isset($result['response']['code']))
{
	$qr="insert into albums(aid,lang) values ('$id', 'ERROR')";
	$rrr=$conn->query($qr);
$noresults=0;
redirect404();
}
if($noresults){
	$imagname=$albumd['response']['musicalbum']['images']['image_100x100'][0];
	preg_match('/[0-9]*\.jpg$/',$imagname,$iname);
	copy($imagname,$filepath.$iname[0]);
	$albuminfo=array();
	$albuminfo[]=$albumd['response']['musicalbum']['content_id'];
	$albuminfo[]=sanitize($albumd['response']['musicalbum']['title']);
	$albuminfo[]=$albumd['response']['musicalbum']['release_year'];
	$albuminfo[]=$albumd['response']['musicalbum']['language'];
	$albuminfo[]=$filepath.$iname[0];
	$albuminfo[]=sanitize($albumd['response']['musicalbum']['label']);
	$albuminfo[]=sanitize($albumd['response']['musicalbum']['music_director']);
	$fstring= printaalbumlabel($albuminfo);
foreach($albumd['response']['musiclisting']['track'] as $info)
{
$albumcontents[]=$info['content_id'];
$news=addsong($info['content_id']);
$songinfo=array();
$songinfo[]=$info['content_id'];
$songinfo[]=$info['album_id'];
$songinfo[]=sanitize($info['title']);
$songinfo[]=sanitize($info['album_name']);
$songinfo[]=$filepath.$iname[0];
$aay=end($news);
$songinfo[]=prev($news);
$songinfo[]=$aay;
$fstring.= printasong($songinfo);
}
$albumlist=implode(',',$albumcontents);
	$outputt=$conn->query("insert into albums values ('$albuminfo[0]', '$albuminfo[1]', '$albuminfo[2]', '$albuminfo[3]', '$albuminfo[4]', '$albuminfo[5]', '$albuminfo[6]', '$albumlist')");
if(!$nored)redirect();
}

return $fstring;
}
function getalbum($id){
	global $conn;
$result=$conn->query("select * from albums where aid = $id");
//print_r($result);
	if($result->num_rows){
	$songinfo=$result->fetch_array(MYSQLI_NUM);
	if($songinfo[3]=="ERROR") {redirect404(); return 'ERROR';}
	else return $songinfo;
	}
	else
	return false;
	}
	
	
function printaalbumlabel($albuminfo,$counter='x')
{
list ($albumid, $albumtitle, $albumyear, $albumlang, $albumimg, $albumlabel, $albummusic) = $albuminfo;
if($albumlang=="ERROR") return null;
else 
return '<div class="col-md-12 col-xs-12"><div class="panel panel-default"><div class="panel-body"><div class="media"><div class="media-left"><a href="album/'.$albumid.'"><img class="media-object img-rounded" width="100" height="100" alt="'.sanitize($albumtitle).'" src="'.$albumimg.'" itemprop="thumbnailUrl" /></a></div><div class="media-body"><h1 class="media-heading"><span itemprop="name">'.$albumtitle.'</span>, <span itemprop="copyrightYear">'.$albumyear.'</span>, <span> '.$albumlang.'</span></h1> <link href="/album/'.$albumid.'" itemprop="url" />
  <meta content="'.$counter.'" itemprop="numTracks" /><h4>Label: '.$albumlabel.'</h4><p>Music: <span itemprop="byArtist" itemscope itemtype="http://schema.org/MusicGroup">'.$albummusic.'</span></p></div></div></div></div></div>';
}
?>