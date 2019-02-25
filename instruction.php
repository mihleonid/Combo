<?php include("top.php");if($admin){?>
<a href="error.php">Назад</a>
<h2 style="color: #22cf33;">Здравствуйте, администратор!</h2>
<p>Текущий пароль: <code><span id="a" onclick="document.getElementById('b').style.display='inline';this.style.display='none';" title="Кликните для получения пароля" ><?php echo(str_repeat("-", strlen($_COOKIE['admin']))); ?></span><span id="b" style="display: none;" onclick="document.getElementById('a').style.display='inline';this.style.display='none';"><?php echo($_COOKIE['admin']); ?></span></code>.</p>
<p>На данном сайте предусмотрена система управления им.</p>
<p>Управлять сайтом возможно с помощью команд, которые необходимо отправлять как сообщение об ошибке.</p>
<p>Доступны следующие управляющие команды:</p>
<table>
<tr><th>Команда</th><th>Описание</th></tr>
<tr><td>Инструкция</td><td>Переход на эту страницу</td></tr>
<tr><td>Войти <code>&lt;пароль&gt;</code></td><td>Вход в систему</td></tr>
<tr><td>Сменить пароль <code>&lt;пароль&gt;</code></td><td>Сменить пароль администратора</td></tr>
<tr><td><form action="errorsend.php" method="post" style="display: inline-block; width: 100%;"><input type="submit" style="display: inline-block; width: 100%;" name="text" value="Выйти"></form></td><td>Выход из системы</td></tr>
<tr><td><form action="errorsend.php" method="post" style="display: inline-block; width: 100%;"><input type="submit" name="text" style="display: inline-block; width: 100%;" value="Администратор системы (я) желает видеть статистику!"></form></td><td>Вывод статистики</td></tr>
<tr><td><form action="errorsend.php" method="post" style="display: inline-block; width: 100%;"><input type="submit" name="text" style="display: inline-block; width: 100%;" value="Администратор системы (я) приказывает скачать сайт!"></form></td><td>Получение всего сайта</td></tr>
<tr><td><form action="errorsend.php" method="post" style="display: inline-block; width: 100%;"><input type="submit" name="text" style="display: inline-block; width: 100%;" value="Администратор системы (я) приказывает очистить лог ошибок!"></form></td><td>Очистка лога ошибок.</td></tr>
</table>
<?php }include("bottom.php");?>