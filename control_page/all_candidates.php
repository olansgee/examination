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
	<br>
<a href="admin_panel.php">Admin Panel</a>
	<div class="container" style="margin-left: auto; margin-right: auto;">
		<h3>Check Candidate Result by Class</h3><br>                
			<form action="all_candidates.php" onsubmit="login()" method="POST">
		

			    <div class="form-group">
			      <label for="class">Class</label>
			      <select name="class">
			      	<option selected>Select a Class</option>
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
			      	<option>Select a Subject</option>
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



			     <input type="submit" value="Submit" class="btn btn-primary" >
			  
			</form>
	</div>



	<div class="container" style="margin-left: auto; margin-right: auto;">
	
	<?php   
	@$class = $_POST['class']; 
	@$subject = $_POST['subject']; 
	$query = "SELECT * FROM exam_score_table WHERE  c_class = '$class' AND subject = '$subject'";
	$result = mysqli_query($con, $query);
	?>
	
		<table class="table table-dark table-hover">
    <thead>
      <tr>
      	<th>s#</th>
      	<th>First Name</th>
        <th>Last Name</th>
        <th>Subject</th>
        <th>Score</th>
	
      </tr>
    </thead>
<tbody>
	<?php
	while ($row = mysqli_fetch_array($result)){	
	$sn = $row['id'];
	$fname = $row['c_fname'];
	$lname = $row['c_lname'];
	$subject = $row['subject'];
	$subject_score = $row['score'];


	?>

    
      <tr>
      	<td><?php echo $sn; ?></td>
      	<td><?php echo $fname; ?></td>
        <td><?php echo $lname; ?></td>
        <td><?php echo $subject; ?></td>
        <td><?php echo $subject_score; ?></td>
      </tr>
    
    <?php } ?>
  </tbody>
  </table>
</div>







</body>
</html>