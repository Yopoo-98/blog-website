


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog users</title>
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
      include"function.php";
      ?><br><br>
      
      <?php
include"..\includes/connection.php";

//get the search keyword
$search = $_POST['search'];


$sql = "SELECT * FROM `blog_posts` WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

$query = mysqli_query($conn,$sql);

$count = mysqli_num_rows($query);
if($count > 0){
    while($row = mysqli_fetch_assoc($query)){
        $post_id = $row['post_id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $title = $row['title'];
        $description = $row['description'];
        $content = $row['content'];
        $content_image = $row['content_image'];
        $date  = $row['date'];

        ?>
           <div class="container">
           <div class="row">
                <div class="col-md-3" id="post-image">
                    <img src="..\imagepost/<?php echo $row['content_image']?>" style="">
                </div>
                <div class="col-md-9" id="post-division">
                    
                    <h5 class="user_name">Author: <?php echo $fname . " ". $lname . ",  " . $date;?></h5>
                   
                    <h4 class="title">Title: <?php echo $title;?></h4>
                    <h5 class="description">Category: <?php echo $description?></h5>
                    <p><?php echo nl2br($row['content'] )?></p>

                    <!-- <div class="row">
                        <div class="col"><h5 class=" text-center"><a href="view.php?view_id=<?php echo $row['post_id']?>" id="read-more"><<<  Read More >>></a></h5></div>
                    </div> -->
                </div>
            </div><br><br><br>
           </div>
        <?php 
     }
}
else{
    $_SESSION['message'] = "Search Result Not Found !!!" . mysqli_error($conn);
    header("Location: ..\admin/blog_post.php?msg=Search Result Not Found !!!. ");
    exit(0);
}
?>
 


 <?php 
      include"..\includes/footer.php";
      ?>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<style>
   
    #post-image img{
        width:300px;
        margin-bottom:20px;
        border-radius:20px
    }
    .user_name{
        color: blue;
    }
    .title{
        color: blue;
    }
    .description{
        color: blue;
    }
    @media screen and (max-width:1399px){
        #post-image img{
        width:250px;
        margin-bottom:20px;
        border-radius:20px
    }  
    }
    @media screen and (max-width:1199px){
     #post-division{
        margin-left: 40px;
     }  
     #post-image img{
        width:400px;
        margin-bottom:20px;
        border-radius:20px;
        margin-left:50px;
    }  
    }
</style>