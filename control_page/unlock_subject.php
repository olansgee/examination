<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Unlock Subject</title>
</head>
<body>

	<?php 
	require_once("../mysqli_connect.php");
	require_once("header.php"); 

	if (@!$_POST['subject']){ 
	?>
		<script type="text/javascript">
			alert("Check subject to lock or unlock!");
			location.href = "select_exam_subject.php";
		</script>
	<?php
	}else{
	$_SESSION['subject'] = $_POST['subject'];
	$subject = $_SESSION['subject'];
	//echo $subject;
	
	$query = "SELECT * FROM lock_control WHERE subject = '$subject' ";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);

	$exam_subject = $row['subject'];
	$_SESSION['lock_status'] = $row['lock_status'];
	$check_status = $_SESSION['lock_status'];

	if ($subject == $exam_subject){
		if ($check_status == "locked"){
		$query = "UPDATE lock_control SET lock_status = 'unlocked' WHERE subject = '$subject' ";
		$result = mysqli_query($con, $query); 
		?>
			<script type="text/javascript">
				alert("<?php echo ucwords($subject) . " table, unlocked"; ?>")
				location.href = "select_exam_subject.php";
			</script>
		<?php
		
		}else{

			$query = "UPDATE lock_control SET lock_status = 'locked' WHERE subject = '$subject' ";
			$result = mysqli_query($con, $query);
			?>
			<script type="text/javascript">
				alert("<?php echo ucwords($subject) . " table, locked"; ?>")
				location.href = "select_exam_subject.php";
			</script>
		<?php
			

		}
	}
}
	?>

</body>
</html>