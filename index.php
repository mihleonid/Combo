<?php
$_TOHEADER="<style>
section{
	text-align: center;
}
</style>";
include("top.php");?>
<div class="myblock"><table style="width: 100%; height: 100%;"><tr style="width: 100%; height: 100%;"><td style="width: 100%; height: 100%; text-align: center;">
<a href="contacts.php">
Контакты
</a></td></tr></table></div>
<div class="myblock"><table style="width: 100%; height: 100%;"><tr style="width: 100%; height: 100%;"><td style="width: 100%; height: 100%; text-align: center;">
<a href="zadach.php">
Генератор задач
</a></td></tr></table></div>
<div class="myblock"><table style="width: 100%; height: 100%;"><tr style="width: 100%; height: 100%;"><td style="width: 100%; height: 100%; text-align: center;">
<a href="error.php">
Сообщить об ошибке
</a></td></tr></table></div>
<br>
<div class="myblock"><table style="width: 100%; height: 100%;"><tr style="width: 100%; height: 100%;"><td style="width: 100%; height: 100%; text-align: center;">
<a href="cookd.php">
Сменить цветовой эффект клика<br>Сейчас: <?php echo(($_COOKIE['d']=="on")?"включено":"отключено");?>
</a></td></tr></table></div>
<div class="myblock"><table style="width: 100%; height: 100%;"><tr style="width: 100%; height: 100%;"><td style="width: 100%; height: 100%; text-align: center;">
<a href="cooky.php">
Сменить цветовой эффект перехода по ссылке<br>Сейчас: <?php echo(($_COOKIE['y']=="on")?"включено":"отключено");?>
</a></td></tr></table></div>
<div class="myblock"><table style="width: 100%; height: 100%;"><tr style="width: 100%; height: 100%;"><td style="width: 100%; height: 100%; text-align: center;">
<a href="sets.php">
Настроить
</a></td></tr></table></div>
<?php include("bottom.php");?>