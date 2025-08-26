<?php
include"..\includes/connection.php";


$id = $_GET['update_id']; 
if(isset($_POST['update'])){
    $first_name =htmlentities((mysqli_real_escape_string($conn,$_POST['first_name'])));
    $second_name =htmlentities((mysqli_real_escape_string($conn,$_POST['second_name'])));
    $email =htmlentities((mysqli_real_escape_string($conn,$_POST['email'])));
    $password =htmlentities((mysqli_real_escape_string($conn,$_POST['password'])));
   
    $gender =htmlentities((mysqli_real_escape_string($conn,$_POST['gender'])));
    $status = 1;

    $newgid = sprintf('%05d',rand(0,999999));


    $username = strtolower($first_name . "_" . $second_name . "_" . $newgid);


        $sql ="UPDATE `blog_users` SET `user_id`='$id',`fname`='$first_name',`lname`='$second_name',`email`='$email',`password`='$password',`user_name`='$username',`gender`='$gender',`date`=now(),`status`= 1 WHERE user_id = '$id'  ";
    
       
        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "New User Added Successfully" . mysqli_error($conn);
            header("Location: confirm_users.php?msg=New User Account Added Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Account not created successfully" . mysqli_error($conn);
            header("Location: confirm_users.php?msg=Account not created successfully. ");
            exit(0);
        }
    }
 
// }

$sql = "SELECT * FROM `blog_users` WHERE user_id = $id ";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update signup</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrap.min.js"></script>

     <link rel="stylesheet" href="..\signup.css">

</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col my-5 text-center text-light">
                <h1 class="fw-bold text-dark">A CHRISTIAN PLATFORM FOR LEARNING GOD'S WORD</h1>
                <P class="text-danger fs-4">This platform is purposely for sharing the message of Christ our Saviour </br>Join , Inivite a brother or sister to join for us to spread the Gospel </P>
                <p class="text-muted text-primary fs-5 ">NOTE: No sharing of nude contents on this platform</p>
                </div>
            </div>
        </div><hr style=" background:white; height:10px; margin-top:-40px">

        <div class="container-fluid" >
            <div class="row">
                <div class="col-12">
                        <p class="text-center  fw-bold fs-5 mt-5">Fill the form below and click on the signup to create an account</p>
                    </div>
                </div>


                <div class="container " >
                    <div class="row ">
                        <div class="col-2"></div>
                        <div class="col-8">

                                <?php
                                if(isset($_GET['msg'])){
                                $msg = $_GET['msg'];
                                echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                '.$msg.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                }
                                ?>

                            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" style="border-color: blue;" value="<?php echo $row['fname']?>" required>
                                </div> 
                                <div class="form-group"><br>
                                    <input type="text" class="form-control" name="second_name" placeholder="Enter Last Name" style="border-color: blue;" value="<?php echo $row['lname']?>" required>
                                </div><br>
        
                               <div class="form-group">
                               <input type="email" class="form-control" placeholder="Enter Email" name="email" style="border-color: blue;" value="<?php echo $row['email']?>" required>
                               </div><br>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" style="border-color: blue;" value="<?php echo $row['password']?>" required>
                                </div><br>
                                <div class="form-group">
                                 <select name="gender"  class="form-control" style="border-color: blue;"  required>
                                    <option value=""><?php echo $row['gender']?></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>  
                                 </select>
                                </div><br>
                               

                               
                                <button class="form-control bg-primary text-light fs-4 fw-bold" name="update" >Update User</button><br>

                                <p class="fs-4 text-success">Click here to <span><a href="confirm_users.php" style="text-decoration:none;color:red">Back</a></span></p>
                          
                            </form>
                    </div>  

                    <div class="col-2"></div>

                </div>
        </div><br><br>


        <?php 
      include"..\includes/footer.php";
      ?>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>