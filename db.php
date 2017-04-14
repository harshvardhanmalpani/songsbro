<?php
	#$conn=new mysqli('localhost','th3pirat3','XXXXXX','gohavesomegrass');
	$conn=new mysqli('localhost','root','beetroot','songsbro');
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	?>