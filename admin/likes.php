<?php
session_start();
$conn =mysqli_connect ("localhost","root","","blog");
 

if(isset($_POST['liked'])){
    $user_id =htmlentities((mysqli_real_escape_string($conn,$_POST['user_id'])));
    $post_id =htmlentities((mysqli_real_escape_string($conn,$_POST['post_id'])));



      
        $sql ="INSERT INTO `likes`(`user_id`, `post_id`, `date_liked`) VALUES ('$user_id','$post_id',now())";
    
        $query = mysqli_query($conn, $sql);

        if($query){   
            // header("Location:view.php?msg=Post Liked Successfully.");
        }
      
    }
 
?>