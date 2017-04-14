<?php
$keyword="";
if(isset($_GET['id']) && !empty($_GET['id']))
$id=filter_var($_GET['id'], FILTER_SANITIZE_ENCODED);
else header("Location: index.php");
?>
<?php include_once('functions.php');?>
<?php include_once('inc.php');?>
<?php
	$songinfo=getplaylist($id);
	if(!$songinfo){$songinfo=addplaylist($id);}
list ($pid, $albumtitlem, $albumyear, $albumimg, $pcount, $albumlist) = $songinfo;
	?>
<?php echo '<base href="'.$urlhead.'">'; ?>
<?php include('preset/head.txt'); ?>
<?php
	$albuminfo=array($pid, $albumtitlem, $albumyear,$albumimg,$pcount);
	//echo printplaylistlabel($albuminfo);
$albumcontents=explode(',',$albumlist);
$counter=0;$fstring='
	<div class="plylst content" id="content-8">
	<ul>';
	foreach($albumcontents as $single)
{
	issong($single);
	$songinfo = getsong($single);
	if($songinfo[2]){
	$xmlsong[]=array("SONG_ID"=>$songinfo[0],"album_id"=>$songinfo[1],"url"=>$urlhead.'song/'.$songinfo[0],"SONG_NAME"=>$songinfo[2],"album_name"=>$songinfo[3],"FILE_PATH"=>$songinfo[4]);
	$fstring.='<li id="active_'.$counter.'"><div class="fl pic"><div class="pic"><div id="toltpl_'.$counter.'" class="toltp1" title="Play Song"><a  id=\'song_'.$counter.'\' class="play"><img src="'.$urlhead.$songinfo[4].'" width="46" height="46" alt=""><span></span></a></div></div></div><div class="fl picdesc pt10 "><strong id="sd_'.$counter.'" class="sd_'.$counter.'" >'.$songinfo[2].'</strong>'.$songinfo[3].'</div><div class="fr pt10"><a href="'.$urlhead.'song/'.$songinfo[0].'" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" alt="download song"></a></div><div class="cl"></div></li>';
	$counter++;
	}
}
echo "<script type=\"text/javascript\">
//<![CDATA[
var arr = eval('".json_encode($xmlsong)."');
//]]>
</script>";
?>
<?php include('preset/mid.txt');
echo '<div id="main_song" class="song">'.$albumtitlem.'</div><div class="movie">Count of Songs : '.$pcount.'</div>';
include('preset/mid2.txt');
	$fstring.='</ul><input type="hidden" id="main_song_id" name="main_song_id" value="" />
</div>';
	echo $fstring;
	include('preset/foot.txt'); ?>