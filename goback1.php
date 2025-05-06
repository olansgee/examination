<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>
	<?php  
	require_once("mysqli_connect.php");
	require_once("header.php");
	require_once("simple_html_dom.php");
	?>
	
</head>
<body>
	
	<?php
	if(isset($_SESSION['user'])){
	if(isset($_SESSION['sn'])){
		echo "<b><i>" . $_SESSION['fname'] ." " . $_SESSION['lname'] . "</i></b><br><br><br>";
		$id = $_SESSION['sn'];
		//$choice = $_POST["choice"];
		//$cho = "";
		//foreach($choice as $cho){
		//	$cho;
		//}
	}

	$user_table = $_SESSION['table_name'];

	
	
	if($id <= 2 ){ ?>
		<script> 
			location.href="exam_page.php";

		</script>
		
	<?php	//header("Location:");
	}
	else{
		$new_id = $id-1;
		$query = "SELECT * FROM $user_table WHERE sn = '$new_id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		
		if($id <= mysqli_fetch_lengths($result)){
		echo "<p><b>" . $row["sn"]. ") \t\t" .$row["question"] . "</b></p>";
		$_SESSION['sn'] = $row['sn'];


		if($query = "SELECT * FROM $user_table WHERE sn = $id-1"){
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);

				$url = "process5.php";
				$input = file_get_html($url);
				$check = array();

				foreach($input->find('input[value="'.$row['candidate_answer'].'"]') as $i){
					$check[] = $i->value;

				
				
		
	?>
	<br><br><br>
	<form method="POST" name="question_form" action="process5.php" enctype="text">
	
		<p>a) <input type="radio" name="choice[]" value="a" <?php if($row['candidate_answer'] == $check ){
					$i->checked = true; } ?> > <?php echo $row["a"]; ?></p>
		<p>b) <input type="radio" name="choice[]" value="b" <?php if($row['candidate_answer'] == $check ){
					$i->checked = true; } ?> > <?php echo  $row["b"]; ?></p>
		<p>c) <input type="radio" name="choice[]" value="c" <?php if($row['candidate_answer'] == $check ){
					$i->checked = true; }?>> <?php echo $row["c"]; ?></p>
		<p>d) <input type="radio" name="choice[]" value="d" <?php if($row['candidate_answer'] == $check ){
					$i->checked = true; }?>> <?php echo $row["d"]; ?></p>

		<p>
			<input type="submit" formaction="goback.php" value="Previous Question">	
			<input type="submit" value="Next Question"> </p>
	</form>


<?php 
}
				

				if($row['candidate_answer'] == $check ){
					echo $row['candidate_answer'] ." " . $check;
				// 	//echo '<input type="radio" name="choice[]" value="'. $row['candidate_answer'] . '" checked> ';
				// }

			}
} 
    
			
}
}
} 

?>

</body>
</html>