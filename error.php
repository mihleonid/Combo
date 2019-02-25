<?php include("top.php");?>
<div class="right" style="text-align: center;">
<a href="viewerr.php">
<h5>Посмотреть сообщения от других пользователей</h5>
</a>
Всего записей: <?php 
str_replace("<!--error-->", "", file_get_contents("error.log"), $a);
echo($a);
?>
</div>
<?php
if($admin){
?>
<div class="right" style="text-align: center; clear: right; margin-top: 10px;">
<h5>
Здравствуйте, администратор.<br>
Для просмотра инструкции введите команду
<br>
<q><a href="instruction.php">Инструкция</a></q>.
</h5>
</div>
<?php
}
?>
<h2>Сообщить об ошибке</h2>
<form action="errorsend.php" method="post">
<textarea placeholder="Ваше сообщение" name="text"><?php if(isset($_COOKIE['msg'])){echo($_COOKIE['msg']);}?></textarea>
<br>
<input type="checkbox" value="on" name="krit">Ошибка серьёзная?
<br>
<input type="submit" value="Отправить">
</form>
<?php include("bottom.php");?>