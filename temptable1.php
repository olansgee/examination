<?php
session_start(); 
$user = $_SESSION['user']  ;
		if (!isset($user)){
		header("Location:invalid_login.php");
	}else{
		echo "Hi, <b><i>" . $user. "</i></b><br>";
		echo '<form action="logout.php">
				<input type="submit" name="logout" value="Logout">
				</form>';
		

		

	}
require_once("mysqli_connect.php");
$query = "create temporary table temptable 
			as
			select question_id, question, option_a, option_b, option_c, option_d from question_tbl";

$result = mysqli_query($con, $query);			
if ($result){
	echo "Temporary table created succesfully<br>";
}
else {
	"Failure to create temporary table<br>";
}


$query = "select question_id, question, option_a, option_b, option_c, option_d from temptable";

$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){

$question_id =$row['question_id'];
$question =$row['question'];
$option_a =$row['option_a'];
$option_b =$row['option_b'];
$option_c =$row['option_c'];
$option_d =$row['option_d'];




echo $question_id ."\t\t" . $question ."\t\t ". $option_a ."\t\t" . $option_b ."\t\t" . $option_c ."\t\t" . $option_c ."<br>";
}


mysqli_close($con);

?>