<?php 
 $conn = mysqli_connect("localhost","root","","blog");

 $sql = "SELECT * FROM `blog_users` ";
    
 $query = mysqli_query($conn,$sql);

 $result = mysqli_fetch_assoc($query);

  
if(isset($_POST['liked'])){
  $user_id =htmlentities((mysqli_real_escape_string($conn,$_POST['user_id'])));
  $post_id =htmlentities((mysqli_real_escape_string($conn,$_POST['post_id'])));
  $fname =htmlentities((mysqli_real_escape_string($conn,$_POST['fname'])));
  $lname =htmlentities((mysqli_real_escape_string($conn,$_POST['lname'])));

  
      $sql ="INSERT INTO `likes`(`fname`, `lname`,`user_id`, `post_id`,`date_liked`) VALUES ('$fname','$lname','$user_id','$post_id',now())";
    
        $query = mysqli_query($conn, $sql);

        if($query){   
            // header("Location:view.php?msg=Post Liked Successfully.");
        }
      
    }
    
?>

<!--Dislikes-->
<?php 
 $conn = mysqli_connect("localhost","root","","blog");
  
if(isset($_POST['dislike'])){
  $dislike_user_id =htmlentities((mysqli_real_escape_string($conn,$_POST['user_id'])));
  $dislike_post_id =htmlentities((mysqli_real_escape_string($conn,$_POST['post_id'])));
  $fname =htmlentities((mysqli_real_escape_string($conn,$_POST['fname'])));
  $lname =htmlentities((mysqli_real_escape_string($conn,$_POST['lname'])));

      $sql ="INSERT INTO `dislikes`(`fname`,`lname`,`user_id`, `post_id`, `date_disliked`) VALUES ('$fname','$lname','$dislike_user_id','$dislike_post_id',now())";
    
        $query = mysqli_query($conn, $sql);

        if($query){   
            // header("Location:view.php?msg=Post Liked Successfully.");
        }
      
    }
    
?>

<!--=====================================-->
<!--========Comment Section==============-->
<!--=====================================-->

<?php 
 $conn = mysqli_connect("localhost","root","","blog");
  
if(isset($_POST['comment_button'])){
    $comment_user_id =htmlentities((mysqli_real_escape_string($conn,$_POST['user_id'])));
    $comment_post_id =htmlentities((mysqli_real_escape_string($conn,$_POST['post_id'])));
    $name =htmlentities((mysqli_real_escape_string($conn,$_POST['name'])));
    $email =htmlentities((mysqli_real_escape_string($conn,$_POST['email'])));
    $comment =htmlentities((mysqli_real_escape_string($conn,$_POST['comment'])));
  
    $check_comment = "select * from comment where message = '$comment' ";
    $run_comment = mysqli_query($conn, $check_comment);

    $check = mysqli_num_rows($run_comment);
    if($check==1){
        exit(0);
    }

        $sql ="INSERT INTO `comment`(`name`,`email`,`user_id`, `post_id`,`message`, `date_commented`) VALUES ('$name','$email','$comment_user_id','$comment_post_id','$comment', now())";
    
        $query = mysqli_query($conn, $sql);

        if($query){   
            // header("Location:view.php?msg=Post Liked Successfully.");
        }
      
    }
    
?>

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
      include"..\includes/admin_sidebar.php";
     
      ?><br><br>

<div class="main-content">
  <div class="container">
    <div class="row">
        <div class="col-md-9">
          <!-- <h2>VIEW POSTS</h2> -->
         <?php 
         $id = $_GET['view_id']; 
         
        //  $sql = "SELECT * FROM `blog_posts` ";
        //  $query = mysqli_query($conn,$sql);
        //  $row = mysqli_fetch_assoc($query);

        //  $id =$row['post_id'];
        ?> 

        <?php
                 $sql = " SELECT * FROM blog_posts where post_id = '$id' ";
                 $query= mysqli_query($conn, $sql);
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
                        

                        <div class="row">
                            <div class="col-md-8" id="post-division">
                            
                                <h2 class="title">Title: <?php echo $title;?></h2>
                                <h5 class="user_name">Author: <?php echo $fname . " ". $lname . ",  " . $date;?></h5>
                               
                               <h5 class="description">Category: <?php echo $description?></h5><br>

                               <img src="..\imagepost/<?php echo $row['content_image']?>" >

                                <p><?php echo nl2br($row['content'] )?></p>

                                <div class="row">
                                    <div class="col">
                                        <form action="" method="post">
                                      
                                            <!-- <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['admin_id']?>" Required>
                                            <input type="hidden" name="fname" class="form-control" value="<?php echo $row['fname']?>" Required>
                                            <input type="hidden" name="lname" class="form-control" value="<?php echo $row['lname']?>" Required>
                                            <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id']?>" Required>
                                            <input type="submit" name="liked" class="" value="LIKES" id="like" required> 
                                            <span style="color: red;">
                                               ( <?php
                                                $sql = mysqli_query($conn, "SELECT count(post_id) FROM `likes` where post_id = '$id' ");
                                                while($rows = mysqli_fetch_array($sql)){
                                                ?>
                                                <?php echo $rows['count(post_id)']; ?>
                        
                                                <?php
                                                }
                                                ?>)
                                            </span> -->
                                            
                                            
                                       </form>
                                    </div>

                                    <div class="col">
                                        <!-- <form action="" method="post">
                                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['admin_id']?>" Required>
                                        <input type="hidden" name="fname" class="form-control" value="<?php echo $row['fname']?>" Required>
                                        <input type="hidden" name="lname" class="form-control" value="<?php echo $row['lname']?>" Required>
                                        <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id']?>" Required>
                                            <input type="submit" name="dislike" class="" value="DISLIKES" id="dislike">
                                            <span style="color: red;">
                                               ( <?php
                                                $sql = mysqli_query($conn, "SELECT count(post_id) FROM `dislikes` where post_id = '$id' ");
                                                while($rows = mysqli_fetch_array($sql)){
                                                ?>
                                                <?php echo $rows['count(post_id)']; ?>
                        
                                                <?php
                                                }
                                                ?>)
                                            </span> -->
                                       </form>
                                    </div>

                                     <div class="col"  id="comment-column"><h5 class=""><a href=" " id="read-more">COMMENTS 
                                            <span class="text-danger">
                                            ( <?php
                                                        $sql = mysqli_query($conn, "SELECT count(post_id) FROM `comment` where post_id = '$id' ");
                                                        while($rows = mysqli_fetch_array($sql)){
                                                        ?>
                                                        <?php echo $rows['count(post_id)']; ?>
                                
                                                        <?php
                                                        }
                                                        ?>)
                                            </span>
                                            </a></h5>
                                      </div> 
                                  <!--  <div class="col"><h5 class=""><a href=" " id="read-more">Share</a></h5></div> -->
                                    
                                </div>
                            </div>
                        </div>
                    <?php 
                }
                ?>

                  <!--=============================================-->
            <!--===========comment section===================-->
            <!--============================================-->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                        
               <form action="" method="post">
               <?php
                 $sql = " SELECT * FROM blog_posts where post_id = '$id' ";
                 $query= mysqli_query($conn, $sql);
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
                                  
                    <div class="form-group"><br><br><br>
                        <label for="" id="leaveComment">Leave a Comment</label><br><br>
                        <input type="text" name="name" placeholder="Enter First Name" class="form-control" Required><br>
                        <input type="text" name="email" placeholder="Enter Email" class="form-control" Required><br>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>" Required>
                        <input type="hidden" name="post_id" value="<?php echo $row['post_id']?>" Required>

                        <textarea name="comment"  class="form-control" id="comment" Required></textarea><br>
                        <input type="submit" name="comment_button" value="Post  Comment" id="comment-button" reset="" class="form-control" required>
                    </div><br>

                    <?php }?>
               </form>
            </div>
        </div>
    </div><br><br>

   <div class="container">
    <div class="row">
        <div class="col-md-6">
        <?php
                 $sql = " SELECT * FROM comment where post_id = '$id' order by date_commented desc ";
                 $query= mysqli_query($conn, $sql);
                 while($row = mysqli_fetch_assoc($query)){
                    $post_id = $row['post_id'];
                    $user_id = $row['user_id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $comment = $row['message'];
                    
                    $date  = $row['date_commented'];
                    
                    ?>
                                  
                    <div class="form-group" id="comment-bg">
                                <h6 class="" > <?php echo $name . ", " . $date;?></h6>
                                <p style="font-size: 18px;"><?php echo nl2br($row['message'] )?></p>
                               

                                <div class="row" id="reply-box" style="background:none">
                                    <!-- <div class="col" >
                                        <form action="" method="post">
                                            <input type="submit" id="reply" value="reply" name="reply_comment" style="background:none;color:white;font-weight:bolder;border:none"  >
                                        </form>
                                    </div> -->
                                    
                                </div>
                    </div><br>

                    <?php }?>
        </div>
    </div>
   </div>

</div>
   

        <!--===========Recent Post Sidebar============-->
        <div class="col-md-3" id="lastest_post">
            <div class="col-md-1"></div>
            <h2>Recent Posts</h2>
                <?php
                $sql = " SELECT * FROM blog_posts ";
                 $query= mysqli_query($conn, $sql);
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
                        <br><div class="row">
                        <a href="super_view_all.php?view_id=<?php echo $row['post_id']?>" style="text-decoration:none">
                            <h5 class="lastest-post-title"><?php echo $title;?></h5>
                            <h6 class="text-danger">Author: <?php echo $fname . " ". $lname . ",  " . $date;?></h6>
                            <img src="..\imagepost/<?php echo $row['content_image']?>" style="width:180px; ">
                          
                            </a>
                        </div><br><hr>

                    <?php
                }
                ?>
               
        </div>

    </div>
</div><br><br>

</div>
        

          

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

    #post-image{
        margin-right: 10px;
    }
   .title{
    color: blue;
    margin-top: 20px;
    margin-left: 20px;
    text-decoration: none;
   }
   .title a{
    color: blue;
    margin-top: 20px;
    margin-left: 20px;
    text-decoration: none;
   }
 
   .description{
    margin-top: 20px;
    margin-left: 20px;
    color: blue;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    text-decoration: none;
   }
   .description a{
    margin-top: 20px;
    margin-left: 20px;
    color: blue;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    text-decoration: none;
   }
   #read-more{
    color:skyblue;
    text-decoration: none;
    margin-left: 20px;
   }
  
   .user_name{
    color: blue;
    margin-top: 20px;
    margin-left: 20px;
   }
   #post-division img{
    width:600px;
    height:300px;
    margin-bottom:20px;
    border-radius:20px;
   }
   #post-division p{
    font-size: 18px;
    margin-top: 20px;
    padding-left: 20px;
    text-decoration: none;
   }
   #post-division p a{
    font-size: 18px;
    color: black;
    text-decoration: none;
   }
   #like{
    background:none;
    color:#337ab7;
    border:none;
    margin-left:20px
   }
   #dislike{
    background:none;
    color:#337ab7;
    border:none;
   }
   #comment-column{
    margin-left: -100px;
   }
   #lastest_post h2{
    margin-top:20px;
    text-decoration:underline;
   }
  #comment{
    /* width: 635px;
    height: 250px; */
    background-color: #fff;
    /* resize: none; */
    border-radius: 10px;
  }
  #comment-button{
    border-radius: 20px;
     background-image: linear-gradient(to right,#A52A2A, #A52A2A);
    color: white;
    font-size: 20px;
    font-weight: bold;
  }
  #leaveComment{
    font-size: 20px;
  }
  #comment-bg{
   margin-bottom: 4px;
    background-image: linear-gradient(to right,#A52A2A, #A52A2A);
   border-radius: 10px;
  }
  #comment-bg h6{
    padding: 10px;
    color:chartreuse;
    font-size: 18px;

  }
  #comment-bg p{
    padding: 10px;
    font-size: 18px;
    color: white;

  }
  #reply-box{
    text-align: right;
    margin-right: 40px;
  }
  #reply{
  margin-bottom: 10px;
  }

  @media screen and (max-width:767px){
    #post-division img{
    width:400px;
    height:250px;
    margin-bottom:20px;
    border-radius:20px;
    margin-left: 50px;
   }
   #post-division p{
    font-size: 18px;
    margin-top: 20px;
    padding-left: 20px;
    text-decoration: none;
    margin-left: 20px;
   
   }
   #post-division p a{
    font-size: 18px;
    color: black;
    text-decoration: none;
   }
   #like{
    background:none;
    color:#337ab7;
    border:none;

   }
   #dislike{
    background:none;
    color:#337ab7;
    border:none;
    margin-left: -20px;
   }
   #read-more{
    background:none;
    color:#337ab7;
    border:none;
   }
}

  @media screen and (max-width:760px){
    #comment{
    /* width: 520px;
    height: 250px; */
    background-color: #fff;
    resize: none;
    border-radius: 10px;
  }
  #post-division img{
    width:350px;
    height:200px;
    margin-bottom:20px;
    border-radius:20px;
    margin-left: 50px;
   }
}
  @media screen and (max-width:530px){
    #comment{
    /* width: 500px;
    height: 250px; */
    background-color: #fff;
    resize: none;
    border-radius: 10px;
  }
}
  @media screen and (max-width:530px){
    #comment{
    /* width: 480px;
    height: 250px; */
    background-color: #fff;
    resize: none;
    border-radius: 10px;
  }
  #post-division img{
    width:300px;
    height:150px;
    margin-bottom:20px;
    border-radius:20px;
    margin-left: 50px;
   }
}
  @media screen and (max-width:454px){
    #comment{
    /* width: 430px;
    height: 250px; */
    background-color: #fff;
    resize: none;
    border-radius: 10px;
  }
  #post-division img{
    width:300px;
    height:150px;
    margin-bottom:20px;
    border-radius:20px;
    margin-left: 50px;
   }
}
  @media screen and (max-width:993px){
    #comment{
    /* width: 520px;
    height: 250px; */
    background-color: #fff;
    resize: none;
    border-radius: 10px;
  }
  #post-division img{
    width:450px;
    height:300px;
    margin-bottom:20px;
    border-radius:20px;
   }
   #lastest_post h2{
    margin-top:20px;
    text-decoration:underline;
    text-align: center;
   }
}
  @media screen and (max-width:420px){
    #comment{
    /* width: 520px;
    height: 250px; */
    background-color: #fff;
    resize: none;
    border-radius: 10px;
  }
  #post-division img{
    width:300px;
    height:150px;
    margin-bottom:20px;
    border-radius:20px;
   }
   #lastest_post h2{
    margin-top:20px;
    text-decoration:underline;
    text-align: center;
   }
   #post-division p{
    font-size: 13px;
    margin-top: 20px;
    padding-left: 20px;
    text-decoration: none;
   }
   #post-division p a{
    font-size: 13px;
    color: black;
    text-decoration: none;
   }
   .title{
    color: blue;
    margin-top: 20px;
    margin-left: 35px;
    text-decoration: none;
    font-size: 18px;
   }
   .title a{
    color: blue;
    margin-top: 20px;
    margin-left: 35px;
    text-decoration: none;
    font-size: 18px;
   }
 
   .description{
    margin-top: 20px;
    margin-left: 35px;
    color: blue;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    text-decoration: none;
    font-size: 15px;
   }
   .description a{
    margin-top: 20px;
    margin-left: 35px;
    color: blue;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    text-decoration: none;
    font-size: 18px;
   }
   
   .user_name{
    color: blue;
    margin-top: 20px;
    margin-left: 35px;
    font-size: 18px;
   }
}
</style>
