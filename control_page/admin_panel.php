<!DOCTYPE html>
<?php session_start();  ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Select Examination Subject</title>
</head>
<body>

	<?php 
	require_once("header.php");

	$user = $_SESSION['user'];
	echo "Hello, Admin " . $user; 
	?>

	<form action="logout.php">
		<input type="submit" name="logout" value="Logout">
	</form>
	
	<br>
	<br>
	<a href="c_reg.php">Register candidate</a><br>
	<a href="select_exam_subject.php">Unlock Examination Subject</a><br>
	<a href="upload_exam.php">Upload Exam</a><br>
	<a href="result_check_options.php">Check Results</a><br>
	

	
</body>
</html>