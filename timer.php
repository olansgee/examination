<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Count Down</title>
</head>
<body>



<!-- 
				<script>
					// Set the date we're counting down to
					var countDownDate = new Date().setMinutes(new Date().getMinutes() + 30 ) ;

					// Update the count down every 1 second
					var x = setInterval(function() {

					  // Get today's date and time
					  var now = new Date().getTime();
					    
					  // Find the distance between now and the count down date
					  var distance = countDownDate - now;
					   // document.write(distance + " ")
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
					<p id="demo" style="background-color:#4caf50; color: white; width: 100%; margin-top: 5px;padding:5px; font-size:16px; border-radius:50px; text-align: center;">
				</p>
 -->

	<?php
	echo "Present time = " . time() . "<br>";
    $waiting_day = 1644422668 + (5*60*60*24);
    $time_left = $waiting_day - time();

    $days = floor($time_left / (60*60*24));
    $time_left %= (60 * 60 * 24);

    $hours = floor($time_left / (60 * 60));
    $time_left %= (60 * 60);

    $min = floor($time_left / 60);
    $time_left %= 60;

    $sec = $time_left;

    echo "Remaing time: $days days and $hours hours and $min min and $sec sec left";
?>

<!-- 
<?php
// $time_pre = microtime(true);
// echo("This line will be executed.\n");
// $time_post = microtime(true);
// $exec_time = $time_post - $time_pre;
// echo("The execution time is:\n");
// echo($exec_time);
?> -->



<?php

// You must call the function session_start() before
// you attempt to work with sessions in PHP!
// session_start();

// // Check to see if our countdown session
// // variable has been initialized.
// if(!isset($_SESSION['countdown'])){
//     //Set the countdown to 120 seconds.
//     $_SESSION['countdown'] = 120;
//     //Store the timestamp of when the countdown began.
//    $_SESSION['time_started'] = time();

// }

// Get the current timestamp.
// $now = time();
// echo "Now = ". $now . "<br>";
// echo "Starting time = ". $_SESSION['time_started'];
// // Calculate how many seconds have passed since
// // the countdown began.
// $timeSince = $now - $_SESSION['time_started'];
// echo "<h1>" . $timeSince. "</h1>";
// // //How many seconds are remaining?
// $remainingSeconds = ceil($_SESSION['countdown'] - $timeSince);

// // //Print out the countdown.
// echo "There are $remainingSeconds seconds remaining.";

// // //Check if the countdown has finished.
// if($remainingSeconds < 1){
//    die("Time Up"); //Finished! Do something.
  
// }
?>
</body>
</html>