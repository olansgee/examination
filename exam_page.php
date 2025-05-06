<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<?php 
	require_once("mysqli_connect.php");
	require_once("header.php");
	 ?>
</head>
<body>
	<?php
	
	$user = $_SESSION['user']  ;
	$firstname = $_SESSION['fname'];
	$lastname = $_SESSION['lname'];
	
	$table_name = trim($firstname)."_".trim($lastname)."_". $_SESSION['subject'];
	$_SESSION['table_name'] = $table_name;
	$user_table = $_SESSION['table_name'];
	// $_SESSION['subject'] = $_GET['subject'];
	// $exam_table = $_SESSION['subject']; 
	
	

	if (!isset($user)){
		header("Location:invalid_login.php");
	}else{
	// 	echo "Hi, <b><i>" . $firstname ." " . $lastname . "</i></b><br>";
	// 	echo '<form action="logout.php">
	// 	<input type="submit" name="logout" value="Logout">
	// </form><br>';
		
		
		
	
		$id = 1;
		$query = "SELECT * FROM $user_table WHERE sn = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);

		
		if($id <= mysqli_fetch_lengths($result)){

		echo "<p><b>" . $row["sn"]. ") \t\t" .$row["question"] . "</b></p>";
		$_SESSION['sn'] = $row['sn'];
		


		
?>
<br>
	<form method="POST" name="question_form" action="process7.php" enctype="text">
		<p><input type="radio" name="choice[]" value="" checked hidden></p>
		<p>a) <input type="radio" name="choice[]" value="a" <?php  if ($row['candidate_answer'] == "a") {echo "checked";} ?>> <?php echo $row["a"]; ?></p>
		<p>b) <input type="radio" name="choice[]" value="b" <?php  if ($row['candidate_answer'] == "b") {echo "checked";} ?>> <?php echo  $row["b"]; ?></p>
		<p>c) <input type="radio" name="choice[]" value="c" <?php  if ($row['candidate_answer'] == "c") {echo "checked";} ?>> <?php echo $row["c"]; ?></p>
		<p>d) <input type="radio" name="choice[]" value="d" <?php if ($row['candidate_answer'] == "d") {echo "checked";} ?>> <?php echo $row["d"]; ?></p>

		<br><br>
		<p><input type="submit" value="Next"> </p>
	</form>

<?php 

}
}
?>

</body>
</html>