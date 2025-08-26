
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

                            <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" style="border-color: blue;" required>
                                </div> 
                                <div class="form-group"><br>
                                    <input type="text" class="form-control" name="second_name" placeholder="Enter Last Name" style="border-color: blue;" required>
                                </div><br>
        
                               <div class="form-group">
                               <input type="email" class="form-control" placeholder="Enter Email" name="email" style="border-color: blue;" required>
                               </div><br>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" style="border-color: blue;" required>
                                </div><br>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" style="border-color: blue;" required>
                                </div><br>
                                <div class="form-group">
                                 <select name="gender"  class="form-control" style="border-color: blue;" required>
                                    <option value="">Choose your Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>  
                                 </select>
                                </div><br>
                               

                               
                                <button class="form-control bg-primary text-light fs-4 fw-bold" name="register" >Sign Up</button><br>

                                <p class="fs-4 text-success">Click here to <span><a href="admin.php" style="text-decoration:none;color:red">Back</a></span></p>
                          
                            </form>
                    </div>  

                    <div class="col-2"></div>

                </div>
        </div><br><br>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>