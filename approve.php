 <?php
 include 'database/dbConfig.php';
 $con = mysqli_connect(serverName, userName, password, dbName); //Database Connection
     if(isset($_GET['a_id'])): ?>
        <?php $a_id = $_GET ['a_id']; ?>
        <?php $query = mysqli_query($con, " INSERT INTO approved (a_id,article_title,document_name,img_name) select a_id,article_title,document_name,img_name from articles WHERE a_id = '$a_id' ");
        if ($query) {
        	header("location:MarketingCoordinator.php");
        }
        ?>
        <?php endif; ?>