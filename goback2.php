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
				$html = file_get_html($url);
				$ret = $html->find('input');
				for($id = 1; $id <= count($ret); $id++){

				if($ret[$id]->value == $row['candidate_answer']){
						if($ret[$id]->checked == 0 ){
							$ret[$id]->setAttribute('checked', true);
							echo $html->getElementById('form1');
							echo $html->find('text');
						
		
				// $check = array();

				// foreach($html->find('input[value="'.$row['candidate_answer'].'"]') as $i){
				// 	$check[] = $i->value;


	
}
					}
				}
				

						}
					}
				}
				

}
				


?>

</body>
</html>