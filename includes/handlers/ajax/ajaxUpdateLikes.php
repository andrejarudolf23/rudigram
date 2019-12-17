<?php 
   include '../../config.php'; 
   include '../../functions/functions.php'; 
   include '../../classes/User.php'; 
   include '../../classes/Post.php';
   
   if(!isset($_POST['postId'])) {
      echo "postId variable not passed to ajaxUpdateLikes.php";
      exit();
   }
   if(!isset($_POST['userLoggedIn'])) {
      echo "userLoggedIn variable not passed to ajaxUpdateLikes.php";
      exit();
   }

   $postId = $_POST['postId'];
   $username = $_POST['userLoggedIn'];

   $getLikeQuery = mysqli_query($con, "SELECT * FROM likes WHERE username='$username' AND postId='$postId'");
   $count = mysqli_num_rows($getLikeQuery);
   //check to see if user already liked that post
   if($count == 1) {
      //unlike
      $postQuery = mysqli_query($con, "UPDATE posts SET likes = likes - 1 WHERE id='$postId'");
      $unlikeQuery = mysqli_query($con, "DELETE FROM likes WHERE postId='$postId' AND username='$username'");
      echo 0;
      exit();
   }

   //like
   $postQuery = mysqli_query($con, "UPDATE posts SET likes = likes + 1 WHERE id='$postId'");
   $likeQuery = mysqli_query($con, "INSERT INTO likes VALUES('', '$username', '$postId')");
   echo true;


?>