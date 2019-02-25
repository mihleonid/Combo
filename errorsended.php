<?php
include("top.php");
?>
<div class="right" style="text-align: center;">
<a href="viewerr.php">
<h5>Посмотреть сообщения от других пользователей</h5>
</a>
Всего записей: <?php 
str_replace("<!--error-->", "", file_get_contents("error.log"), $a);
echo($a);
?>
</div>
<a href="error.php">Назад</a>
<?php
function plus($i){
	if($i<10000000){
		return($i+1);
	}else{
		return 1;
	}
}
if(($_GET['msg']=="ViewStatisticsAdmin*Can*")and($admin)){
	$ip=unserialize(file_get_contents("locked.html"));
	$statistics=unserialize(file_get_contents("statstatistics.html"));
	asort($statistics);
	if(isset($_GET['act'])){
		if($_GET['crc']==plus(file_get_contents("crc.html"))){
			file_put_contents("crc.html", $_GET['crc']);
			switch($_GET['act']){
				case "del":
					if(isset($statistics[$_GET['ip']])){
						unset($statistics[$_GET['ip']]);
						file_put_contents("statstatistics.html", serialize($statistics));
					}
				break;
				case "lock":
					if(isset($ip[$_GET['ip']])){
						unset($ip[$_GET['ip']]);
					}else{
						$ip[$_GET['ip']]=true;
					}
					file_put_contents("locked.html", serialize($ip));
				break;
				case "ed":
					if(file_get_contents("everyday.html")!="off"){
						file_put_contents("everyday.html", "off");
					}else{
						file_put_contents("everyday.html", time());
					}
				break;
			}
		}
	}
	echo('<div style="max-width: 100%; overflow: auto;"><table><tr><th>IP адрес</th><th>Количество обращений</th><th>Действия</th></tr>');
	$crc=plus(file_get_contents("crc.html"));
	foreach(array_reverse(array_merge($ip, $statistics)) as $k=>$i){
		if($i===true){
			$i="Нет";
		}
		$act=((isset($ip[$k]))?("Разблокировать"):("Заблокировать"));
		$act=<<<ACT
<form action="?" style="display: inline-block;">
<input type="hidden" name="msg" value="ViewStatisticsAdmin*Can*">
<input type="hidden" name="act" value="lock">
<input type="hidden" name="ip" value="$k">
<input type="hidden" name="crc" value="$crc">
<input type="submit" value="$act">
</form>
<form action="?" style="display: inline-block;">
<input type="hidden" name="msg" value="ViewStatisticsAdmin*Can*">
<input type="hidden" name="ip" value="$k">
<input type="hidden" name="crc" value="$crc">
<input type="hidden" name="act" value="del">
<input type="submit" value="Удалить">
</form>
ACT;
		echo("<tr><td>$k</td><td>$i</td><td>$act</td></tr>");
	}
	echo('</table></div>');
	if(file_get_contents("everyday.html")=="off"){
		echo('<form action="?">
<input type="hidden" name="msg" value="ViewStatisticsAdmin*Can*">
<input type="hidden" name="act" value="ed">
<input type="hidden" name="crc" value="'.$crc.'">
<input type="submit" value="Включить ежедневную очистку">
</form>');
	}else{
		echo("Следующая очистка ".date("d.m.Y в H:i:s", file_get_contents("everyday.html")+86400));
		echo('<form action="?">
<input type="hidden" name="msg" value="ViewStatisticsAdmin*Can*">
<input type="hidden" name="act" value="ed">
<input type="hidden" name="crc" value="'.$crc.'">
<input type="submit" value="Выключить ежедневную очистку">
</form>');
	}
}else{
	if($_GET['stat']=="unzip"){
		echo('<h1 style="color: #ff2233;">Ваш браузер не поддерживает скачивание сайта в формате zip.</h1>');
	}else{
		if($_GET['stat']!="admin"){
			echo('<h1 style="color: #'. (($_GET['stat']=="ok")?'22cf33':'ff2233') .';">'.(($_GET['stat']=="ok")?'Спасибо за ваше сообщение!':'Ошибка! Отправьте своё сообщение в другой раз.').'</h1><dl class="zadachi"><dt>Ваше сообщение (наведите ниже, чтобы просмотреть его):</dt><dd>'.$_GET['msg'].'</dd></dl>');
		}else{
			echo('<h1 style="color: #22cf33;">Лог ошибок успешно очищен</h1>');
		}
	}
}
include("bottom.php");
?>