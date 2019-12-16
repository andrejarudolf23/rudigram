<?php 
   include '../../config.php'; 
   include '../../functions/functions.php'; 
   include '../../classes/User.php'; 
   include '../../classes/Post.php';

   if(!isset($_POST['userLoggedIn'])) {
      echo "Error: userLoggedIn variable not passed to ajaxLoadPosts.php";
      exit();
   }

   if(!isset($_POST['page'])) {
      echo "Error: page variable not passed to ajaxLoadPosts.php";
      exit();
   }

   $limit = 10; //10 posts per load
   $username = $_POST['userLoggedIn'];
   $page = $_POST['page'];
   $post = new Post($con, $username);
   $post->loadPosts($page, $limit);

?>