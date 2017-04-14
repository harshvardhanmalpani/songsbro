<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php require_once('functions.php');
	
	//var_dump($_GET);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sitemap Index of all albums and songs on this website. Search using ctrl F" />
<meta name="keywords" content="Sitemap Index of all MP3 Songs   - Songsbro" />
<meta name="author" content="Songsbro">
<link rel="icon" href="favicon.ico">
<base href="<?php echo $urlhead;?>">
<title>Sitemap Index of all songs on this website</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <div class="container-fluid">
     <div class="row text-center">
	 <?php printmast('sitemap'); ?>
        <div class="col-md-3 col-xs-12">
		<h3>Editor's Choice</h3>
		<?php
		echo "<a href='$urlhead"."playlist/70' title='Top Hits of the Year' target=_blank>Top 10 Hits</a><br>
		<a href='$urlhead"."album/16959790' title='Bollywood - Top Hits of Decade' target=_blank>Bollywood - Top Hits of Decade</a><br>
		<a href='$urlhead"."playlist/165' title='Hollywood Top 40' target=_blank>Hollywood Top 40</a><br>
		<a href='$urlhead"."playlist/4254' title='Dance With SRK' target=_blank>Dance With SRK</a><br>
		<a href='$urlhead"."playlist/60' title='Bollywood Flashback' target=_blank>Bollywood Flashback</a><br>
		<a href='$urlhead"."playlist/4106' title='Nachle With Akshay' target=_blank>Nachle With Akshay</a><br>";
		?>
		
		
		</div>
		
        <div class="col-md-6 col-xs-12">
<?php
	require_once('functions.php');
	
$fstring='';
	if(isset($_GET['beta'])){
		if(ctype_digit($_GET['beta'])){
		$beta=$_GET['beta'];
		}
		}
	if(isset($_GET['alpha'])){
	if(ctype_alpha($_GET['alpha']) && strlen($_GET['alpha'])==1){
	$alpha=$_GET['alpha'];
	}}
	else $alpha=null;
	if($alpha)
	{
	if(isset($beta)) {if($beta==0) {$beta=1;}} else $beta=1;
			$skip=50*($beta-1);
			$next=$skip+50;
			$result=$conn->query("select sid,aid,stitle,atitle from songs where `stitle` LIKE  '$alpha%' limit $skip,50");
			$counter=$conn->query("select count(1) from songs where `stitle` LIKE  '$alpha%'");
			$totalresults=$counter->fetch_row()[0];
	if($result->num_rows){
	
	echo '<table class="table table-bordered table-striped"><tr><th>Song Name</th><th>Album Name</th></tr>';
	while($songinfo=$result->fetch_array(MYSQLI_ASSOC)){
	echo '<tr><td><a href="'.$urlhead.'song/'.$songinfo['sid'].'" target="_blank">'.$songinfo['stitle'].'</a></td><td><a href="'.$urlhead.'album/'.$songinfo['aid'].'" target="_blank">'.$songinfo['atitle'].'</a></td></tr>';
	}
	echo '</table><hr><div class="row" style="margin-bottom:20px">';
	}
	else redirect404();
	$tpcount=ceil($totalresults/50);
	$fstring.= '<a type="button" ';
	if($beta!=1) $fstring.= 'href="'.$urlhead.'sitemap/'.$alpha.'/1" ';
	$fstring.= 'class="btn btn-';
	if($beta==1) $fstring.= 'default'; else $fstring.= 'primary';
	$fstring.= '"> << </a> ';
	$fstring.= '<a type="button" ';
	if($beta!=1) $fstring.= 'href="'.$urlhead.'sitemap/'.$alpha.'/'. ($beta-1) .'" ';
	$fstring.= 'class="btn btn-';
	if($beta==1) $fstring.= 'default'; else $fstring.= 'primary';
	$fstring.= '"> < </a> ';
	if($beta!=1)
	for($i=$beta-1;$i<=$beta+1 && $i<=$tpcount;$i++){
	
		$fstring.= '<a type="button" ';
	if($i!=$beta) $fstring.= 'href="'.$urlhead.'sitemap/'.$alpha.'/'.$i.'" ';
	$fstring.= 'class="btn btn-';
	if($i==$beta) $fstring.= 'default'; else $fstring.= 'primary';
	$fstring.= '">'.$i.'</a> ';
	}
	else
	for($i=1;$i<=$beta+1 && $i<=$tpcount;$i++){
	
		$fstring.= '<a type="button" ';
	if($i!=$beta) $fstring.= 'href="'.$urlhead.'sitemap/'.$alpha.'/'.$i.'" ';
	$fstring.= 'class="btn btn-';
	if($i==$beta) $fstring.= 'default'; else $fstring.= 'primary';
	$fstring.= '">'.$i.'</a> ';
	}
		
	
	
	$fstring.= '<a type="button" ';
	if($beta!=$tpcount) $fstring.= 'href="'.$urlhead.'sitemap/'.$alpha.'/'. ($beta+1) .'" ';
	$fstring.= 'class="btn btn-';
	if($beta==$tpcount) $fstring.= 'default'; else $fstring.= 'primary';
	$fstring.= '"> > </a> ';
	$fstring.= '<a type="button" ';
	if($beta!=$tpcount) $fstring.= 'href="'.$urlhead.'sitemap/'.$alpha.'/'. $tpcount .'" ';
	$fstring.= 'class="btn btn-';
	if($beta==$tpcount) $fstring.= 'default'; else $fstring.= 'primary';
	$fstring.= '"> >> </a> ';
	
	echo $fstring;
	echo '</div>';
	}
	else {
	$sappu='a';
		for($i=1;$i<27;$i++)
		{
	$fstring.= '<a type="button" ';
	$fstring.= 'href="'.$urlhead.'sitemap/'.$sappu.'" ';
	$fstring.= 'class="btn btn-';
	$fstring.= 'primary';
	$fstring.= '">'.strtoupper($sappu).'</a> ';
		$sappu++;
			}
			echo $fstring;
	}
?>
<p><a href="/sitemap.xml" title="XML Sitemap">XML Sitemap</a></p>
</div> 
</div> 
	</div><!-- /container -->
	<?php include ("js.php"); ?>
  </body>
</html>