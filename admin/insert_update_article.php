<?php 

$id = $_GET['update_id']; 
if(isset($_POST['update_article'])){
    $title =htmlentities((mysqli_real_escape_string($conn,$_POST['title'])));
    $short_description =htmlentities((mysqli_real_escape_string($conn,$_POST['short_description'])));
    $content =htmlentities((mysqli_real_escape_string($conn,$_POST['content'])));

    $fileName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $image = '..\imagepost/'. $fileName;
   
 if(  move_uploaded_file($tmpName,$image)){

      
    
        $sql = "UPDATE `blog_posts` SET `post_id`='$id',`post-title`='$title',`short_description`='$short_description',`post_content`='$content',`post_image`='$fileName',`post_date`=now() WHERE post_id='$id' ";
        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "Post Updte Successfully" . mysqli_error($conn);
            header("Location: add_article.php?msg=Post Updated Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Unable to Update Post" . mysqli_error($conn);
            header("Location: add_article.php?msg=Unable to Update Post. ");
            exit(0);
        }
    }
 }


 $sql = "SELECT * FROM `blog_posts` WHERE post_id = $id ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
?>