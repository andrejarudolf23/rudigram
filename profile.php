<?php include 'includes/header.php'; ?>
<style>
   .container {
      max-width: 100%;
      margin: 48px 0 0 0;
      padding: 0;
      overflow-y: hidden;
   }   
</style>
<?php
   if(isset($_GET['profile_username'])) {
      $profUsername = $_GET['profile_username'];
      $profUser = new User($con, $profUsername);
   }
?>
<div class="container">
   <?php include 'includes/profilePageLeftBar.php'; ?>

</div>
   


