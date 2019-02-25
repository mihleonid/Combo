<?php include("top.php");?>
<h2>Изменён</h2>
<a href="index.php">Кликните сюда</a>
<div style="width: 100px; height: 100px; background-color: orange;"></div>
<p>Вы будете отправленны на главную через <span id="timer">4</span>сек.</p>
<script>
var tmp123=3;
window.setInterval(function(){
	if(tmp123==0){
		window.location.assign("/index.php");
	}else{
		document.getElementById("timer").innerHTML=tmp123;
		tmp123--;
	}
}, 1000);
</script>
<?php include("bottom.php");?>