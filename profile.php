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
      echo "<script>profUsername='$profUsername'</script>";
   }
?>
<div class="container">
   <?php include 'includes/profilePageLeftBar.php'; ?>
   <?php include 'includes/profileNewsfeed.php'; ?>
</div>

<!-- Local JS profile.js -->
<script src="assets/js/profile.js"></script>
</body>
</html>
   


