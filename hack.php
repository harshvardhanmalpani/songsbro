<?php
$url="https://secure.hungama.com/newtwitter/playlist/song.php";
$data = array('main_song_id' => $_GET['id']);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

	$arr1=json_decode($result,true,20);

var_dump($arr1);
?>