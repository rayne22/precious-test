<?php

// Database configuration
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "uni_magazine";

//create connection 

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect!";
        exit();
}
    
?>
