<?php 
session_start();
include "../includes/connection.php";

if (isset($_POST['submit_article'])) {
    $title = htmlentities(mysqli_real_escape_string($conn, $_POST['title']));
    $short_description = htmlentities(mysqli_real_escape_string($conn, $_POST['short_description']));
    $content = htmlentities(mysqli_real_escape_string($conn, $_POST['content']));
    $user_id = htmlentities(mysqli_real_escape_string($conn, $_POST['user_id']));
    $fname = htmlentities(mysqli_real_escape_string($conn, $_POST['fname']));
    $lname = htmlentities(mysqli_real_escape_string($conn, $_POST['lname']));
    $status = "1";
    $newImageName = "";

    if (!empty($_FILES["image"]["name"])) {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validExtensions)) {
            $_SESSION['message'] = "Invalid image extension. Only JPG, JPEG, PNG allowed.";
            header("Location: add_posts.php?msg=Invalid image extension.");
            exit(0);
        }

        $newImageName = uniqid('post_', true) . '.' . $imageExtension;
        $uploadPath = '../imagepost/' . $newImageName;

        if (!move_uploaded_file($tmpName, $uploadPath)) {
            $_SESSION['message'] = "Failed to upload image.";
            header("Location: add_posts.php?msg=Failed to upload image.");
            exit(0);
        }
    }

    $sql = "INSERT INTO `blog_posts` 
        (`user_id`, `fname`, `lname`, `title`, `description`, `content`, `content_image`, `date`, `status`) 
        VALUES 
        ('$user_id', '$fname', '$lname', '$title', '$short_description', '$content', '$newImageName', NOW(), '$status')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "New post added successfully.";
        header("Location: manage_posts.php?msg=New post added successfully.");
        exit(0);
    } else {
        $_SESSION['message'] = "Database error: " . mysqli_error($conn);
        header("Location: add_posts.php?msg=Error saving post.");
        exit(0);
    }
}
?>
