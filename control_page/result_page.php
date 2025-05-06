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

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$class = $_POST['class'];
	$subject = $_POST['subject'];
	
	?>


	<div class="container" style="width:40%">
		<h3 align="center"><?php echo "$fname $lname Result" ?> </h3><br>  
	<?php   
	if (isset($fname) || isset($lname)){           
	$query = "SELECT * FROM exam_score_table WHERE c_fname ='$fname' AND c_lname ='$lname' AND c_class = '$class' ";
	$result = mysqli_query($con, $query);
	
	

	?>

	<div class="container">
 
          
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    		
    		while($row = mysqli_fetch_array($result)){	
				$subject = $row['subject'];
				$score = $row['score'];
	   	?>
      <tr>
        <td><?php echo $subject; ?></td>
        <td><?php echo $score; ?></td>
      </tr>

    <?php } ?>

    </tbody>
  </table>
</div>



	</div>
<?php }

else {
 die("Specify first name and last name");
} 
?>

</body>
</html>