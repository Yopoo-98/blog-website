<?php 
 $conn = mysqli_connect("localhost","root","","blog");

 $id = $_GET['update_id']; 
   if(isset($_POST['update_profile_pic'])){
    $profession =htmlentities((mysqli_real_escape_string($conn,$_POST['profession'])));
    $user_id =htmlentities((mysqli_real_escape_string($conn,$_POST['user_id'])));
    $user_name =htmlentities((mysqli_real_escape_string($conn,$_POST['user_name'])));


    
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
    else if($fileSize > 1000000){
        echo"<script>alert(' Image Size Is Too Large');</script>";
                   
    }
    else{
        $newImageName = uniqid();
        $newImageName .= '.'  . $imageExtension;

        move_uploaded_file($tmpName, '..\img/'. $newImageName);


        $sql = "UPDATE `admin_profile_photo` SET `admin_profile_id`='$id',`admin_id`='$admin_id',`email`='$email',`profession`='$profession',`image`='$newImageName',`date`=now() WHERE admin_profile_id ='$id' ";

        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "Profile Photo Updated Successfully" . mysqli_error($conn);
            header("Location: profile.php?msg=User Profile Photo Updated Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Profile Photo Not Updated Successfully" . mysqli_error($conn);
            header("Location: profile.php?msg=User Profile Photo Not Updated Successfully. ");
            exit(0);
        }
    }
 
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
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

      $sql = "SELECT * FROM `profile_photo` WHERE profile_id = $id ";
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($query);
      ?><br><br>

<div class="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 " >  
                <div class="card-header">
                    <h4 class="text-center">Update Profile Picture</h4>
                </div>   
                <div class="card-body">

                                <?php
                                if(isset($_GET['msg'])){
                                $msg = $_GET['msg'];
                                echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                '.$msg.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                }
                                ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <?php 
                                
                                $sql = "SELECT * FROM `blog_users` ";
        
                                $query = mysqli_query($conn,$sql);
                            
                                $result = mysqli_fetch_assoc($query);
                                ?>
                                       
                                <div class="form-group mb-2">
                                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']?>" Required>
                                </div><br>             
                                <div class="form-group mb-2">
                                    <input type="hidden" name="user_name" class="form-control" value="<?php echo $row['user_name']?>"  Required>
                                </div><br>             
                                <div class="form-group mb-2">
                                    <label for="">Profession</label>
                                    <input type="text" name="profession" class="form-control" placeholder="Enter Your Profession" value="<?php echo $row['profession']?>" Required>
                                </div><br>             
                                <div class="form-group mb-2">
                                    <label for="">Re - Upload Image</label>
                                    <input type="file" class="form-control" name="image"><br>
                                    <img src="..\img/<?php echo $row['image']?>" alt="" style="width:100px">
                                </div><br>
                                      
                                 
                                
                                <button type="submit" name="update_profile_pic" class="btn btn-primary" >Update Profile Picture</button>
                                <button type="submit" name="" class="btn btn-danger" id="update-photo"><a href="profile.php">Back</a></button>
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
    #update-photo a{
        color: white;
        text-decoration: none;
    }
 
</style>
