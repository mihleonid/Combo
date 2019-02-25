<?php require_once("nocache.php");?>
<!doctype html>
<html>
<head>
<?php include("header.php");?>
<style>
html{
	<?php if(isset($_COOKIE['bg'])){?>
	background-image: <?php echo($_COOKIE['bg']);?>;
	<?php }?>
}
</style>
<?php echo($_TOHEADER);?>
<title>ClearChace</title>
</head>
<body>
<script>
window.location.replace("/sets.php");
</script>
</body>
</html>