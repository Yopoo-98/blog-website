
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<!-- 
     <link rel="stylesheet" href="..\signup.css"> -->

</head>
<body>
<br>
        <div class="container">
            <div class="row">
                <div class="col my-5 text-center text-light">
                
                <img src="..\images/logo2.png" alt="">
                </div>
            </div>
        </div><hr style=" background:white; height:10px; margin-top:-40px">

        <br>

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

                            <form action="insert_super_admin_register.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                <h2 style="text-align: center;color:brown;font-weight:bold">AAMUSTED BLOG WEBSITE REGISTRATION</h2><br>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" style="border:2px solid brown" required>
                                    </div> 
                                    <div class="form-group"><br>
                                        <input type="text" class="form-control" name="second_name" placeholder="Enter Last Name" style="border:2px solid brown" required>
                                    </div><br>
            
                                <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Email" name="email" style="border:2px solid brown" required>
                                </div><br>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password" style="border:2px solid brown" required>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" style="border:2px solid brown" required>
                                    </div><br>
                                    <div class="form-group">
                                    <select name="gender"  class="form-control" style="border:2px solid brown" required>
                                        <option value="">Choose your Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>  
                                    </select>
                                    </div><br>
                                    
                                <button class="form-control text-light fs-4 fw-bold"  name="sign_up" style="color: white;background:brown">Sign Up</button><br>
                          
                                <div>
                                    <div class="row">
                                        <div class="col">         
                                            <p class="fs-4 text-success">Click here to <span><a href="super_admin.php" style="text-decoration:none;color:red">Back</a></span></p>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col">
                                             <p class="fs-4 text-success"><span><a href="add_admin.php" style="text-decoration:none;font-weight:bold">Add New Admin</a></span></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>  

                    <div class="col-2"></div>

                </div>
        </div><br><br>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
  form{
        border: 2px solid brown;
        padding: 40px;
        border-radius: 5px;
    }
</style>