<?php
$conn = mysqli_connect("localhost","root","","blog");
if(isset($_GET['delete_id'])){
  
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM `blog_users` WHERE `user_id` = $id";
    $query= mysqli_query($conn, $sql);
    if($query){
        header("Location: confirm_users.php?msg=User Account Deleted Successfully");
        echo"<script>window.open('confirm_users.php', '_self')</script>";
      exit();
      }
      else{
        echo "Failed: " . mysqli_error($conn);
      }
  }
   
?>