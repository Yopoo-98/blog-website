<?php
$conn = mysqli_connect("localhost","root","","blog");
if(isset($_GET['delete_id'])){
  
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM `blog_posts` WHERE `post_id` = $id";
    $query= mysqli_query($conn, $sql);
    if($query){
        header("Location: admin.php?msg=Post deleted Successfully");
        echo"<script>window.open('admin.php', '_self')</script>";
      exit();
      }
      else{
        echo "Failed: " . mysqli_error($conn);
      }
  }
   
?>