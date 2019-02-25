<?php
ob_start();
if($_POST['y']=="on"){
	setcookie('y', 'on');
}else{
	setcookie('y', 'off');
}
if($_POST['d']=="on"){
	setcookie('d', 'on');
}else{
	setcookie('d', 'off');
}
setcookie('col', $_POST['col']);
setcookie('opacity', str_replace(",", ".", $_POST['opacity']));
setcookie('raz', $_POST['raz']);
setcookie('raz2', $_POST['raz2']);
setcookie('sk2', $_POST['sk2']);
setcookie('sk', $_POST['sk']);
setcookie('bg', $_POST['bg']);
setcookie('go', $_POST['go']);
if(isset($_POST['cl'])){
	setcookie('col', '', 1);
	setcookie('raz', '', 1);
	setcookie('raz2', '', 1);
	setcookie('sk2', '', 1);
	setcookie('sk', '', 1);
	setcookie('bg', '', 1);
	setcookie('go', '', 1);
	setcookie('y', '', 1);
	setcookie('d', '', 1);
	setcookie('opacity', '', 1);
}
ob_end_clean();
header("Location: http://".$_SERVER['HTTP_HOST']."/sets.php");
?>