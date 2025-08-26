<?php
$conn = mysqli_connect("localhost","root","","blog");
if(isset($_GET['delete_id'])){
  
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM `profile_photo` WHERE `profile_id` = $id";
    $query= mysqli_query($conn, $sql);
    if($query){
        header("Location: profile.php?msg=User Profile Deleted Successfully");
        echo"<script>window.open('profile.php', '_self')</script>";
      exit();
      }
      else{
        echo "Failed: " . mysqli_error($conn);
      }
  }
   
?>