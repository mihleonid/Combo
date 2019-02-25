<?php ini_set("error_reporting", "E_ERROR"); error_reporting(E_ERROR);?>
<?php
header("Content-Type: text/javascript; charset=utf-8");
require_once("nocache.php");
?>
<?php
$COOKIEcol=((isset($_COOKIE['col']))?($_COOKIE['col']):("blue"));
?>
var tmptecofmyfunc=0;
var tmpteofmyfunc = new Array();
var tmpteofmyfunci = new Array();
function getCol(tmp){
	var tmpl=tmp/10;
	r=tmpl%256;
	<?php if($COOKIEcol=="red"){?>
	b=256-r;
	g=256-r;
	r=1000-r;
	<?php }elseif($COOKIEcol=="green"){?>
	b=256-r;
	g=1000-r;
	r=256-r;
	<?php }else{?>
	b=1000-r;
	g=256-r;
	r=256-r;
	<?php }?>
	a=1/tmp*100+0.16;
	return("rgba("+r+", "+g+", "+b+", "+a+")");
}
function myfunc(){
<?php if((isset($_COOKIE['y']))and($_COOKIE['y']=="on")){?>
	tmptecofmyfunc=0;
	var selector=document.getElementById("headerimg");
	document.querySelector("header h1").removeEventListener("click", myfunc, false);
	document.querySelector("header img").removeEventListener("click", myfunc, false);
	selector.style.display="block";
	selector.style.position="fixed";
	selector.style.boxShadow="2px 3px 22222220px 0px beige";
	//selector.style.position="fixed";
	//selector.style.zIndex="999999";
	//selector.style.backgroundColor="lightblue";
	//selector=fixed(selector);
	tmpteofmyfunci[0]=window.setInterval(function(){
		var selector=document.getElementById("headerimg");
			if(tmptecofmyfunc<<?php echo((isset($_COOKIE['raz2']))?$_COOKIE['raz2']:"1900");?>){
				selector.style.boxShadow="2px 3px 22222220px "+tmptecofmyfunc+"px "+getCol(tmptecofmyfunc);
				tmptecofmyfunc+=<?php echo((isset($_COOKIE['sk2']))?$_COOKIE['sk2']:"10");?>;
			}else{
				window.clearInterval(tmpteofmyfunc[1]);
				window.clearInterval(tmpteofmyfunc[0]);
				window.location.assign("/index.php");
			}
		}
		, 1);
		tmpteofmyfunci[1]=window.setInterval(function(){
		var selector=document.getElementById("headerimg");
			if(tmptecofmyfunc<<?php echo((isset($_COOKIE['raz2']))?$_COOKIE['raz2']:"1900");?>){
				selector.style.boxShadow="2px 3px 22222220px "+tmptecofmyfunc+"px "+getCol(tmptecofmyfunc);
				tmptecofmyfunc++;
				tmptecofmyfunc++;
				tmptecofmyfunc++;
			}else{
				window.clearInterval(tmpteofmyfunci[1]);
				window.clearInterval(tmpteofmyfunci[0]);
				window.location.assign("/index.php");
			}
		}
		, 1);
<?php }else{?>
window.location.assign("/index.php");
<?php }?>
}
function fixed(el, evt){
	//var el2=el.cloneNode(true);
	el2=document.createElement("div");
	el2.style.position="fixed";
	el2.style.zIndex="999999";
	el2.style.left=(evt.pageX-document.scrollingElement.scrollLeft)+"px";
	el2.style.top=(evt.pageY-document.scrollingElement.scrollTop)+"px";
	el.className="ten";
	var par = el.parentElement;
	par.insertBefore(el2, el);
	return el2;
}
var globselector;
function goTo(evt){
<?php if((isset($_COOKIE['y']))and($_COOKIE['y']=="on")){?>
	tmptecofmyfunc=0;
	window.clearInterval(tmpteofmyfunc[1]);
	window.clearInterval(tmpteofmyfunc[0]);
	var el=evt.target;
	if((el.parentElement.tagName=="A")&&(el.tagName!="A")){
		el=evt.target.parentElement;
	}
	if(el.tagName=="A"){
		evt.preventDefault();
		var path=el.getAttribute("href");
		el=fixed(el, evt);
		var selector=el;
		globselector=el;
		selector.style.boxShadow="2px 3px 22222220px 0px beige";
		selector.style.display="inline-block";
		tmpteofmyfunc[0]=window.setInterval(function(){
			var selector=globselector;
				if(tmptecofmyfunc<<?php echo((isset($_COOKIE['raz2']))?$_COOKIE['raz2']:"1900");?>){
					selector.style.boxShadow="2px 3px 22222220px "+tmptecofmyfunc+"px "+getCol(tmptecofmyfunc);
					tmptecofmyfunc+=<?php echo((isset($_COOKIE['sk2']))?$_COOKIE['sk2']:"10");?>;
				}else{
					window.clearInterval(tmpteofmyfunc[1]);
					window.clearInterval(tmpteofmyfunc[0]);
					window.location.assign(path);
				}
			}
			, 1);
	}
<?php }?>
}
<?php
switch($COOKIEcol){
	case "red":
	$a=array("rgba(255, 125, 125, 0.25)", "rgba(255, 150, 150, 0.15)");
	break;
	case "green":
	$a=array("rgba(125, 255, 125, 0.25)", "rgba(150, 255, 150, 0.15)");
	break;
	default:
	case "blue":
	$a=array("rgba(125, 125, 255, 0.25)", "rgba(150, 150, 255, 0.15)");
}
?>
function sgoto(evt){
<?php if((isset($_COOKIE['d']))and($_COOKIE['d']=="on")){?>
	tmptecofmyfunc=0;
	if(globselector!=undefined){
		globselector.style.boxShadow="2px 3px 22222220px 0px beige";
	}
	window.clearInterval(tmpteofmyfunc[3]);
	el=evt.target;
	if((el.parentElement.tagName!="A")&&(el.tagName!="A")){
	if((el==document.querySelector('header img'))||(el==document.querySelector('header h1'))){
		return;
	}
	var el=fixed(document.getElementById('el'), evt);
	var selector=el;
	globselector=el;
	selector.style.boxShadow="2px 3px 22222220px 0px beige";
	selector.style.display="inline-block";
	tmpteofmyfunc[3]=window.setInterval(function(){
		var selector=globselector;
			if(tmptecofmyfunc<<?php echo((isset($_COOKIE['raz']))?$_COOKIE['raz']:"2800");?>){
				selector.style.boxShadow="2px 3px 22222220px "+tmptecofmyfunc+"px "+((tmptecofmyfunc<1600)?getCol(tmptecofmyfunc):((tmptecofmyfunc<2500)?("<?php echo($a[0]);?>"):("<?php echo($a[0]);?>")));
				tmptecofmyfunc+=<?php echo((isset($_COOKIE['sk']))?$_COOKIE['sk']:"14");?>;
			}else{
				tmptecofmyfunc=0;
				selector.style.boxShadow="";
				window.clearInterval(tmpteofmyfunc[3]);
			}
		}
		, 1);
	}
<?php }?>
}
var t = new Array();
function totop(){
	t[t.length]=window.setInterval(
	function (){
	if(document.scrollingElement.scrollTop!=0){
		document.scrollingElement.scrollTop-=3;
	}else{
		for(i in t){
			window.clearInterval(t[i]);
			delete t[i];
		}
	}
	}, 1
	);
}
var too=new Array();
function toolraz(){
	if(document.getElementById('toollist').style.bottom!="70px"){
		too[too.length]=window.setInterval(function(){
			var tmptec=parseInt(document.getElementById('toollist').style.bottom);
			if(isNaN(tmptec)){
				tmptec=0;
			}
			if(tmptec<70){
				document.getElementById('toollist').style.bottom=(tmptec+1)+"px";
			}else{
				for(i in too){
					window.clearInterval(too[i]);
					delete too[i];
				}
			}
		}
		, 7);
	}else{
		for(i in too){
			window.clearInterval(too[i]);
			delete too[i];
		}
		too[too.length]=window.setInterval(function(){
			var tmptec=parseInt(document.getElementById('toollist').style.bottom);
			if(isNaN(tmptec)){
				tmptec=0;
			}
			if(tmptec>-(document.getElementById('toollist').clientHeight + 45)){
				document.getElementById('toollist').style.bottom=(tmptec-1)+"px";
			}else{
				for(i in too){
					window.clearInterval(too[i]);
					delete too[i];
				}
			}
		}
		, 7);
	}
}
function scr(){
	if(document.scrollingElement.scrollTop>60){
		document.getElementById('totop').style.display="block";
	}else{
		document.getElementById('totop').style.display="none";
	}
	if(document.scrollingElement.scrollTop==0){
		for(i in t){
			window.clearInterval(t[i]);
		}
	}
}
document.addEventListener("DOMContentLoaded", function(){
document.querySelector("header h1").addEventListener("click", myfunc, false);
document.querySelector("header img").addEventListener("click", myfunc, false);
document.body.addEventListener("click", sgoto, false);
document.getElementById('totop').addEventListener("click", totop, false);
document.addEventListener("scroll", scr, false);
scr();
document.body.addEventListener("click", goTo, false);
document.getElementById('tools').addEventListener("click", toolraz, false);
document.getElementById('progress').remove();
//document.getElementsByTagName('section')[0].addEventListener("click", function(){ document.getElementsByTagName('section')[0].style.transitionDelay="0.1s";window.setTimeout(function(){document.getElementsByTagName('section')[0].style.transitionDelay="";}, 10000);}, false);
}, false);
window.addEventListener("load", tool, false);
window.addEventListener("resize", tool, false);
function tool(){document.getElementById('toollist').style.bottom="-"+(document.getElementById('toollist').clientHeight+45)+"px";}
window.addEventListener("load", NAVwidth, false);
window.addEventListener("load", navClick, false);
window.addEventListener("resize", NAVwidth, false);
function NAVwidth(){
	var o=document.getElementsByClassName("nav_item");
	for(var io=0; io<o.length; io++){
		var e=o[io].getElementsByTagName("ul")[0];
		if(e!=null){
			var rect=e.getBoundingClientRect();
			var right=rect.right;
			if(right>document.documentElement.clientWidth){
				e.style.width=e.clientWidth-(right-document.documentElement.clientWidth)+"px";
				e.style.overflow="auto";
				e.style.borderRadius="20px 10px 4px 4px";
				e.style.padding="0px 10px";
				e.style.paddingRight="30px";
			}else{
				e.style.width="";
				e.style.overflow="";
				e.style.borderRadius="";
				e.style.padding="";
			}
		}
	}
	o=document.getElementsByClassName("tooltiptext");
	for(var io=0; io<o.length; io++){
		var e=o[io];
		if(e!=null){
			var rect=e.getBoundingClientRect();
			var right=rect.right;
			var left=rect.left;
			if(right>document.documentElement.clientWidth){
				e.style.marginLeft="-"+((e.clientWidth-(right-document.documentElement.clientWidth)) / 2)+"px";
				e.style.width=e.clientWidth-(right-document.documentElement.clientWidth)+"px";
			}else{
				e.style.width="";
				e.style.marginLeft="-"+((right-left)/2)+"px";
			}
		}
	}
}
var fromul=false;
function navClick(){
	document.body.addEventListener("click", function(){fromul=false;}, false);
	var o=document.getElementsByClassName("nav_item");
	for(var io=0; io<o.length; io++){
		var e=o[io].getElementsByTagName("ul")[0];
		if(e!=null){
			o[io].addEventListener("click", function(evt){
				if(!fromul){
					var e=document.getElementsByTagName("NAV")[0].getElementsByClassName("check")[0];
					if(e!=null){
						evt.currentTarget.className="nav_item check";
						e.className="nav_item";
					}else{
						evt.currentTarget.className="nav_item check";
					}
				}
			}, false);
			e.addEventListener("click", function(evt){
				fromul=true;
			}, false);
		}
	}
	document.getElementsByTagName("SECTION")[0].addEventListener("click", function(evt){
		if(evt.detail==2){
			var e=document.getElementsByTagName("NAV")[0].getElementsByClassName("check")[0];
			if(e!=null){
				e.className="nav_item";
			}
		}
	}, false);
}