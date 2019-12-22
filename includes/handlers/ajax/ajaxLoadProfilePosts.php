<?php 
   include '../../config.php'; 
   include '../../functions/functions.php'; 
   include '../../classes/User.php'; 
   include '../../classes/Post.php';

   if(!isset($_POST['profUsername'])) {
      echo "Error: profUsername variable not passed to ajaxLoadProfilePosts.php";
      exit();
   }

   if(!isset($_POST['userLoggedIn'])) {
      echo "Error: profUsername variable not passed to ajaxLoadProfilePosts.php";
      exit();
   }

   if(!isset($_POST['page'])) {
      echo "Error: page variable not passed to ajaxLoadProfilePosts.php";
      exit();
   }

   $limit = 10; //10 posts per load
   $username = $_POST['userLoggedIn'];
   $profUsername = $_POST['profUsername'];
   $page = $_POST['page'];
   $post = new Post($con, $username);
   $post->loadProfilePosts($page, $limit, $profUsername);

?>