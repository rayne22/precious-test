<?php
include 'database/dbConfig.php';

$con = mysqli_connect(serverName, userName, password, dbName); //Database Connection
if (isset($_POST['csubmit'])){
    $message = $_POST["mc_comment"];
    $aid = $_POST['hidden'];
    echo $message;

     $query = mysqli_query($con, " INSERT INTO comments (a_id,comment,c_date) 
     values (' $aid','$message',CURDATE())");
        if ($query) {
        	header("location:MarketingCoordinator.php");
        }
    
  
}


?>