<?php
session_start();
include "includes/connection.php";

if (isset($_POST['sign_up'])) {
    $first_name = htmlentities(mysqli_real_escape_string($conn, $_POST['first_name']));
    $second_name = htmlentities(mysqli_real_escape_string($conn, $_POST['second_name']));
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm_password = htmlentities(mysqli_real_escape_string($conn, $_POST['confirm_password']));
    $gender = htmlentities(mysqli_real_escape_string($conn, $_POST['gender']));
    $role = 'user';

    // Generate unique username
    $newgid = sprintf('%05d', rand(0, 999999));
    $username = strtolower($first_name . "_" . $second_name . "_" . $newgid);

    // Check if email already exists
    $check_email = "SELECT * FROM blog_users WHERE email = '$email'";
    $run_email = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($run_email) > 0) {
        header("Location: register.php?msg=Try another email, this email already exists!");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        header("Location: register.php?msg=Passwords do not match!");
        exit();
    }

    // Check password length (6-9 characters)
    if (strlen($password) < 6 || strlen($password) > 9) {
        header("Location: register.php?msg=Password must be between 6 and 9 characters!");
        exit();
    }

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO blog_users 
            (fname, lname, email, password, user_name, gender, role, date, status) 
            VALUES 
            ('$first_name', '$second_name', '$email', '$hashed_password', '$username', '$gender', '$role', NOW(), 1)";
    
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: login.php?msg=New user registered successfully!");
        exit();
    } else {
        header("Location: register.php?msg=Registration failed. Please try again.");
        exit();
    }
}
?>
