<?php
	//header("Content-Type: image/png");
require_once('inc.php');
$script_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
$kiss=isset($_GET['id'])? intval($_GET['id']) : "111111111";
switch($script_name)
{
	case 'index': $pppp='index';break;
	case 'song': $pppp='song'; break;
	case 'album': $pppp= 'album';break;
	case 'playlist': $pppp= 'playlist';break;
	case 'request': $pppp= 'request';$kiss='222222222';break;
	case 'sitemap': $pppp= 'sitemap';$kiss='999999999';break;
	default: $pppp='other';
}
if($pppp!='other'){
$rr="update stats set hit = hit +1 where kiss='{$kiss}' and type='{$pppp}' ";
//echo $rr;
$uphit=$conn->query($rr);
//echo $conn->affected_rows ;
if($conn->affected_rows == 1)
{
	$hitcount=$conn->query("select hit from stats where kiss='{$kiss}' and type='{$pppp}'");
	$actualnewcount =$hitcount->fetch_array(MYSQLI_NUM);
	$totalhits= $actualnewcount[0];
}
else {
	$uphit=$conn->query("insert into stats(kiss,type) values('{$kiss}','{$pppp}') ");
	if($conn->affected_rows == 1)
		$totalhits=1000;
}
//echo mysqli_error($conn);
echo '<span id="hits">'.$totalhits.' hits</span>';
}
?>