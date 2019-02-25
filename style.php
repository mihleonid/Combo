<?php
require_once("nocache.php");
header('Content-Type: text/css', true);
?>
input, select{
	border-radius: 80px;
	padding-left: 5px;
}
input:focus, select:focus{
	outline: none;
	border-width: 2px;
	border-color: lightblue;
}
select{
	border-width: 2px;
	border-color: white;
	border-style: inset;
}
input[type='submit'], input[type='button'], input[type='reset'], button{
	border-color: lightblue;
	background-color: lightblue;
}
input[type='submit']:focus, input[type='button']:focus, input[type='reset']:focus, button:focus{
	border-color: skyblue;
}
body, html{
	/*position: fixed !important;*/
	margin: 0;
	padding: 0;
	width: -webkit-fill-available;
	font-size: 12pt;
	overflow-x: hidden !important;
	font-family: "Times New Roman";
}
body{
	box-sizing: border-box;
	width: 100%;
	height: 100vh;
	overflow: visible;
}
#serfil,.serfil{
	height: 30px;
	border-radius: 50px 0px 0px 50px;
	padding-left: 3px;
}
#serfil:focus,.serfil:focus{
	outline: none;
	border-color: blue;
}
#serbut,.serbut{
	height: 35px;
	border-radius: 0px 50px 50px 0px;
	background-color: lightgreen;
	border-color: lightgreen;
}
#serbut:focus,.serbut:focus{
	outline: none;
	border-color: green;
}

.nav_item a{
	color: #aaaaff;
	text-decoration: none;
	transition: color 0.6s linear;
}
.nav_item>ul a{
	color: #4444ff;
}
.nav_item a:hover{
	color: #ffff40;
	transition: color 0.83s linear;
}
.nav_item>ul a:hover{
	color: #005500;
	transition: color 0.83s linear;
}
.nav_item>ul>li{
	display: block;
	width: max-content;
}
.nav_item a:active{
	color: #ff77a0;
	transition: color 0.33s linear;
}
.nav_item>ul a:active{
	color: #ff77a0;
	transition: color 0.33s linear;
}
.nav_item{
	line-height: 21pt;
	font-size: 13pt;
	border-bottom: 2px solid red;
	padding-left: 10px;
	border-radius: 50px 50px 50px 0px;
	position: relative;
}
.nav_item img{
	border-radius: 10px;
}
.zadachi dd{
	max-width: 100%;
	overflow: auto;
	opacity: 0.025;
	transition: opacity 1.2s linear;
}
.zadachi dd:hover{
	opacity: 1;
	transition: opacity 1.2s linear;
}
.nav_item>ul{
	font-family: Mykrasbo;
	border-radius: 0px 50px 50px 50px;
	border: 2px groove yellow;
	visibility: hidden;
	font-size: 13.4pt;
	padding: 5px;
	padding-left: 25px;
	padding-right: 30px;
	list-style-type: none;
	left: 115px;
	top: 10px;
	box-sizing: border-box;
	background-color: rgba(170, 255, 170, 0.86);
	opacity: 0;
	position: absolute;
	margin: 0;
	width: auto;
	z-index: 100;
	transition: visibility 0.1s linear 0.5s, opacity 0.6s linear, background-color 0.6s linear;
}
.nav_item:hover>ul,.nav_item.check>ul{
	visibility: visible;
	transition: visibility 0.1s linear 0.5s, opacity 0.6s linear, background-color 0.6s linear;
	opacity: 0.92;
}
.nav_item.check>ul{
	z-index: 6500;
}
.nav_item>ul:hover{
	transition: visibility 0.1s linear 0.5s, opacity 0.6s linear, background-color 0.6s linear;
	background-color: rgba(170, 255, 170, 1);
	opacity: 1;
}
.nav_item>img{
	width: 30px;
	height: 28px;
	position: absolute;
	right: 0px;
	top: 0px;
	opacity: 0;
	border-radius: 0px;
	margin-right: 5px;
	z-index: 7000;
	transition: opacity 0.2s linear;
}
.nav_item.check>img{
	display: inline-block;
	opacity: 0.6;
}
html{
	background-image: url('bg.jpg');
	<?php if(isset($_COOKIE['bg'])){?>
	background-image: <?php echo($_COOKIE['bg']);?>;
	<?php }?>
	background-color: rgb(224, 255, 224);
	background-repeat: no-repeat;
	background-size: 100vw 100vh;
	background-position: center center;
	background-attachment: fixed;
	height: 100vh;
	overflow: auto;
}
header{
	background-image: url('bg.jpg');
	<?php if(isset($_COOKIE['bg'])){?>
	background-image: <?php echo($_COOKIE['bg']);?>;
	<?php }?>
	background-color: rgb(224, 255, 224);
	background-repeat: no-repeat;
	background-size: 100vw 100vh;
	background-position: center center;
	background-attachment: fixed;
	z-index: 8000;
}
body{
	height: auto;
}
footer{
	position: fixed;
	bottom: 0;
	left: 0;
	right: 0;
	font-size: 14pt;
	padding-left: 64px;
	border-top: 2px solid blue;
	border-top-right-radius: 150px;
	border-top-left-radius: 50px;
	height: 40px;
	width: -webkit-fill-available;
	color: #aaaa99;
	background-color: #555577;
}
header h1, header img{
	vertical-align: middle;
	display: inline-block;
	margin: 0;
	margin-top: 2px;
	padding: 0;
	cursor: pointer;
	font-family: Mykras;
}
header img{
	margin-left: 2px;
	margin-right: 6px;
	/*border: 2px groove lime;
	border-radius: 40px 10px 30px 30px;*/
}
#totop{
	position: fixed;
	right: 5px;
	bottom: 5px;
}
#tools{
	z-index: 12345676;
	background-color: #887766;
	width: auto;
	height: auto;
	border-radius: 1520px;
	position: fixed;
	left: 10px;
	bottom: 10px;
	display: inline-block;
	opacity: 0.63;
	transition: opacity 1.1s linear, transform 2.1s;
}
#tools:hover{
	transition: opacity 1.1s linear, transform 2.1s;
	transform: rotateZ(450deg);
	border-radius: 1520px;
	opacity: 1;
}
#tools:active{
	transition: opacity 1.1s linear, transform 0.4s;
	transform: rotateZ(900deg);
	border-radius: 1520px;
	opacity: 1;
}
section{
	border-radius: 30px 35px 50px 45px;
	min-height: calc(100vh - 214px);
	margin: 2px 30px 0px 150px;
	font-family: Arial, Sans-serif;
	font-size: 14.6pt;
	text-align: justify;
	word-wrap: break-word;
	margin-bottom: 50px;
	margin-top: 105px;
	background-color: rgba(176, 176, 255, <?php echo((isset($_COOKIE['opacity']))?($_COOKIE['opacity']):("0.85")); ?>);/*100, 100*/
	transition: background-color 2s linear;
	padding: 20px;
}
section:hover{
	background-color: rgba(176, 176, 255, 1);
	transition: background-color 2.5s linear;
}
nav{
	z-index: 10;
	box-shadow: 0px 0px 0px 0px beige;
	transition: box-shadow 3.7s linear;
	font-family: Mynekras;
	margin-top: 15px;
	height: auto;
	min-height: 50px;
	top: 108px;
	position: absolute;
	width: 140px;
	background-color: rgba(255, 100, 100, 0.8);
	border-right: 2px solid red;
	border-top: 2px solid red;
	border-radius: 25px 20px 17px 0px;
}
header{
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	border-bottom: 2px solid blue;
	overflow: hidden;
	width: -webkit-fill-available;
	height: 98px;
}
@font-face{
	font-family: Mynekras;
	src: url('/fonts/cmunrm.ttf');
}
@font-face{
	font-family: Mykras;
	src: url('/fonts/cmunti.ttf');
}
@font-face{
	font-family: Mynekrasbo;
	src: url('/fonts/cmunbx.ttf');
}
@font-face{
	font-family: Mykrasbo;
	src: url('/fonts/cmunbi.ttf');
}
.pic{
	cursor: pointer;
	border-radius: 50%;
	float: right;
	margin: 5px;
	margin-left: 15px;
}
.pic2{
	cursor: pointer;
	border-radius: 50px;
	display: none;
	position: fixed;
	top: 0;
}
#leibnicfull{
	left: calc(50% - 300px);
	height: 100vh;
	max-height: auto;
}
#progress{
	display: none;
}
#procent{
	display: none;
}
#totop{
	display: none;
}
#toollist{
	position: fixed;
	z-index: 12345678;
	bottom: -1000px;
	left: 10px;
}
textarea{
	padding: 15px;
	border-radius: 50px 50px 0px 50px;
	font-size: 13.5pt;
	width: 400px;
	height: 170px;
	min-width: 200px;
	min-height: 85px;
	max-width: 800px;
	max-height: 340px;
	border: 4px outset skyblue;
	background-color: skyblue;
	color: rgb(120, 49, 20);
}
.right{
	border-radius: 30px;
	border: 2px double red;
	float: right;
	padding: 10px;
}
textarea:focus{
	outline: none;
	border: 4px inset skyblue;
}
input[type="checkbox"]{
	width: 19px;
	height: 19px;
}
.tool{
	background-color: #aaaaaa;
	width: auto;
	height: auto;
	border-radius: 1520px;
	opacity: 0.63;
	transition: opacity 1.1s linear, transform 1.6s;
}
.tool:hover{
	transition: opacity 1.1s linear, transform 2.1s;
	transform: rotateZ(360deg);
	border-radius: 1520px;
	opacity: 1;
}
#chis{
	margin-bottom: 0px;
}
.krug{
	border-radius: 1520px;
}
.tool:active{
	transition: opacity 1.1s linear, transform 0.4s;
	transform: rotateZ(720deg);
	border-radius: 1520px;
	opacity: 1;
}
@media (max-height: 740px){
	.tool{
		display: inline-block;
	}
}
@media (max-width: 620px){
	header h1{
		font-size: 12px;
	}
}
#search,.search{
	 float: right;
	 margin-right: 30px;
	 margin-top: 30px;
}
#widthspn{
	width: max-content;
}
#widthspn img{
	width: 160px;
	height: 203px;
}
@media (max-width: 540px){
	.nav_item>ul>li{
		width: min-content;
	}
}
@media (max-width: 540px){
	#search{
		 display: none;
	}
	#widthspn{
		width: auto;
	}
	/*section{
		background-color: rgba(176, 176, 255, 1);
		transition: background-color 2.5s linear;
	}*/
}
@media (max-width: 500px){
	header{
		height: auto;
		overflow: hidden;
		text-align: center;
		position: static;
	}
	textarea{
		max-width: 200px;
	}
	footer{
		font-size: 10pt;
		border-radius: 0;
		padding: 0;
		margin: 0;
		position: relative;
	}
	section{
		border-radius: 0;
		/*padding: 0;*/
		margin: 0;
	}
	header *{
		padding: 0;
		margin: 0;
	}
	.nav_item{
		padding: 0;
		margin: 0;
		border-radius: 0;
		padding-left: 4px;
	}
	nav *, nav{
		border-radius: 0;
		position: static;
		width: unset;
		padding: 0;
		margin: 0;
		box-sizing: border-box;
		box-shadow: none !important;
	}
	.nav_item>ul{
		padding: 0;
		margin: 0;
		border-radius: 0;
		position: static;
		display: none;
	}
	.nav_item.check>ul{
		display: block;
	}
}
img{
	-webkit-user-drag: none !important;
}
*{
	-webkit-user-drag: none;
}
section{
	-webkit-user-drag: unset;
}
section *{
	-webkit-user-drag: unset;
}
.myblock{
	display: inline-block;
	width: 250px;
	height: 170px;
	border: 4px groove red;
	padding: 10px;
	border-radius: 59px;
	overflow: hidden;
	max-width: 100%;
}
.myblock a{
	text-decoration: none;
	transition: 1s color;
}
.myblock a:hover{
	color: #00aa00;
	transition: 1s color;
}
.myblock a:active{
	color: #aa0000;
	transition: 1s color;
}
.del{
	border: 2px groove yellow;
	margin: 1px;
	width: 100% !important;
	max-width: -webkit-fill-available;
}
nav:hover{
	    box-shadow: 2px 3px 220px 30px beige;
		transition: box-shadow 7.3s linear;
}
@media (max-width: 300px){
	.myblock{
		display: inline-block;
		width: auto;
		height: auto;
		border: 2px groove red;
		padding: 2;
		border-radius: 0;
	}
}
*{
	text-decoration-skip-ink: none;
}


/*Tooltip*/

.tooltip{
    position: relative;
    display: inline-block;
	border-bottom: 2px rgba(128, 128, 128, 0.6) dashed;
}
a{
	text-decoration: none;
}
.p, p{
	margin-top: 1em;
	margin-bottom: 1em; 
	margin-left: 0px;
	margin-right: 0px;
}
/* Tooltip text */
.tooltip .tooltiptext{
    visibility: hidden;
	max-height: 500px;
	width: 300px;
	width: max-content;
	max-width: 400px;
	overflow: auto;
    background-color: #555;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;

    /* Position the tooltip text */
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -150px;

    /* Fade in tooltip */
    opacity: 0;
    transition: opacity 0.6s linear, visibility 0.1s linear 0.5s;
}
.tooltip:hover .tooltiptext{
	transition: opacity 0.6s linear;
    visibility: visible;
    opacity: 1;
}
.block .tooltip{
	display: none;
}
textarea{
	max-width: calc(100% - 50px) !important;
}
body{
	overflow: hidden !important;
}
*{
word-wrap: normal;
}
input[type="checkbox"] {
    transform: rotate(0deg);
    transform-origin: center;
    transition: transform 1s;
    transform-box: border-box;
    transform-style: flat;
    margin: 0;
    padding: 0;
    width: 20px;
    height: 20px;
}
input[type="checkbox"]:checked {
    transform: rotate(720deg);
}
p{
	text-indent: 1em;
	text-align: justify;
}
table,td,th{
	text-align: center;
	border: 2px groove skyblue;
	border-radius: 5px;
	padding: 3px;
}
.myblock table,.myblock td,.myblock th{
	border: unset;
	border-radius: unset;
	padding: unset;
}