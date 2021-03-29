/*if(isset($_POST['submit'])) deleted from coordinator script
{
    $filename = $_FILES['docx_file']['name'];
    $destination = 'uploads/'. $filename;
    
    $extention = pathinfo($filename,PATHINFO_EXTENSION);
    
    $file = $_FILES['docx_file']['tmp_name'];
    
    $size = $_FILES['docx_file']['size'];
    
    if(!in_array($extention,['docx']))
    {
        echo " Only .docx file allowed";
    }
    elseif($_FILES['docx_file']['size'] > 1000000)
    {
        echo "file is too large";
    }
    
    else{
        if(move_uploaded_file($file,$destination))
        {
            $sql = "INSERT INTO article (name,size,upload_date)
            VALUES('$filename','$size',NOW())
            ";
            
            if(mysqli_query($con,$sql))
            {
                echo "file uploaded successfully";
            }
            else{
                echo "failed to upload file";
            }
        }
    }
}*/

  <?php endforeach ; ?>*/
      <?php/* foreach($files as $file): ?>
                        <tr>
                            <th scope="row">0</th>
                            <td><?php echo $file['id'];?></td>
                            <td><?php echo $file['name'];?></td>
                            <td><?php echo $file['size'] / 1000 . "KB";?></td>
                            <td><?php echo $file['upload_date'];?></td>
                            <td>
                                <a href="Student_Dashboard.php?file_id=<?php
                                     $file['id']?>">Edit</a>
                            </td>
                        </tr>

                        case 'guest':
  header('location:GuestDashboard.php');
  break;

  <form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
  
  $mysql=mysqli_query($con, "SELECT email from users where email ='$email'");
        $row=mysqli_num_rows($mysql);
        if($row>0){
            echo "<script>alert('user already exists. Please enter a different email');</script>";
        }else{
*/

            if(isset($_SESSION['student'])){
    // $email = $_SESSION['student'];
  
}

$destination = 'uploads/'. $filename;
    
    $extention = pathinfo($filename,PATHINFO_EXTENSION);
    
    $file = $_FILES['docx_file']['tmp_name'];
    
    $size = $_FILES['docx_file']['size'];

    else{
        if(move_uploaded_file($file,$destination))
        {
            $sql = "SELECT * FROM users where email='".$_SESSION['student']."'' ";
            if(mysqli_query($con,$sql))
            {

            $sql = "INSERT INTO articles
             VALUES('$article_title','$document_name','$img_name','$upload_date','$email',NOW())where email='".$_SESSION['student']."''
            ";
            
            if(mysqli_query($con,$sql))
            {
                echo "file uploaded successfully";
            }
            else{
                echo "failed to upload file";
            }

            if(!in_array($extention,['docx']))
            {
                echo " Only .docx file allowed";
            }
            elseif($_FILES['docx_file']['size'] > 1000000)
            {
                echo "file is too large";
            }