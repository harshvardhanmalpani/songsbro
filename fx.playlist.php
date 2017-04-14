<?php

function printplaylistlabel($playlist)
{
list ($pid, $albumtitlem, $albumyear,$albumimg,$pcount) = $playlist;
if($albumimg)
$images=explode(",",$albumimg);
else $images[0]='di/200/';
return '<div class="col-md-12 col-xs-12"><div class="panel panel-default"><div class="panel-body"><div class="media"><div class="media-left"><a href="playlist/'.$pid.'"><img class="media-object img-rounded" src="'.$images[0].'" width="100" height="100" alt="'.sanitize($albumtitlem).'" itemprop="thumbnailUrl"></a></div><div class="media-body"><h1 class="media-heading"><span itemprop="name">'.$albumtitlem.'</span>, <span itemprop="copyrightYear">'.$albumyear.'</span></h1><h4>Track Count: <span itemprop="numTracks">'.$pcount.'</span></h4></div></div></div></div></div>';
}
function addplaylist($id,$nored=0)
{
	global $conn;
	$url = 'http://api.hungama.com/webservice/hungama/content/music/playlist_details?user_id=65641701&content_id='.$id.'&hardware_id=867512028232920&images=100x100&lang';
$sample_headers="API-KEY: d4f35790ded4d881db6909f54adece6e\r\nCONSUMER-ID: 50850040\r\nDEVICE-OS: ANDROID\r\nAPP-VERSION: 4.6\r\nDEVICE-MODEL: Xiaomi 2014818\r\ncharset=UTF-8\r\nHost: api.hungama.com\r\nConnection: Keep-Alive\r\nAccept-Encoding: gzip\r\nUser-Agent: okhttp/2.5.0\r\n";
$options = array(
    'http' => array(
        'method'  => 'GET',
        'header'  => $sample_headers,
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);	
	$racount=1;
	
	$arr=json_decode($result,true,20);
	//var_export($result);
	if(!$result || $arr['response']==null)
	{
 redirect404();
	}
	else{
	$playlist=array();
	$playlist[]=$arr['last_modified'];
	$playlist[]=$arr['response']['playlist']['content_id'];
	$playlist[]=$arr['response']['playlist']['images']['image_100x100'][0];
	$playlist[]=$arr['response']['playlist']['title'];
	$playlist[]=$arr['response']['playlist']['release_year'];
	$playlist[]=$arr['response']['playlist']['music_tracks_count'];
	$mcount=$arr['response']['playlist']['music_tracks_count'];
	$id=$arr['response']['playlist']['content_id'];
	$year=$arr['response']['playlist']['release_year'];
	foreach ($arr['response']['playlist']['images']['image_100x100'] as $url)
	{
	$imagearray[]=copyimage($url);
		}
	$images=implode(",",$imagearray);
	$fstring=printplaylistlabel($playlist);
	$ptitle=sanitize($arr['response']['playlist']['title']);
	foreach($arr['response']['musiclisting']['track'] as $info)
	{
	$playlistcontents[]=$info['content_id'];
		$single_title=sanitize($info['title']);
	$single_aname=sanitize($info['album_name']);
	$song_det='<a href=song/'.$info['content_id']. ' title=\"'.$single_title.'\" target=_blank>'.$single_title.'</a> - <a href=album/'.$info['album_id']. ' title=\"'.$single_aname.'\" target=_blank>'.$single_aname.'</a>';
	//$fstring.= '<a href="#" id='. $info['content_id']. ' onClick=\'play(this.id,"'.$song_det.'");\' title=\''.$single_title.' - '.$single_aname .'\'>'.$single_aname.'</a><br>';
	$news=issong($info['content_id']);
$fstring.= printasong($news);
	}
	$playlistsongs=implode(",",$playlistcontents);
	$qr="insert into playlists values ('$id','$ptitle','$year','$images','$mcount','$playlistsongs')";
	//echo $qr;
	$conn->query($qr);
	if(!$nored)redirect();
	$fstring.= '</div>';
	}
return $fstring;
}
function isplaylist($id)
{
	global $conn;	
$result=$conn->query("select * from playlists where pid = $id");
	if($result->num_rows){
	return true;
	}
	else{
	addplaylist($id);
}
}

function updateplaylist($id,$nored=0){
	global $conn;
	$songinfo=getplaylist($id);
	if(!$songinfo){$songinfo=addplaylist($id);}
	else {
		$outputt=$conn->query("DELETE FROM `playlists` WHERE `pid`='$id'");
		addplaylist($id,$nored);}
}




function getplaylist($id){
	global $conn;
$result=$conn->query("select * from playlists where pid = $id");
//print_r($result);
	if($result->num_rows){
	$songinfo=$result->fetch_array(MYSQLI_NUM);
	return $songinfo;
	}
	else
	return false;
	}
?>