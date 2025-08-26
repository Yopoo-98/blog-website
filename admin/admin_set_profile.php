<?php 
 $conn = mysqli_connect("localhost","root","","blog");

   if(isset($_POST['profile-pic'])){
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


        $sql = "INSERT INTO `profile_photo`(`user_id`,`user_name`, `profession`, `image`,`date`) VALUES ('$user_id','$user_name','$profession','$newImageName',now() )";

        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "User Photo Added Successfully" . mysqli_error($conn);
            header("Location: admin_set_profile.php?msg=User Profile Photo Added Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Cover Photo Not Updated Successfully" . mysqli_error($conn);
            header("Location: admin_set_profile.php?msg=User Profile Photo Not Updated Successfully. ");
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
    <title>Profile</title>
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
      include"..\includes/admin_sidebar.php";
      ?><br><br>


    <div class="main-content">
          <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 " >  
                <div class="card-header">
                    <h4 class="text-center">Profile Picture Settings Dashbaord</h4>
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
                                    <input type="hidden" name="admin_id" class="form-control" value="<?php echo $row['user_id']?>" Required>
                                </div><br>             
                                <div class="form-group mb-2">
                                    <input type="hidden" name="email" class="form-control" value="<?php echo $row['email']?>"  Required>
                                </div><br>             
                                <div class="form-group mb-2">
                                    <label for="">Profession</label>
                                    <input type="text" name="profession" class="form-control" placeholder="Enter Your Profession" Required>
                                </div><br>             
                                <div class="form-group mb-2">
                                    <label for="">Upload Profile Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div><br>
                                 
                                <button type="submit" name="profile-pic" class="btn btn-success">Add Profile Picture</button>
                            </form>

                        </div>        
            </div>
            <div class="col-md-2"></div>
        </div>
          </div>
    


       
<div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><br><br>
            <table id="datatableid" class="table"  style="border:2px solid black; background-color:gray;" >
              <thead style="font-size:13px;" >
                <tr>
                  
                  <th class="text-light" style="border: 1px solid black;background:black">Profession</th>
                  <th class="text-light" style="border: 1px solid black;background:black">User Name</th>
                  <th class="text-light" style="border: 1px solid black;background:black">Profile Image</th>
                  <th class="text-light" style="border: 1px solid black;background:black">Posted Date</th>
                  <th class="text-light" style="border: 1px solid black;background:black">Action</th>
                  
                </tr>
              </thead>
              <tbody id="table-body" class=" table" style="color:navy; font-size: 16px; text-align: justify;">
                
                <?php

                     $sql = "SELECT * FROM `profile_photo` inner join blog_users where profile_photo.user_id = blog_users.user_id AND  blog_users.email = '".$_SESSION['email']."' ";
                    $query= mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)){
     /*to display the data in the table, in the bracket of the assoc function you interchage the php syntax 
     the question mark and greater than sign comes first and the less than and php goes down */                  
                      ?>
                        <tr>
                          
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['profession']?></td>
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['user_name']?></td>
                          <td class="text-dark" style="border: 1px solid black;background:white"><img src="..\img/<?php echo $row['image'];?>" alt="" style="width:100px"></td>
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['date']?></td>

                          <td style="border: 1px solid black;background:white;">
                            <a href="update_profile.php?update_id=<?php echo $row['profile_id']?>" id="post-update">Update</a>
                            <a onclick="return confirm('Do You Really Want to Delete This Record? ')"  href="delete_profile.php?delete_id=<?php echo $row['profile_id']?>" id="post-delete">Delete</a> 
                          </td>
                          
                        </tr>
                      
                      <?php
                    }
                ?>
              </tbody>
            </table>
            </div>

            <div class="col-md-2"></div>

        </div>
    </div>

    <?php 
    //  include"..\includes/footer.php";
      ?>
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
    #post-update{
        text-decoration: none;
        background-color: blue;
        color: white;
        border-radius: 5px;
    }
    #post-delete{
        text-decoration: none;
        background-color: red;
        color: white;
        border-radius: 5px;
    }
</style>
