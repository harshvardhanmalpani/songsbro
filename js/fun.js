function play(f,h)
{
url="shit.php?id="+f+"";
HttpRequest(url, myFunction);
if(h===undefined)h='Playing song...';
document.getElementById("songplaying-title").innerHTML=h;
}
function myFunction(xhttp) {
document.getElementById("msongp").src = xhttp.responseText;
playerinit();
}
function download(f)
{
url="download.php?id="+f;
HttpRequest(url,myfunc2);ga('send', 'event', 'Song','Download');
}
function downloadHD(f)
{
url="download2.php?id="+f;
HttpRequest(url,myfunc2);ga('send', 'event', 'Song','Download in HD');
}
function myfunc2(xhttp) {
document.getElementById("download").innerHTML = xhttp.responseText;
}
function HttpRequest(url, cfunc) {
var xhttp;
xhttp=new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4 && xhttp.status == 200) {
cfunc(xhttp);
}
}
xhttp.open("GET", url, true);
xhttp.send();
}
var submit = false;
function capcha_filled () {
    submit = true;
}
function capcha_expired () {
    submit = false;
}
function check_is_filled (e) {
	alert(submit);
    if(submit) return true;
    e.preventDefault();
    alert('');
	return false;
	
}
var element = document.querySelector("#requestform");
if(element){
element.addEventListener("submit", function(event) {
	if(submit==false){
  event.preventDefault();
  alert("Fill in the captcha First!");
	}
});}