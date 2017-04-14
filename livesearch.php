<?php
	include('functions.php');
	if(isset($_GET['key'])){
    $key=sanitize($_GET['key']);
	$str='';
    $array = array();
	$qq="select id,title,source from(select sid as id ,stitle as title, 'song' as source from songs where stitle LIKE '{$key}%' union select aid as id,atitle as title,'album' as source from albums where atitle like '{$key}%') as A order by title limit 5";
	//echo $qq;
    $livequery=$conn->query($qq);
	
	while($songinfo = $livequery->fetch_array(MYSQLI_NUM)){
$str.='<a href="/'.$songinfo[2].'/'.$songinfo[0].'">'.$songinfo[1].' - '.ucwords($songinfo[2]).'</a>';
	}
	echo $str;
	}
?>