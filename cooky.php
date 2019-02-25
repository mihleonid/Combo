<?php if($_COOKIE['y']=="on"){
	setcookie('y', 'off');
}else{
	setcookie('y', 'on');
}
header("Location: http://".$_SERVER['HTTP_HOST']."/cokd.php");
?>