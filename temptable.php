<?php 
require_once("mysqli_connect.php");
$query = "create temporary table temptable(
	fname varchar(20),
	lname varchar(20),
	age int(2),
	score1 int(3),
	score2 int(3)
)";

$result = mysqli_query($con, $query);			
if ($result){
	echo "Temporary table created succesfully<br>";
}
else {
	"Failure to create temporary table<br>";
}

$query = "insert into temptable 
			values('Ola', 'Soneye', 3, 100, 95),
			('Ade', 'Soneye', 3, 100, 100)";

$result = mysqli_query($con, $query);			
if ($result){
	echo "Data added successfully<br>";
}
else {
	"Failure to add data<br>";
}
$query = "select fname, lname, age, score1, score2, (score1 + score2) as 'total_score' from temptable";

$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){

$fname =$row['fname'];
$lname =$row['lname'];
$age =$row['age'];
$score1 =$row['score1'];
$score2 =$row['score2'];
$total_score =$row['total_score'];



echo $fname ."\t\t" . $lname ."\t\t ". $age ."\t\t" . $score1 ."\t\t" . $score2 ."\t\t" . $total_score ."<br>";
}
mysqli_close($con);

?>