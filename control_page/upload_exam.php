<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Examinations</title>
</head>
<body>
	<?php 
	require_once("../mysqli_connect.php");
	require_once("header.php"); 
	?>
	<a href="admin_panel.php">Admin Panel</a>
	<div style="margin-top: 70px; margin-left: 200px;">
		<form action="upload.php" method="POST" enctype="multipart/form-data" style="width:25%">
			<p>Subject: 
				<select name="subject">
					<?php 
						$query = "SELECT * FROM lock_control";
						$result = mysqli_query($con, $query);
						while($row = mysqli_fetch_array($result)){
						?> 
							<option><?php echo $row['subject']; ?></option>
						<?php	
						}
					?>
					
					
				</select> 
			</p>
			<p>
				Upload Exam: <br>
				<input type="file" name="exam">
			</p>
			<p><input type="submit" name="submit" value="UPLOAD EXAM"></p>
		</form>
	</div>
	
</body>
</html>