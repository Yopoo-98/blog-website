<?php
$conn = mysqli_connect("localhost","root","","blog");

$id = $_GET['post_id'];
$status = $_GET['status'];
$published;

if($status==1){
    $published=$published= "Published";  
}else if($status==0){
    $status=  $status = "Pending"; 
}

// $sql = "update rooms set status=$status,availability=$availability where id=$id";
$sql = "UPDATE `blog_posts` SET `status`='$status' WHERE post_id=$id";
mysqli_query($conn,$sql);
$_SESSION['message'] = "Blog Post Activated Successfully" . mysqli_error($conn);
header("Location: view_all_posts.php?msg=Blog Post Activated Successfully. ");
exit(0);
?>