<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>
	<?php  
	require_once("mysqli_connect.php");
	require_once("header.php");
	//require_once("simple_html_dom.php");
	


	?>
	
</head>
<body>
	
	<?php
	if(isset($_SESSION['user'])){
	if(isset($_SESSION['sn'])){
		// echo "<b><i>" . $_SESSION['fname'] ." " . $_SESSION['lname'] . "</i></b><br><br><br>";
		$id = $_SESSION['sn'];
		
	}

	$user_table = $_SESSION['table_name'];

	
	
	if($id == 1 ){ ?>
		<script> 
			location.href="exam_page.php";

		</script>
		
	<?php	//header("Location:");
	}
	else{
		$new_id = $id-1;
		$query = "SELECT * FROM $user_table WHERE sn = '$new_id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		
		if($id <= mysqli_fetch_lengths($result)){
		echo "<p><b>" . $row["sn"]. ") \t\t" .$row["question"] . "</b></p>";
		$_SESSION['sn'] = $row['sn'];


		if($query = "SELECT * FROM $user_table WHERE sn = $id-1"){
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);

				
							
							
?>

	<br>
	<form method="POST" name="question_form" action="process7.php" enctype="text" id="form1">
		
		<p>a) <input type="radio" name="choice[]" value="a" <?php  if ($row['candidate_answer'] == "a") {echo "checked";} ?> > <?php echo $row["a"]; ?></p>
		<p>b) <input type="radio" name="choice[]" value="b" <?php  if ($row['candidate_answer'] == "b") {echo "checked";} ?>> <?php echo  $row["b"]; ?></p>
		<p>c) <input type="radio" name="choice[]" value="c" <?php  if ($row['candidate_answer'] == "c") {echo "checked";} ?>> <?php echo $row["c"]; ?></p>
		<p>d) <input type="radio" name="choice[]" value="d" <?php if ($row['candidate_answer'] == "d") {echo "checked";} ?>> <?php echo $row["d"]; ?></p>
		<br><br><br><br>
		<p>
			<input type="submit" formaction="goback.php" value="Back">	
			<input type="submit" value="Next"> </p>
	</form>


<?php
	
				
		
			}
		}
	}

}			

				
?>

</body>
</html>