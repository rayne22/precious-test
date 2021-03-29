<?php 
include 'database/dbConfig.php';

$con = mysqli_connect(serverName, userName, password, dbName); //Database Connection
session_start();
var_dump($_SESSION);
//Checking user Logged or Not

    

//}

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

    <title>MarketingManager Dashboard</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white"></div>
            <div class="card-block text-center text-white">
                <div class="m-b-25"> <img src="https://cdn.pixabay.com/photo/2020/06/30/10/23/icon-5355896_960_720.png" class="img-radius" alt="User-Profile-Image"> </div>
               <p> <?php 
                           if(isset($_SESSION['MarketingManager'])){

                            $email = $_SESSION['MarketingManager'];
                            echo $email;}
                           ?> </p>

 <p> Marketing Manager</p>
            </div>
            <div class="list-group list-group-flush">
                <a href="<?php echo 'Student_Dashboard.php'; ?>" class="list-group-item list-group-item-action bg-custom text-white">Selected Articles</a>
                
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-custom" id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-dark bg-custom border-bottom">

                <button class="btn btn-danger" id="menu-toggle">Menu</button>

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

            <div class="container-fluid bg-custom">
                <div class="d-flex justify-content-center align-self-center" style="margin-top: 10px;">
                    
            
<?php
                    
                    // Attempt select query execution
                    $sql = "SELECT * from approved";
                    if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            
                            echo "<div class = 'table-responsive'>";
                            echo "<table class='table table-bordered table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Tag</th>";
                                        echo "<th>article_title</th>";
                                        echo "<th>document_name</th>";
                                        echo "<th>img_name</th>";
                                        echo "<th>Download</th>";                   
                                         

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['a_id'] . "</td>";
                                        echo "<td>" . $row['article_title'] . "</td>";
                                        echo "<td>" . $row['document_name'] . "</td>";
                                        echo "<td>" . $row['img_name'] . "</td>";
                                                                          

                                        echo "<td>";
                                             echo "<a href='view_article.php' class='btn btn-warning'>Download</a>";
                                             echo "</td>";
                                                        
                             
                                
                                          
                                     
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{

                            echo "<p class='lead'><em>No articles were found</em></p>";
                          echo "<div class = 'table-responsive'>";
                            echo "<table class='table table-bordered table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                            echo "<th>Tag</th>";
                                        echo "<th>article_title</th>";
                                        echo "<th>document_name</th>";
                                        echo "<th>img_name</th>";
                                              
                                         
                                          echo "<th>Download</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                    }
 
                    // Close connection
              


                    ?>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
   $script = file_get_contents('js/jquery/jquery-3.6.0.js');
   echo "<script>".$script."</script>";
    ?>
    <?php
   $script = file_get_contents('boostrap/bootstrap/js/bootstrap.bundle.min.js');
   echo "<script>".$script."</script>";
    ?>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

</body>

</html>
