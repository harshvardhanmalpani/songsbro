<?php
	function issong($id)
{
	global $conn;	
$result=$conn->query("select * from songs where sid = $id");
	if($result->num_rows){
	return true;
	}
	else{
	addsong($id);
}
}
	function getsong($id)
{
	global $conn;
$result=$conn->query("select * from songs where sid = $id");
	if($result->num_rows){
	$songinfo=$result->fetch_array(MYSQLI_NUM);
	
	return $songinfo;
	}
	else
	return false;
	}
	function getlatestsong()
{
	global $conn;
$result=$conn->query("select kiss,hit from stats where `type` = 'song' order by id limit 12");
	if($result->num_rows){
	$songinfo=$result->fetch_array(MYSQLI_NUM);
	
	print_r($songinfo);
	}
	else
	return false;
	}
	
	
function updatesong($id)
{
	global $conn;
	$songinfo=getsong($id);
	if(!$songinfo){$songinfo=addsong($id);}
	else {
		$outputt=$conn->query("DELETE FROM `songs` WHERE `sid`='$id'");
		addsong($id);}
}

function addsong($id)
{
	global $conn;
	$url='http://api.hungama.com/myplay2/v2/content/music/song_details/'. $id. '?auth_key=4bbaa8370603ed0556eda28ab7c4573a';
	$result=file_get_contents($url);
	$arr1=json_decode($result,true,20);
	//var_export($arr1);
	$danger=1;
	if(!isset($arr1) || isset($arr1['response']['code']) || ($arr1['catalog']['content']['content_id']==0))
	{

	$qr="insert into songs(sid,lang) values ('$id', 'ERROR')";
	$rrr=$conn->query($qr);
		$danger=0;
	}
	if($danger){
	$filepath='di/200/';
	$imagname=$arr1['catalog']['content']['image'];
	preg_match('/[0-9]*\.jpg$/',$imagname,$iname);
	copy($imagname,$filepath.$iname[0]);
	$albumid=$arr1['catalog']['content']['album_id'];
	$albumtitle=sanitize($arr1['catalog']['content']['album_name']);
	$songtitle=sanitize($arr1['catalog']['content']['title']);
	$lang=$arr1['catalog']['content']['language'];
	$singers=sanitize($arr1['catalog']['content']['singers']);
	$songid=$arr1['catalog']['content']['content_id'];
	$img=$filepath.$iname[0];
	$qr="insert into songs values ('$songid', '$albumid', '$songtitle', '$albumtitle', '$img', '$lang', '$singers')";
	$rrr=$conn->query($qr);
	//echo $qr;
	//echo $conn->affected_rows;

}
return array($songid, $albumid, $songtitle, $albumtitle, $img, $lang, $singers);
}
function printasonglabel($songinfo){
	
list ($songid, $albumid, $songtitle, $albumtitle, $img,$lang, $singers) = $songinfo;
return '<div class="panel panel-default">
<div class="panel-body">
<div class="row" itemscope itemtype="http://schema.org/MusicRecording">
<div class="col-md-4 text-center col-sm-12"><a href=album/'.$albumid.' title="'.$albumtitle.'"><img class="img-rounded" src="'.$img.'" alt="'.$songtitle.'" itemprop="thumbnailUrl"/></a></div>
<div class="col-md-8 col-sm-12"><h2 itemprop="name">'.$songtitle.'</h2><link itemprop="url" href="/song/'.$songid.'"><h3>Album:  <strong><a href=album/'.$albumid.' title="'.$albumtitle.'" itemprop="inAlbum">'.$albumtitle.'</a></strong></h3><p>Language: <strong itemprop="inLanguage">'.$lang.'</strong><br>Singer(s): <strong  itemprop="byArtist" itemscope itemtype="http://schema.org/MusicGroup"><span itemprop="name">'.$singers.'</span></strong><br><br><button class="btn btn-lg btn-success" id='.$songid.' value="Download" onClick=download(this.id)>Download this song</button> <button class="btn btn-lg btn-info" id='.$songid.' value="Download" onClick=downloadHD(this.id)>Download in HD</button></div></div></div></div>';
}
function printasong($songinfo)
{
list ($songid, $albumid, $songtitle, $albumtitle, $img,$lang, $singers) = $songinfo;
if($lang=="ERROR") return null;
$songtitle=sanitize($songtitle);
$albumtitle=sanitize($albumtitle);
//$song_det='<a href=song/'.$songid. ' title=\"'.$songtitle.'\" target=_blank>'.$songtitle.'</a> - <a href=album/'.$albumid. ' title=\"'.$albumtitle.'\" target=_blank>'.$albumtitle.'</a>';
return '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
<div class="item">
<div class="pos-rlt">
<div class="item-overlay opacity r r-2x bg-black">
<div class="text-info padder m-t-sm text-sm">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o text-muted"></i>
</div>
<div class="center text-center m-t-n">
<a href="#"><i class="icon-control-play i-2x"></i></a>
</div>
<div class="bottom padder m-b-sm">
<a href="#" class="pull-right">
<i class="fa fa-heart-o"></i>
</a>
<a href="#">
<i class="fa fa-plus-circle"></i>
</a>
</div>
</div>
<a href="#"><img src="'.$img.'" alt="" class="r r-2x img-full"></a>
</div>
<div class="padder-v">
<a href="#" class="text-ellipsis">'.$songtitle .'</a>
<a href="#" class="text-ellipsis text-xs text-muted">'.$singers.'</a>
</div>
</div>
</div>';
}
?>