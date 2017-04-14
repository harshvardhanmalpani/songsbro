
<?php
	include_once('functions.php'); 
	?>
<?php include_once('inc.php');	
	
	$result=$conn->query('select * from songs');
	while ($row = $result->fetch_assoc()) {
  $lista[] = sanitize($row['sid']);
  $listb[] = sanitize($row['stitle']);
  $listc[] = sanitize($row['atitle']);
}
	//$stmt = $conn->prepare("update songs set stitle = '?' , atitle= '?' where sid= '?' ");
//	update songs set stitle = 'Sooiyan From Guddu Rangeela' , atitle= 'Arijit Singh My Favourites' where sid= '13198655'

//var_export($list);
foreach($lista as $index=>$link){
	//$stmt->bind_param("sss", $stitle,$atitle,$sid);	
		$stitle=$listb[$index];
		$atitle=$listc[$index];
		$sid=$link;
	//echo $link[0].'<br>';	
	//
//$stmt->execute();
if($sid="2880353"){
	$conn->query("update songs set stitle = '$stitle' , atitle= '$atitle' where sid= $sid");
echo $conn->affected_rows.'<br>';
echo $conn->error;}
}
$conn->close;
?>