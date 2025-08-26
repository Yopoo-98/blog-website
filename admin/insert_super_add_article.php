<?php 
session_start();
include"..\includes/connection.php";

if(isset($_POST['submit_article'])){
    $title =htmlentities((mysqli_real_escape_string($conn,$_POST['title'])));
    $short_description =htmlentities((mysqli_real_escape_string($conn,$_POST['short_description'])));
    $content =htmlentities((mysqli_real_escape_string($conn,$_POST['content'])));
    $user_id =htmlentities((mysqli_real_escape_string($conn,$_POST['user_id'])));
    $lname =htmlentities((mysqli_real_escape_string($conn,$_POST['lname'])));
    $fname =htmlentities((mysqli_real_escape_string($conn,$_POST['fname'])));
    $admin_id= "";
    $status="1";

    if($_FILES["image"]["error"]=== 4){
        echo"
        <script>alert('Image does not Exit');</script>
        ";
    }
    else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
    
        $validImageExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.' , $fileName);
        $imageExtension = strtolower(end($imageExtension));
    
        if(!in_array($imageExtension,$validImageExtension)){
            echo"
            <script>alert('Invalid Image Extension');</script>
            ";
        }
        // else if($fileSize > 1000000){
        //     echo"<script>alert(' Image Size Is Too Large');</script>";
                       
        // }
        else{
            $newImageName = uniqid();
            $newImageName .= '.'  . $imageExtension;
    
            move_uploaded_file($tmpName, '..\imagepost/'. $newImageName);
       
        $sql = "INSERT INTO `blog_posts` ( `user_id`,`fname`, `lname`, `title`, `description`, `content`, `content_image`, `date`, `status`) VALUES ('$user_id','$fname','$lname','$title','$short_description','$content','$newImageName',now(),'$status')";
        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "New Post Added Successfully" . mysqli_error($conn);
            header("Location: admin_manage_posts.php?msg=New Post Added Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Account not created successfully" . mysqli_error($conn);
            header("Location: admin_add_posts.php?msg=Account not created successfully. ");
            exit(0);
        }
    }
 }
}
?>