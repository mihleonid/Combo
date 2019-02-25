<?php
$_TOHEADER='<style>
.thumbs {
	display: inline-block;
  width: 250px;
  margin: 10px;
  opacity: 0.99;
  overflow: hidden;
  position: relative;
  border-radius: 3px;
  cursor: pointer;
  -webkit-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  -moz-box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
  box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
.thumbs:before {
  content: \'\';
  background: -webkit-linear-gradient(top, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
  background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
  width: 100%;
  height: 50%;
  opacity: 0;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 2;
  -webkit-transition-property: top, opacity;
  transition-property: top, opacity;
  -webkit-transition-duration: 1.2s;
  transition-duration: 1.2s;
}
.thumbs{
	transition: border-radius 1s;
	border-radius: 80px;
	box-sizing: border-box;
}
.select{
	border: 5px solid red;
	border-radius: 20px;
	border-style: ridge;
}
.thumbs img {
	box-sizing: border-box;
  display: block;
  /*width: 100%; /* ширина картинки */
  /*height: auto; /* высота картинки */
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
}
.thumbs .caption {
  width: 100%;
  padding-bottom: 20px;
  color: #fff;
  position: absolute;
  bottom: 0;
  left: 0;
  z-index: 3;
  text-align: center;
}
.thumbs .caption span {
  display: block;
  opacity: 0;
  position: relative;
  top: 100px;
  -webkit-transition-property: top, opacity;
  transition-property: top, opacity;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
.thumbs .caption .title {
  line-height: 1;
  font-weight: normal;
  font-size: 18px;
}
.thumbs .caption .info {
  line-height: 1.2;
  margin-top: 5px;
  font-size: 12px;
}
.thumbs:focus:before,
.thumbs:focus span, .thumbs:hover:before,
.thumbs:hover span {
  opacity: 1;
}
.thumbs:focus:before, .thumbs:hover:before {
  top: 50%;
}
.thumbs:focus span, .thumbs:hover span {
  top: 0;
}
.thumbs:focus .title, .thumbs:hover .title {
  -webkit-transition-delay: 0.15s;
          transition-delay: 0.15s;
}
.thumbs:focus .info, .thumbs:hover .info {
  -webkit-transition-delay: 0.25s;
          transition-delay: 0.25s;
}
.fone{
	border: 5px solid blue;
	border-style: ridge;
}
.theme{
	border: 5px solid green;
	border-style: ridge;
}
.theme.select{
	border: 5px solid #ffff00;
	border-style: ridge;
}
.fone.select{
	border: 5px solid #ff00ff;
	border-style: ridge;
}
.theme.fone{
	border: 5px solid #00ffff;
	border-style: ridge;
}
.theme.fone.select{
	border: 5px solid ghostwhite;
	border-style: ridge;
}
#foto{
	text-align: center;
}
</style>'; include("top.php");?>
<h2>Настройки</h2>
<form action="acset.php" method="POST" style="display: inline-block;">
<input type="submit" value="Настроить" name="topb"><input style="float: right; margin: 0px 6px;" type="submit" value="Значения по умолчанию" name="cl">
<br>
<input type="checkbox" name="d" value="on"<?php echo(($_COOKIE['d']=="on")?" checked":"");?>>Цветовой эффект клика
<br>
<input type="checkbox" name="y" value="on"<?php echo(($_COOKIE['y']=="on")?" checked":"");?>>Цветовой эффект перехода по ссылке
<br>
Цвет эффекта
<select name="col">
<option value="blue"<?php echo(($_COOKIE['col']=="blue")?" selected":"");?>>Синий</option>
<option value="red"<?php echo(($_COOKIE['col']=="red")?" selected":"");?>>Красный</option>
<option value="green"<?php echo(($_COOKIE['col']=="green")?" selected":"");?>>Зелёный</option>
</select>
<br>
Размер эффекта клика
<input type="number" name="raz" min="30" max="20000" required value="<?php echo((isset($_COOKIE['raz']))?$_COOKIE['raz']:"2800");?>">
<br>
Размер эффекта перехода по ссылке
<input type="number" name="raz2" min="30" max="20000" required value="<?php echo((isset($_COOKIE['raz2']))?$_COOKIE['raz2']:"1900");?>">
<br>
Скорость эффекта клика
<input type="number" name="sk" min="1" max="100" required value="<?php echo((isset($_COOKIE['sk']))?$_COOKIE['sk']:"22");?>">
<br>
Скорость эффекта перехода по ссылке
<input type="number" name="sk2" min="1" max="100" required value="<?php echo((isset($_COOKIE['sk2']))?$_COOKIE['sk2']:"10");?>">
<br>
Непрозрачность блока текста без курсора
<input type="range" name="opacity" style="width: 200px; vertical-align: middle;" min="0.6" max="1" step="0.01" required value="<?php echo((isset($_COOKIE['opacity']))?$_COOKIE['opacity']:"0.85");?>">
<br>
Куда выходить с данного сайта
<input type="url" name="go" required value="<?php echo((isset($_COOKIE['go']))?$_COOKIE['go']:"http://google.com");?>">
<br>
Фон<input type="hidden" name="bg" id="bg" value="<?php echo($_COOKIE['bg']);?>">
<div id="foto">
<div data-foto="url('/bg.jpg')" class="thumbs<?php if(($_COOKIE['bg']=="")or($_COOKIE['bg']=="url('/bg.jpg')")){echo(" select");}?>"><img width="250px" height="250px" src="bg.jpg"></img><div class="caption"><span class="title">Стандартный фон</span><span class="info">Синие полосы</span></div></div>
<div data-foto="url('/1.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/1.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="1.jpg"></img><div class="caption"><span class="title">Облака</span><span class="info">Вид облаков</span></div></div>
<div data-foto="url('/2.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/2.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="2.jpg"></img><div class="caption"><span class="title">Квадраты</span><span class="info">Голубая текстура квадратов</span></div></div>
<div data-foto="url('/3.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/3.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="3.jpg"></img><div class="caption"><span class="title">Огонь</span><span class="info">Вид огня вблизи</span></div></div>
<div data-foto="url('/4.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/4.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="4.jpg"></img><div class="caption"><span class="title">Звёзды</span><span class="info">Вид на многочисленные звёзды</span></div></div>
<div data-foto="url('/7.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/7.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="7.jpg"></img><div class="caption"><span class="title">Бесконечность</span><span class="info">Линии, устремлённые в бесконечность</span></div></div>
<div data-foto="url('/8.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/8.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="8.jpg"></img><div class="caption"><span class="title">Зелень</span><span class="info">Зелёная текстура</span></div></div>
<div data-foto="url('/9.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/9.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="9.jpg"></img><div class="caption"><span class="title">Бинарность</span><span class="info">Поток из нулей и единиц</span></div></div>
<div data-foto="url('/10.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/10.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="10.jpg"></img><div class="caption"><span class="title">Схема</span><span class="info">Чертёж</span></div></div>
<div data-foto="url('/6.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/6.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="6.jpg"></img><div class="caption"><span class="title">Трава</span><span class="info">Вид травы</span></div></div>
<div data-foto="url('/11.jpg')" class="thumbs<?php if($_COOKIE['bg']=="url('/11.jpg')"){echo(" select");}?>"><img width="250px" height="250px" src="11.jpg"></img><div class="caption"><span class="title">Бумага</span><span class="info">Полоски старой бумаги</span></div></div>
<div data-foto="none" class="thumbs<?php if($_COOKIE['bg']=="none"){echo(" select");}?>"><img width="250px" height="250px"></img><div class="caption"><span class="title">Нет</span><span class="info">Отсутствие фона</span></div></div>
</div>
<input type="submit" value="Настроить" name="botb">
</form>
<form action="nocacheus.php" method="GET" style="display: inline-block;float: right;">
<input type="hidden" value="/sets.php" name="">
<input type="submit" value="Применить изменения (для старых браузеров)">
</form>
<script>
document.getElementById('foto').addEventListener("click", function(evt){
	if(evt.target!=evt.currentTarget){
		var ttt=evt.target;
		while((ttt.dataset.foto==undefined)||(ttt.dataset.foto==null)){
			ttt=ttt.parentNode;
		}
		if(evt.detail==1){
			document.documentElement.style.backgroundImage=ttt.dataset.foto;
			document.getElementsByTagName("HEADER")[0].style.backgroundImage=ttt.dataset.foto;
		}
		if(evt.detail==2){
			document.getElementsByClassName('select')[0].className="thumbs";
			ttt.className="thumbs select";
			document.getElementById("bg").value=ttt.dataset.foto;
		}
	}
}, false);
</script>
<?php include("bottom.php");?>