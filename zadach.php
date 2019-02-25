<?php include("top.php");?>
<h2>Генератор задач</h2>
<form action="zadach.php" style="display: inline-block;" method="get">
Вид задачи
<br>
<select name="type" id="type"><?php if(!isset($_GET['type'])){$_GET['type']=0;}?>
<option value="0"<?php if($_GET['type']==0){echo(" selected");}?>>сколькими способами...</option>
<option value="1"<?php if($_GET['type']==1){echo(" selected");}?>>теорема включений и исключений</option>
<option value="2"<?php if($_GET['type']==2){echo(" selected");}?>>сложные задачи</option>
</select>
<p id="chis">
Диапазоны чисел в задач:
<span id="max"><br>
Малое множество<input type="number" value="<?php echo((isset($_GET['min']))?$_GET['min']:20);?>" min="0" max="50" name="min">
</span><span id="min"><br>
Большое множество<input type="number" value="<?php echo((isset($_GET['max']))?$_GET['max']:40);?>" min="0" max="80" name="max">
</span></p>
<span id="check"><br><input type="checkbox" name="fun" value="fun" <?php if($_GET['fun']=="fun"){echo "checked";}?>>Перемешивать условия</span>
<br>
<p>
<input type="submit" name="sub" value="Сгенерировать">
</p>
</form>
<form action="zadach.php" style="display: inline-block;" method="get">
<input type="submit" value="Очистить условия">
</form>
<div />
<script>
function select(){
	document.getElementById('chis').style.display="none";
	document.getElementById('check').style.display="none";
	document.getElementById('max').style.display="none";
	document.getElementById('min').style.display="none";
	switch(document.getElementById('type').value){
		case "0":
			document.getElementById('min').style.display="";
			document.getElementById('check').style.display="";
			document.getElementById('max').style.display="";
			document.getElementById('chis').style.display="";
		break;
		case "3":
			document.getElementById('min').style.display="";
			document.getElementById('check').style.display="";
			document.getElementById('max').style.display="";
			document.getElementById('chis').style.display="";
		break;
		default:
		case "2":
			
		break;
	}
}
document.getElementById('type').addEventListener("input", select, false);
select();
</script>
<?php
$a=array();
$k=1;
for($i=0; $i<10; $i++){
	$a[$i]=mt_rand($k, $k+7);
	$k+=8;
}
function varibles($text){
	global $a;
	foreach($a as $k=>$l){
		$text=str_replace('$'.$k, $l, $text);
	}
	return $text;
}
include_once("calc.php");
if(isset($_GET['sub'])){
	$file=file("zadb.html");
	$line=trim($file[$_GET['type']]);
	$myusl=explode("^", $line);
	$line=$myusl[mt_rand(0, count($myusl)-1)];
	$myusl=explode("|", $line);
	switch($_GET['type']){
		case "0":
		$usl=$myusl[0];
		$_GET['min']=preg_replace("@[^1234567890]@", "", $_GET['min']);
		if(empty($_GET['min'])){
			$_GET['min']=0;
		}
		$_GET['max']=preg_replace("@[^1234567890]@", "", $_GET['max']);
		if(empty($_GET['max'])){
			$_GET['max']=0;
		}
		$min=min($_GET['max'], $_GET['min']);
		$max=max($_GET['max'], $_GET['min']);
		$int1=mt_rand(0, $min);
		$int2=mt_rand($int1, $max);
		$line=$myusl[mt_rand(1, count($myusl)-1)];
		$line=explode(",", $line);
		$line1=$line[0];
		if($_GET['fun']=="fun"){
			$line2=$myusl[mt_rand(1, count($myusl)-1)];
			$line2=explode(",", $line2);
			$line2=$line2[1];
		}else{
			$line2=$line[1];
		}
		$line1=$line3=explode("/", $line1);
		$inti1=strrev($int1);
		if(($inti1[0]=="1")and($int1!=11)){
			$line1=explode("*", $line1[0]);
			$line1=$line1[0];
		}elseif((($inti1[0]=="2")or($inti1[0]=="3")or($inti1[0]=="4"))and($int1!=12)and($int1!=13)and($int1!=14)){
			$line1=explode("*", $line1[1]);
			$line1=$line1[0];
		}else{
			$line1=explode("*", $line1[2]);
			$line1=$line1[0];
		}
		$inti2=strrev($int2);
		if(($inti2[0]=="1")and($int2!=11)){
			$line3=explode("*", $line3[0]);
			if(isset($line3[1])){
			$line3=$line3[1];
			}else{
				$line3=$line3[0];
			}
		}elseif((($inti2[0]=="2")or($inti2[0]=="3")or($inti2[0]=="4"))and($int2!=12)and($int2!=13)and($int2!=14)){
			$line3=explode("*", $line3[1]);
			if(isset($line3[1])){
			$line3=$line3[1];
			}else{
				$line3=$line3[0];
			}
		}else{
			$line3=explode("*", $line3[2]);
			if(isset($line3[1])){
			$line3=$line3[1];
			}else{
				$line3=$line3[0];
			}
		}
		if($_GET['fun']=="fun"){
			$line4=$myusl[mt_rand(1, count($myusl)-1)];
			$line4=explode(",", $line4);
			$line4=$line4[2];
		}else{
			$line4=$line[2];
		}
		$usl=sprintf($usl, $line4, $int1, $line1, $line2, $int2, $line3);
		$resh="C<sup><sup>".$int1."</sup></sup><sub><sub>".$int2."</sub></sub>=";
		$resh.="<br>=";
		$resh.=$int2."! / (".$int2." - ".$int1.")! / ".$int1."!=";
		$resh.="<br>=";
		$resh.="$int2 * ($int2 - 1) *...* ($int2 - $int1 + 1) / $int1!=";
		$resh.="<br>=";
		$res="1";
		for($i=0; $i<$int1; $i++){
			$res=multi($res, $int2-$i);
		}
		$resh.="$res / $int1!=";
		$resh.="<br>=";
		$resh.="$res / ".fact($int1);
		$resh.="<br>=";
		$resh.=well(del($res, fact($int1)));
		break;
		default:
		$usl=varibles($myusl[0]);
		$resh=varibles($myusl[1]);
		break;
	}
	echo('<dl class="zadachi"><td>'.$usl.'</td><dd><p>'.$resh.'</p></dd></dl>');
}
include("bottom.php");?>