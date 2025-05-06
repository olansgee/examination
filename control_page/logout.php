<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	 <?php
        if(!isset($_SESSION["user"]) || empty($_SESSION["user"]))
        {
            die("You have logged out already! <script> location.href = 'index.php' </script>");
        }
        else{
            
            session_destroy();
        header('Location:index.php');
        }
        ?>

</body>
</html>