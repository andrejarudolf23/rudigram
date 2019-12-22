<?php 
   include '../../config.php'; 
   include '../../functions/functions.php'; 
   include '../../classes/User.php';
   
   if(!isset($_POST['user'])) {
      echo "Error: user variable not passed to ajaxRemoveFriend.php";
      exit();
   }
   if(!isset($_POST['userToAdd'])) {
      echo "Error: userToAdd variable not passed to ajaxRemoveFriend.php";
      exit();
   }

   $user = $_POST['user'];
   $userToAdd = $_POST['userToAdd'];

   $userObj = new User($con, $user);
   $userObj->addFriend($userToAdd);

?>