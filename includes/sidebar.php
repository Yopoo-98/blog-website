<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../includes/connection.php";

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch user info
$get_user = "SELECT * FROM blog_users WHERE email = '$email'";
$run_user = mysqli_query($conn, $get_user);
$row = mysqli_fetch_assoc($run_user);

$user_id = $row['user_id'];
// $user_name = $row['user_name'];
// $first_name = $row['fname'];
// $last_name = $row['lname'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>aamusted blog Website</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

     <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="..\includes/header.css">

</head>
<body>

  <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>

  <div class="sidebar" id="sidebar">
    <h2>AAMUSTED BLOG WEBSITE</h2>
                


   <div style="background-color: black;padding:10px;border-radius:10px"> <p style="color:yellow; text-align:center">
     <?php echo $row['fname'] . " " .  $row['lname'];?>
     </p>
   </div>
    <a href="blog_post.php">🏠 DASHBOARD</a>
    <a href="add_posts.php"><i class="fa-solid fa-plus"></i> Add New Posts</a>
    <a href="manage_posts.php"><i class="fa-solid fa-hands-holding-circle"></i> Manage Posts</a>
    
    <a href="set_profile.php">⚙️ Settings</a>
   <a href="..\login.php" onclick="return confirm('Do You Really Want to Logout This Page? ')"><i class="fas fa-sign-out-alt"></i> Logout</a>

     <div class="container" id="" >
        <div class="row">
            <div  class="col-md-12" id="profile-pic">
           <?php

          $sql = "SELECT * FROM `profile_photo` inner join blog_users where profile_photo.user_id = blog_users.user_id AND  blog_users.email = '".$_SESSION['email']."' ";
          $query= mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($query)){
                            
            ?>
            <img src="..\img/<?php echo $row['image']?>" style="width:60px;height:60px">
            <p style="color:yellow; font-weight:bold; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><?php echo $row['user_name']?></p>
            <p style="color:yellow; font-weight:bold; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><?php echo $row['profession']?></p>

              <?php
            }
            ?>

            </div>
        </div>
          
      </div><br>
      
  </div>

  <!-- <div class="main-content">
    <h1>Welcome!</h1>
    <p>This is the main content area.</p>
  </div> -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('active');
    }
  </script>
</body>
</html>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      min-height: 100vh;
      background-color: #f4f4f4;
    }

    .sidebar {
       background-image: linear-gradient(to right,#A52A2A, #A52A2A);
      color: white;
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px;
      transition: transform 0.3s ease;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      text-align: center;
    }

    .sidebar a {
      display: block;
      padding: 10px;
      margin: 10px 0;
      text-decoration: none;
      color: white;
      border-radius: 5px;
      transition: background 0.2s;
    }

    .sidebar a:hover {
      background-color: white;
      color:brown;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
      width: 100%;
    }

    .toggle-btn {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      background: #2c3e50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      z-index: 1001;
    }
#profile-pic img{
       margin: 20px;
       margin-bottom:20px;
       border-radius: 100%; 
       width: 70px;
    }
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.active {
        transform: translateX(0);
      }

      .main-content {
        margin-left: 0;
      }

      .toggle-btn {
        display: block;
      }
    }
  </style>