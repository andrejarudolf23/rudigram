<?php 
   include '../../config.php'; 
   include '../../functions/functions.php'; 
   include '../../classes/User.php';
   
   if(!isset($_POST['userLoggedIn'])) {
      echo "Error: userLoggedIn variable not passed to ajaxRemoveFriend.php";
      exit();
   }
   if(!isset($_POST['userFrom'])) {
      echo "Error: userFrom variable not passed to ajaxRemoveFriend.php";
      exit();
   }

   $userLoggedIn = $_POST['userLoggedIn'];
   $userFrom = $_POST['userFrom'];

   $userObj = new User($con, $userLoggedIn);
   $userObj->declineRequest($userFrom);

?>