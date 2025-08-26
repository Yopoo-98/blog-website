<?php 
//session_start();
$conn = mysqli_connect("localhost", "root", "", "blog");

    $sql = "SELECT * FROM `blog_users` ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
                                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
      // include"..\includes/sidebar.php";
      include"..\includes/admin_sidebar.php";
      ?>

       <div class="main-content">

            <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 " >  <br><br>

                    <?php
                        if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        '.$msg.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    ?>

               <div class="card">
                    <div class="card-header text-center text-primary">
                        <h4>ADD NEW POST</h4>
                    </div>
                    <div class="card-body">

                     <?php 
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            $sql = "SELECT * FROM blog_users WHERE email = '$email'";
                            $query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_assoc($query);
                        } else {
                            // Redirect to login if session is not set
                            header("Location: ../login.php");
                            exit();
                        }
                    ?>

                        <form action="insert_add_article.php" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group mb-2">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $result['user_id']?>" Required>
                            </div><br>
                            <div class="form-group mb-3">
                                <label>Article Title</label>
                                <input type="text" name="title" class="form-control" required placeholder="Enter article title">
                            </div>

                            <div class="form-group mb-3">
                                <label>Short Description (Meta Description)</label>
                                <textarea name="short_description" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Long Description (Body Content)</label>
                                <textarea name="content" class="form-control" rows="8" id="textarea1" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <button type="submit" name="submit_article" class="btn btn-primary w-100">Submit</button>
                        </form>

                    </div>
                </div>
      
            </div>
            <div class="col-md-2"></div>
        </div>
      </div><br><br>
            
      </div>

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
