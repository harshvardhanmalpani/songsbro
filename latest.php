<?php 
	include_once('functions.php');
	include_once('inc.php');
	global $sample_headers;
	ob_start();
	$searchur='http://api.hungama.com/webservice/hungama/content/music/latest?start=1&length=30&user_id=65641701&hardware_id=867512028232920';
	$head="API-KEY: d4f35790ded4d881db6909f54adece6e\r\nCONSUMER-ID: 50850040\r\nDEVICE-OS: ANDROID\r\nAPP-VERSION: 4.6.5\r\nDEVICE-MODEL: Xiaomi 2014818\r\ncharset=UTF-8\r\n\r\n";
	$options = array(
    'http' => array(

        'header'  => $head,
        'method'  => 'GET',
		
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($searchur, false, $context);	
	$racount=1;
	$arr=json_decode($result,true,20);
	//var_export($arr);
	if($arr['response']==null)
	{
		$fstring.= 'No latest songs for you :/';
	}
	else{
	$fstring.= '<div class="col-md-6 col-xs-12 col-sm-6">Latest tracks:<br>';
	foreach($arr['response']['content'] as $info)
	{
		if($info['type']=="track" && $racount<10){
		$single_title=sanitize($info['title']);
	$single_aname=sanitize($info['album_name']);
	$song_det='<a href=song/'.$info['content_id']. ' title=\"'.$single_title.'\" target=_blank>'.$single_title.'</a> - <a href=album/'.$info['album_id']. ' title=\"'.$single_aname.'\" target=_blank>'.$single_aname.'</a>';
	$fstring.= '<a href="song/'.$info['content_id'].'" id='. $info['content_id']. ' title=\''.$single_title.' - '.$single_aname .'\'>'.$single_aname.'</a><br>';
	$racount++;
	}
	}
	$fstring.= '</div><div class="col-md-6 col-xs-12 col-sm-6">Latest albums:<br>';
	$racount=1;
	foreach($arr['response']['content'] as $info)
	{
		if($info['type']=="album" && $racount<10){
		$album_name=sanitize($info['album_name']);
		$fstring.= '<a href="album/'.$info['content_id'].'" title="'.$album_name.'" target=_blank>'.$album_name.'</a><br>';
		$racount++;
	}
	}
	$fstring.= '</div>';
	}
echo $fstring;
$myfile = fopen("latest.txt", "w");
fwrite($myfile, $fstring);
fclose($myfile);
$myfile = fopen("update_latest.txt", "w");
fwrite($myfile,time());
fclose($myfile);
ob_flush();
?>