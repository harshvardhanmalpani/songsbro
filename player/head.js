function letus(a,b,c,d,e){
eletid=parseInt($("#content-8 ul").children('li').last().attr('id').substring(7))+1;
$("#content-8 ul").append('<li id="active_'+ eletid +'"><div class="fl pic"><div class="pic"><div id="toltpl_'+ eletid +'" class="toltp1" title="Play Song"><a  id="song_'+ eletid +'" class="play"><img src="'+e+'" width="46" height="46" border="0" alt=""><span></span></a></div></div></div><div class="fl picdesc"><strong id="sd_'+ eletid +'" class="sd_'+ eletid +'" >'+b+'</strong>'+d+'</div><div class="fr pt10"><a href="/song/'+a+'" target="_blank" class="toltp" title="Download Song"><img src="player/download.png" width="15" height="21" border="0" alt=""></a>&nbsp; &nbsp; &nbsp;</div><div class="cl"></div></li>');
};
var myPlaylist;
$(document).ready(function(){
$('.toltp').tipsy({gravity: 'n'});
$('.toltp1').tipsy({gravity: 'w'});
var song_id = 0;
$('#main_song_id').val(arr[song_id]['SONG_ID']);
var song_data = [];
//main_song_url();
function main_song_url()
{
var main_song = $('#main_song_id').val();
$.ajax({
url:"plhelper.php",
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

myPlaylist = new jPlayerPlaylist({
jPlayer: "#tp1-player",
cssSelectorAncestor: "#tp1-container"
}, [
{
title:"<b>"+arr[0]['SONG_NAME']+"</b><br><span>"+arr[0]['album_name']+"</span>",
mp3:"welcome.mp3",
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
},
timeupdate: function(event){
},
volumechange: function(event){
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