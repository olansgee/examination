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

	$query = "SELECT correct_answer, candidate_answer FROM exam WHERE sn = '$id'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	$_SESSION['correct_answer'][$id] = $row['correct_answer'];
	$_SESSION['candidate_answer'][$id] = $cho;
	
	$fh = fopen("C:/xampp/mysql/data/olansgee_examinations/".$_SESSION['fname'].$_SESSION['lname'].".txt", "a+");
	
	if($id==1){		
		$content = $id ."\t" . $_SESSION['correct_answer'][$id] ."\t" . $_SESSION['candidate_answer'][$id]. "\n";
			echo $content;
			fwrite($fh, $content);
		}
	
	if($id){ 

		$id = $id + 1;
		$query = "SELECT * FROM exam WHERE sn = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		
		if($id <= mysqli_fetch_lengths($result)){
		echo "<p>" . $row["sn"]. ") \t\t" .$row["question"] . "</p>";
		$_SESSION['sn'] = $row['sn'];
		$_SESSION['correct_answer'] = [" ", "a","b","c","d","a"];
		$_SESSION['candidate_answer'][$id] = $cho;
		if($_SESSION['correct_answer'][$id]==$_SESSION['candidate_answer'][$id]){
			$_SESSION['score'] = 1;
		}else
		{
			$_SESSION['score'] = 0;
		}
		
		$content = $id ."\t" . $_SESSION['correct_answer'][$id] ."\t" . $_SESSION['candidate_answer'][$id]. "\n";
		echo $content;
		fwrite($fh, $content);
		

		

	?>
	<form method="POST" name="question_form" action="process2.php" enctype="text">
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
	

	$query = "CREATE TEMPORARY TABLE IF NOT EXISTS temp_exam
				( sn int (3),
					correct_answer varchar(1),
					candidate_answer varchar(1),
					score int(1)

			) ";

	$result = mysqli_query($con, $query);

	$query = 'LOAD DATA INFILE ' . $_SESSION['fname']. $_SESSION['lname'].".txt" . 'INTO TABLE temp_exam';
	$result = mysqli_query($con, $query);





	// echo "<br> sn \t\t CorAns  \t\t CandAns<br>";

	// for($id=1; $id<=5; $id++){
	// echo "<br>". $id ."\t\t" . $_SESSION['correct_answer'][$id] ."\t\t" . $_SESSION['candidate_answer'][$id] ."\t\t" . $_SESSION['score'] . "<br>";
 
	}

		$query = "SELECT * FROM temp_exam WHERE sn = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		if ($id <= mysqli_fetch_lengths($result)){
		$ans = $row['correct_answer'];
		$choice = $row['candidate_answer'];
		$id = $row['sn'];
		if ($ans === $choice){
			$query1 = "UPDATE temp_exam SET score = 1 WHERE sn = '$id'";
			$result1 = mysqli_query($con, $query1);
		}else{
			$query1 = "UPDATE temp_exam SET score = 0 WHERE sn = '$id'";
			$result1 = mysqli_query($con, $query1);

		}

		
		
	}

	$query = "SELECT sum(score) as 'total_mark' FROM temp_exam";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$total_mark = $row['total_mark'];

		$query = "SELECT count(score) as 'row_num' FROM temp_exam";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$row_count = $row['row_num'];
		echo "<br> Total Score: " . $total_mark . " /" . $row_count;



echo "<br><a href='exam_page.php'> Start Over </a>";
	}

	
		
		
	?>

</body>
</html>