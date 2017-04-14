<?php
	error_reporting(E_ALL);
	#$conn=new mysqli('localhost','th3pirat3','XXXXXX','gohavesomegrass');
	$conn=new mysqli('localhost','root','beetroot','songsbro');
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$urlhead="http://localhost/sb/";
//$urlhead="http://songsbro.com/";
$sessioncode="ws08_3adf5fe984064f2b2c36beffa82"; // this is the key for all locks - BRAHMASTRA BITCHES
$illegalchars=array("[", "]", "'", '"', "}", "{","(", ")",":","#","!","\n","\\","\\\\","<br>",'<','>','`','$','&');
$api_key="API-KEY: \$HUNGAMA%APP%BILLING";
$consumer_id="CONSUMER-ID: 88822288"; //8 digit integer
$device_os="DEVICE-OS: ANDROID";
$app_version="APP-VERSION: 4.6";
$device_model="DEVICE-MODEL: Xiaomi 2014818";
$content_type="Content-Type: application/x-www-form-urlencoded;charset=UTF-8";
$host="Host: s-pa.catchmedia.com";
$connection="Connection: Keep-Alive";
$accept_encoding="Accept-Encoding: gzip";
$user_agent="User-Agent: okhttp/2.5.0";
$sample_headers='Content-Type: application/x-www-form-urlencoded;\r\nAPI-KEY: $HUNGAMA%APP%BILLING\r\nCONSUMER-ID: 88822288\r\nDEVICE-OS: ANDROID\r\nAPP-VERSION: 4.6\r\nDEVICE-MODEL: Xiaomi 2014818\r\ncharset=UTF-8\r\nHost: s-pa.catchmedia.com\r\nConnection: Keep-Alive\r\nAccept-Encoding: gzip\r\nUser-Agent: okhttp/2.5.0\r\n';
?>