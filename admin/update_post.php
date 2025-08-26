<?php 
$conn =mysqli_connect ("localhost","root","","blog");

$id = $_GET['update_id']; 
if(isset($_POST['update_article'])){
    $title =htmlentities((mysqli_real_escape_string($conn,$_POST['title'])));
    $short_description =htmlentities((mysqli_real_escape_string($conn,$_POST['short_description'])));
    $content =htmlentities((mysqli_real_escape_string($conn,$_POST['content'])));

       
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

      
    
        $sql = "UPDATE `blog_posts` SET `post_id`='$id',`title`='$title',`description`='$short_description',`content`='$content',`content_image`='$newImageName',`date`=now() WHERE post_id='$id' ";
        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "Post Updted Successfully" . mysqli_error($conn);
            header("Location: manage_posts.php?msg=Post Updated Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Unable to Update Post" . mysqli_error($conn);
            header("Location: update_posts.php?msg=Unable to Update Post. ");
            exit(0);
        }
    }
 }
}

 $sql = "SELECT * FROM `blog_posts` WHERE post_id = $id ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="..\includes/header.css">

   

</head>
<body>
      <?php 
      include"..\includes/sidebar.php";



      $sql = "SELECT * FROM `blog_posts` WHERE post_id = $id ";
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($query);
      ?><br><br>


<div class="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 " >  

                    <?php
                        if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        '.$msg.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    ?>

                <div class="card-header">
                 
                        <div class="col-2">
                            
                        </div>

                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                           

                        <div class="col-4">
                            <h4 class="new-article">Update Post</h4>
                        </div>
                    
                </div>   <br><br>
                <div class="card-body">

                            <form action=" " method="post" enctype="multipart/form-data">
                                       
                                <div class="form-group mb-2">
                                    <h4>Article's Title</h4>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Article's Title" value="<?php echo $row['title']?>">
                                </div><br>
                                           
                                <div class="form-group mb-2">
                                    <h4>Short Description (Meta Description)</h4>
                                    <textarea type="text" name="short_description" class="form-control" cols="120" rows="6" placeholder="Enter Articles Description" ><?php  echo $row['description']?></textarea>
                                </div><br>
                                            
                                <div class="form-group mb-2">
                                    <h4>Long Description (Body Content)</h4>
                                    <textarea name="content" class="form-control"id="textarea1" cols="120" rows="20" id="" placeholder="Enter Article's Content" ><?php  echo $row['content']?></textarea>
                                </div><br>

                                <div class="form-group mb-2">
                                    <h4>Upload Image</h4>
                                    <input type="file" class="form-control" name="image"  ><br>
                                    <img src="..\imagepost/<?php echo $row['content_image'];?>" width="100px" height="100px">
                                </div><br>
                                      
                                 
                                <button type="submit" name="update_article" class="btn btn-primary">Update Post</button>
                            </form>

                        </div>        
            </div>
            <div class="col-md-2"></div>
        </div>
      </div>

    </div>
     
     
      
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<style>
     body{
      overflow: scroll;
    }
    #cover-pic img{
        width:100%;
        height:400px;
    }
    
    .card-header{
        display:flex;
    }
 .card-header #back a{
    text-decoration: none;
    font-size: 25px;
 }
 .card-header #back a:hover{
    color:coral;
    font-size: 25px;
 }
 .new-article{
    color:coral;
    font-size: 25px;
 }
</style>
