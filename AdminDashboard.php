 <?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:login.php');
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['roles']=='students'){
 header('location:Student_Dashboard.php');
}
if($_SESSION['user']['roles']=='marketing_manager'){
 header('location:MarketingManager.php');
}
if($_SESSION['user']['roles']=='marketing_coordinator'){
 header('location:MarketingCoordinator.php');
}
if($_SESSION['user']['roles']=='guest'){
 header('location:GuestLogin.php');
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

    <title>Student Dashboard</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white"></div>
            <div class="card-block text-center text-white">
                <div class="m-b-25"> <img src="https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_960_720.png" class="img-radius" alt="User-Profile-Image"> </div>
                <h6 class="f-w-600">Update</h6>
                <p>Profile picture</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
            </div>
            <div class="list-group list-group-flush">
                <a href="<?php echo 'add_students.php'; ?>" class="list-group-item list-group-item-action bg-custom text-white">Students</a>
                <a href="<?php echo 'view_coordinator.php'; ?>" class="list-group-item list-group-item-action bg-custom text-white">Upload Images</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-custom" id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-dark bg-custom border-bottom">

                <button class="btn btn-danger" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#"> HEY <?php echo $_SESSION['user']['email'];?>: welcome to the <?php echo $_SESSION['user']['roles'];?> dashboard | <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
