<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "blog");

    $sql = "SELECT * FROM `blog_users` ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
                                        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/header.css">
</head>
<body>

<?php include "../includes/sidebar.php"; ?>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">

                <?php
                if (isset($_GET['msg'])) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                        . htmlentities($_GET['msg']) .
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
              
                ?>

                <div class="card">
                    <div class="card-header text-center text-primary">
                        <h4>ADD NEW POST</h4>
                    </div>
                    <div class="card-body">

                     <?php 
                        if (isset($_SESSION['email'])) {
                            $email = $_SESSION['email'];
                            $sql = "SELECT * FROM blog_users WHERE email = '$email'";
                            $query = mysqli_query($conn, $sql);
                            $result = mysqli_fetch_assoc($query);
                        } else {
                            // Redirect to login if session is not set
                            header("Location: ../login.php");
                            exit();
                        }
                    ?>

                  

                        <form action="insert_add_article.php" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group mb-2">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $result['user_id']?>" Required>
                            </div><br>
                            <div class="form-group mb-3">
                                <label>Article Title</label>
                                <input type="text" name="title" class="form-control" required placeholder="Enter article title">
                            </div>

                            <div class="form-group mb-3">
                                <label>Short Description (Meta Description)</label>
                                <textarea name="short_description" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Long Description (Body Content)</label>
                                <textarea name="content" class="form-control" rows="8" id="textarea1" required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <button type="submit" name="submit_article" class="btn btn-primary w-100">Submit</button>
                        </form>

                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- TinyMCE WYSIWYG Editor -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<!-- <script>
    tinymce.init({
        selector: 'textarea#textarea1',
        height: 300
    });
</script> -->

<style>
    body {
        overflow: scroll;
    }
</style>

</body>
</html>
