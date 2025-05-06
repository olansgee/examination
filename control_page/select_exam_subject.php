<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lock/Unlock Subject(s)</title>
</head>
<body>
	
	<?php 
	require_once("../mysqli_connect.php"); 
	require_once("header.php"); 
	
	?>

	<a href="admin_panel.php">Admin Panel</a>
	<center> <h3>Unlock Subject for Examination</h3> </center>
<br>
<br>
	<table align="center" cellpadding="10px">
		<tr> 
			<th>Check </th>
			<th>Info </th>
			<th>Button </th>
		</tr>
	<?php 
	$query = "SELECT * FROM lock_control";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
	?>

	<form method="POST"  action="unlock_subject.php">
	<tr>
		<td>	
			<input type="checkbox" name="subject" value="<?php echo strtolower($row['subject']); ?>" >
		</td>
		<td style="text-align: right;"> 
			<?php echo ucwords($row['subject']) . " exam table <strong><i>is " . $row['lock_status'] . "</i></strong>"; ?>
		</td>
		<td>
			<input type="submit" name="submit" value="<?php if ($row['lock_status']=="unlocked"){echo  "Lock " . ucwords($row['subject']). "?";} else{echo "Unlock " . ucwords($row['subject']). "?";}?> " style="padding: 5px;"> 
		</td>
	</tr>
	</form>
	
	<?php } ?>
	</table>
</body>
</html>