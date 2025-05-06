<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<title>Validating Submission</title>
	
</head>
<body>
     <?php
     require_once("../mysqli_connect.php");  
    
     $username = $_GET["username"];
     $pass = md5($_GET["pwd"]);

     if (empty($username) || empty($pass)) {
          header("Location:invalid_login.php");
     }

          if (isset($username) && isset($pass)){
           

            $query =  "SELECT * FROM  admin_tbl WHERE a_uname='$username' AND a_pswd = '$pass'";
                 $result = mysqli_query($con, $query);
                 $row = mysqli_fetch_array($result);

                  $user = $row['a_uname'];
                  $pswd = $row['a_pswd'];
                  
            
            if ($user != $username || $pswd != $pass) {
                 header("Location:invalid_login.php");
                 }

            else{
                 $_SESSION["user"] = $user;
                 header("Location:admin_panel.php");
                
            }
            
            }
         
   
        
        ?>

</body>
</html>