<?php 
session_start();
include"..\includes/connection.php";

 $sql = "SELECT * FROM `blog_users` ";
    
 $query = mysqli_query($conn,$sql);

 $result = mysqli_fetch_assoc($query);
?>

 <?php
                    
                    $user = $_SESSION['email'];
                    $get_user = "select * from blog_users where email = '$user' ";
                    $run_user =  mysqli_query($conn,$get_user);
                   if( $row = mysqli_fetch_array($run_user)){
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $first_name = $row['fname'];
                    $last_name = $row['lname'];
                    $user_password = $row['password'];
                    $user_email = $row['email'];
                    $user_gender = $row['gender'];
                   
                   
                    $register_date = $row['date'];
                   

                    
                    $user_posts = "select * from blog_posts";
                    $run_posts = mysqli_query($conn,$user_posts);
                    $posts = mysqli_num_rows($run_posts);
                  
                    
                ?>
<?php  }?> 
     
    <nav class="navbar navbar-expand-lg navbar-light" >
      <div class="container-fluid">
        <a class="navbar-brand fs-4" href="#">AAMUSTED BLOGGING WEBSITE</a><h5 style="margin-top:10px"><?php echo"$first_name" ."_". "$last_name"; ?></h5>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fs-5" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="..\admin/admin.php">Dashboard</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="..\admin/admin_register.php">Recommend A User</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="blog_post.php">Blog Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Set Profile Picture</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="return confirm('Do You Really Want to Logout This Page? ')"  href="..\logout.php">Logout</a>
            </li>
           
          
          
          </ul>
         
        </div>
      </div>
    </nav>
 

<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  .navbar{
    width: 100%;
    background-image: linear-gradient(to right,#A52A2A, #A52A2A);
  }
  .navbar-brand{
    color: white!important;
  }
  .nav-link{
    color: white !important;
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

</style>