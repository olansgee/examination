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
	

	if (!isset($user)){
		header("Location:invalid_login.php");
	
	}else{

		$table_name = $firstname."_".$lastname;
		$_SESSION['table_name'] = $table_name;
		$user_table = $_SESSION['table_name'];
		$query = "CREATE TABLE IF NOT EXISTS  $user_table AS SELECT sn, question, a, b, c, d, correct_answer, candidate_answer, score FROM exam";
	
		$result = mysqli_query($con, $query);
		
		$id = 1;
		$query = "SELECT * FROM $user_table WHERE sn = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);

		
		if ($id && !isset($_POST['choice'])){

		echo "Hi, <b><i>" . $firstname ." " . $lastname . "</i></b><br>";
		echo '<form action="logout.php">
		<input type="submit" name="logout" value="Logout">
		</form><br>';

		
		
		// if($id <= mysqli_fetch_lengths($result)){

		echo "<p><b>" . $row["sn"]. ") \t\t" .$row["question"] . "</b></p>";
		$_SESSION['sn'] = $row['sn'];
		

?>
<br>
	<form method="POST" name="question_form" action="process5.php" enctype="text">
		<p><input type="radio" name="choice[]" value="" checked hidden></p>
		<p>a) <input type="radio" name="choice[]" value="a" id="a" <?php  if ($row['candidate_answer'] == "a") {echo "checked";} ?>> <?php echo $row["a"]; ?></p>
		<p>b) <input type="radio" name="choice[]" value="b" id="b" <?php  if ($row['candidate_answer'] == "b") {echo "checked";} ?>> <?php echo  $row["b"]; ?></p>
		<p>c) <input type="radio" name="choice[]" value="c" id="c" <?php  if ($row['candidate_answer'] == "c") {echo "checked";} ?>> <?php echo $row["c"]; ?></p>
		<p>d) <input type="radio" name="choice[]" value="d" id="d" <?php  if ($row['candidate_answer'] == "d") {echo "checked";} ?>> <?php echo $row["d"]; ?></p>
		<p><input type="submit" value="Next"> </p>
	</form>

<?php
		if ( $id == 1 && empty($row['candidate_answer'])){
		$choice = $_POST["choice"];
		$cho = "";
		foreach($choice as $cho){
			$cho;
		}
		// $cho = $_POST['choice'];
 		$query = "UPDATE $user_table SET candidate_answer = '$cho' WHERE sn = 1";
		$result = mysqli_query($con, $query);
	}}

	else{

		
		echo "<b><i>" . $firstname." " . $lastname . "</i></b><br><br>";
		$id = $_SESSION['sn'];
		if (isset($_POST["choice"])){
		$choice = $_POST["choice"];
		$cho = "";
		foreach($choice as $cho){
			$cho;
		}
		
		

		$user_table = $_SESSION['table_name'];

		
		
		if($id){ 
			$new_id = $id + 1 ;
			$query = "SELECT * FROM $user_table WHERE sn = $new_id";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			
			if($id <= mysqli_fetch_lengths($result)){
			echo "<p><b>" . $row["sn"]. ") \t\t" .$row["question"] . "</b></p>";
			$_SESSION['sn'] = $row['sn'];
		?>
		
		<br>
		<form method="POST" name="question_form" action="process5.php" enctype="text" id="form1">
			<p><input type="radio" name="choice[]" value="" checked hidden></p>
			<p>a) <input type="radio" name="choice[]" value="a" id="a" <?php  if ($row['candidate_answer'] == "a") {echo "checked";} ?>> <?php echo $row["a"]; ?></p>
			<p>b) <input type="radio" name="choice[]" value="b" id="b" <?php  if ($row['candidate_answer'] == "b") {echo "checked";} ?>> <?php echo  $row["b"]; ?></p>
			<p>c) <input type="radio" name="choice[]" value="c" id="c" <?php  if ($row['candidate_answer'] == "c") {echo "checked";} ?>> <?php echo $row["c"]; ?></p>
			<p>d) <input type="radio" name="choice[]" value="d" id="d" <?php  if ($row['candidate_answer'] == "d") {echo "checked";} ?>> <?php echo $row["d"]; ?></p>

			<p>
				<input type="submit" formaction="goback.php" value="Back">	
				<input type="submit" value="Next"> </p>
		</form>


		<?php
		if (isset($_POST["choice"])){
		$id = $id + 1;
		$query = "UPDATE $user_table SET candidate_answer = '$cho' WHERE sn = '$new_id'";
		$result = mysqli_query($con, $query);
		 
		 }}
	}	
	}else 
		{echo "End of Examination";
			$query = "SELECT sum(score) as 'total_mark', count(score) as 'row_count' FROM $user_table";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			$total_mark = $row['total_mark'];
			$row_count = $row['row_count'];

			echo "<br> Total Score: " . $total_mark . " / " . $row_count;
			echo "<br><br><br><a href='exam_page.php'>Start Over</a>";
		}

		

		$query = "SELECT * FROM $user_table WHERE sn = '$id'";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			if ($id <= mysqli_fetch_lengths($result)){
			$ans = $row['correct_answer'];
			$choice = $row['candidate_answer'];
			$id = $row['sn'];
			if ($choice == $ans){
				$query1 = "UPDATE $user_table SET score = 1 WHERE sn = '$id'";
				$result1 = mysqli_query($con, $query1);
			}else{
				$query1 = "UPDATE $user_table SET score = 0 WHERE sn = '$id'";
				$result1 = mysqli_query($con, $query1);

			}	

			
		}
		
	  }
	}
		?>

</body>
</html>