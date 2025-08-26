<?php
include"..\includes/connection.php";

if(isset($_POST['sign_up'])){
    $first_name =htmlentities((mysqli_real_escape_string($conn,$_POST['first_name'])));
    $second_name =htmlentities((mysqli_real_escape_string($conn,$_POST['second_name'])));
    $email =htmlentities((mysqli_real_escape_string($conn,$_POST['email'])));
    $password =htmlentities((mysqli_real_escape_string($conn,$_POST['password'])));
    $confirm_password =htmlentities((mysqli_real_escape_string($conn,$_POST['confirm_password'])));
    $gender =htmlentities((mysqli_real_escape_string($conn,$_POST['gender'])));
    $status = 'pending';

    $newgid = sprintf('%05d',rand(0,999999));


    $username = strtolower($first_name . "_" . $second_name . "_" . $newgid);

    $check_username_query = "SELECT user_name FROM blog_users WHERE email = '$email' ";
    $run_username = mysqli_query($conn, $check_username_query);


    $password==$confirm_password;
    if($password != $confirm_password){  
        $_SESSION['message'] = "Password Do Not Match!!!" . mysqli_error($conn);
        header("Location: admin_register.php?msg=Password Do Not Match!!!.");
        exit(0);
       
      }

    if(strlen(($password) < 6)){
        $_SESSION['message'] = "Password Must Be a Maximum of 6 Characters" . mysqli_error($conn);
        header("Location: admin_register.php?msg=Password Must Be a Maximum of 6 Characters. ");
        exit(0);
    }
    

    $check_email = "select * from blog_users where email = '$email' ";
    $run_email = mysqli_query($conn, $check_email);

    $check = mysqli_num_rows($run_email);
    if($check==1){
        $_SESSION['message'] = "Try another email, email  already exist !!!" . mysqli_error($conn);
        header("Location: admin_register.php?msg=Try another email, email  already exist !!!. ");
        exit(0);
    }


 
 //    $fileName = $_FILES["image"]["name"];
 //    $tmpName = $_FILES["image"]["tmp_name"];

 //    $image = 'img/'. $fileName;
   
 // if(  move_uploaded_file($tmpName,$image)){

      
        $sql ="INSERT INTO `blog_users`(`fname`, `lname`, `email`, `password`, `user_name`, `gender`, `date`, `status`) VALUES ('$first_name','$second_name','$email','$password','$username','$gender',now(),'$status' )";
    
       
        $query = mysqli_query($conn, $sql);

        if($query){
            $_SESSION['message'] = "New User Added Successfully" . mysqli_error($conn);
            header("Location: ..\login.php?msg=New User Account Added Successfully. ");
            exit(0);
        }
        else{
            $_SESSION['message'] = "Account not created successfully" . mysqli_error($conn);
            header("Location: admin_register.php?msg=Account not created successfully. ");
            exit(0);
        }
    }
 
// }
?>