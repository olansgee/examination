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
	
	if(isset($_SESSION['user'])){

	if(isset($_SESSION['sn'])){
		// echo "<b><i>" . $_SESSION['fname'] ." " . $_SESSION['lname'] . "</i></b><br><br><br>";
		$id = $_SESSION['sn'];
		$choice = $_POST["choice"];
		$cho = "";
		foreach($choice as $cho){
			$cho;
		}
	}

	$user_table = $_SESSION['table_name'];

	$query = "UPDATE $user_table SET candidate_answer = '$cho' WHERE sn = '$id'";
	$result = mysqli_query($con, $query);
	
	if($id){ 
		$new_id = $id + 1;
		$query = "SELECT * FROM $user_table WHERE sn = '$new_id'";
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
		<p>d) <input type="radio" name="choice[]" value="d" <?php  if ($row['candidate_answer'] == "d") {echo "checked";} ?>> <?php echo $row["d"]; ?></p>

		<p>
			<input type="submit" formaction="goback.php" value="Back">	
			<input type="submit" value="Next"> </p>
	</form>


<?php
	
}else 
	{
		
?>
		<script type="text/javascript">
			location.href = "summary_page.php";
		</script>
<?php  
	}

	}

	if(!isset($_SESSION['countdown'])){
    	//Set the countdown to (1hr) 3600 seconds.
    	$_SESSION['countdown'] = 3600;
    	//Store the timestamp of when the countdown began.
   		$_SESSION['time_started'] = time();
   
		}

		// Get the current timestamp.
		$now = time();

		//Calculate how many seconds have passed since
		//the countdown began.
		$timeSince = $now - $_SESSION['time_started'];

		//How many seconds are remaining?
		$remainingSeconds = abs($_SESSION['countdown'] - $timeSince  );

		//Print out the countdown.
		//echo "There are $remainingSeconds seconds remaining.";

		//Check if the countdown has finished.
		if($remainingSeconds < 1){
		   // Finished! Do something.
		}


	$query = "SELECT * FROM $user_table WHERE sn = '$id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		if ($id <= mysqli_fetch_lengths($result)){
		$ans = $row['correct_answer'];
		$choice = $row['candidate_answer'];
		$id = $row['sn'];
		if ($choice == $ans){
			$query1 = "UPDATE $user_table SET score = 1, submit_time = '$remainingSeconds' WHERE sn = '$id'";
			$result1 = mysqli_query($con, $query1);
		}else{
			$query1 = "UPDATE $user_table SET score = 0, submit_time = '$remainingSeconds' WHERE sn = '$id'";
			$result1 = mysqli_query($con, $query1);

		}	

		
	}
	}	
	?>

</body>
</html>