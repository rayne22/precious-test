<?php
// Include the database configuration file
include 'database/dbConfig.php';
$con = mysqli_connect(serverName, userName, password, dbName);

  $email=$_POST['email'];
  $password=$_POST['password'];

if(isset($_POST['login'])){
  $encyp_pass  = md5($password);
  

  $sql = "SELECT * FROM user WHERE email = '$email' ";
  // $result = $con->query($sql);

  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1){
    $fetch_role = mysqli_fetch_object($result);
    $role = $fetch_role->u_role;

     if($role == 'student'){

      $_SESSION['student']=$fetch_role->email;
      header('location: Student_Dashboard.php');
      // header ('location: Student_Dashboard.php');
     }
      elseif($role == 'admin'){
       $_SESSION['admin']=$fetch_role->email;
      header('location: AdminDashboard.php');
     }else {
  echo "Something went wrong";
 }
}
}
?>