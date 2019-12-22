<?php 
   include '../../config.php'; 
   include '../../functions/functions.php'; 
   include '../../classes/User.php';
   
   if(!isset($_POST['user'])) {
      echo "Error: user variable not passed to ajaxRemoveFriend.php";
      exit();
   }
   if(!isset($_POST['userCancel'])) {
      echo "Error: userCancel variable not passed to ajaxRemoveFriend.php";
      exit();
   }

   $user = $_POST['user'];
   $userCancel = $_POST['userCancel'];

   $userObj = new User($con, $user);
   $userObj->cancelRequest($userCancel);

?>