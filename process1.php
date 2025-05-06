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
	
	if(isset($_SESSION['sn'])){
		$id = $_SESSION['sn'];
		$choice = $_POST["choice"];
		$cho = "";
		foreach($choice as $cho){
			$cho;
		}
	}

	$query = "UPDATE exam SET choice = '$cho' WHERE sn = '$id'";
	$result = mysqli_query($con, $query);
	
	if($id){ 
		$new_id = $id + 1;
		$query = "SELECT * FROM exam WHERE sn = '$new_id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		
		if($id <= mysqli_fetch_lengths($result)){
		echo "<p>" . $row["sn"]. ") \t\t" .$row["question"] . "</p>";
		$_SESSION['sn'] = $row['sn'];
	?>
	<form method="POST" name="question_form" action="process1.php" enctype="text">
		<p><input type="radio" name="choice[]" value="" checked hidden></p>
		<p>a) <input type="radio" name="choice[]" value="a"> <?php echo $row["a"]; ?></p>
		<p>b) <input type="radio" name="choice[]" value="b"> <?php echo  $row["b"]; ?></p>
		<p>c) <input type="radio" name="choice[]" value="c"> <?php echo $row["c"]; ?></p>
		<p>d) <input type="radio" name="choice[]" value="d"> <?php echo $row["d"]; ?></p>
		<p><input type="submit" value="Next"> </p>
	</form>


<?php
	

}else 
	{echo "End of Examination";
		$query = "SELECT sum(score) as 'total_mark' FROM exam";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$total_mark = $row['total_mark'];
		echo "<br> Total Score: " . $total_mark . " / 5";
	}

	}

	
		$query = "SELECT * FROM exam WHERE sn = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		if ($id <= mysqli_fetch_lengths($result)){
		$ans = $row['correct_answer'];
		$choice = $row['candidate_answer'];
		$id = $row['sn'];
		if ($choice == $ans){
			$query1 = "UPDATE exam SET score = 1 WHERE sn = '$id'";
			$result1 = mysqli_query($con, $query1);
		}else{
			$query1 = "UPDATE exam SET score = 0 WHERE sn = '$id'";
			$result1 = mysqli_query($con, $query1);

		}
	}	
	?>

</body>
</html>