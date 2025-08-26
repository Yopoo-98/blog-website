<?php 
 $conn = mysqli_connect("localhost","root","","blog");

 $sql = "SELECT * FROM `admin` ";
    
 $query = mysqli_query($conn,$sql);

 $result = mysqli_fetch_assoc($query);

 

   if(isset($_POST['cover_update'])){
    $fileName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $random_number = rand(1,100);

    $image = '..\cover/'. $fileName.$random_number;
   
 if(move_uploaded_file($tmpName,$image)){
        $sql = "UPDATE `blog_users` SET `cover_pic`='$fileName' ";

        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "Cover Photo Updated Successfully" . mysqli_error($conn);
            header("Location: register.php?msg=Cover Photo Updated Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Cover Photo Not Updated Successfully" . mysqli_error($conn);
            header("Location: register.php?msg=Cover Photo Not Updated Successfully. ");
            exit(0);
        }
    }
 
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Users</title>
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
      include"..\includes/super_admin_header.php";
      ?>

      <div class="container-fluid" id="profile-pic-bg" ><br>
        <div class="row">
            <div  class="col-md-12" id="profile-pic">
            <?php

          $sql = "SELECT * FROM `admin_profile_photo` inner join `admin` where admin_profile_photo.admin_id = admin.admin_id AND  admin.email = '".$_SESSION['email']."' ";
          $query= mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($query)){
                            
            ?>
             <h4 style="color:coral; font-weight:bold; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><?php echo $row['email']?></h4>
            <img src="..\img/<?php echo $row['image']?>" style="width:120px;">
            <h5 style="color:coral; font-weight:bold; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><?php echo $row['profession']?></h5>

              <?php
            }
            ?>

            </div>
        </div>
          
      </div><br>

         

      <h2 style="text-align: center;color:coral">ALL BLOG USERS <hr></h2>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <table id="datatableid" class="table"  style="border:2px solid black; background-color:gray;" >
              <thead style="font-size:13px;" >
                <tr>
                  
                  <th class="text-dark" style="border: 1px solid black;background:white">FIRST NAME</th>
                  <!-- <th class="text-dark" style="border: 1px solid black;background:white">Content Image</th> -->
                  <th class="text-dark" style="border: 1px solid black;background:white">LAST NAME</th>
                  <th class="text-dark" style="border: 1px solid black;background:white">EMAIL</th>
                  <th class="text-dark" style="border: 1px solid black;background:white">USER NAME</th>
                  <th class="text-dark" style="border: 1px solid black;background:white">GENDER</th>
                  <th class="text-dark" style="border: 1px solid black;background:white">DATE</th>
                  <th class="text-dark" style="border: 1px solid black;background:white">STATUS</th>
                  <th class="text-light" style="border: 1px solid black;background:green">Action</th>
                  
                </tr>
              </thead>
              <tbody id="table-body" class=" table" style="color:navy; font-size: 16px; text-align: justify;">
                
                <?php

                     $sql = "SELECT * FROM `blog_users`   ";
                    $query= mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)){
     /*to display the data in the table, in the bracket of the assoc function you interchage the php syntax 
     the question mark and greater than sign comes first and the less than and php goes down */                  
                      ?>
                        <tr>
                          
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['fname']?></td>
                          <!-- <td class="text-dark" style="border: 1px solid black;background:white"><img src="..\imagepost/<?php echo $row['content_image'];?>" alt="" style="width:120px"></td> -->
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['lname']?></td>
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['email']?></td>
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['user_name']?></td>
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['gender']?></td>
                          <td class="text-dark" style="border: 1px solid black;background:white"><?php echo $row['date']?></td>
                          <td class="text-dark" style="border: 1px solid black;background:white">

                          <?php
                          if($row['status']==1){
                            echo'<p><a href="accept_user.php?user_id=' . $row['user_id'].'&status=0" class="btn btn-success">Activated</a></p>';
                          }else{
                            echo'<p><a href="accept_user.php?user_id=' . $row['user_id'].'&status=1" class="btn btn-danger">Pending</a></p>';
                          }
                          
                          ?>
                          </td>

                          <td style="border: 1px solid black;background:white;"><br>
                            <a href="super_update_users.php?update_id=<?php echo $row['user_id']?>" id="post-update">Update</a>
                            <a onclick="return confirm('Do You Really Want to Delete This Record? ')"  href="delete_users.php?delete_id=<?php echo $row['user_id']?>" id="post-delete">Delete</a> 
                          </td>
                          
                        </tr>
                      
                      <?php
                    }
                ?>
              </tbody>
            </table>
            </div>

            <div class="col-md-1"></div>

        </div>
    </div><br><br>

     

    <?php 
    //  include"..\includes/footer.php";
      ?>     

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

          <!--jquery cdn link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
     new DataTable('#datatableid');
    </script>

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
    
    .card-header a{
        text-decoration: none;
        font-family:Georgia, 'Times New Roman', Times, serif;
        font-size: 25px;
        
    }
    .card-header a:hover{
        text-decoration: none;
        font-family:Georgia, 'Times New Roman', Times, serif;
        font-size: 25px;
        color: coral;
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
    #profile-pic{
        text-align: center;
        
    }
    #profile-pic img{
       margin: 20px;
       margin-bottom:20px;
       border-radius: 100%; 
       width: 150px;
    }
    #profile-pic-bg{
        background-color: wheat;
        margin-bottom:30px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
    }
</style>
