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
	$user = $_SESSION['user'];
	echo "Hi, <b><i>" . $user. "</i></b><br>";
	
	if(isset($_SESSION['question_id'])){
		$id = $_SESSION['question_id'];
		$choice = $_POST["choice"];
		$cho = "";
		foreach($choice as $cho){
			$cho;
		}
	
	$query = "create temporary table if not exists candidate_answer
				(question_id int(3), c_choice varchar(1), correct_answer varchar(1), c_score int(1))";

	$result = mysqli_query($con, $query);

	$query = "insert into candidate_answer(question_id)
				select question_id from question_tbl";

	$result = mysqli_query($con, $query);

	$query = "UPDATE candidate_answer SET c_choice = '$cho' WHERE question_id = '$id'";

	$result = mysqli_query($con, $query);
	
	if($id){ 
		$new_id = $id + 1;
		$query = "SELECT * FROM question_tbl WHERE question_id = '$new_id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		
		if($id <= mysqli_fetch_lengths($result)){
		echo "<p>" . $row["question_id"]. ") \t\t" .$row["question"] . "</p>";
		$_SESSION['question_id'] = $row['question_id'];
	?>
	<form method="POST" name="question_form" action="process.php" enctype="text">
		<p><input type="radio" name="choice[]" value="" checked hidden></p>
		<p>a) <input type="radio" name="choice[]" value="a"> <?php echo $row["option_a"]; ?></p>
		<p>b) <input type="radio" name="choice[]" value="b"> <?php echo  $row["option_b"]; ?></p>
		<p>c) <input type="radio" name="choice[]" value="c"> <?php echo $row["option_c"]; ?></p>
		<p>d) <input type="radio" name="choice[]" value="d"> <?php echo $row["option_d"]; ?></p>
		<p><input type="submit" value="Next"> </p>
	</form>


<?php
	

}else 
	{echo "End of Examination";
		$query = "select * from candidate_answer";
		$result = mysqli_query($con, $query);
		echo "<br>S/N" ."\t\t" . "Candidate-Answer" . "\t\t" . "Correct-Answer" . "\t\t" . "Score<br>";
		while($row = mysqli_fetch_array($result)){
			echo $row['question_id'] . "\t\t" . $row['c_choice'] . "\t\t" . $row['correct_answer'] . $row['c_score'] . "<br>";
		}

		$query = "SELECT sum(c_score) as 'total_mark' FROM candidate_answer";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$total_mark = $row['total_mark'];
		echo "<br> Total Score: " . $total_mark . " / 5";
	}

	}

	
		$query = "SELECT * FROM candidate_answer WHERE question_id = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		if ($id <= mysqli_fetch_lengths($result)){
		$ans = $row['correct_answer'];
		$choice = $row['c_choice'];
		$id = $row['question_id'];
		if ($choice === $ans){
			$query1 = "UPDATE candidate_answer SET c_score = 1 WHERE question_id = '$id'";
			$result1 = mysqli_query($con, $query1);
		}else{
			$query1 = "UPDATE candidate_answer SET c_score = 0 WHERE question_id = '$id'";
			$result1 = mysqli_query($con, $query1);

		}
	}
	}	
	?>

</body>
</html>