<?php
$conn = mysqli_connect("localhost","root","","blog");

$id = $_GET['user_id'];
$status = $_GET['status'];
$published;

if($status==1){
    $published=$published= "Activated";  
}else if($status==0){
    $status=  $status = "Pending"; 
}
// $sql = "update rooms set status=$status,availability=$availability where id=$id";
$sql = "UPDATE `blog_users` SET `status`='$status' WHERE user_id=$id";
mysqli_query($conn,$sql);
$_SESSION['message'] = "Blog User Activated Successfully" . mysqli_error($conn);
header("Location: admin_manage_users.php?msg=Blog User Activated Successfully. ");
exit(0);
?>