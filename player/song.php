<?php
include_once ("inc.php");
include_once ("functions.php");
function get_name($id)
{
	$url='http://api.hungama.com/myplay2/v2/content/music/song_details/'. $id. '?auth_key=4bbaa8370603ed0556eda28ab7c4573a';
	$result=file_get_contents($url);
	$arr1=json_decode($result,true,20);
	if(isset($arr1['response']['code']))
	{
		echo 'No such record. Please Input Single song only; Not a playlist';
		exit();
	}
	//var_dump($arr1);
	return $arr1['catalog']['content'];
}
function post_comment()
{
	global $sessioncode,$sample_headers,$urlhead;
$url = 'http://s-pa.catchmedia.com/web_services/apps/v46/jsonrpc/MediaHandle.py';
$song_id=17412599;
$bitrate="128";
if(isset($_POST['id']))
	$song_id=$_POST['id'];
if(isset($_POST['rate']))
	$bitrate=$_POST['rate'];

$content=get_query_content("track",$song_id,$bitrate);
// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(

        'header'  => $sample_headers,
        'method'  => 'POST',
        'content' => $content,
    ),
);
//var_export($options);
$song_det=get_name($song_id);
$song_title=$song_det['title'];
$album_title=$song_det['album_name'];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$arr1=json_decode($result,true,12);
//var_export($result);
echo '['.json_encode(array('song_url'=>$arr1['result']['data']['handle'],'song_name'=>$song_title,'album_name'=>$album_title,'song_id'=>strval($song_id),'url'=>$urlhead.'song/'.$song_id)).']';
}
post_comment();
?>