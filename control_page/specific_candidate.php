<!DOCTYPE html>
<?php session_start();  ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check Results</title>
</head>
<body>
	<?php 
	require_once("header.php");
	require_once("../mysqli_connect.php");

	$user = $_SESSION['user'];
	echo "Hello, Admin " . $user; 
	?>


	<div class="container" style="margin-left: auto; margin-right: auto;">
		<h3>Check Candidate Result</h3><br>                
			<form action="result_page.php"  method="POST">
			    <div class="form-group">
			      <label for="fname">First name:</label>
			      <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname">
			    </div>

			    <div class="form-group">
			      <label for="lname">Last name:</label>
			      <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname">
			    </div>

			    <div class="form-group">
			      <label for="class">Class</label>
			      <select name="class">
			      	<option>Basic_1</option>
			      	<option>Basic_2</option>
			      	<option>Basic_3</option>
			      	<option>Basic_4</option>
			      	<option>Basic_5</option>
			      	<option>Basic_6</option>
			      	<option>JSS_1</option>
					<option>JSS_2</option>
					<option>JSS_3</option>
					<option>SSS_1</option>
					<option>SSS_2</option>
					<option>SSS_3</option>			      	
			      </select>
			    </div>

			     <div class="form-group">
			      <label for="subject">Subject</label>
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
			    </div>


			     <input type="submit" value="SUBMIT" class="btn btn-primary" >
			  
			</form>
	</div>

</body>
</html>