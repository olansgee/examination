<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<?php $_SESSION['now'] = time();?>	
</head>
<body>
<?php
if (!isset($_SESSION['cdown'])){
	$_SESSION['cdown'] = 120;
	$_SESSION['now'] = time();

}
$current_time = time();
$time_diff =  $current_time - $_SESSION['now'];

echo "Set time = " . $_SESSION['now'] . "<br>";
echo "Current time = " . $current_time ."<br>"; 
echo "Time different = " . $time_diff . "<br>";


?>
</body>
</html>