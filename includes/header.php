<?php 
   include 'includes/config.php'; 
   include 'includes/classes/User.php';
   include 'includes/classes/Post.php';
   include 'includes/functions/functions.php';
   
   if(isset($_SESSION['userLoggedIn'])) {
      $userLoggedIn = $_SESSION['userLoggedIn'];
      $user = new User($con, $userLoggedIn);
      echo "<script>userLoggedIn='$userLoggedIn'</script>";
   }
   else {
      header("Location: register.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Local CSS -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- FontAwesome JS CDN -->
   <script src="https://kit.fontawesome.com/6433f47107.js" crossorigin="anonymous"></script>
   <title>Rudigram</title>
</head>
<body>
   <header>
      <?php include 'includes/navbar.php'; ?>
   </header>
   <div class="container">  