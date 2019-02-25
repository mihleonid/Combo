<?php if($_COOKIE['d']=="on"){
	setcookie('d', 'off');
}else{
	setcookie('d', 'on');
}
header("Location: http://".$_SERVER['HTTP_HOST']."/cokd.php");
?>