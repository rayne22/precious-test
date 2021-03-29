<?php
session_start();
// Include the database configuration file
    include ('database/dbConfig.php');


      //Check if login button has been pressed
      if (isset($_POST['login'])) {
        $con = mysqli_connect(serverName, userName, password, dbName); //Database Connection

        //prevent sql injection
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']); 
    
        //Check if fields are empty
        if(empty($email)&&empty($password)){
          $error= 'please enter email and password';
          }

        $encrypt_pass = md5($password); //Encrypt password

        $check_user_info = "SELECT * FROM users WHERE email='$email' AND password='$encrypt_pass'";
        $check_fac_code = "SELECT f_id FROM students WHERE email='$email'";
        $check_mc_code = "SELECT f_id FROM marketing_coordinator WHERE mc_email='$email'";




        $result = mysqli_query($con, $check_user_info) or die(mysqli_error($con));
        $fac_result = mysqli_query($con, $check_fac_code) or die(mysqli_error($con));
        $mc_result = mysqli_query($con, $check_mc_code) or die(mysqli_error($con));


        //Check if login credentials exist
        if(mysqli_num_rows($result) == 1) {
          $fetch_result = mysqli_fetch_object($result);
          $u_role = $fetch_result->roles; //Assign column name to object to load pages
          $fetch_fac_code = mysqli_fetch_object($fac_result);
          $fetch_mc_code = mysqli_fetch_object($mc_result);

          //Check for user role
          if($u_role == 'admin'){
            //Add to session and open page
            $_SESSION['admin'] = $fetch_result->email; //Assign email address to session
            header('location: AdminDashboard.php');


          }elseif($u_role == 'student'){
            //Add to session and open page
            $_SESSION['student'] = $fetch_result->email; //Assign email address to session
            $_SESSION['f_id'] = $fetch_fac_code->f_id;
            header('location: Student_Dashboard.php');

         
             }
             elseif($u_role == 'marketing_coordinator'){
            //Add to session and open page
            $_SESSION['MarketingCoordinator'] = $fetch_result->email; //Assign email address to session
             $_SESSION['f_id'] = $fetch_mc_code->f_id;

       
            header('location: MarketingCoordinator.php');

          }elseif($u_role == 'marketing_manager'){
            //Add to session and open page
            $_SESSION['MarketingManager'] = $fetch_result->email; //Assign email address to session
            header('location: MarketingManager.php');
          }
        }else{
          echo "Something went Wrong";
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
        <?php include "css/login.css"?>

    </style>

    <title>Login</title>
</head>

<body>
<div class="wrapper fadeInDown">
        <div id="formContent">
            <!--- Icon img --->
            <div class="fadeIn first">
                <img src="img/1200px-Crystal_Clear_app_Login_Manager.svg.png" id="icon" alt="User icon" />
            </div>


    <div>
        <div>
            <!--- Login Form --->
            <form method="POST" action="login.php">
                <input type="text" id="email" name="email" class="fadeIn second" placeholder="email">
                <input type="password" id="password" name="password" class="fadeIn third"  placeholder="password">
                <input type="submit" name="login" class="fadeIn fourth" value="Login">
            </form>
          

        </div>
    </div>
        </div>
    </div>
</body>

</html>
