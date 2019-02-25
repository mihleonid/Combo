<?php include("top.php");?>
<a href="error.php">Назад</a>
<h2>Сообщения об ошибках</h2>
<div style="background-color: rgba(200, 100, 100, 0.4); border-radius: 50px; padding: 15px;">
<?php echo(file_get_contents("error.log")); ?>
</div>
<?php include("bottom.php");?>