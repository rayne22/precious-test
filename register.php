<?php
$msg="";
if(isset($_POST['submit'])){
 include('database/dbConfig.php');
// Code user Registration
$con = mysqli_connect(serverName, userName, password, dbName); //Database Connection
if(isset($_POST['submit']))
{


        $email = $con->real_escape_string ($_POST['email']);
        $password = $con->real_escape_string ($_POST['password']);
        $roles = $con->real_escape_string ($_POST['roles']);
        $hashpass = md5($password);
      



	$sql = "INSERT INTO `users` (email,password,roles) VALUES ('$email','$hashpass','$roles')";
	mysqli_query($con, $sql);
	}
}
?>
	<form action="register.php" method="POST">

		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="email" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
	  	</div>
<div class="form-group">
	    	<label class="info-title" for="password">Password. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="password" name="password"  required >
	  	</div>

	<label for="roles">Roles:</label>
		 <select name="roles">
                        <option value="student">student</option>
                        <option value="manager">manager</option> 
                        <option value="coordinator">coordinator</option>
                           <option value="admin">admin</option>
                       
                        
                     </select><br><br>


	  	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Register</button>
	</form>

	