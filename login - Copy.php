<?php
// Include the database configuration file
include 'database/dbConfig.php';

session_start();
if(isset($_POST['login'])){
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  if(empty($email)&&empty($password)){
  $error= 'please enter email and password';
  }
  else{
 // $result=mysqli_query($con,"SELECT*FROM users WHERE email='$email' AND password='" . md5($password) . "'");
  // $row=mysqli_fetch_assoc($result);
  // $count=mysqli_num_rows($result);
  //     if($count==1){
  //    $role =$row['f_id'];
  //    echo "$role";
  // }
  $sql = "SELECT * FROM users WHERE email='$email' AND ";
  $result = $con->query($sql);
  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
     $role = $row['roles']; 
     if($role == "student"){

      echo "it is student";
      // header ('location: Student_Dashboard.php');
     }
      elseif($role == "admin"){
       echo "it is admin";
        // header ('location: AdminDashboard.php');
    }
    }
   //   $_SESSION['rol'] = $role;

   // echo $_SESSION['rol'];
   // if ($_SESSION['rol'] == "student"){
   //   header('location: Student_Dashboard.php');
   // }
     

  }
// }die(print_r($sql));
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

            <!--- Login Form --->
            <form method="POST" action="login.php">
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="email">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" name="login" value="Login"><br>
                <input type="checkbox" onclick="myFunction()">Show Password 
            </form>

            <?php if(isset($error)){ echo $error; }?>
            <!--- Remind password --->
            <div id="formFooter">
                <div class="underlineHover btn text-muted" href="Student_Dashboard.php">Forgot Password?</div>
            </div>

        </div>
    </div>
    
                    <?php 
echo '<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>';
    ?>

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
