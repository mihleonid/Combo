<?php
if(isset($_GET['search'])){
	$str=$_GET['search'];
	$str=preg_replace("@[^ qwertyuiopasdfghjklzxcvbnm\+\-\*/=1234567890!%\^\(\)\[\]\\ёйцукенгшщзхъфывапролджэячсмитьбю\.,]@ui", "", $str);
}else{
	$str="";
}
include("top.php");
echo('<form action="/search.php" class="search" method="get">
<input type="text" autocomplete="off" class="serfil" name="search" placeholder="Введите запрос" pattern="[ qwertyuiopasdfghjklzxcvbnm\+\-\*/=1234567890!%\^\(\)\[\]\\ёйцукенгшщзхъфывапролджэячсмитьбю\.,QWERTYUIOPASDFGHJKLZXCVBNMЁЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ]*" required><input class="serbut" type="submit" value="Поиск">
</form>');
function echo_link($f, $text){
	$f=str_replace("\\", "/", $f);
	echo('<a href="'.$f.'" target="_blank">'.basenametwotxt($f).'</a><p>'.$text.'</p>');
}
function basenametwotxt($txt){
	switch($txt){
		case "/contacts.php":
		return "Контакты";
		break;
		case "/index.php":
		return "Главная";
		break;
		case "/bernulli.php":
		return "Якоб Бернулли";
		break;
		case "/eiler.php":
		return "Леонард Эйлер";
		break;
		case "/leibnic.php":
		return "Вильгельм Лейбниц";
		break;
		case "/form.php":
		return "Формулы";
		break;
		case "/okz.php":
		return "Основные комбинаторные задачи";
		break;
		case "/resh.php":
		return "Методы решения комбинаторных задач";
		break;
		case "/types.php":
		return "Типы комбинаторных задач";
		break;
		case "/zadachi.php":
		return "Понятие комбинаторной задачи";
		break;
		case "/predmet.php":
		return "Предмет комбинаторики";
		break;
		case "/primeri.php":
		return "Примеры простых задач";
		break;
		case "/osnovpon.php":
		return "Основные понятия и теоремы комбинаторики";
		break;
		case "/opred.php":
		return "Определение комбинаторики";
		break;
		case "/matematiki.php":
		return "Математики";
		break;
		default:
		return "Страница: ".$txt;
		break;
	}
}
if(!empty($str)){
	$rrrrrr=false;
	$colvo=0;
	$base=array(
		"404.php"=>true,
		"403.php"=>true,
		"style.php"=>true,
		".htaccess"=>true,
		"nocacheus.php"=>true,
		"error.php"=>true,
		"errorsend.php"=>true,
		"instruction.php"=>true,
		"top.php"=>true,
		"bottom.php"=>true,
		"search.php"=>true,
		"calc.php"=>true,
		"zadach.php"=>true,
		"error.php"=>true,
		"errorsended.php"=>true,
		"viewerr.php"=>true,
		"main.php"=>true,
		"cokd.php"=>true,
		"acset.php"=>true,
		"sets.php"=>true,
		"header.php"=>true,
		"scroll.php"=>true
	);
	file_put_contents("base.html", serialize($base));
	$base=unserialize(file_get_contents("base.html"));
	$colvot=file_get_contents("colvo.html");
	echo('<script>document.getElementById("progresstag").value="0";document.getElementById("procent").style.display="inline";</script>');
	echo('<h3>Результаты поиска по <code>'.$str.'</code></h3>');
	flush();
	$str=preg_replace("@[\+\-\*\^\(\)\[\]\\\.]@", "\\|\\0", $str);
	$str=str_replace("|", "", $str);
	$iter=new RecursiveDirectoryIterator($_SERVER['DOCUMENT_ROOT']);
	foreach(new RecursiveIteratorIterator($iter, RecursiveIteratorIterator::CHILD_FIRST) as $f){#, RecursiveIteratorIterator::PARENT_FIRST
		if($f->isDir()){
		}else{
			$inf=pathinfo($f);
			if(($inf['extension']=="php")and(!isset($base[$inf['basename']]))){
				$conp=file_get_contents($f);
				if(strpos($conp, "<script>")!==false){
					$exx=true;
					$len=strlen($conp);
					$newconp="";
					for($IO=0; $IO<$len; $IO++){
						if(($conp[$IO]=="<")and($conp[$IO+1]=="s")and($conp[$IO+2]=="c")and($conp[$IO+3]=="r"and($conp[$IO+4]=="i")and($conp[$IO+5]=="p")and($conp[$IO+6]=="t")and($conp[$IO+7]==">"))){
							$exx=false;
						}
						if(($conp[$IO-9]=="<")and($conp[$IO-8]=="/")and($conp[$IO-7]=="s")and($conp[$IO-6]=="c")and($conp[$IO-5]=="r")and($conp[$IO-4]=="i")and($conp[$IO-3]=="p")and($conp[$IO-2]=="t")and($conp[$IO-1]==">")){
							$exx=true;
						}
						if($exx){
							$newconp.=$conp[$IO];
						}
					}
					$conp=$newconp;
				}
				if(strpos($conp, "<style>")!==false){
					$exx=true;
					$len=strlen($conp);
					$newconp="";
					for($IO=0; $IO<$len; $IO++){
						if(($conp[$IO]=="<")and($conp[$IO+1]=="s")and($conp[$IO+2]=="t")and($conp[$IO+3]=="y"and($conp[$IO+4]=="l")and($conp[$IO+5]=="e")and($conp[$IO+6]==">"))){
							$exx=false;
						}
						if(($conp[$IO-8]=="<")and($conp[$IO-7]=="/")and($conp[$IO-6]=="s")and($conp[$IO-5]=="t")and($conp[$IO-4]=="y")and($conp[$IO-3]=="l")and($conp[$IO-2]=="e")and($conp[$IO-1]==">")){
							$exx=true;
						}
						if($exx){
							$newconp.=$conp[$IO];
						}
					}
					$conp=$newconp;
				}
				$conp=preg_replace("@<.*?>@", " ", $conp);
				if(strpos($conp, "<?")!==false){
					$exx=true;
					$len=strlen($conp);
					$newconp="";
					for($IO=0; $IO<$len; $IO++){
						if(($conp[$IO]=="<")and($conp[$IO+1]=="?")){
							$exx=false;
						}
						if(($conp[$IO-2]=="?")and($conp[$IO-1]==">")){
							$exx=true;
						}
						if($exx){
							$newconp.=$conp[$IO];
						}
					}
					$conp=$newconp;
				}
				$conp=preg_replace("@  +@", " ", $conp);
				$text=preg_match_all("@.{0,10}$str.{0,20}@ui", $conp, $a);
				if($text>0){
					$rrrrrr=true;
					$tt="<ul>";
					if(count($a[0])>6){
						$a[0]=array_slice($a[0], max(count($a[0])-6, 0));
						$a[0][]="<...>";
					}
					foreach($a[0] as $stro){
						$tt.="<li style=\"line-height: 19pt;\">".preg_replace("@$str@ui", "<mark>\\0</mark>", htmlentities($stro, 0, 'utf-8'))."</li>";
					}
					$tt.="</ul>";
					echo_link(str_replace($_SERVER['DOCUMENT_ROOT'], "", $f), str_replace("&amp;nbsp;", "&nbsp;", $tt));
				}
				$colvo++;
				echo('<script>document.getElementById("progresstag").value='.($colvo/$colvot).';document.getElementById("procent").innerHTML='.intval($colvo/$colvot*100).'+""+"%";</script>');
				@ob_flush();
				flush();
			}
		}
	}
	if($colvo!=$colvot){
	file_put_contents("colvo.html", $colvo);
	}
	if(!$rrrrrr){
		echo('<h3><big>Результатов нет.</big></h3>');
	}
}else{
	echo('<h3><big>Введите поисковой запрос.</big></h3>');
}
include("bottom.php");
?>