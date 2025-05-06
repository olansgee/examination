<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload</title>
</head>
<body>
	<?php 
	require_once("../mysqli_connect.php");
	require_once("header.php"); 

	@$exam_subject = strtolower($_POST['subject']);
	$exam_file = basename($exam_subject . ".txt");
	
	@$doc = $_FILES["exam"]["name"];
	@$temp_doc = $_FILES["exam"]["tmp_name"];

	if(!empty($doc)){
	@$new_docName = $exam_subject . ".txt";
	}

	if(!empty($doc)){
	$target_dir = $exam_subject . ".txt";
	$target_file = $target_dir . basename($exam_subject . ".txt");
	if(move_uploaded_file($temp_doc , $target_dir)) {
	echo "The file ". ucwords(basename(@$new_docName)). " has been uploaded";

	} 
	else{
	echo "There was an error uploading the exam paper, please try again!";
	}
	}
	
	@$sample = file_get_contents($exam_file);
	

	$query = "CREATE TABLE IF NOT EXISTS $exam_subject(
		sn int(2) NOT NULL auto_increment PRIMARY KEY,
		question varchar(500) NOT NULL,
		a varchar(100) NOT NULL,
		b varchar(100) NOT NULL,
		c varchar(100) NOT NULL,
		d varchar(100) NOT NULL,
		
		correct_answer varchar(1),
		candidate_answer varchar(1),
		score varchar(1),
		submit_time int(5)
		)
		";
	$result = mysqli_query($con, $query);
	if (!$result){
		echo "Unable to create $exam_subject examination table <br>";
	}


	
 	
	$query = "INSERT INTO $exam_subject (question, a, b, c, d, correct_answer)
				VALUES $sample";
	

	$result = mysqli_query($con, $query);			
	if ($result){echo "<br>" . ucwords($exam_subject). " examination paper uploaded succesfully";}
	$query = "select * from $exam_subject";
 	$result = mysqli_query($con, $query);
 	@$row = mysqli_fetch_array($result);
 

	?>	

</body>
</html>