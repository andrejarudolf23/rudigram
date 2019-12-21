<?php 
   include '../../config.php'; 
   include '../../functions/functions.php'; 
   include '../../classes/User.php';
   
   if(!isset($_POST['userFrom'])) {
      echo "Error: userFrom variable not passed to ajaxRemoveFriend.php";
      exit();
   }
   if(!isset($_POST['userToRemove'])) {
      echo "Error: userToRemove variable not passed to ajaxRemoveFriend.php";
      exit();
   }

   $userFrom = $_POST['userFrom'];
   $userTo = $_POST['userToRemove'];

   $userFromObj = new User($con, $userFrom);
   $userFromObj->removeFriend($userTo);

?>