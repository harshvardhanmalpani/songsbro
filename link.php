<?php 
	include('functions.php');
	$samplestart='<?xml version="1.0" encoding="UTF-8"?>
<pages>';
	$sampleend='
</pages>';
$data=$samplestart;
	$result=$conn->query('select sid,stitle from songs where lang!="ERROR"');
	while ($row = $result->fetch_assoc()) {
  $list[] = $row;
}
	foreach($list as $link){
		$data.='
<link>
<title>'.htmlspecialchars(sanitize($link['stitle'])).' - Song</title>
<url>'.$urlhead.'song/'.$link['sid'].'</url>
</link>';
	}
	$result=$conn->query('select aid,atitle from albums where lang!="ERROR"');
	while ($row = $result->fetch_assoc()) {
  $list[] = $row;
}
	foreach($list as $link){
		$data.='
<link>
<title>'.htmlspecialchars(sanitize($link['atitle'])).' - Album</title>
<url>'.$urlhead.'album/'.$link['aid'].'</url>
</link>';
	}
	$result=$conn->query('select pid,atitle from playlists');
	while ($row = $result->fetch_assoc()) {
  $list[] = $row;
}
	foreach($list as $link){
		$data.='
<link>
<title>'.htmlspecialchars(sanitize($link['atitle'])).' - Playlist</title>
<url>'.$urlhead.'playlist/'.$link['pid'].'</url>
</link>';
	}
	$data.=$sampleend;
	$fp = fopen('maps/ajaxsongs.xml', 'w');
	fwrite($fp, $data);
	fclose($fp);
	//echo $total.' sitemaps generated';
?>