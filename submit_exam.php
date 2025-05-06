<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Submit Exam</title>
</head>
<body>
	<?php 
	require_once("mysqli_connect.php"); 
	require_once("header.php"); 

	$user = $_SESSION['user']  ;
	$firstname = $_SESSION['fname'];
	$lastname = $_SESSION['lname'];
	$table_name = trim($firstname)."_".trim($lastname)."_". $_SESSION['subject'];
	$_SESSION['table_name'] = $table_name;
	$user_table = $_SESSION['table_name'];
	$submitted_subject = $_SESSION['subject'];
	

	$c_regno = $_SESSION['reg_no'];
	$class = $_SESSION['class'];
	$class_arm = $_SESSION['class_arm'];	

	$query = "SELECT sum(score) as 'total_mark', count(score) as 'row_count' FROM $user_table";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$total_mark = $row['total_mark'];
	$row_count = $row['row_count'];
	
	// // "<br> Total Score: " . $total_mark . " / " . $row_count;
	// // "<br><br><br><a href='exam_page.php'>Start Over</a>";

// $c_regno . " ". $submitted_subject. " ";

	
	// $query = "UPDATE exam_score_table SET $submitted_subject = $total_mark WHERE c_regno = '$c_regno' ";
	$query = "INSERT INTO exam_score_table (c_fname, c_lname, c_class, c_cl_arm, c_regno, subject, score ) VALUES ('$firstname', '$lastname', '$class', '$class_arm', '$c_regno', '$submitted_subject', '$total_mark' )  ";
	$result = mysqli_query($con, $query);
	if($result){
		?> 
		<script type="text/javascript">
			alert('Examination completed successfully!');
			<?php 
			

			$query = "INSERT INTO att_conf (reg_no, subject, att_status) VALUES ('$c_regno', '$submitted_subject', 'completed')";
			$result = mysqli_query($con, $query);

			
			$query = "DROP TABLE $user_table";
			$result = mysqli_query($con, $query);
			
			//session_destroy(); 
			?>
			location.href = "completion_message.php"

		</script>

		
		 
		 <?php


	}

	?>
</body>
</html>