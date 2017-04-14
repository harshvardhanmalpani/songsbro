<?php
include ("inc.php");
include ("fx.song.php");
include ("fx.album.php");
include ("fx.playlist.php");
function printmast($par=null)
{
	global $urlhead;
	?>
	<nav class="horizontal">
	 <div class="col-md-4 col-xs-12">
        <h2 class="logo"><a href="<?php echo $urlhead;?>" title="Songsbro homepage"><img src="logo.svg" alt="SongsBro - Download songs with ease. Easier than ever" /></a></h2>
		</div><ul class="col-md-8 col-xs-12 text-right">
  <li <?php if($par=='home') echo 'class="active"'; ?>><a href="<?php echo $urlhead;?>">Home</a></li>
  <li <?php if($par=='req') echo 'class="active"'; ?>><a href="<?php echo $urlhead;?>request.php">Requests</a></li>
  <li <?php if($par=='sitemap') echo 'class="active"'; ?>><a href="<?php echo $urlhead;?>sitemap.php">Sitemap</a></li>
  <li <?php if($par=='terms') echo 'class="active"'; ?>><a href="<?php echo $urlhead;?>terms.php">Terms of Usage</a></li>
  <li <?php if($par=='privacy') echo 'class="active"'; ?>><a href="<?php echo $urlhead;?>privacy.php">Privacy Policy</a></li>
  <li><a>Share</a></li>
  <li class="sharebtn"><div><a class="social sharebtn-fa" target=_blank href="https://www.facebook.com/sharer/sharer.php?u="></a></div></li>
  <li class="sharebtn"><div><a class="social sharebtn-ta" target=_blank href="https://twitter.com/home?status="></a></div></li>
  <li class="sharebtn"><div><a class="social sharebtn-ga" target=_blank href="https://plus.google.com/share?url="></a></div></li>
  <li class="sharebtn"><div><a class="social sharebtn-wa" target=_blank href="whatsapp://send?text="></a></div></li>
<script type="text/javascript" src="player/jquery.min.js"></script>

	  <script>
	  $(".sharebtn .social").each(function() {
   var _href = $(this).attr("href"); 
   var uri=window.location.href;
   $(this).attr("href", _href + encodeURI(uri));
});
	  </script>
</ul>
		</nav><div class="clearfix"></div>
		<?php
}
function redirect()
{
	echo '<meta http-equiv="refresh" content="0;" />';
}
function redirect404()
{
	echo '<meta http-equiv="refresh" content="0;URL=\'/404.php\'" />';
}

function printwidget($d){
	global $urlhead;
		echo '<div><h3>Share this playlist</h3><textarea style="width:100%;resize:none" id="widget" rows="4">'.$urlhead.'widget.php?addid='.$d.'</textarea><script>document.getElementById("widget").select();</script></div>';
}

function printuform($id,$t=null)
{
	global $urlhead;
	echo '<form method="POST" id="requestform" class="col-md-6 col-xs-12" action="'.$urlhead.'update'.$t.'/'.$id.'" >
	<input type="hidden" name="id" value="'.$id.'">
<div class="g-recaptcha" data-sitekey="6LeozhsTAAAAAK3ym2_A9-IOLrzLPBtHZ0dwTfWZ" data-callback="capcha_filled" data-expired-callback="capcha_expired"></div>
<input type="submit" value="Request Update" rel="nofollow" class="btn btn-lg btn-warning">
	</form>';
}

function givememore($id)
{
	$url='http://api.hungama.com/myplay2/v2/content/music/song_details/'. $id. '?auth_key=4bbaa8370603ed0556eda28ab7c4573a';
	$result=file_get_contents($url);
	$arr1=json_decode($result,true,20);
	var_export($arr1);
}

	

function sanitize($d)
{
	global $illegalchars;
	return str_replace($illegalchars, "", $d);
}
function copyimage($url,$filepath='di/100/')
{
	preg_match('/[0-9]*\.jpg$/',$url,$iname);
	copy($url,$filepath.$iname[0]);
	return $filepath.$iname[0];
}
function get_query_content($type,$mediaid,$bitrate="128")
{
	global $sessioncode;
	$date=date('Y-m-d\TH:i:s\Z');
	return '{"id":"jsonrpc","jsonrpc":"2.0","method":"Create","params":[{"timestamp":"'.$date.'","partner_id":"3041","lc_id":"en-us","session_id":"'. $sessioncode .'","ws_ver":"4.6","app_code":"MYPLAY-ANDROID","app_ver":"4.6"},{"media_kind":"' .$type .'","media_id":'. $mediaid .',"media_id_ns":"hungama","formats":{"content":"audio\/mp3","bitrate":"'. $bitrate .'","protocol":"HTTP"}}]}';
}
function login($email,$pass)
{
	$date=date('Y-m-d\TH:i:s\Z');
	$query='{"id":"jsonrpc","jsonrpc":"2.0","method":"Create","params":[{"timestamp":"'. $date . '","partner_id":"3041","lc_id":"en-us","ws_ver":"4.6"},{"set_id":120,"signup_fields":{"hardware_id":{"value":"352238062487186"},"email_mobile":{"value":"' .$email.'" },"password":{"value":"'.$pass. '"},"partner_user_id":{"value":"79639225"}},"partner_id":"3041","device_model_name":"asus ASUS_T00J (WW_a501cg)","app_code":"MYPLAY-ANDROID"}]}';
	$url='http://s-pa.catchmedia.com/web_services/apps/v46/jsonrpc/PartnerConsumerProxy.py';
	$options = array(
		'http' => array(
			'header'  => 'Content-type: application/x-www-form-urlencoded;charset=UTF-8\r\nAPI-KEY: $HUNGAMA%APP%BILLING\r\nUser-Agent: Dalvik/1.6.0 (Linux; U; Android 4.4.2; ASUS_T00J Build/KVT49L)\r\nHost: s-pa.catchmedia.com\r\nConnection: Keep-Alive\r\nAccept-Encoding: gzip',
			'method'  => 'POST',
			'content' => $query,
			),
		);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$arr1=json_decode($result,true,20,JSON_BIGINT_AS_STRING);
//var_dump($result);
#echo $arr1['result']['data']['partner_user_id'];
	if($arr1['result']['message']=='success' && $arr1['result']['code']==200)
	{
		$id=$arr1['result']['data']['partner_user_id'];
		echo 'Login was Successful!<br> User ID found in Hungama.com database is : <strong>'.$id.'</strong>';
		$user=get_profile($id);
		echo '<br>Name of the user: <h4>'.$user['user_name'].'</h4>';
		echo '<br>You have <strong>'.$user['user_points'].'</strong> points now in your hungama account.';
		echo '<br>Your hungama rank is <strong>'.$user['leader_board']['user_rank']	.'</strong> globally.';
		echo '<br><a href=start.php title="start"><input class=submit type=button href="start.php" value="Start Earning reward points"></a>';
		global $sql;
		$hash=md5('boomerang'.$id.'malpani');
		$q=$sql->query("select * from users where id='$id' and hash='$hash'");
		if($q->num_rows)
		{
			//echo 'row found<br>';
			$vals=$q->fetch_assoc();
			if($vals['id']==$id && $vals['hash']==$hash)
				set_login2($id,$hash,$user['user_name']);
		}
		else
			set_login($id,$user['user_name']);
	}

	else if ($arr1['result']['message']=='Invalid Password' && $arr1['result']['code']==500)
		echo 'Invalid Password for email address : '. $email;
	else if ($arr1['result']['message']=='User Not Registered' && $arr1['result']['code']==500)
		echo 'This user is not registered on Hungama.com. Please register first to use this application.';
	else echo 'Something nasty happened, please retry with correct details';
}
function get_profile($id)
{
	$url='http://api.hungama.com/myplaysocial/my_profile.php?user_id='.$id.'&auth_key=4bbaa8370603ed0556eda28ab7c4573a';
	$result = file_get_contents($url);
	$arr=json_decode($result,true,20,JSON_BIGINT_AS_STRING);
	return $arr['response'];
}
function is_email($e)
{
	return preg_match('/^[a-zA-Z0-9._%-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z]{2,4}$/u', $e);
}

function set_login($user,$name)
{
	global $sql;
	$hash=md5('boomerang'.$user.'malpani');
	$q=$sql->query("insert into `users`(`id`,`name`,`hash`) values('$user','$name','$hash')");
	if($sql->affected_rows==1)
	{
		$_SESSION["i"]=$hash;
		$_SESSION["h"]=$user;
		$_SESSION["name"]=$name;
		echo 'Successfully created a custom environment for you';
	}
}
function set_login2($user,$hash,$name)
{
	$_SESSION["i"]=$hash;
	$_SESSION["h"]=$user;
	$_SESSION["name"]=$name;
	echo 'Successfully created a custom environment for you';
	
}

function get_loggedin()
{
	if(isset($_GET['email']) && isset($_GET['password']) && !empty($_GET['email']) && !empty($_GET['password']))
	{
		//echo 'cond2';
		$ck=is_email($_GET['email']);
		if($ck)
			$email=$_GET['email'];
		$password=$_GET['password'];
		login($email,$password);
	}
	else {
		echo '
		<form method=get>
		Hungama Email: <input name="email" placeholder="Hungama email address" type="email">
		<br><br>
		Hungama Password: <input name="password" placeholder="Hungama acc. password" type="text">
		<br>
		<br>
		<input class="submit" type="submit" value="Try Login">
		</form>';
	}
}
function is_user()
{
	global $sql;
	$id=$_SESSION["h"];
	$hash=$_SESSION["i"];
	if(intval($id)==$id && strlen($hash)==32)
		$q=$sql->query("select * from users where id='$id' and hash='$hash'");
	$vals=$q->fetch_assoc();
	if($vals['id']==$id && $vals['hash']==$hash)
	{
		$_SESSION["h"]=$id;
		$_SESSION["i"]=$hash;
		$_SESSION["name"]=$vals['name'];
		header("Location: start.php");
	}
	else 
	{
		unset($_SESSION);
		session_start();
	}
}
function is_loggedin()
{
	if(!isset($_SESSION["h"]) || !isset($_SESSION["i"]))
	{
		header("Location: login.php");
	}
}
function pinger($nodes){ 
$user=$_SESSION['h'];
global $sql;
	$gettime = mysqli_fetch_assoc(mysqli_query($sql, "SELECT tdata,updated FROM users WHERE id='$user'"));
	$nexttime=strtotime($gettime['updated']);
	$timeleft=$nexttime-time()+60;
if($timeleft>0){ echo 'please try again after <strong><span id="time">'.$timeleft.'</span></strong> seconds';  return;}
        $mh = curl_multi_init(); 
        $curl_array = array(); 
        foreach($nodes as $i => $url) 
        { 
            $curl_array[$i] = curl_init($url); 
            curl_setopt($curl_array[$i], CURLOPT_RETURNTRANSFER, true); 
            curl_multi_add_handle($mh, $curl_array[$i]); 
        } 
        $running = NULL; 
        do { 
            usleep(50000); 
            curl_multi_exec($mh,$running); 
        } while($running > 0); 
        
        $res = array(); 
        foreach($nodes as $i => $url) 
        { 
            $res[$url] = curl_multi_getcontent($curl_array[$i]); 
			
$arr1=json_decode($res[$url],true,20,JSON_BIGINT_AS_STRING);

echo $arr1['response']['user_name'] .' got '.$arr1['response']['points_earned'].' more points<br>';

        } 
        
        foreach($nodes as $i => $url){ 
            curl_multi_remove_handle($mh, $curl_array[$i]); 
        } 
		$c=$sql->query("update users set tdata=tdata + 1 where id='$user'");
        curl_multi_close($mh);        
		$uas='http://api.hungama.com/myplaysocial/my_profile.php?user_id='.$user.'&auth_key=4bbaa8370603ed0556eda28ab7c4573a';
	$redfdt = file_get_contents($uas);
	$adfd=json_decode($redfdt,true,20,JSON_BIGINT_AS_STRING);
	echo '<br>Updated points in your account: <b>'. $adfd['response']['user_points'].'</b>';
	
echo '<br>this page will reload after <span id="time">60</span> seconds';
} 
function getcode($numcharacters=5)
{
		$code = '';
		$characters = "abcdefghijkmnopqrstvwxyz";
		$i = 0;
		while ($i < $numcharacters) {
			$char = substr($characters, mt_rand(0, strlen($characters)-1), 1);
			$code .= $char;
			$i += 1;
		}
		return $code;
}

function getlatestitems()
{
	global $sql;
	$gettime = mysqli_fetch_assoc(mysqli_query($sql, "SELECT lastupd FROM details WHERE thing = 'itemexpiry'"));
$expiretime = strtotime($gettime['lastupd']);
	if($expiretime<strtotime('now'))
	{
		$timenow=date("Y-m-d H:i:s", time());
		mysqli_query($sql,"update details set lastupd ='$timenow' where thing='items");
		$t2=date("Y-m-d H:i:s", strtotime('tomorrow midnight'));
		mysqli_query($sql,"update details set lastupd='$t2' where thing='itemexpiry'");
	echo 'Content data updated<br>';
	$key="4bbaa8370603ed0556eda28ab7c4573a";
	$latesturl = 'http://api.hungama.com/myplay2/v2/content/music/latest?auth_key='. $key .'&start=1&length=30&device=android&size=xdpi';
	$latest_json= file_get_contents($latesturl);
	$ho=json_decode($latest_json,true);
	$count=1;
	foreach($ho['catalog']['content'] as $info)
	{
		if($info['type']=="track"){
			$tr=$info['content_id'];
			//echo $tr;
			$q=$sql->query("update `latest` set trackid='$tr' where `keyno`=$count");
			$count++;
		}
		if($info['type']=="album"){
			$tr=$info['content_id'];
			$ur='http://api.hungama.com/myplay2/v2/content/music/album_details/'.$tr.'?auth_key=4bbaa8370603ed0556eda28ab7c4573a';
			$album=file_get_contents($ur);
			$albumd=json_decode($album,true);
			foreach($albumd['content']['musiclisting']['track'] as $chotaalb)
			{$tr=$chotaalb['content_id'];//echo $tr.'<br>';
			$q=$sql->query("update `latest` set trackid='$tr' where `keyno`=$count");
			$count++;
			}
		}
		if($count>20) break;
	}
			
	}
}
function get_hits()
{
	global $sql;
	
$hits = mysqli_fetch_assoc(mysqli_query($sql, "SELECT hits FROM anal"));
echo $thit = $hits['hits'];

$c=$sql->query("update anal set hits=hits + 1");
}
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

?>