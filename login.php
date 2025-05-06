<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	
	<script type="text/javascript">
            function login()
            {
                var str1 = document.getElementById('uname').value.toString();
                var str2 = document.getElementById('pwd').value.toString();
                if(str1.length<=0 || str2.length<=0)
                {
                    alert("Please provide values for both fields.") ;
                     location.href = "invalid_login.php";
                }
                location.href = "invalid_login.php";
            }
        </script>
</head>
<body>
	<?php require_once("header.php"); ?>
	<br>
	<div class="container" style="width:40%">
		<h3>Candidate Login Page</h3><br>                
			<form action="validate2.php" onsubmit="login()" method="GET" enctype="text">
			    <div class="form-group">
			      <label for="username">Username:</label>
			      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname">
			    </div>

			    <div class="form-group">
			      <label for="Password">Password:</label>
			      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
			    </div>

			     <input type="submit" value="Login" class="btn btn-primary" >
			  
			</form>
	</div>


</body>
</html>