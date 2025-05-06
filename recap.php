<?php 
session_start();
require_once("mysqli_connect.php");
require_once("header.php");
$firstname = $_SESSION['fname'];
$lastname = $_SESSION['lname'];
$table_name = trim($firstname)."_".trim($lastname)."_". $_SESSION['subject'];
$_SESSION['table_name'] = $table_name;
$user_table = $_SESSION['table_name'];

$query = "SELECT * FROM $user_table";
$result = mysqli_query($con, $query);
$_SESSION['sn'] = $_GET["id"];
$id = $_SESSION['sn'];


if (isset($id)){
	
	$query = "SELECT * FROM $user_table where sn = $id ";
	$result = mysqli_query($con, $query);
	
	$row = mysqli_fetch_array($result);

	echo "<p><b>" . $row["sn"]. ") \t\t" .$row["question"] . "</b></p>";
	// 	$_SESSION['sn'] = $row['sn'];
	?>
	
	<br>
	<form method="POST" name="question_form" action="process7.php" enctype="text">
		<p><input type="radio" name="choice[]" value="" checked hidden></p>
		<p>a) <input type="radio" name="choice[]" value="a" <?php  if ($row['candidate_answer'] == "a") {echo "checked";} ?>> <?php echo $row["a"]; ?></p>
		<p>b) <input type="radio" name="choice[]" value="b" <?php  if ($row['candidate_answer'] == "b") {echo "checked";} ?>> <?php echo  $row["b"]; ?></p>
		<p>c) <input type="radio" name="choice[]" value="c" <?php  if ($row['candidate_answer'] == "c") {echo "checked";} ?>> <?php echo $row["c"]; ?></p>
		 <p>d) <input type="radio" name="choice[]" value="d" <?php if ($row['candidate_answer'] == "d") {echo "checked";} ?>> <?php echo $row["d"]; ?></p> 

		<p>
			<input type="submit" formaction="goback.php" value="Back">	
			<input type="submit" value="Next"> </p>
	</form>


<?php

}



?>