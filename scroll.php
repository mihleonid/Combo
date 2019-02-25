<?php
require_once("nocache.php");
header('Content-Type: text/css', true);
?>
::-webkit-scrollbar{
	width:12px;
	padding: 5px 0px;
	background-color: aliceblue;
}
::-webkit-scrollbar-thumb{
	border-width:1px 1px 1px 2px;
	border-color: #777;
	border-radius: 50px;
	background-color: #aaa;
	background-image: linear-gradient(100deg, transparent, #555);
}
::-webkit-scrollbar-button:start:decrement{
	background-color: aliceblue;
	height: 16px;
	background-image: url('/scroll/scrolltop.png');
	background-size: 12px 16px;
}
::-webkit-scrollbar-button:end:increment{
	background-color: aliceblue;
	height: 16px;
	background-image: url('/scroll/scrollbottom.png');
	background-size: 12px 16px;
}
::-webkit-scrollbar:hover{
	border-width: 1px 1px 1px 2px;
	border-color: #555;
}
::-webkit-scrollbar-thumb:hover{
	background-color: #777;
	background-image: linear-gradient(100deg, #555, transparent);
}
::-webkit-scrollbar-track{
	border-radius: 50px;
	border-width:0;
}
::-webkit-scrollbar-track{
	border-left: solid 1px #aaa;
	border-top: solid 1px #aaa;
	background-color: rgba(238, 238, 238, 0.4);
}
::-webkit-scrollbar-track:hover{
	border-left: solid 1px #aaa;
	border-top: solid 1px #aaa;
	background-color: #eee;
}
::-webkit-scrollbar-button{
	border-radius: 50px;
}
::-webkit-scrollbar-corner{
	border-radius: 50px;
	background-color: #33ee33;
}

::-webkit-scrollbar:horizontal{
	height: 12px;
}
::-webkit-scrollbar-button:horizontal:start{
	background-color: aliceblue;
	height: 12px;
	width: 16px;
	background-image: url('/scroll/scrollleft.png');
	background-size: 16px 12px;
}
::-webkit-scrollbar-button:horizontal:end{
	background-color: aliceblue;
	height: 12px;
	width: 16px;
	background-image: url('/scroll/scrollright.png');
	background-size: 16px 12px;
}
::-webkit-scrollbar:disabled{
	display: none;
}