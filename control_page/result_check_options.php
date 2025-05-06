<!DOCTYPE html>
<?php session_start();  ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check Results</title>
</head>
<body>
	<?php 
	require_once("header.php");
	require_once("../mysqli_connect.php");

	$user = $_SESSION['user'];
	echo "Hello, Admin " . $user; 

?>
<br>
<br>
<a href="specific_candidate.php">Specific Candidate</a><br>
	<a href="all_candidates.php">All candidates</a><br>
</body>
</html>