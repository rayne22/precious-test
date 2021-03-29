<?php
$msg="";
if(isset($_POST['submit'])){
 include('database/dbConfig.php');
// Code user Registration
$con = mysqli_connect(serverName, userName, password, dbName); //Database Connection
if(isset($_POST['submit']))
{


        $mm_email = $con->real_escape_string ($_POST['mm_email']);
        $f_name= $con->real_escape_string ($_POST['f_name']);
        $l_name= $con->real_escape_string ($_POST['l_name']);
        $password = $con->real_escape_string ($_POST['password']);
        $hashpass = md5($password);
      

        $sql2 = "INSERT INTO `marketing_manager` (mm_email,f_name,l_name) VALUES ('$mm_email',$f_name','$l_name')";
		mysqli_query($con, $sql2);

	$sql = "INSERT INTO `users` (email,password,roles) VALUES ('$mm_email','$hashpass','marketing_manager')";
	mysqli_query($con, $sql);
	

// 	if (mysqli_query($con, $sql)) {

		


// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($con);

//     }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boostrap -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        <?php include "boostrap/bootstrap/css/bootstrap.min.css"?>

    </style>
    <style>
        <?php include "css/dashboard.css"?>

    </style>

    <title>Marketing Manager</title>
    
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white"></div>
            <div class="card-block text-center text-white">
                <div class="m-b-25"> <img src="https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_960_720.png" class="img-radius" alt="User-Profile-Image"> </div>

            </div>
            <div class="list-group list-group-flush">
                <a href="<?php echo 'add_students.php'; ?>" class="list-group-item list-group-item-action bg-custom text-white">Add Students</a>
                <a href="<?php echo 'add_coordinator.php'; ?>" class="list-group-item list-group-item-action bg-custom text-white">Add Marketing Coordinator</a>
                <a href="<?php echo 'addmanager.php'; ?>" class="list-group-item list-group-item-action bg-custom text-white">Add Marketing Manager</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-custom" id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-dark bg-custom border-bottom">

                <button class="btn btn-danger" id="menu-toggle"> Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        
                        
                      
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <h3> Add Marketing Manager</h3><br>
	<form action="addmanager.php" method="POST">

		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2" >Email Address <span>*</span></label>
	    	<input type="email" class="adding" id="mm_email" onBlur="userAvailability()" name="mm_email" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
	  	</div>
<div class="form-group">
	    	<label class="info-title" for="password">Password. <span>*</span></label>
	    	<input type="password"  class="adding" id="password" name="password"  required >
	  	</div>

	  


	  	<div class="form-group">
	    	<label class="info-title" for="f_name">First Name. <span>*</span></label>
	    	<input type="" class="adding"  id="f_name" name="f_name"  required >
	  	</div>
	  		<div class="form-group">
	    	<label class="info-title" for="l_name">Last Name. <span>*</span></label>
	    	<input type="" class="adding"   id="l_name" name="l_name"  size="35"  required >
	  	</div>


	  	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Register</button>
	</form>
	</body>

</html>
	