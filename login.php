<?php
session_start();
include "includes/connection.php";

if (isset($_POST['login'])) {
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
    $user_id = htmlentities(mysqli_real_escape_string($conn, $_POST['user_id']));
        

    $sql = "SELECT * FROM blog_users WHERE email='$email'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);

        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['user_id']=$user_id;  // Very important
            
          
            if ($row['status'] == 0) {
                header("Location: login.php?msg=Your Blog Account Has Not Yet Been Activated.");
                exit();
            }

            if ($row['role'] === 'admin') {
                echo "<script>window.open('admin/admin_blog_post.php', '_self')</script>";
            } else {
                echo "<script>window.open('admin/blog_post.php', '_self')</script>";
            }
        } else {
            header("Location: login.php?msg=Incorrect Password");
            exit();
        }
    } else {
        header("Location: login.php?msg=No account found with that email.");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrap.min.js"></script>

     <!-- <link rel="stylesheet" href="signup.css"> -->

</head>
<body><br><br><br>
       
    

                 <div class="container">
                                        <div class="row">
                                            <div class="col my-5 text-center text-light">
                                            
                                            <img src="images/aamusted.png" alt="" style="width:150px">
                                            </div>
                                        </div>
                                </div><br>
                <div class="container " >
                    <div class="row ">
                        <div class="col-4"></div>
                        <div class="col-4">
                                    
                                <?php
                                if(isset($_GET['msg'])){
                                $msg = $_GET['msg'];
                                echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                '.$msg.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                }
                                ?>

                            <form action="" method="post" autocomplete="on">
                            <h5 style="text-align: center;color:brown;font-weight:bold">BLOG LOGIN</h5><br>
                               <div class="form-group">
                               <input type="hidden" class="form-control"  name="user_id" style="border:2px solid brown">
                               </div><br>
                               <div class="form-group">
                               <input type="hidden" class="form-control"  name="fname" style="border:2px solid brown">
                               </div><br>
                               <div class="form-group">
                               <input type="hidden" class="form-control"  name="lname" style="border:2px solid brown">
                               </div><br>
                               <div class="form-group">
                               <input type="email" class="form-control" placeholder="Enter Email" name="email" style="border:2px solid brown" required>
                               </div><br>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" style="border:2px solid brown" required>
                                </div><br>
                               
                                <button class="form-control fs-4 fw-bold" name="login" style="color: white;background:brown">Login</button><br>

                               <div>
                                <div class="row">
                                    <div class="col">
                                         <p class="fs-5 text-success"><a href="register.php" style="text-decoration:none;">Register</a></p>
                                    </div>
                                    <div class="col">
                                         <a href="index.php" style="text-decoration:none;color:red; margin-left: 90px;" class="btn btn-end"><i class="fa-solid fa-house"></i></a>
                                    </div>
                                </div>
                               </div>

                            </form>
                    </div>  

                    <div class="col-4"></div>

                </div>
        </div><br><br>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
  form{
        border: 1px solid brown;
        padding: 40px;
        border-radius: 5px;
    }
</style>