<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Examination</title>
	<?php 
	require_once("mysqli_connect.php");
	require_once("header.php");
	?>
	<script type="text/javascript">
		function close_parent(){
		newWin.opener.close()
		return
	}
	</script>

</head>
<body onload="return close_parent()">
	
	<div class="container-fluid" >
		<div class="row" style="background-color: aqua">
			
			<div class="col-lg-6">
				<center>
					<img src="images/olansgee_logo.png" style="width:100px; margin-top:10px;margin-bottom: 5px;float: left;">
					<h4 style="float: left; margin-top: 15px; margin-left: 25px;">Olansgee Technology Online Exam</h4>
				</center>
			</div>
			<div class="col-lg-4">
				<?php
	
					$user = $_SESSION['user']  ;
					$firstname = $_SESSION['fname'];
					$lastname = $_SESSION['lname'];
					
					$table_name = trim($firstname)."_".trim($lastname)."_". $_SESSION['subject'];
					$_SESSION['table_name'] = $table_name;
					$user_table = $_SESSION['table_name'];
				
					

					if (!isset($user)){
						header("Location:invalid_login.php");
					}else{
						echo "Hi, <b><i>" . $firstname ." " . $lastname . '</i></b>	';
				}
				$table_name = trim($firstname)."_".trim($lastname)."_". $_SESSION['subject'];
					$_SESSION['table_name'] = $table_name;
					$user_table = $_SESSION['table_name'];
					//echo "<h1>". $user_table . "</h1>";
				$query = "SELECT min(submit_time) div 60 as 'time_elapse' FROM $user_table ";
				$result = mysqli_query($con, $query);
				$row = mysqli_fetch_array($result);
				$time_elapse = $row['time_elapse'];
				if ($time_elapse == null  ){ ?>
					<script>

					// Set the date we're counting down to
					var countDownDate = new Date().setMinutes(new Date().getMinutes() + 60) 

				
					// Update the count down every 1 second
					var x = setInterval(function() {

					  // Get today's date and time
					  var now = new Date().getTime();

					    
					  // Find the distance between now and the count down date
					  var distance = countDownDate - now;
					    
					  // Time calculations for days, hours, minutes and seconds
					  //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
					    
					  // Output the result in an element with id="demo"
					  document.getElementById("demo").innerHTML =  hours + "h "
					  + minutes + "m " + seconds + "s ";
					    
					  // If the count down is over, write some text 
					  if (distance < 0) {
					    clearInterval(x);
					    document.getElementById("demo").innerHTML = "TIME UP!";
					  }
					}, 1000);


					</script>

				<?php
							$countdown = "<script> document.write(countDownDate)</script>" ; ;
				}
				else{

				// $row = mysqli_fetch_array($result);

				// $time_elapse = $row['time_elapse'];
				// //echo "<h1>". $time_elapse . "</h1>";
				
				

				
				?>
				
				<script>

					// Set the date we're counting down to
					var countDownDate = new Date().setMinutes(new Date().getMinutes() + (<?php echo $time_elapse;?>)) 

				
					// Update the count down every 1 second
					var x = setInterval(function() {

					  // Get today's date and time
					  var now = new Date().getTime();

					    
					  // Find the distance between now and the count down date
					  var distance = countDownDate - now;
					    
					  // Time calculations for days, hours, minutes and seconds
					  //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
					    
					  // Output the result in an element with id="demo"
					  document.getElementById("demo").innerHTML =  hours + "h "
					  + minutes + "m " + seconds + "s ";
					    
					  // If the count down is over, write some text 
					  if (distance < 0) {
					    clearInterval(x);
					    document.getElementById("demo").innerHTML = "TIME UP!";
					  }
					}, 1000);


					</script>


			<?php	
				$countdown = "<script> document.write(countDownDate)</script>" ;
					//echo $countdown;
					
			}
								
					?>

					<form action="logout.php" style=" margin-top:5px;margin-bottom: 4px;">
					<input type="submit" name="logout" value="Logout" style="padding: 2px;">
					</form>	
			
			</div>
			<div class="col-lg-2">
				<p id="demo" style="background-color:tomato; color: white; width: 100%; margin-top: 5px;padding:5px; font-size:16px; border-radius:50px; text-align: center;">
				</p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-1">
				
			</div>
			<div class="col-lg-10">
				<iframe src="exam_page.php" width="100%" height="380px" frameborder="0" ></iframe>	
			</div>
			<div class="col-lg-1">			
			</div>
		</div>
	</div>	

</body>
</html>