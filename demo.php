<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@import "player/reset.css"; 
body { background-color:#e9e9e9; color:#4C4950; /*font-family:Arial, Tahoma, Geneva, sans-serif;*/ font-family:tahoma,Helvetica,Verdana,sans-serif; font-size: 11px; line-height:14px; }
.fl{float: left;}
.fr{float: right;}
.cl{clear: both;}
#tp1 *{-webkit-touch-callout: none;-webkit-user-select: none; -khtml-user-select: none; -moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none;color:#fff;text-decoration:none}
#tp1{background: #000;width:500px;margin:0 auto;text-align:left;position:relative;/*height:65px;*/overflow:hidden}
#tp1 .jp-audio{border:none;background:none}
#tp1 .jp-interface{background:#0e0e0e;height:320px}
#tp1 .jp-controls{position:absolute;top:77px;left:10px}
#tp1 .bgcontrols{background:#323232 url('player/bgjpcontrols.gif') repeat-x top center;height:40px}
#tp1 .jp-controls li{display:inline}
#tp1 .jp-previous{display:inline-block;width:23px;height:23px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -62px -113px;text-indent:-999px;}
#tp1 .jp-play{display:inline-block;width:34px;height:34px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -83px -2px;text-indent:-999px;margin-left:-3px}
#tp1 .jp-pause{display:inline-block;width:34px;height:34px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -82px -44px;text-indent:-999px;margin-left:-3px}
#tp1 .jp-divd1{display:inline-block;width:2px;height:21px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -127px -2px;position:absolute;top:5px;left:83px;}
#tp1 .jp-divd2{display:inline-block;width:2px;height:21px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -127px -2px;position:absolute;top:5px;left:170px}
#tp1 .jp-divd3{display:inline-block;position:absolute;top:7px;left:127px;color:#777}
#tp1 .jp-next{display:inline-block;width:23px;height:23px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -62px -142px;text-indent:-999px;margin-left:-6px}
#tp1 .jp-stop{display:none}
#tp1 .jp-shuffle{display:none !important;width:25px;height:25px;overflow:hidden;vertical-align:middle;background:#aaa;}
#tp1 .jp-shuffle-off{display:none !important;width:25px;height:25px;overflow:hidden;vertical-align:middle;background:#aaa;}
#tp1 .jp-repeat{display:none !important;width:25px;height:25px;overflow:hidden;vertical-align:middle;background:#aaa;}
#tp1 .jp-repeat-off{display:none !important;width:25px;height:25px;overflow:hidden;vertical-align:middle;background:#aaa;}
#tp1 .jp-mute{display:inline-block;width:21px;height:18px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -103px -168px;position:relative;left:30px;top:-2px;text-indent:-999px}
#tp1 .jp-unmute{display:inline-block;width:21px;height:18px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -132px -168px;position:relative;left:30px;top:-2px;text-indent:-999px}
#tp1 .jp-volume-max{visibility:hidden;display:inline-block;width:17px;height:15px;overflow:hidden;vertical-align:middle;background: url('player/skin/blue.monday/sprite_twitter.png') no-repeat -19px -186px;position:relative;left:73px;top:-1px;text-indent:-999px}
#tp1 .jp-current-time{display:inline-block;vertical-align:middle;position:relative;left:15px;color:#a8a8a8;top:-2px;}
#tp1 .jp-duration{display:inline-block;vertical-align:middle;position:relative;left:20px;color:#777777;padding-left:4px;top:-2px;}
#tp1 .jp-volume-bar{left:210px;top:89px;height:5px;padding:1px;width:50px;background:#000;position:absolute}
#tp1 .jp-volume-bar-value { position:absolute; bottom: 2px; background:#c5f32e;width:5px;height:3px}
#tp1 .jp-jplayer{float:left;margin:10px;position:relative;}
#tp1 .jp-jplayer img{position:absolute;z-index:9999;border:1px solid #4f4f4f}
#tp1 .jp-progress-holder{width:100%;position:relative;background:#181818 url('player/bgplytp.gif') repeat-x top center}
#tp1 .jp-progress-holder .hlogo{position:absolute;right:10px;bottom:10px;}
#tp1 .jp-progress-holder .hlogo h1{width:78px;height:18px;background:url('player/logo_h.png') no-repeat top left}
#tp1 .jp-playlist{display:none}
#tp1 .song{font-size:14px;padding:10px 10px 5px;font-weight:bold;font-family:tahoma}
#tp1 .movie{font-size:13px;color:#aaaaaa}
#tp1 .likes{color:#ac2247;font-weight:italic;padding-top:3px}
#tp1 .likes img{vertical-align:middle !important}
/*#tp1 .jp-playlist li.jp-playlist-current{display:none}*/
#tp1 .jp-holder{/*position:absolute;left:0;top:0;*/padding:0;/*margin:3px;*/background:#000}
/*#tp1 .jp-current-time{float:left}
#tp1 .jp-duration{float:left}*/
#tp1 .jp-progress{/*width:300px;float:left;*/background:#333;}
#tp1 .jp-seek-bar{background:#000;position:absolute;top:70px;height:2px;padding:1px 0}
#tp1 .jp-play-bar{background:#c5f32e;height:2px}
#tp1 #tp1-player{}
#tp1 .jp-share{display:inline-block;width:18px;height:16px;overflow:hidden;vertical-align:middle;background:url('player/share1.png') no-repeat center center;position:relative;left:228px;top:-2px;text-indent:-999px}
#tp1 .jp-download{visibility:hidden;display:inline-block;width:15px;height:21px;overflow:hidden;vertical-align:middle;background:url('player/download.png') no-repeat center center;position:relative;left:235px;top:-2px;text-indent:-999px}
#tp1 .share-overlay{width:97%;height:95px;background:#000;position:absolute;top:-250px;left:0;z-index:99999;padding:15px 0 0 15px}
#tp1 .share-overlay p.ttl{font-weight:bold;font-size:14px;color:#fff;padding-bottom:8px}
#tp1 .share-overlay p{font-size:13px;color:#929292;padding-bottom:8px}
#tp1 .load-msg{width:100%;background:#000;position:absolute;top:0;left:0;text-align:center;z-index:99999}
#tp1 .load-msg img{padding:10px}
#tp1 .load-msg p{text-align:center;font-size:12px;color:#aaaaaa;padding-bottom:8px}
#tp1 .retry-msg {width:97%;background:#000;position:absolute;top:0;left:0;z-index:99999;padding:28px 0 21px 15px;text-align:center}
#tp1 .retry-msg p{font-weight:bold;font-size:14px;color:#fff;padding-bottom:8px}
#tp1 .retry-msg p span{font-size:13px;color:#929292;padding-bottom:8px}
#tp1 .retry-msg p .button{/*background:url('player/bg-btn.png') repeat-x 0 0;*/padding:5px 8px;color:#929292;font-size:11px;font-weight:bold;border:1px solid #929292;text-transform:uppercase;margin-left:10px}
#tp1 .plylst{margin-top:5px}
#tp1 .plylst .fl{width:56px}
#tp1 .plylst .fl .pic{width:46px;height:46px;position:relative}
#tp1 .plylst .fl .pic a{display:block}
#tp1 .plylst .fl .pic span{display:block;width:20px;height:20px;background:url('player/playico1.png') no-repeat top left;position:absolute;top:50%;left:50%;margin:-10px 0 0 -10px}
#tp1 .plylst .picdesc{width:300px;color:#818087}
#tp1 .plylst .picdesc strong{font-weight:bold !important;color:#fff !important; display:block}
#tp1 .plylst .snglik{color:#ac2247;font-weight:italic;padding-top:3px}
#tp1 .plylst .snglik img{vertical-align:middle !important}
#tp1 .plylst ul li{padding:5px 10px;position:relative;border-bottom:1px solid #000;overflow:hidden}
#tp1 .plylst ul li .overlay{display:none;background:url('player/bgoverlay.png');position:absolute;width:100%;height:100%;top:0;left:0;text-align:center;padding-top:18px;}
#tp1 .plylst ul li:hover .overlay{display:block;}
#tp1 .plylst ul li.active{background:#27291f}
#tp1 .share-close{display:block !important}
#tp1 .plylst ul li:hover{background:#27291f}
#tp1 .plylst ul li .fr,#tp1 .plylst li .fl .pic span{display:none}
#tp1 .plylst ul li:hover .fr,#tp1 .plylst li:hover .fl .pic span{display:block}
#tp1 .plylst ul li.active .fr,#tp1 .plylst li.active .fl .pic span{display:block}
#tp1 .plylst li.active .fl .pic span{background:url('player/playico1-pause.png')}
.pt10{padding-top:10px}
.content{overflow: auto;position: relative;width: 95%;height: 195px;-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
</style>
<div id="tp1">
		<link rel="stylesheet" href="player/jquery.mCustomScrollbar.css">
		<link rel="stylesheet" href="player/tipsy.css">
		<script type="text/javascript" src="player/jquery.min.js"></script>
		<script type="text/javascript" src="player/jquery.jplayer.js"></script>
		<script type="text/javascript" src="player/jquery.tipsy.js"></script>
		<script type="text/javascript" src="player/jplayer.playlist.min.js"></script>
		<script type="text/javascript" src="player/jquery.jplayer.inspector.2.9.0.js"></script>
		<script type="text/javascript" src="player/jquery.mCustomScrollbar.js"></script>
		<script>
		(function($){
			$(window).load(function(){
				$("#content-8").mCustomScrollbar({
					axis:"y",
					theme:"light",
					scrollbarPosition:"outside",
					contentTouchScroll: 25
				});
				
			});
		})(jQuery);
	</script>
		<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function(){
                       
			$('.toltp').tipsy({gravity: 'n'});
			$('.toltp1').tipsy({gravity: 'w'});
			var song_id = 0;
                       
                        var arr = eval('[{"SONG_ID":"17412599","album_id":"17412598","url":"http:\/\/www.hungama.com\/music\/song-jabra-fan\/17412599","SONG_NAME":"Jabra Fan","album_name":"Jabra Fan From Fan","FILE_PATH":"http:\/\/36.hungamacontent.com\/488\/439584160.jpg"},{"SONG_ID":"16869399","album_id":"16869397","url":"http:\/\/www.hungama.com\/music\/song-tukur-tukur\/16869399","SONG_NAME":"Tukur Tukur","album_name":"Dilwale","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/437656314.jpg"},{"SONG_ID":"1837241","album_id":"1837240","url":"http:\/\/www.hungama.com\/music\/song-one-two-three-four---get-on-the-dance-floor\/1837241","SONG_NAME":"One Two Three Four - Get On The Dance Floor","album_name":"Chennai Express","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/66880097.jpg"},{"SONG_ID":"2646768","album_id":"2613011","url":"http:\/\/www.hungama.com\/music\/song-sharabi\/2646768","SONG_NAME":"Sharabi","album_name":"Happy New Year","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/89622372.jpg"},{"SONG_ID":"395560","album_id":"395559","url":"http:\/\/www.hungama.com\/music\/song-chammak-challo\/395560","SONG_NAME":"Chammak Challo","album_name":"RaOne","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/50x50%20gif\/5943237.gif"},{"SONG_ID":"3013099","album_id":"3400788","url":"http:\/\/www.hungama.com\/music\/song-its-the-time-to-disco-from-kal-ho-naa-ho\/3013099","SONG_NAME":"Its the Time to Disco From Kal Ho Naa Ho","album_name":"Put Your Hands Up","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/415584941.jpg"},{"SONG_ID":"3022939","album_id":"4427107","url":"http:\/\/www.hungama.com\/music\/song-kaal-dhamaal\/3022939","SONG_NAME":"Kaal Dhamaal","album_name":"Kaal","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/407436953.jpg"},{"SONG_ID":"1821199","album_id":"1821194","url":"http:\/\/www.hungama.com\/music\/song-ruk-ja-o-dil\/1821199","SONG_NAME":"Ruk Ja O Dil","album_name":"Dilwale Dulhania Le Jayenge","FILE_PATH":"http:\/\/36.hungamacontent.com\/488\/434607205.jpg"},{"SONG_ID":"286026","album_id":"271567","url":"http:\/\/www.hungama.com\/music\/song-aaj-ki-raat\/286026","SONG_NAME":"Aaj Ki Raat","album_name":"Don-The Chase Begins Again","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/110x135%20jpeg\/2194845.jpg"},{"SONG_ID":"288675","album_id":"271955","url":"http:\/\/www.hungama.com\/music\/song-gori-gori-gori-gori\/288675","SONG_NAME":"Gori Gori Gori Gori","album_name":"Main Hoon Na","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/80x60%20jpeg\/5472621.jpg"},{"SONG_ID":"2698878","album_id":"3200255","url":"http:\/\/www.hungama.com\/music\/song-koi-mil-gaya\/2698878","SONG_NAME":"Koi Mil Gaya","album_name":"Kuch Kuch Hota Hai","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/406285319.jpg"},{"SONG_ID":"286291","album_id":"271597","url":"http:\/\/www.hungama.com\/music\/song-break-free\/286291","SONG_NAME":"Break Free","album_name":"Krazzy 4","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/50x50%20gif\/1743285.gif"},{"SONG_ID":"3012219","album_id":"4134850","url":"http:\/\/www.hungama.com\/music\/song-pretty-woman-from-kal-ho-naa-ho\/3012219","SONG_NAME":"Pretty Woman From Kal Ho Naa Ho","album_name":"Best Of Me Shankar Ehsaan Loy","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/400485289.jpg"},{"SONG_ID":"1589858","album_id":"1589855","url":"http:\/\/www.hungama.com\/music\/song-ishq-shava\/1589858","SONG_NAME":"Ishq Shava","album_name":"Jab Tak Hai Jaan","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/57627904.jpg"},{"SONG_ID":"290869","album_id":"272261","url":"http:\/\/www.hungama.com\/music\/song-dance-pe-chance\/290869","SONG_NAME":"Dance Pe Chance","album_name":"Rab Ne Bana Di Jodi","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/50x50%20jpeg\/1908253.jpg"},{"SONG_ID":"326785","album_id":"326782","url":"http:\/\/www.hungama.com\/music\/song-marjaani-marjaani-kasame\/326785","SONG_NAME":"Marjaani Marjaani Kasame","album_name":"Billu","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/100x100%20gif\/2638835.gif"},{"SONG_ID":"395993","album_id":"395559","url":"http:\/\/www.hungama.com\/music\/song-criminal\/395993","SONG_NAME":"Criminal","album_name":"RaOne","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/50x50%20gif\/5943237.gif"},{"SONG_ID":"400398","album_id":"400396","url":"http:\/\/www.hungama.com\/music\/song-zaraa-dil-ko-thaam-lo\/400398","SONG_NAME":"Zaraa Dil Ko Thaam Lo","album_name":"Don 2","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/228x228%20jpeg\/53260567.jpg"},{"SONG_ID":"286243","album_id":"271591","url":"http:\/\/www.hungama.com\/music\/song-deewangi-deewangi\/286243","SONG_NAME":"Deewangi Deewangi","album_name":"Om Shanti Om","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/50x50%20jpeg\/1758038.jpg"},{"SONG_ID":"1869666","album_id":"2939841","url":"http:\/\/www.hungama.com\/music\/song-mitwa-from-kabhi-alvida-naa-kehna\/1869666","SONG_NAME":"Mitwa From Kabhi Alvida Naa Kehna","album_name":"Karan Johar Music Midas","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/400059927.jpg"},{"SONG_ID":"288508","album_id":"271934","url":"http:\/\/www.hungama.com\/music\/song-ghum-shuda\/288508","SONG_NAME":"Ghum Shuda","album_name":"Chalte Chalte","FILE_PATH":"http:\/\/repos.hungama.com\/audio\/display%20image\/50x50%20jpeg\/1759727.jpg"},{"SONG_ID":"2656515","album_id":"3398252","url":"http:\/\/www.hungama.com\/music\/song-say-shava-shava-from-kabhi-khushi-kabhie-gham\/2656515","SONG_NAME":"Say Shava Shava From Kabhi Khushi Kabhie Gham","album_name":"Perfect 10 Bollywood Party In A Box","FILE_PATH":"http:\/\/content.hungama.com\/audio%20album\/display%20image\/50x50%20jpeg\/401865590.jpg"}]');
                       
                        $('#main_song_id').val(arr[song_id]['SONG_ID']);
                        
                        var song_data = [];
                        main_song_url();
                        function main_song_url()
                        {
                            var main_song = $('#main_song_id').val();
                           
                            $.ajax({
                            url:"/sb/player/song.php",
                            type: "POST", 
                            async: false,
                            data: "id="+main_song,
                            success: function(response)
                            { 
                              
                                if(response!="")
                                {
                                    
                                     song_data = eval(response);
                                }
                              
                             
                            }
                        });
                            
                        }
                        
                        
			var myPlaylist = new jPlayerPlaylist({
				jPlayer: "#tp1-player",
				cssSelectorAncestor: "#tp1-container"
			}, [
                            
                         
                                {
                                        title:"<b>"+song_data[0]['song_name']+"</b><br><span>"+song_data[0]['album_name']+"</span>",
					mp3:"test.mp3",
					//oga:"http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
					poster:arr[song_id]['FILE_PATH']
				},
                                        
                           
                           
			], {
				size: {
					width: "50px",
					height: "50px"
				},
				cssSelector: {
					videoPlay: ".jp-video-play",
					play: ".jp-play",
					pause: ".jp-pause",
					stop: ".jp-stop",
					seekBar: ".jp-seek-bar",
					playBar: ".jp-play-bar",
					mute: ".jp-mute",
					unmute: ".jp-unmute",
					volumeBar: ".jp-volume-bar",
					volumeBarValue: ".jp-volume-bar-value",
					volumeMax: ".jp-volume-max",
					currentTime: ".jp-current-time",
					duration: ".jp-duration",
					fullScreen: ".jp-full-screen",
					restoreScreen: ".jp-restore-screen",
					repeat: ".jp-repeat",
					repeatOff: ".jp-repeat-off",
					gui: ".jp-gui",
					noSolution: ".jp-no-solution"
				},
				verticalVolume: false,
				swfPath: "player",
				supplied: "mp3",
				wmode: "window",
				ready: function(event){
					//console.log('ready');
				},
				timeupdate: function(event){
					//console.log('timeupdate');
				},
				volumechange: function(event){
					//console.log('volumechange *****************');
				},
                                ended: function(event) {
                                 $( "a" ).each(function() {
                                    $( this ).removeClass('pause').addClass('play');
                                 });
                             
                                $( "li" ).each(function() {
                                     $( this ).removeClass('active').addClass('');
                                });
                                  
                                   var song_count = 22;
                                   var song_c = parseInt(song_count)-1;
                                    
                                        if(song_c > song_id)
                                        {

                                             song_id = parseInt(song_id)+1;
                                        }
                                        else
                                        {
                                            song_id = 0;
                                        }
                                   
                                    $('#main_song_id').val(arr[song_id]['SONG_ID']);
                                      myPlaylist.remove(0); 
                                      main_song_url();
                                      myPlaylist.add({
                                        title:"<b>"+song_data[0]['song_name']+"</b><br><span>"+song_data[0]['album_name']+"</span>",
					mp3:song_data[0]['song_url'],
					poster:arr[song_id]['FILE_PATH']

                                     });
                                     
                                    
                                     $('#main_song').html(song_data[0]['song_name']);
                                     $('#song_'+song_id).removeClass('play').addClass('pause');
                                     $('#active_'+song_id).addClass('active');
                                     myPlaylist.play(myPlaylist.playlist.length-1);
                                    
                                }
			});

			$("#tp1-inspector").jPlayerInspector({jPlayer:$("#tp1-player")});
			$('.jp-share').click(function(){
				$('.share-overlay').animate({
					top: 0
				}, 200, function() {
					// Animation complete.
				});
			});
			$('.share-close').click(function(){
				$('.share-overlay').animate({
					top: -135
				}, 200, function() {
					// Animation complete.
				});
			});
			$('.share-overlay').hover(
				function() {
					$(this).find('.share-close').show();
				}, function() {
					$(this).find('.share-close').hide();
				}
			);
			$('#retry-close').click(function(){
				$('.retry-msg').animate({
					top: -135
				}, 200, function() {
					// Animation complete.
				});
			});
                       
                        
                       $('.play').click(function(){
                          
                           //console.log($(this).attr('class'));
                           $('.toltp1').attr('title', 'Play Song');
                            //console.log($('.toltp1').attr('title'));
                            
                           if($(this).attr('class') == 'play')
                           {
                               
                             $( "a" ).each(function() {
                                $( this ).removeClass('pause').addClass('play');
                             });
                             
                             $( "li" ).each(function() {
                                $( this ).removeClass('active').addClass('');
                             });
                             $(this).removeClass('play').addClass('pause');
                             
                             
                                 var id = $(this).attr('id');
                                 if (song_id == id.replace("song_", ""))
                                 {
                                     $('.jp-play').click();
                                 }
                                 else
                                 {
                                    song_id = id.replace("song_", ""); 
                                    $('#main_song_id').val(arr[song_id]['SONG_ID']);
                                    
                                     myPlaylist.remove(0) ;
                                     main_song_url();
                                     myPlaylist.add({
                                        title:"<b>"+song_data[0]['song_name']+"</b><br><span>"+song_data[0]['album_name']+"</span>",
					mp3:song_data[0]['song_url'],
					poster:arr[song_id]['FILE_PATH']

                                     });
                                    
                                   
                                    myPlaylist.play(myPlaylist.playlist.length-1);
                                    myPlaylist.play(song_id);
                                    
                                 }
                                
                                 $('#toltpl_'+song_id).attr('title','Pause Song');
                                 $('#active_'+song_id).addClass('active');
                                 var text_val = $('#sd_'+song_id).text();
                                 $('#main_song').html(text_val);
                                

                            }
                           else
                           {
                                //console.log($(this).attr('class'));
                                myPlaylist.pause();
                                $(this).removeClass('pause').addClass('play');
                                $('#toltpl_'+song_id).attr('title','Play Song');
                                $('#active_'+song_id).removeClass('active');
                                var text_val = $('#sd_'+song_id).text();
                                $('#main_song').html(text_val);
                                
                               
                           }
                        });
                        check_first_song = true;
                        $('.jp-play').click(function(){
                       
                            $( "a" ).each(function() {
                                $( this ).removeClass('pause').addClass('play');
                              });
                              
                              $( "li" ).each(function() {
                                $( this ).removeClass('active').addClass('');
                              });
                              
                              
                            if (check_first_song == true)
                            {
                               
                              $('#main_song_id').val(arr[song_id]['SONG_ID']);
                                    
                                     myPlaylist.remove(0) ;
                                     main_song_url();
                                     myPlaylist.add({
                                        title:"<b>"+song_data[0]['song_name']+"</b><br><span>"+song_data[0]['album_name']+"</span>",
					mp3:song_data[0]['song_url'],
					poster:arr[song_id]['FILE_PATH']

                                     });
                                    
                                   
                                    myPlaylist.play(myPlaylist.playlist.length-1);
                                    check_first_song = false; 
                            }  
                              
                              
                           $('#song_'+song_id).removeClass('play').addClass('pause');
                           $('.toltp1').attr('title', 'Play Song');
                           $('#toltpl_'+song_id).attr('title','Pause Song');
                           $('#active_'+song_id).addClass('active');
                           var text_val = $('#sd_'+song_id).text();
                           $('#main_song').html(text_val);
                         
                          

                        });
                        
                          $('.jp-pause').click(function(){
                             
                          $('#song_'+song_id).removeClass('pause').addClass('play');
                          $('.toltp1').attr('title', 'Play Song');
                          $('#toltpl_'+song_id).attr('title','Play Song');
                          var text_val = $('#sd_'+song_id).text();
                          $('#active_'+song_id).removeClass('active');
                          $('#main_song').html(text_val);
                        

                        });
                        
                         $('.jp-next').click(function(){
                            
                            $( "a" ).each(function() {
                               
                                $( this ).removeClass('pause').addClass('play');
                              });
                              
                               $( "li" ).each(function() {
                                $( this ).removeClass('active').addClass('');
                              });
                            var song_count = 22;
                            var song_c = parseInt(song_count)-1;
                            
                            if(song_c > song_id)
                            {
                               
                                 song_id = parseInt(song_id)+1;
                            }
                            else
                            {
                                song_id = 0;
                            }
                            
                            $('#main_song_id').val(arr[song_id]['SONG_ID']);
                             myPlaylist.remove(0); 
                             
                             main_song_url();
                                
                             myPlaylist.add({
                                title:"<b>"+song_data[0]['song_name']+"</b><br><span>"+song_data[0]['album_name']+"</span>",
				mp3:song_data[0]['song_url'],
				poster:arr[song_id]['FILE_PATH']
                                
                              });
                              
                             
                             myPlaylist.play(myPlaylist.playlist.length-1);
                            
                             $('.toltp1').attr('title', 'Play Song');
                             $('#toltpl_'+song_id).attr('title','Pause Song');
                             var text_val = $('#sd_'+song_id).text();
                             $('#song_'+song_id).removeClass('play').addClass('pause');
                             $('#main_song').html(text_val);
                             $('#active_'+song_id).addClass('active');
                           
                        });
                        
                          $('.jp-previous').click(function(){
                              $( "a" ).each(function() {
                                $( this ).removeClass('pause').addClass('play');
                              });
                              
                               $( "li" ).each(function() {
                                $( this ).removeClass('active').addClass('');
                              });
                             if(song_id > 0)
                              {
                                    song_id = parseInt(song_id)-1;
                              }
                            
                             $('#main_song_id').val(arr[song_id]['SONG_ID']);
                                    
                                     myPlaylist.remove(0); 
                                     main_song_url();
                                     myPlaylist.add({
                                      title:"<b>"+song_data[0]['song_name']+"</b><br><span>"+song_data[0]['album_name']+"</span>",
                                      mp3:song_data[0]['song_url'],
                                      poster:arr[song_id]['FILE_PATH']

                              });
                            
                             $('.toltp1').attr('title', 'Play Song ');
                             $('#toltpl_'+song_id).attr('title','Pause Song');
                             var text_val = $('#sd_'+song_id).text();
                             $('#song_'+song_id).removeClass('play').addClass('pause');
                             $('#main_song').html(text_val);
                             $('#active_'+song_id).addClass('active');
                             myPlaylist.play(myPlaylist.playlist.length-1);
                              
                        }); 

		});
		//]]>
		</script>
		<div id="tp1-container" class="jp-audio">
			<div class="jp-type-playlist">
				<div class="jp-gui jp-interface">
					<div class="jp-holder">
						<div id="tp1-player" class="jp-jplayer"></div>
						<div class="jp-progress-holder">
                                                        <div id="main_song" class="song">Jabra Fan</div>
                                                        <div class="movie">Count of Songs : 22</div>
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>
							<div class="hlogo"><h1>&nbsp;</h1></div>
							<div class="cl"></div>
						</div>
						
						<div class="cl"></div>
					</div>
					<div class="bgcontrols">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-previous" tabindex="1" title="previous">previous</a></li>
						<li><a href="javascript:;" class="jp-play" tabindex="1" title="play">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1" title="pause">pause</a></li>
						<li><span class="jp-divd1">&nbsp;</span></li>
						<li><a href="javascript:;" class="jp-next" tabindex="1" title="next">next</a></li>
						<li><a href="javascript:;" class="jp-stop" tabindex="1" title="stop">stop</a></li>
						<li><a href="javascript:;" class="jp-current-time" tabindex="1" title="Current Time"></a></li>
						<li><span class="jp-divd3">/</span></li>
						<li><a href="javascript:;" class="jp-duration" tabindex="1" title="Duration">/</a></li>
						<li><span class="jp-divd2">&nbsp;</span></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
						<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
						<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
						<li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
						<li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li>
						<li><a href="javascript:;" class="jp-download toltp" tabindex="1" title="Download Playlist">download</a></li>
						<!--<li><a href="javascript:;" class="jp-share toltp" tabindex="1" title="Share Playlist">share</a></li>-->
					</ul>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
					<div class="jp-playlist">
						<ul>
							<li></li>
						</ul>
					</div>
					</div>
					<div class="plylst content" id="content-8">
						<ul>
                                                                                                                                                            <li id="active_0">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_0" class="toltp1" title="Play Song"><a  id='song_0' href="#" class="play"><img src="http://36.hungamacontent.com/488/439584160.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_0" class="sd_0" >Jabra Fan</strong>
									Jabra Fan From Fan								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-jabra-fan/17412599" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_1">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_1" class="toltp1" title="Play Song"><a  id='song_1' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/437656314.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_1" class="sd_1" >Tukur Tukur</strong>
									Dilwale								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-tukur-tukur/16869399" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_2">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_2" class="toltp1" title="Play Song"><a  id='song_2' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/66880097.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_2" class="sd_2" >One Two Three Four - Get On The Dance Floor</strong>
									Chennai Express								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-one-two-three-four---get-on-the-dance-floor/1837241" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_3">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_3" class="toltp1" title="Play Song"><a  id='song_3' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/89622372.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_3" class="sd_3" >Sharabi</strong>
									Happy New Year								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-sharabi/2646768" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_4">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_4" class="toltp1" title="Play Song"><a  id='song_4' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/50x50%20gif/5943237.gif" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_4" class="sd_4" >Chammak Challo</strong>
									RaOne								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-chammak-challo/395560" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_5">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_5" class="toltp1" title="Play Song"><a  id='song_5' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/415584941.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_5" class="sd_5" >Its the Time to Disco From Kal Ho Naa Ho</strong>
									Put Your Hands Up								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-its-the-time-to-disco-from-kal-ho-naa-ho/3013099" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_6">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_6" class="toltp1" title="Play Song"><a  id='song_6' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/407436953.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_6" class="sd_6" >Kaal Dhamaal</strong>
									Kaal								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-kaal-dhamaal/3022939" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_7">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_7" class="toltp1" title="Play Song"><a  id='song_7' href="#" class="play"><img src="http://36.hungamacontent.com/488/434607205.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_7" class="sd_7" >Ruk Ja O Dil</strong>
									Dilwale Dulhania Le Jayenge								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-ruk-ja-o-dil/1821199" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_8">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_8" class="toltp1" title="Play Song"><a  id='song_8' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/110x135%20jpeg/2194845.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_8" class="sd_8" >Aaj Ki Raat</strong>
									Don-The Chase Begins Again								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-aaj-ki-raat/286026" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_9">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_9" class="toltp1" title="Play Song"><a  id='song_9' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/80x60%20jpeg/5472621.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_9" class="sd_9" >Gori Gori Gori Gori</strong>
									Main Hoon Na								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-gori-gori-gori-gori/288675" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_10">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_10" class="toltp1" title="Play Song"><a  id='song_10' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/406285319.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_10" class="sd_10" >Koi Mil Gaya</strong>
									Kuch Kuch Hota Hai								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-koi-mil-gaya/2698878" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_11">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_11" class="toltp1" title="Play Song"><a  id='song_11' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/50x50%20gif/1743285.gif" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_11" class="sd_11" >Break Free</strong>
									Krazzy 4								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-break-free/286291" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_12">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_12" class="toltp1" title="Play Song"><a  id='song_12' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/400485289.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_12" class="sd_12" >Pretty Woman From Kal Ho Naa Ho</strong>
									Best Of Me Shankar Ehsaan Loy								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-pretty-woman-from-kal-ho-naa-ho/3012219" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_13">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_13" class="toltp1" title="Play Song"><a  id='song_13' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/57627904.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_13" class="sd_13" >Ishq Shava</strong>
									Jab Tak Hai Jaan								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-ishq-shava/1589858" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_14">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_14" class="toltp1" title="Play Song"><a  id='song_14' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/50x50%20jpeg/1908253.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_14" class="sd_14" >Dance Pe Chance</strong>
									Rab Ne Bana Di Jodi								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-dance-pe-chance/290869" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_15">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_15" class="toltp1" title="Play Song"><a  id='song_15' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/100x100%20gif/2638835.gif" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_15" class="sd_15" >Marjaani Marjaani Kasame</strong>
									Billu								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-marjaani-marjaani-kasame/326785" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_16">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_16" class="toltp1" title="Play Song"><a  id='song_16' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/50x50%20gif/5943237.gif" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_16" class="sd_16" >Criminal</strong>
									RaOne								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-criminal/395993" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_17">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_17" class="toltp1" title="Play Song"><a  id='song_17' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/228x228%20jpeg/53260567.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_17" class="sd_17" >Zaraa Dil Ko Thaam Lo</strong>
									Don 2								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-zaraa-dil-ko-thaam-lo/400398" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_18">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_18" class="toltp1" title="Play Song"><a  id='song_18' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/50x50%20jpeg/1758038.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_18" class="sd_18" >Deewangi Deewangi</strong>
									Om Shanti Om								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-deewangi-deewangi/286243" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_19">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_19" class="toltp1" title="Play Song"><a  id='song_19' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/400059927.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_19" class="sd_19" >Mitwa From Kabhi Alvida Naa Kehna</strong>
									Karan Johar Music Midas								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-mitwa-from-kabhi-alvida-naa-kehna/1869666" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_20">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_20" class="toltp1" title="Play Song"><a  id='song_20' href="#" class="play"><img src="http://repos.hungama.com/audio/display%20image/50x50%20jpeg/1759727.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_20" class="sd_20" >Ghum Shuda</strong>
									Chalte Chalte								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-ghum-shuda/288508" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        <li id="active_21">
                                                        <div class="fl pic"><div class="pic"><div id="toltpl_21" class="toltp1" title="Play Song"><a  id='song_21' href="#" class="play"><img src="http://content.hungama.com/audio%20album/display%20image/50x50%20jpeg/401865590.jpg" width="46" height="46" border="0" alt=""><span></span></a></div></div></div>
								<div class="fl picdesc pt10 ">
                                                                        <strong id="sd_21" class="sd_21" >Say Shava Shava From Kabhi Khushi Kabhie Gham</strong>
									Perfect 10 Bollywood Party In A Box								
								</div>
								<div class="fr pt10">
									<a href="http://www.hungama.com/music/song-say-shava-shava-from-kabhi-khushi-kabhie-gham/2656515" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;<!--<a href="#" class="toltp" title="Share Song"><img src="player/share2.png" width="18" height="21" border="0" alt=""></a>-->
								</div><div class="cl"></div>
                                                    </li>
                                                                                                        
						</ul>
                                            <input type="hidden" id="main_song_id" name="main_song_id" value="" />
					</div>
					<div class="cl"></div>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
			<div class="share-overlay">
				<!-- <img src="player/s.png" border="0" alt="" style="position:absolute;top:0;left:0;height:100%"> -->
				<p class="ttl">SHARE</p>
				<p>Share this Song with your friends on</p>
				<!-- <div style="padding:25px 50px;color:#679cce">Share this song with<br>your friends on</div> -->
				<a href="javascript:;" style="display:block;position:absolute;top:19px;right:205px"><img src="player/f.png" border="0" alt=""></a>
				<a href="javascript:;" style="display:block;position:absolute;top:19px;right:146px"><img src="player/t.png" border="0" alt=""></a>
				<a href="javascript:;" class="share-close" style="display:none;position:absolute;top:8px;right:9px"><img src="player/x.png" width="15" height="15" border="0" alt=""></a>
			</div>
			
		</div>
		<div class="load-msg" style="display:none">
			<img src="player/ajax-loader.gif" alt="">
			<p>"Loading Message will come here"</p>
		</div>
		<div class="retry-msg" style="display:none">
			<p>Ooops! <span>something went wrong.</span> <a href="#" class="button">Retry</a></p>
		</div>
		<div id="tp1-inspector" style="display:none"></div>

</div>