<?php
include_once ("inc.php");
include_once ("functions.php");
function get_name($id)
{
	$url='http://api.hungama.com/myplay2/v2/content/music/song_details/'. $id. '?auth_key=4bbaa8370603ed0556eda28ab7c4573a';
	$result=file_get_contents($url);
	$arr1=json_decode($result,true,12);
	if(isset($arr1['response']['code']))
	{
		echo 'No such record. Please Input Single song only; Not a playlist';
		exit();
	}
	return $arr1['catalog']['content']['title'];
}
function post_comment()
{
	global $sessioncode,$sample_headers;
$url = 'http://s-pa.catchmedia.com/web_services/apps/v46/jsonrpc/MediaHandle.py';
$song_id=5953481;
$bitrate="64";
if(isset($_GET['id']))
	$song_id=$_GET['id'];
if(isset($_GET['rate']))
	$bitrate=$_GET['rate'];

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
$song_name=get_name($song_id);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$arr1=json_decode($result,true,12);
//var_export($result);
echo $arr1['result']['data']['handle'];
}
post_comment();
?>