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
	require_once("mysqli_connect.php");
	require_once("header.php"); 

	$user = $_SESSION['user']  ;
	$pass = $_SESSION['pwd'] ;
	
	
	
	$query = "SELECT * FROM candidates_tbl WHERE c_username = '$user' AND c_password = '$pass'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$firstname =$row['c_fname'];
	$_SESSION['fname'] = $firstname;
	$lastname = $row['c_lname'];
	$_SESSION['lname'] = $lastname;
	//$_SESSION['reg_no'] = $reg_no;
	$class = $row['c_class'] ;
	$arm = $row['c_arm'];
	$reg_no = $row['c_regno'];
	$_SESSION['reg_no'] = $reg_no;
	$class = $row['c_class'];
	$_SESSION['class'] = $class;
	$class_arm = $row['c_arm'];
	$_SESSION['class_arm'] = $class_arm;
	echo $firstname . " " . $lastname . "<br>";
	echo $class . $arm . "<br>";


	if( $class == "Basic_1" ||  $class == "Basic_2" ||  $class == "Basic_3" || $class == "Basic_4" || $class == "Basic_5" || $class == "Basic_6"){


	?>

	<center>
		<h4>Select Subject</h4>
	</center>
	<form style="width:50%; margin-left: auto;margin-right: auto;" name="select_exam_subject" action="instruction_page.php" enctype="text" method="GET">
		
		<p><strong>Subject: </strong>
			<select name="subject">
				<option value="Choose a subject">Choose a subject</option>
				<option value="<?php echo 'Mathematics_'.$class;  ?>"><?php echo 'Mathematics_'.$class;  ?></option> 
				<option value="<?php echo 'English_Language_'.$class;  ?>"><?php echo 'English_Language_'.$class;  ?></option> 
				<option value="<?php echo 'CRK_'.$class;  ?>"><?php echo 'CRK_'.$class;  ?></option> 
				<option value="<?php echo 'IRK_'.$class;  ?>"><?php echo 'IRK_'.$class;  ?></option>
				<option value="<?php echo 'Agric_Science_'.$class;  ?>"><?php echo 'Agric_Science_'.$class;  ?></option>
				<option value="<?php echo 'Home_Econs_'.$class;  ?>"><?php echo 'Home_Econs_'.$class;  ?></option>
				<option value="<?php echo 'Computer_'.$class;  ?>"><?php echo 'Computer_'.$class;  ?></option>
				<option value="<?php echo 'French_'.$class;  ?>"><?php echo 'French_'.$class;  ?></option>
				<option value="<?php echo 'Fine_Arts_'.$class;  ?>"><?php echo 'Fine_Arts_'.$class;  ?></option> 
				<option value="<?php echo 'Hausa_Fulani_'.$class;  ?>"><?php echo 'Hausa_Fulani_'.$class;  ?></option>
				<option value="<?php echo 'Yoruba_'.$class;  ?>"><?php echo 'Yoruba_'.$class;  ?></option> 
				<option value="<?php echo 'Igbo_'.$class;  ?>"><?php echo 'Igbo_'.$class;  ?></option>

				
			</select>
		</p>
		<input type="submit" name="SUBMIT">

	</form>

	<?php 
		}
	else if($class == "JSS_1" || $class == "JSS_2" || $class == "JSS_3"){


	?>

	<center>
		<h4>Select Class and Subject</h4>
	</center>
	<form style="width:50%; margin-left: auto;margin-right: auto;" name="select_exam_subject" action="instruction_page.php" enctype="text" method="GET">
		
		<p><strong>Subject: </strong>
			<select name="subject">
				<option value="Choose a subject">Choose a subject</option>
				<option value="<?php echo 'Mathematics_'.$class;  ?>"><?php echo 'Mathematics_'.$class;  ?></option>
				<option value="<?php echo 'English_'.$class;  ?>"><?php echo 'English_'.$class;  ?></option>
				<option value="<?php echo 'Social_Studies_'.$class;  ?>"><?php echo 'Social_Studies_'.$class;  ?></option>
				<option value="<?php echo 'Cultural_and_Creative_Arts_'.$class;  ?>"><?php echo 'Cultural_and_Creative_Arts_'.$class;  ?></option>
				<option value="<?php echo 'Basic_Science_and_Technology_'.$class;  ?>"><?php echo 'Basic_Science_and_Technology_'.$class;  ?></option>
				<option value="<?php echo 'Pre-vocational_Studies_'.$class;  ?>"><?php echo 'Pre-vocational_Studies_'.$class;  ?></option>
				<option value="<?php echo 'French_'.$class;  ?>">French</option>
				<option value="<?php echo 'Business_Education_'.$class;  ?>"><?php echo 'Business_Education_'.$class;  ?></option>
				<option value="<?php echo 'Home_Econs_'.$class;  ?>"><?php echo 'Home_Econs_'.$class;  ?></option>
				<option value="<?php echo 'Computer_'.$class;  ?>"><?php echo 'Computer_'.$class;  ?></option>
				<option value="<?php echo 'Fine_Arts_'.$class;  ?>"><?php echo 'Fine_Arts_'.$class;  ?></option>
			</select>
		</p>
		<input type="submit" name="SUBMIT">

	</form>

	<?php 
		} else if($class == "SSS_1" || $class == "SSS_2" || $class == "SSS_3"){ ?>
				<center>
		<h4>Select Class and Subject</h4>
	</center>
	<form style="width:50%; margin-left: auto;margin-right: auto;" name="select_exam_subject" action="instruction_page.php" enctype="text" method="GET">
		
		<p><strong>Subject: </strong>
			<select name="subject">
				<option value="Choose a subject">Choose a subject</option>
				<option value="<?php echo 'Mathematics_'.$class;  ?>"><?php echo 'Mathematics_'.$class;  ?></option>
				<option value="<?php echo 'English_'.$class;  ?>"><?php echo 'English_'.$class;  ?></option>
				<option value="<?php echo 'Biology_'.$class;  ?>"><?php echo 'Biology_'.$class;  ?></option>
				<option value="<?php echo 'Physics_'.$class;  ?>"><?php echo 'Physics_'.$class;  ?></option>
				<option value="<?php echo 'Chemistry_'.$class;  ?>"><?php echo 'Chemistry_'.$class;  ?></option>
				<option value="<?php echo 'Economics_'.$class;  ?>"><?php echo 'Economics_'.$class;  ?></option>
				<option value="<?php echo 'Account_'.$class;  ?>"><?php echo 'Account_'.$class;  ?></option>
				<option value="<?php echo 'Geography_'.$class;  ?>"><?php echo 'Geography_'.$class;  ?></option>
				<option value="<?php echo 'Technical_Drawing_'.$class;  ?>"><?php echo 'Technical_Drawing_'.$class;  ?></option>
				<option value="<?php echo 'History_'.$class;  ?>"><?php echo 'History_'.$class;  ?></option>
				<option value="<?php echo 'Civic_Education_'.$class;  ?>"><?php echo 'Civic_Education_'.$class;  ?></option>
				<option value="<?php echo 'English_Literature_'.$class;  ?>"><?php echo 'English_Literature_'.$class;  ?></option>
				<option value="<?php echo 'Agric_Science_'.$class;  ?>"><?php echo 'Agric_Science_'.$class;  ?></option>
				<option value="<?php echo 'Commerce_'.$class;  ?>"><?php echo 'Commerce_'.$class;  ?></option>
				<option value="<?php echo 'Food_and_Nutrition_'.$class;  ?>"><?php echo 'Food_and_Nutrition_'.$class;  ?></option>
				
			</select>
		</p>
		<input type="submit" name="SUBMIT">

	</form>

	<?php
		
		}else{ ?>
			<script type="text/javascript">
				location.href = "invalid_login.php"
			</script>
		
		<?php
	}

	?>

</body>
</html>