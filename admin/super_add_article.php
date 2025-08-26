<?php 
 $conn = mysqli_connect("localhost","root","","blog");

 $sql = "SELECT * FROM `admin` ";
    
 $query = mysqli_query($conn,$sql);

 $result = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post article</title>
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
      ?><br><br>

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
                            <h4 id="back"><a href="super_admin.php">Back</a></h4> 
                        </div>

                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                           

                        <div class="col-4">
                            <h4 class="new-article">Add New Posts</h4>
                        </div>
                    
                </div>   <br><br>
                <div class="card-body">

                            <form action="insert_super_add_article.php" method="post" enctype="multipart/form-data">
                                      
                            <?php 
                                
                                $sql = "SELECT * FROM `admin` ";
        
                                $query = mysqli_query($conn,$sql);
                            
                                $result = mysqli_fetch_assoc($query);
                                ?>
                                   
                                <div class="form-group mb-2">
                                <input type="hidden" name="admin_id" class="form-control" value="<?php echo $row['admin_id']?>" Required>
                                </div><br>
                                <div class="form-group mb-2">
                                <input type="hidden" name="fname" class="form-control" value="<?php echo $row['fname']?>" Required>
                                </div><br>
                                <div class="form-group mb-2">
                                <input type="hidden" name="lname" class="form-control" value="<?php echo $row['lname']?>" Required>
                                </div><br>
                                <div class="form-group mb-2">
                                    <h4>Article's Title</h4>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Article's Title" Required>
                                </div><br>
                                           
                                <div class="form-group mb-2">
                                    <h4>Short Description (Meta Description)</h4>
                                    <textarea type="text" name="short_description" class="form-control" cols="120" rows="6" placeholder="Enter Articles Description" Required></textarea>
                                </div><br>
                                            
                                <div class="form-group mb-2">
                                    <h4>Long Description (Body Content)</h4>
                                    <textarea name="content" class="form-control"id="textarea1" cols="120" rows="20" id="" placeholder="Enter Article's Content" Required></textarea>
                                </div><br>

                                <div class="form-group mb-2">
                                    <h4>Upload Image</h4>
                                    <input type="file" class="form-control" name="image" >
                                </div><br>
                                      
                                 
                                <button type="submit" name="submit_article" class="btn btn-primary">Submit</button>
                            </form>

                        </div>        
            </div>
            <div class="col-md-2"></div>
        </div>
      </div><br><br>

      <?php 
    //  include"..\includes/footer.php";
      ?>    

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
