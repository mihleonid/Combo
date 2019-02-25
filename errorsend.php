<?php
$stat="err";
setcookie('msg', '', 0);
if(!isset($_POST['text'])){
	header("Location: http://".$_SERVER['HTTP_HOST']."/errorsended.php?msg=%3Ch2%3EТаковое отсутствует%3C%2Fh2%3E&stat=err");
	exit;
}
$msg=$_POST['text'];
$msg=preg_replace("@[^a-z1-90а-яА-Я ё!#№\$\\\\\/\*\-\+\(\)&\?\.,\<\>;:\%]@ui", " ", $msg);
$msg=trim($msg);
$pass=file_get_contents("pass.html");
if(($msg==("Войти ".$pass))or($msg==("Enter ".$pass))){
	setcookie("admin", $pass);
	header("Location: http://".$_SERVER['HTTP_HOST']."/error.php");
	exit;
}
if(($msg==("Выйти"))or($msg==("Exit"))){
	setcookie("admin", "", 4);
	header("Location: http://".$_SERVER['HTTP_HOST']."/error.php");
	exit;
}
if((strpos($_POST['text'], "CP ")===0)or(strpos($_POST['text'], "Сменить пароль ")===0)and(isset($_COOKIE['admin']) and ($_COOKIE['admin']==$pass))){
	if(strpos($_POST['text'], "CP ")===0){
		$np=substr($_POST['text'], strlen("CP "));
	}else{
		$np=substr($_POST['text'], strlen("Сменить пароль "));
	}
	file_put_contents("pass.html", $np);
	setcookie("admin", $np);
	header("Location: http://".$_SERVER['HTTP_HOST']."/error.php");
	exit;
}
if(($msg=="Инструкция")or($msg=="Instruction")and(isset($_COOKIE['admin']) and ($_COOKIE['admin']==$pass))){
	header("Location: http://".$_SERVER['HTTP_HOST']."/instruction.php");
	exit;
}
if($msg==""){
	header("Location: http://".$_SERVER['HTTP_HOST']."/errorsended.php?msg=%3Ch2%3EТаковое отсутствует%3C%2Fh2%3E&stat=err");
	exit;
}
if(isset($_POST['krit'])){
	$krit=(($_POST['krit'])?("on"):("off"));
}else{
	$krit="off";
}
$msg=substr($msg, 0, 8388608);
$tmpmsg=$msg;
$msg=htmlentities($msg, 0, 'utf-8');
$msg='<!--error--><p>'.$msg;
if($krit=="on"){
	$msg.='<br><span style="display: inline-block; font-weight: bold; color: darkred; font-size: larger; margin: 0; margin-left:10px;">Ошибка серьёзная!</span>';
}
$msg.='</p>';
$size=filesize("error.log");
$oursize=strlen($msg);
if(!(($_POST['text']=="DownloadAllSiteAdmin*Can*")or($_POST['text']=="ViewStatisticsAdmin*Can*")or($_POST['text']=="Администратор системы (я) желает видеть статистику!")or($_POST['text']=="Администратор системы (я) приказывает скачать сайт!"))){
	if(($size+$oursize)<67108864){
		$stat="ok";
		file_put_contents("error.log", file_get_contents("error.log").$msg);
	}else{
		setcookie('msg', $tmpmsg);
	}
}
if(($_POST['text']=="ClearAllLogAdmin*Can*")or($_POST['text']=="Администратор системы (я) приказывает очистить лог ошибок!")and(isset($_COOKIE['admin']) and ($_COOKIE['admin']==$pass))){
	file_put_contents("error.log", "<p style=\"font-size: larger;\">Ошибок не было ".date("d.m.Y")." до ".date("H:i:s")."</p>");
	$stat="admin";
}
function zipn(){
	$source=$_SERVER['DOCUMENT_ROOT'];
	$destination="tmp.zip";
	if((!extension_loaded('zip'))or(!file_exists($source))){
		return false;
	}
	$zip = new ZipArchive();
	if(!$zip->open($destination, ZIPARCHIVE::CREATE)){
		return false;
	}
	$source=str_replace('\\', '/', realpath($source));
	if(is_dir($source)===true){
		$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
		foreach($files as $file){
			$file=str_replace('\\', '/', $file);
			$tmp=substr($file, strrpos($file, '/')+1);
			if(($tmp=='.')or($tmp=='..')){
				continue;
			}
			$file=realpath($file);
			$file=str_replace('\\', '/', $file);
			if(is_dir($file)===true){
				$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
			}elseif(is_file($file) === true){
				$tmp=(str_replace($source . '/', '', $file));
				if($tmp!=$destination){
					$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
				}
			}
		}
	}elseif(is_file($source) === true){
		$zip->addFromString(basename($source), file_get_contents($source));
	}
	return $zip->close();
}
if(($_POST['text']=="DownloadAllSiteAdmin*Can*")or($_POST['text']=="Администратор системы (я) приказывает скачать сайт!")and(isset($_COOKIE['admin']) and ($_COOKIE['admin']==$pass))){
	$z=zipn();
	if($z){
		$file=("tmp.zip");
		header("Content-Type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Content-Length: ".filesize($file));
		header("Content-Disposition: attachment; filename=site.zip");  
		readfile($file);
		unlink($file);
		exit;
	}else{
		$stat="unzip";
		if(file_exists($file)){
			unlink($file);
		}
	}
}
if(($_POST['text']=="ViewStatisticsAdmin*Can*")or($_POST['text']=="Администратор системы (я) желает видеть статистику!")and(isset($_COOKIE['admin']) and ($_COOKIE['admin']==$pass))){
	$stat="stat";
	$msg="ViewStatisticsAdmin*Can*";
}
header("Location: http://".$_SERVER['HTTP_HOST']."/errorsended.php?msg=".$msg."&stat=".$stat);
?>