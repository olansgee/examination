<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exam Summary View</title>
</head>
<body>
<?php
session_start();
require_once("mysqli_connect.php");
require_once("header.php");

$user = $_SESSION['user']  ;
$firstname = $_SESSION['fname'];
$lastname = $_SESSION['lname'];

if (!isset($user)){
		header("Location:invalid_login.php");
	}else{
	// 	echo "Hi, <b><i>" . $firstname ." " . $lastname . "</i></b><br>";
	// 	echo '<form action="logout.php">
	// 	<input type="submit" name="logout" value="Logout">
	// </form><br><br>';

$table_name = trim($firstname)."_".trim($lastname)."_". $_SESSION['subject'];
$_SESSION['table_name'] = $table_name;
$user_table = $_SESSION['table_name'];

$query = "SELECT * FROM $user_table";
$result = mysqli_query($con, $query);



    
    while($row = mysqli_fetch_array($result)){
	
?>

	<button name="sub" id="sub"  value="<?php echo $row['sn']; ?>" style="width: 30px;height: 30px; font-size: 20px; font-family: calibri; margin: 6px; background-color: <?php if(empty($row['candidate_answer'])){echo 'white';}else {echo 'black';}  ?>;" >
		<a href="recap.php?id=<?php echo $row['sn']; ?>" class="link1" style="text-decoration:none; ">
			<?php echo $row['sn'];?>
				
		</a>
	</button>
<?php 
		} 


	}
?>

<form action="submit_exam.php" method="POST" enctype="text">
	<input type="submit" name="submit_exam" value="SUBMIT EXAM">
</form>
</body>
</html>
