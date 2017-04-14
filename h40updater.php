<?php
include_once ("inc.php");
include_once ("functions.php");
header('Content-Type: text/html; charset=utf-8');
$url = 'http://api.hungama.com/webservice/hungama/content/music/playlist_details?user_id=65641701&content_id=165&hardware_id=867512028232920&images=50x50';
$sample_headers="API-KEY: d4f35790ded4d881db6909f54adece6e\r\nCONSUMER-ID: 50850040\r\nDEVICE-OS: ANDROID\r\nAPP-VERSION: 4.6\r\nDEVICE-MODEL: Xiaomi 2014818\r\ncharset=UTF-8\r\nHost: api.hungama.com\r\nConnection: Keep-Alive\r\nAccept-Encoding: gzip\r\nUser-Agent: okhttp/2.5.0\r\n";
$options = array(
    'http' => array(
        'method'  => 'GET',
        'header'  => $sample_headers,
    ),
);
//$song_name=get_name($song_id);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$arr1=json_decode($result,true,12);
//var_export($result);
//var_export($arr1);
$top40list='';

	$filepath='di/50/';
	
foreach ($arr1['response']['musiclisting']['track'] as $single)
{
	$imagname=$single['images']['image_50x50'][0];
	preg_match('/[0-9]*\.jpg$/',$imagname,$iname);
	copy($imagname,$filepath.$iname[0]);
	$single_title=sanitize($single['title']);
	$single_aname=sanitize($single['album_name']);
	$song_det='<a href=song/'.$single['content_id']. ' title=\"'.$single_title.'\" target=_blank>'.$single_title.'</a> - <a href=album/'.$single['album_id']. ' title=\"'.$single_aname.'\" target=_blank>'.$single_aname.'</a>';
	$top40list.= '<a href="#" id='. $single['content_id']. ' onClick=\'play(this.id,"'.$song_det.'");\' title=\''.$single_title.' - '.$single_aname .'\'><img width=50 height=50 src=\''.$filepath.$iname[0].' \' alt=\''.$single_title.'\' /></a>';
}
$file = fopen("htop40.php","w");
fwrite($file,$top40list);
fclose($file);
//echo $top40list;
?>
