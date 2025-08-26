<?php 
 $conn = mysqli_connect("localhost","root","","blog");

 $sql = "SELECT * FROM `blog_users` ";
    
 $query = mysqli_query($conn,$sql);

 $result = mysqli_fetch_assoc($query);
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAMUSTED BLOG INDEX PAGE</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="includes/header.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light" >
      <div class="container-fluid">
        <a class="navbar-brand fs-3" href="index.php">AAMUSTED BLOGGING WEBSITE</h5>
        <a class="nav-link" href="login.php">Login</a>
      </div>
    </nav><br><br>


      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            
            <div class="col-md-4" >
                <form class="d-flex" role="search" action="search.php" method="post" style="text-align: right;">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
      </div><br><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" id="main-post">
            <?php
                 $sql = " SELECT * FROM blog_posts where status =1 order by date desc";
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
                            <div class="col-md-2" id="post-image">
                              <a href="view_index.php?view_id=<?php echo $row['post_id'];?>"><img src="imagepost/<?php echo $row['content_image']?>"></a>
                            </div>
                            <div class="col-md-7" id="post-division">
                                
                                <h5 class="user_name">Author: <?php echo $fname . " ". $lname . ",  " . $date;?></h5>
                               
                                <h4 class="title">Title: <a href="view_index.php?view_id=<?php echo $row['post_id'];?>"><?php echo $title;?></a></h4>
                                <h5 class="description">Category: <a href="view_index.php?view_id=<?php echo $row['post_id'];?>"><?php echo $description?></a></h5>
                                <p><a href="view_index.php?view_id=<?php echo $row['post_id'];?>"><?php echo nl2br(strip_tags(substr($row['content'],0,200 )))?></a></p>

                                <div class="row">
                                    <div class="col"><h5 class=""><a href="view_index.php?view_id=<?php echo $row['post_id']?>" id="continue-reading"> Continue Reading...</a></h5></div>
                                </div>
                            </div>
                        </div><br><br><br>
                    <?php 
                 }
             
            ?>
            </div>

            

        <!--===========Recent Post Sidebar============-->
        <div class="col-md-3" id="lastest_post">
            <div class="col-md-1"></div>
            <h2 >Latest Posts</h2>
                <?php
                 $sql = " SELECT * FROM blog_posts  where  `status` = 1 order by date desc";
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
                        <a href="view_index.php?view_id=<?php echo $row['post_id']?>" style="text-decoration:none">
                            <h5 class="lastest-post-title"><?php echo $title;?></h5>
                            <h6 class="text-danger">Author: <?php echo $fname . " ". $lname . ",  " . $date;?></h6>
                            <img src="imagepost/<?php echo $row['content_image']?>" style="width:180px; ">
                          
                            </a>
                        </div><br><hr>

                    <?php
                }
                ?>
               
        </div>

    </div>
</div><br>
   
            <!--===============================================-->
            <!--=============      Footer     =================-->
            <!--===============================================-->

            <footer class="nav navbar-expand-lg " >
        <div class="container">
        <div class="row">
            <div class="col-md-2" id="footer-division">
                    <a href=""><h4>Contact Us</h4></a>
                    <a href="mailto:frimpongfredrick87@gmail.com"><h4>Email</h4></a>
            </div>
            <div class="col-md-7" id="footer-division">
                <p>Video provides a powerful way to help you prove your point. 
                    When you click Online Video, you can paste in the embed code for the video you want to add.
                You can also type a keyword to search online for the video that best fits your document. 
                To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other.
                </p>
            </div>
            <div class="col-md-3" id="footer-division">
               <h3>  CopyRight &copy 2025</h3>
            </div><br><br>
        </div>
        </div>
    </footer>


      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<style>
     body{
      overflow: scroll;
    }

    /* navbar start*/
    .navbar{
    width: 100%;
    background-image: linear-gradient(to right,#A52A2A, #A52A2A);
  }
  .navbar-brand{
    color: white!important;
  }
 
  .nav-link{
    color: white !important;
    background-color: black;
    border-radius: 10px;
  }
  .nav-link:hover{
    color: rgb(255,0,212)!important;
  }
   .navbar-toggler {
     padding: var(--bs-navbar-toggler-padding-y) var(--bs-navbar-toggler-padding-x);
    font-size: var(--bs-navbar-toggler-font-size);
    line-height: 1;
    color: var(--bs-navbar-color);
    /* background-color: black; */
    border: var(--bs-border-width) solid var(--bs-navbar-toggler-border-color);
    border-radius: var(--bs-navbar-toggler-border-radius);
    transition: var(--bs-navbar-toggler-transition);
}
.navbar-toggler-icon {
    display: inline-block;
    width: 1.5em;
    height: 1.5em;
    vertical-align: middle;
    background-image: var(--bs-navbar-toggler-icon-bg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100%;
    /* border: 1px solid orangered; */
}
.navbar-toggler{
    padding: .25rem .75rem;
    font-size: 1.25rem;
    line-height: 1;
    background-color: transparent;
    border: 1px solid red;
    border-radius: .25rem;
    transition: box-shadow;
}
.navbar{
background-color: skyblue;
} 

    /* navbar end*/

    
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
    #read-more{
        text-decoration: none;
    }
    #post-division{
        background-image: linear-gradient(to right,#A52A2A, #A52A2A);
        border-radius: 20px;
        margin-left: 30px;
    }
    #post-image{
        margin-right: 10px;
    }
    #post-image img{
        width:250px;
        margin-bottom:20px;
        border-radius:20px;  
    }
   .title{
    color: white;
    margin-top: 20px;
    margin-left: 20px;
    text-decoration: none;
   }
   .title a{
    color: white;
    margin-top: 20px;
    margin-left: 20px;
    text-decoration: none;
   }
   .description{
    margin-top: 20px;
    margin-left: 20px;
    color: black;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    text-decoration: none;
   }
   .description a{
    margin-top: 20px;
    margin-left: 20px;
    color: black;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bold;
    text-decoration: none;
   }
   #continue-reading{
    color: black;
    text-decoration: none;
    font-size: 22px;
    font-weight: bold;
    margin-left: 22px;
   }
   #continue-reading a{
    color: black;
   }
   .user_name{
    color: black;
    margin-top: 20px;
    margin-left: 20px;
   }
   #post-division p{
    font-size: 18px;
    margin-top: 20px;
    padding-left: 20px;
    text-decoration: none;
   }
   #post-division p a{
    font-size: 18px;
    color:white;
    text-decoration: none;
   }
   /* #lastest_post{
    background-image: linear-gradient(to right,#de6262, #ffb88c);
    border-top-left-radius: 20px;
   } */
   #lastest_post h2{
    text-align: center;
    margin-top:20px;
    /* text-decoration:underline; */
     background-image: linear-gradient(to right,#A52A2A, #A52A2A);
   }
   .lastest-post-title a{
    color: black;
    text-align: center;
    margin-top: 20px;
    margin: 10px;
   
   }

   /* footer */
   .nav{
    width: 100%;
    /* height: 150px; */
    background-image: linear-gradient(to right,#A52A2A, #A52A2A); 
    border-top-right-radius:40px;
    border-top-left-radius:40px;
    margin-top: 70px;
  }
  #footer-division{
    margin-top: 20px;
    padding: 20px;
  }
  #footer-division a{
   text-decoration:none;
   color: white;
   font-size: 20px;
   margin: 5px;
  }
  #footer-division p{
    color: white;
   font-size: 20px;
   margin: 5px;
  }
  #footer-division h3{
    color: blue;
    margin: 5px;
  }
 

   @media screen and (max-width:1547px){
    #post-division{
        background-image: linear-gradient(to right,#A52A2A, #A52A2A);
        border-radius: 20px;
        margin-left: 30px;
    }
  
    #post-image img{
        width:200px;
        margin-bottom:10px;
        border-radius:10px;  
    }
}
   @media screen and (max-width:1309px){
    #post-division{
        background-image: linear-gradient(to right,#A52A2A, #A52A2A);
        border-radius: 20px;
        margin-left: 100px;
    }
  
    #post-image img{
        width:230px;
        margin-bottom:10px;
        border-radius:10px;  
    
    }
    .user_name{
    color: blue;
    margin-top: 14px;
    margin-left: 20px;
   }
}
   @media screen and (max-width:1045px){
    #post-division{
        background-image: linear-gradient(to right,#A52A2A, #A52A2A);
        border-radius: 20px;
        margin-left: 120px;
    }
  
    #post-image img{
        width:230px;
        margin-bottom:10px;
        border-radius:10px;  
    
    }
    .user_name{
    color: blue;
    margin-top: 14px;
    margin-left: 20px;
   }

   }
   @media screen and (max-width:935px){
    #post-division{
        background-image: linear-gradient(to right,#A52A2A, #A52A2A);
        border-radius: 20px;
        margin-left: 120px;
    }
  
    #post-image img{
        width:200px;
        margin-bottom:10px;
        border-radius:10px;  
    
    }
    .user_name{
    color: blue;
    margin-top: 14px;
    margin-left: 20px;
   }
   .lastest-post-title a{
    color: black;
    text-align: center;
    margin-top: 20px;
    margin: 10px;
    font-size: 16px;
    font-weight: bold;
   
   }
}
   @media screen and (max-width:767px){
    #post-image{
        margin-bottom: 50px;
    }
    #post-division{
        background-color: white;
        border-radius: 20px;
        margin-left: -0px;
    }
  
    #post-image img{
        width:100%;
        margin-bottom:10px;
        border-radius:10px;      
    }
    .user_name{
    color: blue;
    margin-top: 14px;
    margin-left: 20px;
   }
   .lastest-post-title a{
    color: black;
    text-align: center;
    margin-top: 20px;
    margin: 10px;
    font-size: 16px;
    font-weight: bold;
   
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
   }
</style>
