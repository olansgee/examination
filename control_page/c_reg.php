<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	require_once("../mysqli_connect.php"); 
	require_once("header.php"); 
	?>
  <a href="admin_panel.php">Admin Panel</a>
  <center>
    <h1>Candidate Registration Page</h1>
  </center>
  <br>
<div class="container" style="width:40%">

  <h4>Candidate Details</h4>
  <form method="POST" action="c_reg_data.php" enctype="multipart/form-data">
   <div style="border: dashed 1px black; padding: 10px;border-radius: 10px;">
   
    <div class="form-group">
      <label for="first name">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname">
    </div>

    <div class="form-group">
      <label for="last name">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname">
    </div>
   <hr>
    <div class="form-group">
      <label for="candidate no">Candidate No:</label>
      <input type="text" class="form-control" id="c_no" placeholder="Enter examination number" name="c_no">
    </div>
    <div class="form-group">
      <label for="Username">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname">
    </div>


    <div class="form-group">
      <label for="Password">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>

    <div class="form-group">
      <label for="Confirm password">Confirm password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Enter password again" name="cpswd">
    </div>
    <hr>

    <div class="form-group">
      <label for="class">Class:</label>
      <select class="form-control" id="class" name="class">
        <option selected>Select Class</option>
        <option>Basic_1</option>
        <option>Basic_2</option>
        <option>Basic_3</option>
        <option>Basic_4</option>
        <option>Basic_5</option>
        <option>Basic_6</option>
        <option>JSS_1</option>
        <option>JSS_2</option>
        <option>JSS_3</option>
        <option>SSS_1</option>
        <option>SSS_2</option>
        <option>SSS_3</option>
    
      </select>
    </div>


     <div class="form-group">
      <label for="arm">Arm:</label>
      <select class="form-control" id="arm" name="arm">
        <option selected>Select Class Arm</option>
        <option>A</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
        <option>E</option>
      </select>
    </div>

     <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="telephone">Telephone:</label>
      <input type="telephone" class="form-control" id="telephone" placeholder="Enter telephone" name="telephone">
    </div>

    <div class="form-group">
      <label for="Gender">Gender</label><br>
       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
       <input type="radio" class="form-check-input" name="gender[]"  value="Female" checked>Female<br>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <input type="radio" class="form-check-input" name="gender[]" value="Male">Male<br> 
    </div>
  <hr>

    <div class="form-group">
      <label for="Religion">Religion</label><br>
       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
       <input type="radio" class="form-check-input" name="religion[]" value="Christainity">Christianity<br>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <input type="radio" class="form-check-input" name="religion[]" value="Islam">Islam<br> 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <input type="radio" class="form-check-input" name="religion[]" value="Traditionalist" checked>Traditionalist
    </div>

  <hr>
    

    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" class="form-control" id="fname" placeholder="Enter age" name="age">
    </div>


    <div class="form-group">
      <label for="location">Location:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter location" name="location">
    </div>


    <div class="form-group">
      <label for="State of Origin">State of Origin:</label>
      <select class="form-control" id="sofo" name="sofo">
        <option selected>Select State of Origin</option>
        <option>Abia</option>
        <option>Adamawa</option>
        <option>Akwa Ibom</option>
        <option>Anambra</option>
        <option>Bauchi</option>
        <option>Bayelsa</option>
        <option>Benue</option>
        <option>Borno</option>
        <option>Cross River</option>
        <option>Delta</option>
        <option>Ebonyi</option>
        <option>Edo</option>
        <option>Ekiti</option>
        <option>Enugu</option>
        <option>Gombe</option>
        <option>Imo</option>
        <option>Jigawa</option>
        <option>Kaduna</option>
        <option>Kano</option>
        <option>Katsina</option>
        <option>Kebbi</option>
        <option>Kogi</option>
        <option>Kwara</option>
        <option>Lagos</option>
        <option>Nasarawa</option>
        <option>Niger</option>
        <option>Ogun</option>
        <option>Ondo</option>
        <option>Osun</option>
        <option>Oyo</option>
        <option>Plateau</option>
        <option>Rivers</option>
        <option>Sokoto</option>
        <option>Taraba</option>
        <option>Yobe</option>
        <option>Zamfara</option>

       </select>
    </div>


    <div class="form-group">
      <label for="home town">Home Town:</label>
      <input type="text" class="form-control" id="htown" placeholder="Enter home town" name="htown">
    </div>

    <div class="form-group">
          <label for="image" style="font-style: oblique;"><b>Upload passport photograph:</b></label>
          <input type="file" name="passport" class="form-control" id="passport"  accept="image.jpg/image.gif/image.png/image.jpeg" size="50">
    </div>

  </div>    


   <br>
   
    <input type="submit" value="Submit" class="btn btn-primary">
  </form>
</div>

<br>

</body>
</html>