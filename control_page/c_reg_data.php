<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <title>Candidate Registration</title>
    <?php 
    require_once("../mysqli_connect.php"); 
    require_once("header.php"); 
    ?>
</head>
<body>
<?php


$fname = mysqli_real_escape_string($con,$_POST['fname']);
$lname = mysqli_real_escape_string($con,$_POST['lname']);
$c_no = mysqli_real_escape_string($con,$_POST['c_no']);
$_SESSION['regno'] = $c_no;
$email = mysqli_real_escape_string($con, $_POST['email']);
$uname = mysqli_real_escape_string($con, $_POST['uname']);
$pswd = $_POST['pswd'];
$cpswd = $_POST['cpswd'];
$class = mysqli_real_escape_string($con, $_POST['class']);
$class_arm = mysqli_real_escape_string($con, $_POST['arm']);
$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
$gender = $_POST['gender'];
$gen = " ";
 foreach($gender as $gen){
    $gen . " " ;
 }

$religion = $_POST['religion'];
$rel = " ";
 foreach($religion as $rel){
    $rel . " " ;
 }


$age = mysqli_real_escape_string($con, $_POST['age']);
$location = mysqli_real_escape_string($con, $_POST['location']);
$sofo = mysqli_real_escape_string($con, $_POST['sofo']);
$htown = mysqli_real_escape_string($con, $_POST['htown']);
$passport = $_FILES['passport']['name'];
$passportTempName = $_FILES['passport']['tmp_name']; 
$passportType = $_FILES['passport']['type']; 
$passportSize = $_FILES['passport']['size'];

//time parameters
$datetime=date('y/m/d h:i:s'); //create date and time
$datetime1=date('ymdhis');

// if the mime type is anything other than what we specify below, kill it     
if(!( 
$passportType=='image/jpg' || 
$passportType=='image/jpeg' || 
$passportType=='image/png' || 
$passportType=='image/gif' 
))
{ 
echo "YOU DID NOT UPLOAD IMAGE1 <br>";
echo "OR <br>";
echo "Passport ". $passport .  " is not in acceptable format.<br>"; 
echo  '<a href="admin_console.php">Click here</a> to try again.'; 
die(); 
} 


list($width, $height, $typeb, $attr) = getimagesize($passportTempName); 

     
// if width is over 300 px or height is over 450 px, kill it     
if($width>2000 && $height>2000) 
{ 
echo $passport . "'s dimensions exceed the 2000x2000 pixel limit."; 
die(); 
} 




// if the file size is larger than 100 KB, kill it 
if($passportSize > 1000000) { 
echo "Your passport size  is over 1MB. Please make it smaller"; 
die();
}



 




// Where the file is going to be placed
$target= "../passport/";
/* Add the original filename to our target path.
Result is "image/filename.extension" */

@$new_passportName = current(explode(".", $passport))   . $datetime1 . "." . end(explode(".", $passport));

$target = $target . basename($new_passportName);
if(move_uploaded_file($passportTempName , $target)) {
echo "The file ". basename($new_passportName). " has been uploaded";
} 
else{
echo "There was an error uploading image1, please try again!";
}




$query = "INSERT INTO candidates_tbl (c_fname, c_lname, c_regno, c_email, c_username, c_password, c_cpassword, c_class, c_arm, c_tel, c_gender, c_religion, c_age, c_location, c_sofo, c_htown, c_passport)
VALUES('$fname', '$lname', '$c_no', '$email', '$uname', '$pswd', '$cpswd', '$class', '$class_arm', '$telephone', '$gen', '$rel', '$age', '$location', '$sofo', '$htown', '$new_passportName')";

if (!$result = mysqli_query($con, $query)){
    die("<br><h3>Failed to submit data!</h3>" . mysqli_error($con));
    }
    else{
      $query = "INSERT INTO exam_score_table (c_fname, c_lname, c_class, c_cl_arm, c_regno) VALUES ('$fname', '$lname', '$class', '$class_arm', '$c_no')";
      $result = mysqli_query($con, $query);
    }




$con->close();

?>

 <div style="background-color: #999999;margin-top: 20px"> <a href="index.php" style="font-size: 18px;font-weight: bold; margin-left: 20px"><img src="../images/arrow-bar-left.svg"> Home</a></div>
</body>
</html>
