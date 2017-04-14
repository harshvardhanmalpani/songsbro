<?php
$keyword="";
//var_dump($_POST);
if(isset($_POST['id']) && !empty($_POST['id']))
$id=filter_var($_POST['id'], FILTER_SANITIZE_ENCODED);
else {
	header("Location: /index.php");
	}
?>
<?php include_once('functions.php');?>
<?php include_once('inc.php');
	$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array('secret' => '6LeozhsTAAAAAKeHWJzHA-2_o0Y8kF2yklVQ25NU', 'response' => $_POST['g-recaptcha-response']);

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
if ($result === FALSE) { /* Handle error */ }
$pas=json_decode($result,true);
//var_dump($pas);
if($pas['success']=="true"){
//var_dump($_POST['g-recaptcha-response']);
	updatealbum($id,1);
	
}
header("Location: $urlhead"."album/$id");
	?>