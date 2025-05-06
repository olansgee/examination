<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Instruction</title>
	<?php 
	require_once("mysqli_connect.php");
	require_once("header.php");
	?>
	<script type="text/javascript">
		function open_exam(){
			var newWin = window.open("examination.php", "newWin");
			
			}
	</script>
	
</head>
<body>
	
	<?php

	$selected_subject = strtolower($_GET['subject']);
	
	$query = "SELECT * FROM lock_control WHERE subject = '$selected_subject'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	@$check_lock_status = $row['lock_status'];
	@$check_subject_status = $row['subject'];


	if ($selected_subject == $check_subject_status && $check_lock_status == "locked" ){ 

		?> 
		<script type="text/javascript">
			alert('<?php echo  $selected_subject . " is locked" ?>');
			location.href = "select_subject.php";
		</script>


		<?php

	}else{

		if($selected_subject == strtolower("Choose a subject"))
			{ ?>
				<script type="text/javascript">
					alert("Choose a subject");
					location.href = "select_subject.php";
				</script>
				
		<?php }
		else{
			
			$_SESSION['subject'] = strtolower($selected_subject);
		
			$user = $_SESSION['user']  ;
			$firstname = $_SESSION['fname'];
			$lastname = $_SESSION['lname'];

			
			if (!isset($user)){
			header("Location:invalid_login.php");
			}
			else{
				echo "Hi, <b><i>" . $firstname ." " . $lastname . "</i></b><br>";
				echo '<form action="logout.php">
				<input type="submit" name="logout" value="Logout">
			</form>';
				echo '<h2>Welcome to the Instruction Page</h2>';
?>
				<a  href='javascript:open_exam()'>Start Exam</a>
<?php
				$c_regno = $_SESSION['reg_no'];



				$query = "SELECT * FROM att_conf WHERE reg_no = '$c_regno'  AND subject = '$selected_subject' "; 
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				@$att_status = $row['att_status'];
				@$att_candidate = $row['reg_no'];
				@$att_subject = strtolower($row['subject']);

				if ($att_candidate == $c_regno && $selected_subject == $att_subject && $att_status == "completed"  ){ ?> 

					<script type="text/javascript">
						alert("You have already attempted and completed <?php echo ucwords($selected_subject); ?> examination! Thank you.")
						location.href = "index.php"
					</script>

					<?php session_destroy();

				}
				else{

					$table_name = trim($firstname)."_".trim($lastname)."_". $_SESSION['subject'];
					$_SESSION['table_name'] = $table_name;
					$user_table = $_SESSION['table_name'];
					$_SESSION['subject'] = $selected_subject;
					$exam_table = strtolower($_SESSION['subject']); 
					$query = "CREATE TABLE IF NOT EXISTS  $user_table AS SELECT sn, question, a, b, c, d, correct_answer, candidate_answer, score, submit_time FROM $exam_table ";
					
					$result = mysqli_query($con, $query);
					
					}
			}
		}
	}

	

	?>
	
	
	
</body>
</html>