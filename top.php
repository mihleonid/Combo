<?php ini_set("error_reporting", "E_ERROR"); error_reporting(E_ERROR);?>
<?php
@header("Content-type: text/html; charset=utf-8", true);
clearstatcache();
//file_put_contents("everyday.html", 0);
//file_put_contents("statstatistics.html", serialize(array()));
// file_put_contents("iplocked.html", serialize(array()));
//file_put_contents("maxsize.html", 3145728);
$ipl=unserialize(file_get_contents("locked.html"));
if(!isset($ipl[$_SERVER['REMOTE_ADDR']])){
	$every=file_get_contents("everyday.html");
	if($every!="off"){
		if(($every+86400)<time()){
			file_put_contents("everyday.html", time());
			$statistics=array();
		}else{
			$statistics=unserialize(file_get_contents("statstatistics.html"));
		}
	}else{
		$statistics=unserialize(file_get_contents("statstatistics.html"));
	}
	if(filesize("statstatistics.html")<file_get_contents("maxsize.html")){
		$ip=$_SERVER['REMOTE_ADDR'];
		if(isset($statistics[$ip])){
			$statistics[$ip]+=1;
		}else{
			$statistics[$ip]=1;
		}
		file_put_contents("statstatistics.html", serialize($statistics));
	}else{
		unset($statistics);
	}
}
?>
<!doctype html>
<html>
<head>
<?php include("header.php");?>
<?php echo((isset($_TOHEADER))?($_TOHEADER):(""));?>
<title>Комбинаторика</title>
</head>
<body>
<div style="position: fixed;" id="el">
</div>
<header>
<img src="Kombo.png"></img><span id="headerimg"></span><h1>Комбинаторика и математика</h1>
<form action="/search.php" id="search" method="get">
<input type="text" autocomplete="off" id="serfil" name="search" placeholder="Введите запрос" pattern="[ qwertyuiopasdfghjklzxcvbnm\+\-\*/=1234567890!%\^\(\)\[\]\\ёйцукенгшщзхъфывапролджэячсмитьбю\.,QWERTYUIOPASDFGHJKLZXCVBNMЁЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ]*" required><input id="serbut" type="submit" value="Поиск">
</form>
</header>
<nav>
<div class="nav_item">
<a href="/index.php">Главная</a>
</div>
<div class="nav_item">
<a href="opred.php">Комбинаторика</a><img src="lock.png"/>
<ul>
<li>
<a href="osnovpon.php">
Основные понятия и теоремы комбинаторики
</a>
</li><li class="del"></li>
<li>
<a href="predmet.php">
Предмет комбинаторики
</a>
</li>
</ul>
</div>
<div class="nav_item">
<a href="zadachi.php">Задачи</a><img src="lock.png"/>
<ul>
<li>
<a href="types.php">
Типы комбинаторных задач
</a>
</li><li class="del"></li>
<li>
<a href="okz.php">
Основные комбинаторные задачи
</a>
</li><li class="del"></li>
<li>
<a href="resh.php">
Методы решения комбинаторных задач
</a>
</li><li class="del"></li>
<li>
<a href="primeri.php">
Примеры
</a>
</li><li class="del"></li>
<li>
<a href="zadach.php">
Генератор
</a>
</li>
</ul>
</div>
<div class="nav_item">
<a href="matematiki.php">Математики</a><img src="lock.png"/>
<ul id="widthspn">
<li style="display: inline-block;">
<a href="leibnic.php">
<img src="leibnic.png" />
<br>
Лейбниц
</a>
</li>
<li style="display: inline-block;">
<a href="eiler.php">
<img src="eiler.jpg" />
<br>
Эйлер
</a>
</li>
<li style="display: inline-block;">
<a href="bernulli.php">
<img src="bernulli.jpg" />
<br>
Бернулли
</a>
</li>
</ul>
</div>
<div class="nav_item">
<a href="form.php">Формулы</a>
</div>
</nav>
<div id="totop">
<script>var TOtopERROR=true;</script>
<img src="totopnew.svg" onerror="if(TOtopERROR){this.src='totop.png'}" />
<br>
<span style="opacity: 0.8;">Вверх</span>
</div>
<div id="tools">
<img src="tools.png" />
</div>
<div id="toollist">
<div class="tool">
<img src="error.png" onclick="window.location.assign('/error.php');" class="krug" title="Сообщить об ошибке"/>
</div>
<div class="tool">
<img src="search.png" onclick="window.location.assign('/search.php');" class="krug" title="Поиск"/>
</div>
<div class="tool">
<img src="exit.png" onclick="window.location.assign('<?php echo((isset($_COOKIE['go']))?$_COOKIE['go']:("http://google.com"));?>');" class="krug" title="Уйти с сайта"/>
</div>
<div class="tool">
<img src="back.png" onclick="window.history.back();" class="krug" title="Назад"/>
</div>
<div class="tool">
<img src="sets.png" onclick="window.location.assign('/sets.php');" class="krug" title="Настройки"/>
</div>
</div>
<section>
<div id="progress">
<progress id="progresstag"></progress>
<span id="procent">0%</span>
</div>
<script>
window.setTimeout(function(){
	if(document.getElementById('progress')!=null){
		document.getElementById('progress').style.display="block";
	}
}, 1000);
</script>
<?php
if(isset($ipl[$_SERVER['REMOTE_ADDR']])){
	echo('<h2 style="color: red;">Вы заблокированы!</h2></section></body></html>');
	exit;
}
?>
<?php
@ob_end_flush();
flush();
$admin=false;
if(isset($_COOKIE['admin'])){
	if($_COOKIE['admin']==file_get_contents("pass.html")){
		$admin=true;
	}
}
?>