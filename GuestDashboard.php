<?php

session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}
//Restrict admin or Moderator to Access user.php page
if($_SESSION['user']['role']=='admin'){
 header('location:AdminDashboard.php');
}
if($_SESSION['user']['role']=='marketing_coordinator'){
 header('location:MarketingCoordinator.php');
}
if($_SESSION['user']['role']=='students'){
 header('location:Student_Dashboard.php');
}
if($_SESSION['user']['role']=='marketing_manager'){
 header('location:MarketingManager.php');
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
    
    <title>Gest</title>
</head>
<body>
 
 <div id="profile">
<h2>User name is: <?php echo $_SESSION['user']['username'];?> and Your Role is :<?php echo $_SESSION['user']['role'];?></h2>
<div id="logout"><a href="logout.php">Please Click To Logout</a></div>
</div>
  
   
      <?php
   $script = file_get_contents('js/jquery/jquery-3.6.0.js');
   echo "<script>".$script."</script>";
    ?>
    <?php
   $script = file_get_contents('boostrap/bootstrap/js/bootstrap.bundle.min.js');
   echo "<script>".$script."</script>";
    ?>
   
</body>
</html>