<?php
$conn = mysqli_connect("localhost","root","","blog");
if(isset($_GET['delete_id'])){
  
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM `admin_profile_photo` WHERE `admin_profile_id` = $id";
    $query= mysqli_query($conn, $sql);
    if($query){
        header("Location: super_profile.php?msg=Admin Profile Deleted Successfully");
        echo"<script>window.open('super_profile.php', '_self')</script>";
      exit();
      }
      else{
        echo "Failed: " . mysqli_error($conn);
      }
  }
   
?>