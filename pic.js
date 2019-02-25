var ar=document.getElementsByClassName('img');
var totopdisplay;
for(var i=0; i<ar.length; i++){
	var ti=ar[i].getElementsByTagName('img');
	ti[0].addEventListener("click", function(evt){
		document.body.className="block";
		evt.currentTarget.style.display="none";
		evt.currentTarget.parentNode.getElementsByTagName('img')[1].style.display="block";
		document.getElementsByTagName('header')[0].style.display="none";
		document.getElementsByTagName('nav')[0].style.display="none";
		document.getElementsByTagName('footer')[0].style.display="none";
		document.getElementsByTagName('section')[0].style.background="none";
		document.getElementsByTagName('section')[0].style.color="transparent";
		document.getElementsByTagName('section')[0].style.transition="none";
		document.getElementsByTagName('section')[0].style.webkitUserSelect="none";
		document.getElementsByTagName("html")[0].style.overflow="hidden";
		document.getElementsByTagName("html")[0].style.cursor="default";
		totopdisplay=document.getElementById("totop").style.display;
		document.getElementById("totop").style.display="none";
		}, false);
	ti[1].addEventListener("click", function(evt){
		document.body.className="notblock";
		evt.currentTarget.style.display="none";
		evt.currentTarget.parentNode.getElementsByTagName('img')[0].style.display="block";
		document.getElementsByTagName('header')[0].style.display="";
		document.getElementsByTagName('nav')[0].style.display="";
		document.getElementsByTagName('footer')[0].style.display="";
		document.getElementsByTagName('section')[0].style.background="";
		document.getElementsByTagName('section')[0].style.color="";
		document.getElementsByTagName('section')[0].style.webkitUserSelect="";
		document.getElementsByTagName("html")[0].style.overflow="";
		document.getElementsByTagName("html")[0].style.cursor="";
		window.setTimeout(function(){document.getElementsByTagName('section')[0].style.transition="";}, 100)
		document.getElementById("totop").style.display=totopdisplay;
		}, false);
}