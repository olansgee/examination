<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<title>Validating Submission</title>
	
</head>
<body>
     <?php
     require_once("mysqli_connect.php");  
    
     $uname = $_GET["uname"];
     $pass = $_GET["pwd"];

     if (empty($uname) || empty($pass) ) {
                     header("Location:invalid_login.php");
                }

     if (isset($uname) && isset($pass)){

               $query =  "SELECT * FROM  candidates_tbl WHERE c_username='$uname' AND c_password='$pass' ";
                 $result = mysqli_query($con, $query);
                 $row = mysqli_fetch_array($result);
                 if ($row['c_username'] == $uname AND $row['c_password'] == $pass ){
                 $_SESSION['user'] = $row['c_username'];
                 $_SESSION['pwd'] = $row['c_password'];

                 header("Location:select_subject.php");
               }
               
               
               else{
                    header("Location:invalid_login.php");
               }
            }
            else{
                    header("Location:invalid_login.php");
               }

    // else if (empty($uname) || empty($pass)) {
    //       header("Location:invalid_login.php");
    
                  
            
    //       } else if ($user != $uname || $pswd != $pass) {
                
    //              header("Location:invalid_login.php");

    //       }

    //         else{
    //            header("Location:invalid_login.php");
    //              // $_SESSION["user"] = $uname;
    //              // $query = "select * from candidates_tbl where c_username = '$uname'";
    //              // $result = mysqli_query($con, $query);
    //              // $row = mysqli_fetch_array($result);
    //              // $_SESSION["fname"] = $row['c_fname'];
    //              // $_SESSION["lname"] = $row['c_lname'];
    //              // header("Location:select_subject.php");
                
    //         }

             // }

        
         
              // } 
        
        
        ?>

</body>
</html>